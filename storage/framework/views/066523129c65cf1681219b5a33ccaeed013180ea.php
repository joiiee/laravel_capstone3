<?php $__env->startSection("content"); ?>
	<div class="col-sm-8">
		<h1>Register</h1>
		
		<form method="POST" action="/users/register">
			<?php echo e(csrf_field()); ?>


			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" id="name" name="name">
			</div>

			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email">
			</div>

			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password">
			</div>

			<div class="form-group">
				<label for="avatar">Password:</label>
				<input type="file" class="form-control" id="avatar" name="avatar">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Register</button>
			</div>



		</form>
	
	</div>
	


<?php $__env->stopSection(); ?>



<?php echo $__env->make("/layouts/app", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>