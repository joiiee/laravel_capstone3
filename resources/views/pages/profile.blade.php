@extends("layouts/app")

@section("content")
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
				<div class="img-thumbnail">
					<img class="img-responsive" src='{{Auth::user()->avatar}}'>		
					<p>Name: {{Auth::user()->name}}</p>
					<p>Email: {{Auth::user()->email}}</p>
					<p><a href='{{ url("/users")}}'>Friends ({{count($friends)}})</a></p>
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
										<form class="form-horizontal" method="POST" action='{{url("/users/profile")}}'>
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
												Insert Image: <input type="file" name="imgpost">
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
					@foreach($posts as $post)
					@if($friends->contains($post->user->id) || (Auth::user()->id) == ($post->user->id))
					<div class="media img-thumbnail">
					  <div class="media-left">
					 
					    <img src="img_avatar1.png" class="media-object" style="width:100px">
					  </div>
					  <div class="media-body">
					    <h4 class="media-heading">{{$post->user->name}}</h4>
					    <p><em>What: </em> {{$post->what}}</p>
					    <p><em>Where: </em>{{$post->where}}</p>
					    <p><em>When: </em>{{$post->when}}</p>
					    <p><em>Caption: </em>{{$post->caption}}</p>
					    <p>{{$post->imagepost}}</p>
					    @if(!Auth::user()->likes()->where('post_id',$post->id)->first())
					    <button id="like{{$post->id}}" name="like" onclick="like('{{$post->id}}');"><span class="fa fa-thumbs-o-up">like</span></button>
					    @else
						<button id="like{{$post->id}}" name="unlike" onclick="like('{{$post->id}}');"><span class="fa fa-thumbs-o-down" aria-hidden="true">unlike</span></button>
					    @endif
					    <a href="#">Comment</a>
					  
					  </div>
					</div>

					@endif
					@endforeach
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
	<input type="hidden" id="token" value="{{csrf_token()}}">

<script type="text/javascript">
	function like(id){
		
		var token = $('#token').val();

		if($('#like'+id).attr('name',) == 'like'){
			$.post('/like',{
				_token : token,
				post_id : id,
			},function(data){
				$('#like'+id).html('<span class="fa fa-thumbs-o-down" aria-hidden="true">unlike</span>');
				$('#like'+id).attr('name','unlike');		
			});
		} else {
			$.post('/unlike',{
				_token : token,
				post_id : id,
			},function(data){
				$('#like'+id).html('<span class="fa fa-thumbs-o-up" aria-hidden="true">like</span>');
				$('#like'+id).attr('name','like');		
			});
		}
		

	}
</script>

@endsection