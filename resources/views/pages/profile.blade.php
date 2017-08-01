@extends("layouts/app")

@section("content")
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
				<div class="img-thumbnail">
					<img class="img-responsive" src="{{asset(Auth::user()->avatar)}}">		
					<p>Name: {{Auth::user()->name}}</p>
					<p>Email: {{Auth::user()->email}}</p>
					<p><a href='{{ url("/users")}}'>Friends ({{count($friends)}})</a></p>
					<p><a type="button" data-toggle="modal" data-target="#editprof">Edit Profile</a></p>
				</div>
			</div>

			{{-- <form method="POST" action="">
				
			</form> --}}

			<div class="modal fade" id="editprof" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Edit Profile</h4>
						</div>
						<div class="modal-body">
							<div class="container-fluid">
								<form class="form-horizontal" method="POST" action='{{url("/users/profile")}}' enctype="multipart/form-data">
								{{csrf_field()}}
									<div class="form-group">
										<label class="control-label col-sm-4" for="pname">Name:</label>
										<div class="col-sm-8">
											<input type="text" id="pname" name="profname" value="{{Auth::user()->name}}">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4" for="pemail">Email:</label> 
										<div class="col-sm-8">
											<input type="text" id="pemail" name="profemail" value="{{Auth::user()->email}}">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-4" for="ppic">Profile Picture:</label>
										<div class="col-sm-8">
											<input type="file" name="profpic" value="{{asset(Auth::user()->avatar)}}" accept="image/*">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-4 col-sm-8">
											<button type="submit" class="btn btn-primary">Save</button>

											<a href='{{url("/users/profile")}}' class="btn btn-danger">Cancel</a>
										</div>
									</div>

									@include('layouts/errors')
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-7">
				<div class="container-fluid">
					
					{{-- add new post (modal) --}}
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
										<form class="form-horizontal" method="POST" action='{{url("/users/profile/newPost")}}' enctype="multipart/form-data">
										{{ csrf_field() }}
											<div class="input-group">	
												{{-- <label class="control-label" for="what">What: </label> --}}
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
											{{-- <div class="input-group">
												<span class="input-group-btn">
												<p>Who:</p><input type="text" class="form-control" name="whopost" placeholder="Who are your buddies for this?">
												</span>
											</div> --}}
											<div class="input-group">
												<span class="input-group-btn">
												<p>Caption this:</p><textarea name="caption" id="content" class="form-control" placeholder="Caption this post..."></textarea>
												</span>
											</div>
											<br>
											<div class="input-group">
<<<<<<< HEAD
												{{-- <label for="imagepost" id="file-upload"><i class="fa fa-image"></i>Upload Image</label>
												<input type="file" id="imagepost" name="imgpost" accept="image/*"> --}}
											
=======
>>>>>>> 17669a2ebdec0d0e6c9d6822a677aa4fc0c05aff
												Insert Image: <input type="file" name="imgpost" accept="image/*">
											</div>

											<br>
											<div class="input-group">
												<input type="submit" class="btn btn-primary" name="postnow" value="Post">

												<a href='{{url("/users/profile")}}'><input type="button" class="btn btn-danger" name="cancel" value="Cancel"></a>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>	
						
					</div>

					{{-- post --}}
				{{-- @if(count($posts)==0)
					<p>No posts found..</p>
				@else --}}
					@foreach($posts as $post)
					@if($friends->contains($post->user->id) || (Auth::user()->id) == ($post->user->id))
					<div class="media img-thumbnail">
						
						<div class="col-md-10 col-sm-10 col-xs-10">
						  <div class="media-left">
						    <img src="{{asset($post->user->avatar)}}" class="media-object img-circle" style="width:100px; height: 100px;">
						  </div>


						  <div class="media-body">
						    <h4 class="media-heading">{{$post->user->name}}</h4>
						    <p><em>What: </em> {{$post->what}}</p>
						    <p><em>Where: </em>{{$post->where}}</p>
						    <p><em>When: </em>{{$post->when}}</p>
						    <p><em>Caption: </em>{{$post->caption}}</p>
						    <p><em>Posted  {{$post->created_at->diffForHumans()}}</em></p>
						    @if(!empty($post->imagepost))
						    	<img src="{{asset($post->imagepost)}}" style="width: 100px; height: 100px;">
						    @endif
						    <br>
						    @if(!Auth::user()->likes()->where('post_id',$post->id)->first())
