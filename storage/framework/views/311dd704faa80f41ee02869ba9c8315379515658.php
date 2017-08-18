<?php $__env->startSection('title'); ?>
	myPlannr | Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-md-offset-2">
				<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($friends->contains($post->user->id) || (Auth::user()->id) == ($post->user->id)): ?>
					<div class="media img-thumbnail">
						
						<div class="col-md-10 col-sm-10 col-xs-10">
						  <div class="media-left">
						    <img src="<?php echo e(asset($post->user->avatar)); ?>" class="media-object img-circle" style="width:80px; height: 80px;">
						  </div>


						  <div class="media-body">

						  	<div class="media-heading">
						  		
						  		<h4><a  href='/users/profile/<?php echo e($post->user->id); ?>'><?php echo e($post->user->name); ?></a></h4>
						  		<h6><em>Posted  <?php echo e($post->created_at->diffForHumans()); ?></em></h6>
						  	</div>
						  	<hr>
						  	<div class="well" style="justify-content: center;">
						  		<div style="text-align: center; padding: 10px;">
							  		<?php if(!empty($post->imagepost)): ?>
							    		<img src="<?php echo e(asset($post->imagepost)); ?>" style="width: auto; height: 200px;">
							   		<?php endif; ?>
							   	</div>
							   <div class="row">
								    <span class="col-md-2 col-sm-2 col-xs-2">Plan:</span> <span class=" col-md-10 col-sm-10 col-xs-10"><strong><?php echo e($post->what); ?> </strong></span>

								    <span class="col-md-2 col-sm-2 col-xs-2">Where:</span> <span class=" col-md-10 col-sm-10 col-xs-10"><strong><?php echo e($post->where); ?> </strong></span>

								    <span class="col-md-2 col-sm-2 col-xs-2">When:</span> <span class=" col-md-10 col-sm-10 col-xs-10"><strong> <?php echo e($post->when); ?> </strong></span>
								    <?php if(!empty($post->caption)): ?>
								   		<span class="col-md-2 col-sm-2 col-xs-2">Caption:</span> <span class="col-md-10 col-sm-10 col-xs-10"><strong> <?php echo e($post->caption); ?> </strong></span>
								   	<?php endif; ?>
								</div>
							    
						    </div>

						    
						    <hr>
						    <div>
							    <?php if(!Auth::user()->likes()->where('post_id',$post->id)->first()): ?>
							    	<button id="like<?php echo e($post->id); ?>" name="like" onclick="like('<?php echo e($post->id); ?>');"><span class="fa fa-thumbs-o-up">like </span></button><span id='likeCount<?php echo e($post->id); ?>'>( <?php echo e(count($post->likes)); ?> )</span>
							    <?php else: ?>
									<button id="like<?php echo e($post->id); ?>" name="unlike" onclick="like('<?php echo e($post->id); ?>');"><span class="fa fa-thumbs-o-down" aria-hidden="true">unlike </span></button>
									<span id='likeCount<?php echo e($post->id); ?>'>( <?php echo e(count($post->likes)); ?> )</span>
							    <?php endif; ?>

							    
							   
							    
							    &nbsp;&nbsp;<button  id="showComment<?php echo e($post->id); ?>" onclick="showComment(<?php echo e($post->id); ?>)">Show Comment</button><?php echo e($post->comments->count()); ?>

							    <hr>
							    <div id="commentdiv<?php echo e($post->id); ?>" style="display: none;">
								    <div class="card" >
								    	<div class="card-block">
								    		<form method="POST" action='<?php echo e(url("/users/$post->id/comments")); ?>'>
								    		<?php echo e(csrf_field()); ?>

								    		
								    			<div class="form-group">
								    				<textarea class="comment" name="body" id="body<?php echo e($post->id); ?>" placeholder="Your comment here..." class="form-control" required></textarea>
								    			</div>
								    			
								    		</form>
								    		
								    	</div>
								    </div>
								    
								  	
								  	 <div class="comments">
								    	<ul class="list-group" id="showComments<?php echo e($post->id); ?>">
								    	<?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								    		<li class="list-group-item">
								    			<strong>
								    				<?php echo e($comment->created_at->diffForHumans()); ?>: &nbsp;
								    			</strong>
								    			<?php echo e($comment->body); ?>

								    			by:&nbsp;<?php echo e($comment->user->name); ?>

								    		</li>
								    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								    	</ul>
								    </div>
								    <hr>
								</div>
							</div>
						</div>
					</div>
					</div>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>



		</div>
	</div>	

	<input type="hidden" id="token" value="<?php echo e(csrf_token()); ?>">

<script type="text/javascript">
	function like(id){
		
		// var token = $('#token').val();

		// if($('#like'+id).attr('name',) == 'like'){
		// 	$.post('/like',{
		// 		_token : token,
		// 		post_id : id,
		// 	},function(data){
		// 		$('#like'+id).html('<span class="fa fa-thumbs-o-down" aria-hidden="true">unlike</span>');
		// 		$('#like'+id).attr('name','unlike');		
		// 	});
		// } else {
		// 	$.post('/unlike',{
		// 		_token : token,
		// 		post_id : id,
		// 	},function(data){
		// 		$('#like'+id).html('<span class="fa fa-thumbs-o-up" aria-hidden="true">like</span>');
		// 		$('#like'+id).attr('name','like');		
		// 	});
		// }
		
		if($('#like'+id).attr('name',) == 'like'){
			$.ajax({
				url: '/like',
				method: 'GET',
				data: {
					post_id : id,
				},
				success: function(data){
					$('#like'+id).html('<span class="fa fa-thumbs-o-down" aria-hidden="true">unlike</span>');
					$('#like'+id).attr('name','unlike');	
					$('#likeCount'+id).html(data);	
				},
				error: function(response, status, error) {
					console.log("Error Found")
					console.log(response)
					console.log(status)
					console.log(error)
				}
			});

		} else {

			$.ajax({
				url: '/unlike',
				method: 'GET',
				data: {
					post_id : id,
				},
				success: function(data){
					$('#like'+id).html('<span class="fa fa-thumbs-o-up" aria-hidden="true">like</span>');
					$('#like'+id).attr('name','like');
					$('#likeCount'+id).html(data);			
				},
				error: function(response, status, error) {
					console.log("Error Found")
					console.log(response)
					console.log(status)
					console.log(error)
				}
			});
		}	

	}

	// function addComment(id){
	// 	var token = $('#token').val();
	// 	var body = $('#body'+id).val();
	// 	$.post('/users/'+id+'/comments',{
	// 		_token : token,
	// 		body : body,
	// 	}, function(data){
	// 		$('#showComments'+id).html(data);
	// 		$('#body'+id).val('');
	// 	});
	// }

	$('.comment').keypress(function (event) {
		var id = (this.id).substring(4);
		var token = $('#token').val();
		var body = $('#body'+id).val();

		// console.log(body) 	

		if (event.shiftKey && event.keyCode == 13) {
			var content = this.value;
			var	caret = getCaret(this);
			this.value = content.substring(0,caret) + "\n" + content.substring(caret, content.length);
			event.stopPropagation();
		} else if (event.keyCode == 13) {
			event.preventDefault();

			$.post('/users/'+id+'/comments',{
				_token : token,
				body : body,
			}, function(data){
				// console.log(data)
				$('#showComments'+id).html(data);
				$('#body'+id).val('');
			});

		}
	});

	function showComment(id){
		$('#commentdiv'+id).toggle();
	}

</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>