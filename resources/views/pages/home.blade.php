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
					<div class="media img-thumbnail">
						
						<div class="col-md-10 col-sm-10 col-xs-10">
						  <div class="media-left">
						    <img src="{{asset($post->user->avatar)}}" class="media-object img-circle" style="width:80px; height: 80px;">
						  </div>


						  <div class="media-body">

						  	<div class="media-heading">
						  		{{-- <h4>{{$post->user->name}}</h4> --}}
						  		<h4><a  href='/users/profile/{{ $post->user->id }}'>{{$post->user->name}}</a></h4>
						  		<h6><em>Posted  {{$post->created_at->diffForHumans()}}</em></h6>
						  	</div>
						  	<hr>
						  	<div class="well" style="justify-content: center;">
						  		<div style="text-align: center; padding: 10px;">
							  		@if(!empty($post->imagepost))
							    		<img src="{{asset($post->imagepost)}}" style="width: auto; height: 200px;">
							   		@endif
							   	</div>
							   <div class="row">
								    <span class="col-md-2 col-sm-2 col-xs-2">Plan:</span> <span class="{{-- col-md-offset-1 col-sm-offset-1 col-xs-offset-1 --}} col-md-10 col-sm-10 col-xs-10"><strong>{{$post->what}} </strong></span>

								    <span class="col-md-2 col-sm-2 col-xs-2">Where:</span> <span class="{{-- col-md-offset-1 col-sm-offset-1 col-xs-offset-1 --}} col-md-10 col-sm-10 col-xs-10"><strong>{{$post->where}} </strong></span>

								    <span class="col-md-2 col-sm-2 col-xs-2">When:</span> <span class="{{-- col-md-offset-1 col-sm-offset-1 col-xs-offset-1 --}} col-md-10 col-sm-10 col-xs-10"><strong> {{$post->when}} </strong></span>
								    @if (!empty($post->caption))
								   		<span class="col-md-2 col-sm-2 col-xs-2">Caption:</span> <span class="col-md-10 col-sm-10 col-xs-10"><strong> {{$post->caption}} </strong></span>
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
						    <hr>
						    <div>
							    @if(!Auth::user()->likes()->where('post_id',$post->id)->first())
							    	<button id="like{{$post->id}}" name="like" onclick="like('{{$post->id}}');"><span class="fa fa-thumbs-o-up">like </span></button><span id='likeCount{{$post->id}}'>( {{count($post->likes)}} )</span>
							    @else
									<button id="like{{$post->id}}" name="unlike" onclick="like('{{$post->id}}');"><span class="fa fa-thumbs-o-down" aria-hidden="true">unlike </span></button>
									<span id='likeCount{{$post->id}}'>( {{count($post->likes)}} )</span>
							    @endif

							    {{-- <hr> --}}
							   
							    {{-- Add a comment --}}
							    &nbsp;&nbsp;<button {{-- class="btn btn-default" --}} id="showComment{{$post->id}}" onclick="showComment({{$post->id}})">Show Comment</button>{{$post->comments->count()}}
							    <hr>
							    <div id="commentdiv{{$post->id}}" style="display: none;">
								    <div class="card" >
								    	<div class="card-block">
								    		<form method="POST" action='{{url("/users/$post->id/comments")}}'>
								    		{{ csrf_field() }}
								    		{{-- {{method_field('PATCH')}} --}}
								    			<div class="form-group">
								    				<textarea class="comment" name="body" id="body{{$post->id}}" placeholder="Your comment here..." class="form-control" required></textarea>
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


@endsection