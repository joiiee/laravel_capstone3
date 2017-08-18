<!DOCTYPE html>
<html>
<head>
	<title><?php echo $__env->yieldContent("title"); ?></title>

		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">
	
</head>
<body>

<?php echo $__env->yieldContent("content"); ?>
</body>
</html>