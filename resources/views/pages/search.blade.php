@extends('layouts/app')

@section('content')
	@foreach ($users as $user)
		<a href='{{url("/search_result/$user->id")}}'></a>
		<p>{{$user->name}}</p>
	@endforeach



@endsection