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
				<div class="col-md-6"><strong><h3>Friend List</h3></strong></div><br>
				
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
		<br>


	<div class="container-fluid">
		<ul class="nav nav-tabs">
			<li class="active" ><a data-toggle="tab" href="#userlist">All ( {{count($lists)}} )</a></li>

			<li><a href="#friendlist" data-toggle="tab">Friend List ( {{count($friends)}} )</a></li>

			<li><a href="#pendinglist" data-toggle="tab">Pending Request ( {{count($pend_req)}} )</a></li>
		</ul>
			
		<div class="tab-content">
			<div id="userlist" class="tab-pane fade in active" >
				<div class="container-fluid img-thumbnail searchresult">
					@foreach($lists as $list)
						@if(Auth::user()->id != $list->id)	
						<div class="flist img-thumbnail col-md-3 col-sm-3 col-xs-6">
							<div >
								<img src="{{ $list->avatar }}" style="width: 150px; height: 150px;">
								<br>
								<a class="btn btn-default" href='{{ url("/users/profile/$list->id") }}'>{{ $list->name }}</a>
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
										<div class="modal fade" id="cancelreq{{$list->id}}" role="dialog">
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
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
								</form>

								<form method="POST" action='{{url("/users/unfriend/$list->id")}}'>
									{{csrf_field()}}
										<div class="modal fade" id="unfriend{{$list->id}}" role="dialog">
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
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
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
				<div class=" img-thumbnail searchresult">
					@foreach($friends as $f)
						<div class="flist img-thumbnail ">
							<img class="img-responsive" src="{{$f->avatar}}" style="width: 150px; height: 150px;">
							<p>Name: {{$f->name}}</p>
						</div>
					@endforeach
				</div>
			</div>

			<div id="pendinglist" class="tab-pane fade" >
				<div class="img-thumbnail searchresult">
					@foreach($pend_req as $pr)
						
							<div class="flist img-thumbnail ">
								<img class="img-responsive" src="{{$pr->avatar}}" style="width: 150px; height: 150px;">
								<p>Name:  {{$pr->name}}</p>

								<form method="POST" action='{{url("accept_request/$pr->id")}}'>
								{{csrf_field()}}
									<button class="btn btn-primary">Accept</button>
								</form>
							
								<form method="POST" action='{{url("decline_request/$pr->id")}}'>
								{{csrf_field()}}
									<button class="btn btn-danger">Decline</button>
								</form>
							
							</div>
						
					@endforeach
				</div>
			</div>
		</div>  {{-- end of tab-content --}}
	</div>


@endsection