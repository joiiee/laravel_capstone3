<?php $__env->startSection("content"); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
				<div class="img-thumbnail">
					<img class="img-responsive" src='<?php echo e(Auth::user()->avatar); ?>'>		
					<p>Name: <?php echo e(Auth::user()->name); ?></p>
					<p>Email: <?php echo e(Auth::user()->email); ?></p>
					<p><a href='<?php echo e(url("/users")); ?>'>Friends (<?php echo e(count($friends)); ?>)</a></p>
				</div>
			</div>

			<div class="col-md-7">
				<div class="container-fluid">
					
					
					<div>
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addpost">+ Add Post</button>
					</div>

					<div class="modal fade" id="addpost" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Add Post</h4>
								</div>
								<div class="modal-body">
									<div class="container-fluid">
										<form class="form-horizontal" method="POST" action='<?php echo e(url("/users/profile")); ?>'>
										<?php echo e(csrf_field()); ?>

											<div class="input-group">	
												
												<span class="input-group-btn">
												<p>What:</p> <input type="text" class="form-control" name="whatpost" placeholder="What post is all about" required>
												
												</span>
											</div>
											<div class="input-group">
												<span class="input-group-btn">
												<p>Where:</p><input type="text" class="form-control" name="wherepost" placeholder="Where do you plan to do this?" required>
												</span>
											</div>
											<div class="input-group">
												<span class="input-group-btn">
												<p>When:</p><input type="date" class="form-control" name="whenpost" placeholder="When do you plan this?" required>
												</span>
											</div>
											
											<div class="input-group">
												<span class="input-group-btn">
												<p>Caption this:</p><textarea name="caption" id="content" class="form-control" placeholder="Caption this post..."></textarea>
												</span>
											</div>
											<br>
											<div class="input-group">
												Insert Image: <input type="file" name="imgpost">
											</div>

											<br>
											<div class="input-group">
												<input type="submit" class="btn btn-primary" name="postnow" value="Post">

												<a href='<?php echo e(url("/users/profile")); ?>'><input type="button" class="btn btn-danger" name="cancel" value="Cancel"></a>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>	
						
					</div>

					
					<div class="media img-thumbnail">
					  <div class="media-left">
					    <img src="img_avatar1.png" class="media-object" style="width:100px">
					  </div>
					  <div class="media-body">
					    <h4 class="media-heading">John Doe</h4>
					    <p>Lorem ipsum...</p>

					    <a href="#">Like  &middot;</a>
					    <a href="#">Comment</a>
					  </div>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				
			</div>
		</div>
	</div>

	<div class="container">
		<div class="container-fluid">
			
			<div>
				

				
			</div>
			
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>