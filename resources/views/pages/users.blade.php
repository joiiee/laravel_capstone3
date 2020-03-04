@extends("layouts/app")

@section('title')
	myPlannr | Users
@endsection

@section("content")
	@if(Session::has('message'))
			<div class="alert alert-info" role="alert">{{Session::get('message')}}				
			</div>
	@endif

	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="col-md-9 col-sm-8 col-xs-12"><strong><h3>Friend List</h3></strong></div>
				{{-- <br> --}}
				
				<div class="input-group search-bar col-md-3 col-sm-4 col-xs-12">
					<form class="search-form navbar-form navbar-left" method="GET" action="{{url("/search")}}">
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
		<br>


	<div class="container-fluid">
		<ul class="nav nav-tabs flist_tabs">
			<li class="active" ><a data-toggle="tab" href="#userlist">All ( {{count($lists)}} )</a></li>

			<li><a href="#friendlist" data-toggle="tab">Friend List ( {{count($friends)}} )</a></li>

			<li><a href="#pendinglist" data-toggle="tab">Pending Request ( {{count($pend_req)}} )</a></li>
		</ul>
			
		<div class="tab-content">
			<div id="userlist" class="tab-pane fade in active" >
				<div class="row container-fluid searchresult">
					@foreach($lists as $list)
						@if(Auth::user()->id != $list->id)	
						<div class="flist  col-md-4 col-sm-6 col-xs-12">
							<div class="flist_div">
								<img src="{{ $list->avatar }}" style="width: 150px; height: 150px; object-fit: cover;">
								<br>
								<a class="btn btn-default uname" href='{{ url("/users/profile/$list->id") }}'>{{ $list->name }}</a>
								<br>
							
								@if(Auth::user()->id != $list->id && !$connections->contains($list->id))
								<form method="POST" action='{{url("add_friend/$list->id")}}'>
								{{ csrf_field() }}					
									<button class="btn btn-primary">Add as Friend</button>
								</form>		
								@elseif(Auth::user()->id != $list->id && $connections->contains($list->id) == $friends->contains($list->id))

									<button type="button" class="btn btn-success" data-toggle="modal" data-target="#unfriend{{$list->id}}"><a href='{{url("/users/unfriend/$list->id")}}'></a>Friends</button>

								@elseif(Auth::user()->id != $list->id && $pend_req->contains($list->id))

										<button type="button" class="btn btn-danger" href="#pendinglist" data-toggle="tab">Pending approval</button>

								@else					
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelreq{{$list->id}}"><a href='{{url("/users/cancel_request/$list->id")}}'></a>Sent friend request</button>
								@endif

								<form method="POST" action='{{url("/users/cancel_request/$list->id")}}'>
									{{csrf_field()}}
										<div class="modal fade cancelReq" id="cancelreq{{$list->id}}" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Sent friend request</h4>
													</div>
													<div class="modal-body">
														<div class="img-thumbnail">
															<div>
																<img class="img-responsive" src="{{$list["avatar"]}}">
																<p>Name:{{$list["name"]}}</p>
																<button class="btn btn-primary">Cancel Request</button>
															</div>
														</div>
													</div>
													{{-- <div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div> --}}
												</div>
											</div>
										</div>
								</form>

								<form method="POST" action='{{url("/users/unfriend/$list->id")}}'>
									{{csrf_field()}}
										<div class="modal fade unfriend" id="unfriend{{$list->id}}" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Unfriend</h4>
													</div>
													<div class="modal-body">
														<div class="img-thumbnail">
															<div>
																<img class="img-responsive" src="{{$list["avatar"]}}">
																<p>Name:{{$list["name"]}}</p>
																<button class="btn btn-primary">Unfriend</button>
															</div>
														</div>
													</div>
													{{-- <div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div> --}}
												</div>
											</div>
										</div>
								</form>
							</div>				
						</div>
						@endif
					@endforeach
				</div>
			</div>


			<div id="friendlist" class="tab-pane fade" >
				<div class="row container-fluid searchresult">
					@foreach($friends as $f)
						<div class="flist col-md-4 col-sm-6 col-xs-12">
							<div class="flist_div">
								<img src="{{ $f->avatar }}" style="width: 150px; height: 150px; object-fit: cover;">
								
								<br>
								<a class="btn btn-default" href='{{ url("/users/profile/$f->id") }}'>{{ $f->name }}</a>
								<br>
							</div>
						</div>
					@endforeach
				</div>
			</div>

			<div id="pendinglist" class="tab-pane fade" >
				<div class="row container-fluid searchresult">
					@foreach($pend_req as $pr)						
							<div class="flist col-md-4 col-sm-6 col-xs-12">
								<div class="flist_div">
									<form method="POST" action='{{url("accept_request/$pr->id")}}'>
									{{csrf_field()}}
										<img src="{{ $pr->avatar }}" style="width: 150px; height: 150px; object-fit: cover;">
									
										<br>
											<a class="btn btn-default" href='{{ url("/users/profile/$pr->id") }}'>{{ $pr->name }}</a>
										<br>
									
										<button class="btn btn-primary">Accept</button>
									</form>
								
									<form method="POST" action='{{url("decline_request/$pr->id")}}'>
									{{csrf_field()}}
										<button class="btn btn-danger">Decline</button>
									</form>
								</div>
							</div>
						
					@endforeach
				</div>
			</div>
		</div>  {{-- end of tab-content --}}
	</div>


@endsection