<<<<<<< HEAD
						    <button id="like{{$post->id}}" name="like" onclick="like('{{$post->id}}');"><span class="fa fa-thumbs-o-up">like </span></button><span id='likeCount{{$post->id}}'>( {{count($post->likes)}} )</span>
						    @else
							<button id="like{{$post->id}}" name="unlike" onclick="like('{{$post->id}}');"><span class="fa fa-thumbs-o-down" aria-hidden="true">unlike </span></button>
							<span id='likeCount{{$post->id}}'>( {{count($post->likes)}} )</span>
=======
						    <button id="like{{$post->id}}" name="like" onclick="like('{{$post->id}}');"><span class="fa fa-thumbs-o-up">like</span></button>
						    @else
							<button id="like{{$post->id}}" name="unlike" onclick="like('{{$post->id}}');"><span class="fa fa-thumbs-o-down" aria-hidden="true">unlike</span></button>
>>>>>>> 17669a2ebdec0d0e6c9d6822a677aa4fc0c05aff
						    @endif

						    <hr>
						   
						    {{-- Add a comment --}}
						    <div class="card">
						    	<div class="card-block">
						    		<form method="POST" action='{{url("/users/$post->id/comments")}}'>
						    		{{ csrf_field() }}
						    		{{-- {{method_field('PATCH')}} --}}
						    			<div class="form-group">
						    				<textarea name="body" id="body{{$post->id}}"placeholder="Your comment here..." class="form-control" required>
						    					
						    				</textarea>
						    			</div>
						    			<div class="form-group">
						    				<button type="button" id="{{$post->id}}" class="btn btn-primary" onclick="addComment(this.id)">Add Comment</button>
						    			</div>
						    		</form>
						    		{{-- @include('layouts/errors') --}}
						    	</div>
						    </div>
						    {{-- <a href="#">Comment</a> --}}
						  	
						  	 <div class="comments">
						    	<ul class="list-group" id="showComments{{$post->id}}">
						    	@foreach($post->comments as $comment)
						    		<li class="list-group-item">
						    			<strong>
						    				{{$comment->created_at->diffForHumans()}}: &nbsp;
						    			</strong>
						    			{{$comment->body}}
						    			by:&nbsp;{{$comment->user->name}}
						    		</li>
						    	@endforeach
						    	</ul>
						    </div>
						    <hr>

						  </div>
						</div>

					@if ($post->user->id == Auth::user()->id)
						
						<div class="col-md-offset-1 col-md-1 col-sm-offset-1 col-sm-1 col-xs-offset-1 col-xs-1">
							<div class="btn-group ">
							  	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    	<span class="caret"></span>
							    	<span class="sr-only">Toggle Dropdown</span>
							 	 </button>
							  	<ul class="dropdown-menu dropdown-menu-right" >
								    <li><a type="button" data-toggle="modal" data-target="#editpost{{$post->id}}">Edit post</a></li>
								    <li><a type="button" data-toggle="modal" data-target="#deletepost{{$post->id}}">Delete post</a>
<<<<<<< HEAD
								   {{--  <li role="separator" class="divider"></li>
								    <li><a href="#">Mark as Drawing</a></li>
								    <li><a href="#">Mark as Colored</a></li> --}}
=======
								    <li role="separator" class="divider"></li>
								    <li><a href="#">Mark as Drawing</a></li>
								    <li><a href="#">Mark as Colored</a></li>
