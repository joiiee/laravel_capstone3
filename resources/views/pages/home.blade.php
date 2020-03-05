@extends('layouts/app')

@section('title')
	myPlannr | Home
@endsection

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-md-offset-2">
				@foreach($posts as $post)
					@if($friends->contains($post->user->id) || (Auth::user()->id) == ($post->user->id))
					<div class="row rowPost img-thumbnail">
						
						<div class="homePost col-md-10 col-sm-11 col-xs-12">
						  <div class="userAvatar">
						    <img src="{{asset($post->user->avatar)}}" class=" img-circle">
						  </div>


						  <div class="">

						  	<div class="avatarDateDiv">
						  		{{-- <h4>{{$post->user->name}}</h4> --}}
						  		<h4><a  href='/users/profile/{{ $post->user->id }}'>{{$post->user->name}}</a></h4>
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
								    <span class="col-md-3 col-sm-3 col-xs-2"><i class="fa fa-envelope-open-o" title="Plan" aria-hidden="true"></i><span class="hideOnMobile">&nbsp;&nbsp;Plan:</span></span> <span class="col-md-9 col-sm-9 col-xs-10"><strong>{{$post->what}} </strong></span>

								    <span class="col-md-3 col-sm-3 col-xs-2"><i class="fa fa-location-arrow" title="Where" aria-hidden="true"></i><span class="hideOnMobile">&nbsp;&nbsp;Where:</span></span> <span class="col-md-9 col-sm-9 col-xs-10"><strong>{{$post->where}} </strong></span>

								    <span class="col-md-3 col-sm-3 col-xs-2"><i class="fa fa-calendar-o" title="When" aria-hidden="true"></i><span class="hideOnMobile">&nbsp;&nbsp;When:</span>
									</span> <span class="col-md-9 col-sm-9 col-xs-10"><strong> {{$post->when}} </strong></span>
								    @if (!empty($post->caption))
								   		<span class="col-md-3 col-sm-3 col-xs-2"><i class="fa fa-sticky-note-o" title="Notes" aria-hidden="true"></i><span class="hideOnMobile">&nbsp;&nbsp;Notes:</span></span> <span class="col-md-9 col-sm-9 col-xs-10"><strong> {{$post->caption}} </strong></span>
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

						    {{-- <h4 class="media-heading">{{$post->user->name}}</h4>
						    <p><em>What: </em> {{$post->what}}</p>
						    <p><em>Where: </em>{{$post->where}}</p>
						    <p><em>When: </em>{{$post->when}}</p>
						    <p><em>Caption: </em>{{$post->caption}}</p>
						    <p><em>Posted  {{$post->created_at->diffForHumans()}}</em></p>
						    @if(!empty($post->imagepost))
						    	<img src="{{asset($post->imagepost)}}" style="width: 100px; height: 100px;">
						    @endif --}}
						    <div class="likeCommentDiv">
								{{-- <hr> --}}
								<div class="likeDiv">
									@if(!Auth::user()->likes()->where('post_id',$post->id)->first())
										<button class="btnTrans" id="like{{$post->id}}" name="like" onclick="like('{{$post->id}}');"><span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><span class="hideOnMobile"> Like</span></span></button>
										@if(count($post->likes) == 0) 
											<span id='likeCount{{$post->id}}'>&nbsp;&nbsp;&nbsp;&nbsp;</span>	
										@else
											<span id='likeCount{{$post->id}}'>({{count($post->likes)}})</span>
										@endif
									@else
										<button class="btnTrans" id="like{{$post->id}}" name="unlike" onclick="like('{{$post->id}}');"><span><i class="fa fa-thumbs-up" aria-hidden="true"></i><span class="hideOnMobile"> Liked</span></span></button>
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
													<img class="img-circle commentAvatar" src="{{asset($post->user->avatar)}}" alt="User avatar" style="width:40px; height: 40px; object-fit: cover;">
								    				<textarea class="postComment txtArea comment" name="body" id="body{{$post->id}}" placeholder=" Hit 'Enter' to post a comment..." class="form-control" required></textarea>
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
					</div>
					@endif
				@endforeach
			</div>



		</div>
	</div>	

	<input type="hidden" id="token" value="{{csrf_token()}}">

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


@endsection