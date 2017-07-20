@extends("layouts/app")

@section("content")
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading"><strong>Friend List</strong></div>
		</div>
		<br>
		<div class="col-md-6">
			<a href="" class="btn btn-primary">Friend Request</a>
		</div>

		<div class="col-md-6">
			<a href="" class="btn btn-primary">Friend List</a>
		</div>
		<br>
	</div>

	<div class="container col-md-9 col-sm-12">
		<div class="container-fluid img-thumbnail">
			@foreach($lists as $list)
				<div class="flist col-md-3 col-sm-3 col-xs-6">
					<img class="img-responsive" src="{{ $list->avatar }}">
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#viewprofile{{$list->id}}"><a href='{{ url("/users/profile/$list->id") }}'></a>{{ $list->name }}
						</button>

						{{-- <a href='{{ url("/users/profile/$list->id") }}'>{{ $list->name }}</a> --}}
					<form method="POST" action='{{url("add_friend/$list->id")}}'>
					{{ csrf_field() }}
						<div class="modal fade" id="viewprofile{{$list->id}}" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Profile</h4>
									</div>
									<div class="modal-body">
										<div>
											<div class="img-thumbnail">
													<div>
														<img class="img-responsive" src='{{ $list["avatar"] }}'>		
														<p>Name: {{ $list["name"] }}</p>
														<p>Email: {{ $list["email"] }}</p>
													</div>

														@if(Auth::user()->id != $list->id && !$connections->contains($list->id))
													

														<button class="btn btn-default">{{-- <a href="{{url("add_friend/$user->id")}}"></a> --}}Add as Friend</button>
														
														@endif
												
											</div>
										</div>

									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
					</form>
					
				</div>
			@endforeach
		</div>
	</div>

{{-- 	<div class="col-md-3 col-sm-12">
		<h3>Friend Request</h3>
		<h5>Pending:</h5>
		<input type="text" name="pendingReq" value="">
	</div> --}}

@endsection