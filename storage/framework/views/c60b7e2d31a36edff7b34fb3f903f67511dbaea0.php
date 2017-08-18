<?php $__env->startSection('content'); ?>

	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="col-md-6">
					<strong><h3>Search Result</h3></strong>
				</div><br>
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

	<div class="container-fluid img-thumbnail searchresult">
		<?php if(count($users)==0): ?>
			<div class="alert alert-danger">No results found..</div>
		<?php else: ?>
			<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="searchdiv">
					
					<img src="<?php echo e($user->avatar); ?>" style="width: auto; height: 100px;">
					<p><?php echo e($user->name); ?></p>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>