>>>>>>> 17669a2ebdec0d0e6c9d6822a677aa4fc0c05aff
								</ul>
						  	</div>
						</div>
					@endif

					</div>  {{-- end of media --}}

					{{-- edit post modal --}}

					<div class="modal fade" id="editpost{{$post->id}}" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Edit Post</h4>
								</div>

							{{-- @if ($post->user->id == Auth::user()->id) --}}
								<div class="modal-body">
									<div class="container-fluid">
										<form class="form-horizontal" method="POST" action='{{ url("/edit_post/{$post->id}")}}' enctype="multipart/form-data">
										{{csrf_field()}}
										{{-- @foreach ($posts as $post) --}}
											
											<div class="form-group">
												<label class="control-label col-sm-4" for="pwhat">What:</label>
												<div class="col-sm-8">
													<input type="text" id="pwhat" name="postwhat" value="{{$post->what}}" required>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-4" for="pwhere">Where:</label>
												<div class="col-sm-8">
													<input type="text" id="pwhere" name="postwhere" value="{{$post->where}}" required>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-4" for="pwhen">When:</label>
												<div class="col-sm-8">
													<input type="date" id="pwhen" name="postwhen" value="{{$post->when}}" required>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-4" for="pcaption">Caption:</label>
												<div class="col-sm-8">
													<input type="text" id="pcaption" name="postcaption" value="{{$post->caption}}">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-4" for="pimage">Post Image:</label>
												<div class="col-sm-8">
													<input type="file" name="postimage" value="{{$post->imagepost}}" accept="image/*">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-offset-4 col-sm-8">
													<button type="submit" class="btn btn-primary">Save</button>

													<a href='{{url("/users/profile")}}' class="btn btn-danger">Cancel</a>
												</div>
											</div>

											{{-- @include('layouts/errors') --}}
											
										{{-- @endforeach --}}

										</form>
									</div>
								</div>
							{{-- @endif --}}
							</div>
						</div>
					</div>

					{{-- delete post modal --}}
					<div class="modal fade" id="deletepost{{$post->id}}" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Delete Post</h4>
								</div>

							{{-- @if ($post->user->id == Auth::user()->id) --}}
								<div class="modal-body">
									<div class="container-fluid">
										<form class="form-horizontal" method="POST" action='{{ url("/delete_post/{$post->id}")}}' enctype="multipart/form-data">
										{{csrf_field()}}
										{{-- @foreach ($posts as $post) --}}
											
											<div class="form-group">
												<h3 style="text-align: center;">Are you sure you want to delete this Post?</h3>
											</div>
											
											<div class="form-group">
												<div class="col-sm-offset-4 col-sm-8">
													<button type="submit" class="btn btn-primary">Yes</button>

													<a href='{{url("/users/profile")}}' class="btn btn-danger">No</a>
												</div>
											</div>

											{{-- @include('layouts/errors') --}}
											
										{{-- @endforeach --}}

										</form>
									</div>
								</div>
							{{-- @endif --}}
							</div>
						</div>
					</div>


					@endif
					@endforeach

					
				{{-- @endif --}}
				</div>
			</div>

			<div class="col-md-3">
				{{-- bucketlist --}}
			</div>
		</div>
	</div>

	<div class="container">
		<div class="container-fluid">
			
			<div>
				

				{{-- @if(Auth::user()->id != $prof->id && !$connections->contains($prof->id))
			<form method="POST" action='{{ url("add_friend/$prof->id") }}'>
			{{ csrf_field() }}

				<button class="btn btn-default"><a href="{{url("add_friend/$user->id")}}"></a>Add as Friend</button>
			</form>	
				@endif --}}
			</div>
			
		</div>
	</div>
	{{-- <input type="hidden" id="token" value="{{csrf_token()}}"> --}}

<script type="text/javascript">
	function like(id){
		
		// var token = $('#token').val();

		// if($('#like'+id).attr('name',) == 'like'){
		// 	$.get('/like',{
		// 		// _token : token,
		// 		post_id : id,
		// 	},function(data){
		// 		$('#like'+id).html('<span class="fa fa-thumbs-o-down" aria-hidden="true">unlike</span>');
		// 		$('#like'+id).attr('name','unlike');	
		// 		$('#likeCount'+id).html(data);	
		// 	});
		// } else {
		// 	$.get('/unlike',{
		// 		// _token : token,
		// 		post_id : id,
		// 	},function(data){
		// 		$('#like'+id).html('<span class="fa fa-thumbs-o-up" aria-hidden="true">like</span>');
		// 		$('#like'+id).attr('name','like');
		// 		$('#likeCount'+id).html(data);			
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

<<<<<<< HEAD
	// function countLikes(){
	// 	$.get('/countlikes',
	// 	{
	// 		id: $('#likeCount'+id)
	// 	}
	// 		function(data){
	// 			console.log(data);
	// 		}
	// }

=======
>>>>>>> 17669a2ebdec0d0e6c9d6822a677aa4fc0c05aff
	function addComment(id){
		var token = $('#token').val();
		var body = $('#body'+id).val();
		$.post('/users/'+id+'/comments',{
			_token : token,
			body : body,
		}, function(data){
			$('#showComments'+id).html(data);
			$('#body'+id).val('');
		});
	}
</script>

@endsection