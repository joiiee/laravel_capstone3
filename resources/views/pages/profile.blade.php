@extends("layouts/app")

@section('title')
	myPlannr | Profile
@endsection

@section("content")
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="img-thumbnail profleft">
					<img class="img-responsive" src="{{asset($user->avatar)}}">
					<div class="well">		
						<p>Name: {{$user->name}}</p>
						<p>Email: {{$user->email}}</p>
						@if ($user->id == Auth::user()->id)
							<p><a href='{{ url("/users")}}'>Friends ({{count($friends)}})</a></p>
						@else
							<p>Friends ({{count($friends)}})</p>
						@endif
						
						@if ($user->id == Auth::user()->id)
							<p><a type="button" data-toggle="modal" data-target="#editprof">Edit Profile</a></p>
						@endif
					</div>
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
										<label class="control-label col-sm-3" for="pname">Name:</label>
										<div class="col-sm-8">
											<input class="form-control" type="text" id="pname" name="profname" value="{{$user->name}}">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="pemail">Email:</label> 
										<div class="col-sm-8">
											<input class="form-control" type="text" id="pemail" name="profemail" value="{{$user->email}}">
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-sm-3" for="ppic">Profile Picture:</label>
										<div class="col-sm-8">
											<input class="form-control" type="file" name="profpic" value="{{asset($user->avatar)}}" accept="image/*">
										</div>
									</div>
									<br>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10 col-xs-offset-2 col-xs-10">
											<button type="submit" class="btn btn-primary" style="width: 40%;">Save</button>

											<a href='{{url("/users/profile")}}' class="btn btn-danger" style="width: 40%;">Cancel</a>
										</div>
									</div>

									@include('layouts/errors')
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-8 col-sm-12 col-xs-12">
				 <div > {{-- class="container-fluid" --}}
					{{-- add new post (modal) --}}

					@if ($user->id == Auth::user()->id)
						<div class="addpostbtn">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addpost">+ Add Post</button>
						</div>
					@endif
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
											<div class="form-group">	
												<label class="control-label col-sm-3 col-xs-2" for="addplan">Plan: </label>
												<div class="col-sm-8 col-xs-10">
													<input type="text" class="form-control" id="addplan" name="whatpost" placeholder="Write your plan here" required>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-3 col-xs-2" for="addPlace">Place: </label>
												<div class="col-sm-8 col-xs-10">
													<input type="text" class="form-control" id="addPlace" name="wherepost" placeholder="Location of this event" required>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-sm-3 col-xs-2" for="addDate">Date: </label>
												<div class="col-sm-8 col-xs-10">
													<input type="date" class="form-control" id="addDate" name="whenpost" placeholder="When do you plan this?" required>
												</div>
											</div>
											{{-- <div class="form-group">
												<input type="text" class="form-control" name="whopost" placeholder="Who are your buddies for this?">
												</span>
											</div> --}}
											<div class="form-group">
												<label class="control-label col-sm-3 col-xs-2" for="addNote">Note: </label>
												<div class="col-sm-8 col-xs-10">
													<textarea name="caption" id="content" id="addNote" class="form-control" placeholder="Notes for this event" style="resize: vertical;"></textarea>
												</div>
											</div>
											{{-- <br> --}}
											<div class="form-group">
												{{-- <label for="imagepost" id="file-upload"><i class="fa fa-image"></i>Upload Image</label>
												<input type="file" id="imagepost" name="imgpost" accept="image/*"> --}}
												<label class="control-label col-sm-3" for="addImage">Insert Image: </label>
												<div class="col-sm-8">
													<input class="form-control" id="addImage" type="file" name="imgpost" accept="image/*">
												</div>
											</div>

											<br>
											<div class="form-group">
												<div class="col-sm-offset-2 col-sm-10 col-xs-offset-2 col-xs-10">
													<input type="submit" class="btn btn-primary" name="postnow" value="Post" style="width: 40%;">

													<a href='{{url("/users/profile")}}'><input type="button" class="btn btn-danger" name="cancel" value="Cancel" style="width: 40%;"></a>
												</div>
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
						@if(($user->id) == ($post->user->id))
							<div class="row rowPost img-thumbnail">
								<div class="">
									<div class="profilePost col-md-11 col-sm-11 col-xs-10">
									  <div class="userAvatar">
									    <img src="{{asset($post->user->avatar)}}" class=" img-circle">
									  </div>


									  <div class="">
									  	<div class="avatarDateDiv">
									  		<h4>{{$post->user->name}}</h4>
									  		<span class="datePosted"><i class="fa fa-clock-o" aria-hidden="true"></i>  {{$post->created_at->diffForHumans()}}</span>
									  	</div>
										  {{-- <hr> --}}
										  <br>
									  	<div class="well wellDiv" style="justify-content: center;">
									  		<div style="text-align: center; padding: 10px;">
										  		@if(!empty($post->imagepost))
										    		<img src="{{asset($post->imagepost)}}" class="imagePost">
										   		@endif
										   	</div>
										   {{-- <div class="row">
											    <span class="col-md-2 col-sm-2 col-xs-2">Plan:</span> <span class=" col-md-10 col-sm-10 col-xs-10"><strong>{{$post->what}} </strong></span>

											    <span class="col-md-2 col-sm-2 col-xs-2">Where:</span> <span class=" col-md-10 col-sm-10 col-xs-10"><strong>{{$post->where}} </strong></span>

											    <span class="col-md-2 col-sm-2 col-xs-2">When:</span> <span class=" col-md-10 col-sm-10 col-xs-10"><strong> {{$post->when}} </strong></span>
											    @if (!empty($post->caption))
											    	<span class="col-md-2 col-sm-2 col-xs-2">Caption:</span> <span class="col-md-10 col-sm-10 col-xs-10"><strong> {{$post->caption}} </strong></span>
											    @endif
											    
										   </div> --}}

										   	<div class="postContent">
												<div class="input-group input-group-md">
													<span class="input-group-addon inputGroupSpan" id="sizing-addon2"><i class="fa fa-envelope-open-o" title="Plan" aria-hidden="true"></i><span class="hideOnMobile">&nbsp;&nbsp;Plan</span></span><textarea class="form-control txtArea" aria-describedby="sizing-addon2" readonly>{{$post->what}}</textarea>
												</div>
			
												<div class="input-group input-group-md">
													<span class="input-group-addon inputGroupSpan" id="sizing-addon2"><i class="fa fa-location-arrow" title="Where" aria-hidden="true"></i><span class="hideOnMobile">&nbsp;&nbsp;Place</span></span><textarea rows="1" class="form-control txtArea" aria-describedby="sizing-addon2" readonly>{{$post->where}}</textarea>
												</div>
												
												<div class="input-group input-group-md">
													<span class="input-group-addon inputGroupSpan" id="sizing-addon2"><i class="fa fa-calendar-o" title="When" aria-hidden="true"></i><span class="hideOnMobile">&nbsp;&nbsp;Date</span></span><textarea rows="1" class="form-control txtArea" aria-describedby="sizing-addon2" readonly>{{$post->when}}</textarea>
												</div>
												@if (!empty($post->caption))
													<div class="input-group input-group-md">
														<span class="input-group-addon inputGroupSpan" id="sizing-addon2"><i class="fa fa-sticky-note-o" title="Notes" aria-hidden="true"></i><span class="hideOnMobile">&nbsp;&nbsp;Note</span></span><textarea class="form-control txtArea" aria-describedby="sizing-addon2" readonly>{{$post->caption}}</textarea>
													</div>
												@endif
											</div>
										    
									    </div>
									    {{-- <hr> --}}
									    {{-- <br> --}}
									    <div class="likeCommentDiv">
											<div class="likeDiv">
												@if(!Auth::user()->likes()->where('post_id',$post->id)->first())
													<button class="btnTrans" id="like{{$post->id}}" name="like" onclick="like('{{$post->id}}');"><span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><span class="hideOnMobile"> Like </span></span></button>
													@if(count($post->likes) == 0)
														<span id='likeCount{{$post->id}}'>&nbsp;&nbsp;&nbsp;&nbsp;</span>
													@else
														<span id='likeCount{{$post->id}}'>({{count($post->likes)}})</span>
													@endif
												@else
													<button class="btnTrans" id="like{{$post->id}}" name="unlike" onclick="like('{{$post->id}}');"><span><i class="fa fa-thumbs-up" aria-hidden="true"></i><span class="hideOnMobile"> Liked </span></span></button>
													@if(count($post->likes) == 0)
														<span id='likeCount{{$post->id}}'>&nbsp;&nbsp;&nbsp;&nbsp;</span>
													@else
														<span id='likeCount{{$post->id}}'>({{count($post->likes)}})</span>
													@endif
												@endif
											</div>
										    {{-- <hr> --}}
										   
											{{-- Add a comment --}}
											<div class="commentDiv">
												&nbsp;&nbsp;&nbsp;&nbsp;<button class="btnTrans" {{-- class="btn btn-default" --}} id="showComment{{$post->id}}" onclick="showComment({{$post->id}})"><span><i class="fa fa-comment-o" aria-hidden="true"></i><span class="hideOnMobile"> Comment</span></span></button>
												@if(count($post->comments) == 0)
													<span id="commentCount">&nbsp;&nbsp;&nbsp;&nbsp;</span>
												@else
													<span id="commentCount">({{$post->comments->count()}})</span>
												@endif
											</div>
										    {{-- <hr> --}}
										    <div class="showedComments" id="commentdiv{{$post->id}}" style="display: none;">
											    <div class="card" >
											    	<div class="card-block">
											    		<form method="POST" action='{{url("/users/$post->id/comments")}}'>
											    		{{ csrf_field() }}
											    		{{-- {{method_field('PATCH')}} --}}
											    			<div class="form-group">
																<img class="img-circle commentAvatar" src="{{asset(Auth::user()->avatar)}}" alt="User avatar" style="width:40px; height: 40px; object-fit: cover;">
																<textarea class="profPostComment txtArea comment" name="body" id="body{{$post->id}}" placeholder=" Hit 'Enter' to post a comment..." class="form-control" required></textarea>
											    			</div>
											    			{{-- <div class="form-group">
											    				<button type="button" id="{{$post->id}}" class="btn btn-primary" onclick="addComment(this.id)">Add Comment</button>
											    			</div> --}}
											    		</form>
											    		{{-- @include('layouts/errors') --}}
											    	</div>
											    </div>
											    {{-- <a href="#">Comment</a> --}}
											  	
											  	 <div class="comments">
											    	<ul class="list-group" id="showComments{{$post->id}}">
											    	@foreach($post->comments as $comment)
											    		<li class="list-group-item">
											    			<div class="commentUser">
																<img class="img-circle commentAvatar" src="{{asset($comment->user->avatar)}}" alt="User avatar" style="width:34px; height: 34px; object-fit: cover;">
																<div class="commenterDateDiv">
																	<strong>{{$comment->user->name}}</strong>
																	<span class="dateCommented">
																		<i class="fa fa-clock-o" aria-hidden="true"></i>  {{$comment->created_at->diffForHumans()}} 
																	</span>
																</div>
															</div>
															<div class="commentBody">
																{{$comment->body}}
															</div>
											    		</li>
											    	@endforeach
											    	</ul>
											    </div>
											    {{-- <hr> --}}
											</div>
										</div>

									  </div>
									</div>


									@if ($post->user->id == Auth::user()->id)								
										<div class="profileEditDeletePost col-md-1 col-sm-1 col-xs-1">
											<div class="btn-group ">
											  	<button id="ddown-edit" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											    	<span class="caret"></span>
											    	<span class="sr-only">Toggle Dropdown</span>
											 	 </button>
											  	<ul class="dropdown-menu dropdown-menu-right ddown-profile" >
												    <li><a type="button" data-toggle="modal" data-target="#editpost{{$post->id}}">Edit post</a></li>
												    <li><a type="button" data-toggle="modal" data-target="#deletepost{{$post->id}}">Delete post</a>
												   {{--  <li role="separator" class="divider"></li>
												    <li><a href="#">Mark as Drawing</a></li>
												    <li><a href="#">Mark as Colored</a></li> --}}
												</ul>
										  	</div>
										</div>
									@endif
								</div>
							</div>  {{-- end of media --}}

							{{-- edit post modal --}}

							<div class="modal fade editPost" id="editpost{{$post->id}}" role="dialog">
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
														<label class="control-label col-sm-3 col-xs-2" for="pwhat">Plan:</label>
														<div class="col-sm-8 col-xs-10">
															<input class="form-control" type="text" id="pwhat" name="postwhat" value="{{$post->what}}" required>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-sm-3 col-xs-2" for="pwhere">Place:</label>
														<div class="col-sm-8 col-xs-10">
															<input class="form-control" type="text" id="pwhere" name="postwhere" value="{{$post->where}}" required>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-sm-3 col-xs-2" for="pwhen">Date:</label>
														<div class="col-sm-8 col-xs-10">
															<input class="form-control" type="date" id="pwhen" name="postwhen" value="{{$post->when}}" required>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-sm-3 col-xs-2" for="pcaption">Note:</label>
														<div class="col-sm-8 col-xs-10">
															<textarea name="postcaption" id="pcaption" class="form-control" style="resize: vertical;">{{$post->caption}}</textarea>
															{{-- <input type="text" id="pcaption" name="postcaption" value="{{$post->caption}}"> --}}
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-sm-3" for="pimage">Post Image:</label>
														<div class="col-sm-8">
															<input class="form-control" type="file" name="postimage" value="{{$post->imagepost}}" accept="image/*">
														</div>
													</div>
													<br>
													<div class="form-group">
														<div class="col-sm-offset-2 col-sm-10 col-xs-offset-2 col-xs-10">
															<button type="submit" class="btn btn-primary" style="width: 40%;">Save</button>

															<a href='{{url("/users/profile")}}' class="btn btn-danger" style="width: 40%;">Cancel</a>
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
							<div class="modal fade deletePost" id="deletepost{{$post->id}}" role="dialog">
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
														<div class="col-sm-offset-2 col-sm-10 col-xs-offset-2 col-xs-10">
															<button type="submit" class="btn btn-primary" style="width: 40%;">Yes</button>
															
															<a href='{{url("/users/profile")}}' class="btn btn-danger" style="width: 40%;">No</a>
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

	
	<input type="hidden" id="token" value="{{csrf_token()}}">

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
				$('#like'+id).html('<span><i class="fa fa-thumbs-up" aria-hidden="true"></i><span class="hideOnMobile"> Liked</span></span>');
				$('#like'+id).attr('name','unlike');	
				$('#likeCount'+id).html(' '+data);	
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
				$('#like'+id).html('<span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><span class="hideOnMobile"> Like</span></span>');
				$('#like'+id).attr('name','like');
				$('#likeCount'+id).html(' '+data);			
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

	// function countLikes(){
	// 	$.get('/countlikes',
	// 	{
	// 		id: $('#likeCount'+id)
	// 	}
	// 		function(data){
	// 			console.log(data);
	// 		}
	// }

	// function addComment(id){
	// 	var token = $('#token').val();
	// 	var body = $('#body'+id).val();
	// 	// console.log(token + "id" + body)
	// 	$.post('/users/'+id+'/comments',{
	// 		_token : token,
	// 		body : body,
	// 	}, function(data){
	// 		// console.log(data)
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

		// $('#showComments'+id).click(function(){
		// $('#commentdiv'+id).toggle();
		// });

	}

	


</script>

@endsection