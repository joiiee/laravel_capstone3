@extends('layouts/app')

@section('content')
<<<<<<< HEAD

	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="col-md-6">
					<strong><h3>Search Result</h3></strong>
				</div><br>
				<div class="input-group search-bar col-md-6">
					<form class="navbar-form navbar-left" method="GET" action="{{url("/search")}}">
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
		@if (count($users)==0)
			<div class="alert alert-danger">No results found..</div>
		@else
			@foreach ($users as $user)
				<div class="searchdiv">
					{{-- <a href='{{url("/search_result/$user->id")}}'></a> --}}
					<img src="{{$user->avatar}}" style="width: auto; height: 100px;">
					<p>{{$user->name}}</p>
				</div>
			@endforeach
		@endif
	</div>
=======
	@foreach ($users as $user)
		<a href='{{url("/search_result/$user->id")}}'></a>
		<p>{{$user->name}}</p>
	@endforeach


>>>>>>> 9ac16a85a31be2e0e475914a130da587632fe980

@endsection