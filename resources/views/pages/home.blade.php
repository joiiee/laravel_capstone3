@extends('layouts/app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-md-offset-2">
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
						    <button id="like{{$post->id}}" name="like" onclick="like('{{$post->id}}');"><span class="fa fa-thumbs-o-up">like</span></button>
						    @else
							<button id="like{{$post->id}}" name="unlike" onclick="like('{{$post->id}}');"><span class="fa fa-thumbs-o-down" aria-hidden="true">unlike</span></button>
						    @endif

						    <hr>
						   
						    {{-- Add a comment --}}
						    <div class="card">
						    	<div class="card-block">
						    		<form method="POST" action='{{url("/homes/$post->id/comments")}}'>
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
					</div>
					@endif
				@endforeach
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