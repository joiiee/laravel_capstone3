@extends("layouts/app")

@section("content")
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Profile Page</strong></div>
		</div>
	</div>

	<div class="container">
		<div class="container-fluid img-thumbnail">
			
				<div>
					<img class="img-responsive" src='{{ $prof["avatar"] }}'>		
					<p>Name: {{ $prof["name"] }}</p>
					<p>Email: {{ $prof["email"] }}</p>

					@if(Auth::user()->id != $prof->id && !$connections->contains($prof->id))
				<form method="POST" action='{{ url("add_friend/$prof->id") }}'>
				{{ csrf_field() }}

					<button class="btn btn-default">{{-- <a href="{{url("add_friend/$user->id")}}"></a> --}}Add as Friend</button>
				</form>	
					@endif
				</div>
			
		</div>
	</div>

@endsection