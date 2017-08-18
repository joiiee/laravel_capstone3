<?php $__env->startSection('title'); ?>
	myPlannr | Users
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
	<?php if(Session::has('message')): ?>
			<div class="alert alert-info" role="alert"><?php echo e(Session::get('message')); ?>				
			</div>
	<?php endif; ?>

	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="col-md-6"><strong><h3>Friend List</h3></strong></div><br>
				
				<div class="input-group search-bar col-md-6">
					<form class="navbar-form navbar-left" method="GET" action="<?php echo e(url("/search")); ?>">
					  <div class="input-group">
					    <input type="text" class="form-control" name="search" placeholder="Search">
					    <div class="input-group-btn">
					      <button class="btn btn-default" type="submit">
					        <i class="glyphicon glyphicon-search"></i>
					      </button>
					    </div>
					  </div>
					</form>
				</div>

			</div>
		</div>
	</div>
		<br>


	<div class="container-fluid">
		<ul class="nav nav-tabs">
			<li class="active" ><a data-toggle="tab" href="#userlist">All ( <?php echo e(count($lists)); ?> )</a></li>

			<li><a href="#friendlist" data-toggle="tab">Friend List ( <?php echo e(count($friends)); ?> )</a></li>

			<li><a href="#pendinglist" data-toggle="tab">Pending Request ( <?php echo e(count($pend_req)); ?> )</a></li>
		</ul>
			
		<div class="tab-content">
			<div id="userlist" class="tab-pane fade in active" >
				<div class="row container-fluid searchresult">
					<?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(Auth::user()->id != $list->id): ?>	
						<div class="flist  col-md-3 col-sm-6 col-xs-12">
							<div>
								<img src="<?php echo e($list->avatar); ?>" style="width: 150px; height: 150px;">
								<br>
								<a class="btn btn-default" href='<?php echo e(url("/users/profile/$list->id")); ?>'><?php echo e($list->name); ?></a>
								<br>
							
								<?php if(Auth::user()->id != $list->id && !$connections->contains($list->id)): ?>
								<form method="POST" action='<?php echo e(url("add_friend/$list->id")); ?>'>
								<?php echo e(csrf_field()); ?>					
									<button class="btn btn-primary">Add as Friend</button>
								</form>		
								<?php elseif(Auth::user()->id != $list->id && $connections->contains($list->id) == $friends->contains($list->id)): ?>

									<button type="button" class="btn btn-success" data-toggle="modal" data-target="#unfriend<?php echo e($list->id); ?>"><a href='<?php echo e(url("/users/unfriend/$list->id")); ?>'></a>Friends</button>

								<?php elseif(Auth::user()->id != $list->id && $pend_req->contains($list->id)): ?>

										<button type="button" class="btn btn-danger" href="#pendinglist" data-toggle="tab">Pending approval</button>

								<?php else: ?>					
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelreq<?php echo e($list->id); ?>"><a href='<?php echo e(url("/users/cancel_request/$list->id")); ?>'></a>Sent friend request</button>
								<?php endif; ?>

								<form method="POST" action='<?php echo e(url("/users/cancel_request/$list->id")); ?>'>
									<?php echo e(csrf_field()); ?>

										<div class="modal fade" id="cancelreq<?php echo e($list->id); ?>" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Sent friend request</h4>
													</div>
													<div class="modal-body">
														<div class="img-thumbnail">
															<div>
																<img class="img-responsive" src="<?php echo e($list["avatar"]); ?>">
																<p>Name:<?php echo e($list["name"]); ?></p>
																<button class="btn btn-primary">Cancel Request</button>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
								</form>

								<form method="POST" action='<?php echo e(url("/users/unfriend/$list->id")); ?>'>
									<?php echo e(csrf_field()); ?>

										<div class="modal fade" id="unfriend<?php echo e($list->id); ?>" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Unfriend</h4>
													</div>
													<div class="modal-body">
														<div class="img-thumbnail">
															<div>
																<img class="img-responsive" src="<?php echo e($list["avatar"]); ?>">
																<p>Name:<?php echo e($list["name"]); ?></p>
																<button class="btn btn-primary">Unfriend</button>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
								</form>
							</div>				
						</div>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>


			<div id="friendlist" class="tab-pane fade" >
				<div class="row container-fluid searchresult">
					<?php $__currentLoopData = $friends; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="flist col-md-3 col-sm-6 col-xs-12">
							<div>
								<img src="<?php echo e($f->avatar); ?>" style="width: 150px; height: 150px;">
								
								<br>
								<a class="btn btn-default" href='<?php echo e(url("/users/profile/$f->id")); ?>'><?php echo e($f->name); ?></a>
								<br>
							</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>

			<div id="pendinglist" class="tab-pane fade" >
				<div class="row container-fluid searchresult">
					<?php $__currentLoopData = $pend_req; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>						
							<div class="flist col-md-3 col-sm-6 col-xs-12">
								<div>
									<form method="POST" action='<?php echo e(url("accept_request/$pr->id")); ?>'>
									<?php echo e(csrf_field()); ?>

										<img src="<?php echo e($pr->avatar); ?>" style="width: 150px; height: 150px;">
									
										<br>
											<a class="btn btn-default" href='<?php echo e(url("/users/profile/$pr->id")); ?>'><?php echo e($pr->name); ?></a>
										<br>
									
										<button class="btn btn-primary">Accept</button>
									</form>
								
									<form method="POST" action='<?php echo e(url("decline_request/$pr->id")); ?>'>
									<?php echo e(csrf_field()); ?>

										<button class="btn btn-danger">Decline</button>
									</form>
								</div>
							</div>
						
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>  
	</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>