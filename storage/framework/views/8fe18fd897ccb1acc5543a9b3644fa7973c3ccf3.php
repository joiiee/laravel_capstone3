<?php $__env->startSection("content"); ?>
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Friend List</strong></div>
		</div>
		<br>
		<div class="col-md-6">
			
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewpends">
					Pending Request
				</button>
			
		</div>

		<div class="col-md-6">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewfriends">
				Friend List<a href=""></a>
			</button>
		</div>

		<div class="modal fade" id="viewpends" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Pending Request</h4>
					</div>


					<div class="modal-body">
						<div class="img-thumbnail">
							<?php $__currentLoopData = $pend_req; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div>
								<img class="img-responsive" src="<?php echo e($pr->avatar); ?>">
								<p>Name:  <?php echo e($pr->name); ?></p>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

							<button type="button" class="btn btn-primary">Accept<a href=""></a></button>

							<button type="button" class="btn btn-primary">Decline<a href=""></a></button>

						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>	
		</div>

		<div class="modal fade" id="viewfriends" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Friend List</h4>
					</div>

					<div class="modal-body">
						<div class="img-thumbnail">
							<div>
								<img class="img-responsive" src="">
								<p>Name: </p>
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>	
		</div>
		<br>
	</div>

	<div class="container col-md-9 col-sm-12">
		<div class="container-fluid img-thumbnail">
			<?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="flist col-md-3 col-sm-3 col-xs-6">
					<img class="img-responsive" src="<?php echo e($list->avatar); ?>">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#viewprofile<?php echo e($list->id); ?>"><a href='<?php echo e(url("/users/profile/$list->id")); ?>'></a><?php echo e($list->name); ?>

						</button>

						
					<form method="POST" action='<?php echo e(url("add_friend/$list->id")); ?>'>
					<?php echo e(csrf_field()); ?>

						<div class="modal fade" id="viewprofile<?php echo e($list->id); ?>" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Profile</h4>
									</div>
									<div class="modal-body">
										<div>
											<div class="img-thumbnail">
													<div>
														<img class="img-responsive" src='<?php echo e($list["avatar"]); ?>'>		
														<p>Name: <?php echo e($list["name"]); ?></p>
														<p>Email: <?php echo e($list["email"]); ?></p>
													</div>

														<?php if(Auth::user()->id != $list->id && !$connections->contains($list->id)): ?>
													

														<button class="btn btn-default">Add as Friend</button>
														
														<?php endif; ?>
												
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
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>