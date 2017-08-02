@extends("layouts/app")

@section("content")
	@if(Session::has('message'))
			<div class="alert alert-info" role="alert">{{Session::get('message')}}				
			</div>
	@endif

	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="col-md-6"><strong><h3>Friend List</h3></strong></div><br>
				{{-- <div class="input-group search-bar col-md-6">
					<span class="input-group-btn">
						<input type="text" class="form-control" name="search_friend" placeholder="Search a friend">

					</span>

					<span class="input-group-btn">
						<div class="input-group"> --}}
						{{-- <button type="button" name="search_btn"><i class="glyphicon glyphicon-search" aria-hidden="true"></i>search</button> --}}

						{{-- <input type="submit" class="form-control" name="search-bk-btn" value="search">
						</div>
					</span>
				</div> --}}
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
		<br>

		<div class="container-fluid">
			<ul class="nav nav-tabs">
				<li role="presentation" ><a href="#" onclick="usrlst()">All ( {{count($lists)}} )</a></li>

				<li role="presentation"><a href="#" onclick="frndlst()">Friend List ( {{count($friends)}} )</a></li>

				<li role="presentation"><a href="#" onclick="pndnglst()">Pending Request ( {{count($pend_req)}} )</a></li>
			</ul>
		</div>

<script type="text/javascript">
	function usrlst() {
		document.getElementById("userlist").style.display="block";
		document.getElementById("friendlist").style.display="none";
		document.getElementById("pendinglist").style.display="none";
	}

	function frndlst() {
		document.getElementById("friendlist").style.display="block";
		document.getElementById("userlist").style.display="none";
		document.getElementById("pendinglist").style.display="none";
	}

	function pndnglst() {
		document.getElementById("pendinglist").style.display="block";
		document.getElementById("userlist").style.display="none";
		document.getElementById("friendlist").style.display="none";
	}
</script>
{{-- - - - -  - - - - - - - - - - - - - - - - - - - - - - - --}}
		<div id="userlist" style="display: none">
			<div class="container-fluid img-thumbnail">
				@foreach($lists as $list)
					@if(Auth::user()->id != $list->id)	
					<div class="flist col-md-3 col-sm-3 col-xs-6">
						<div >
							<img src="{{ $list->avatar }}" style="width: 150px; height: 150px;">
							<br>
							<button type="button" class="btn btn-default"><a href='{{ url("/users/profile/$list->id") }}'></a>{{ $list->name }}
							</button>
							<br>
						
							@if(Auth::user()->id != $list->id && !$connections->contains($list->id))
							<form method="POST" action='{{url("add_friend/$list->id")}}'>
							{{ csrf_field() }}					
								<button class="btn btn-primary">{{-- <a href="{{url("add_friend/$user->id")}}"></a> --}}Add as Friend</button>
							</form>		
							@elseif(Auth::user()->id != $list->id && $connections->contains($list->id) == $friends->contains($list->id))

								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#unfriend{{$list->id}}"><a href='{{url("/users/unfriend/$list->id")}}'></a>Friends</button>

							@elseif(Auth::user()->id != $list->id && $pend_req->contains($list->id))

									<button type="button" class="btn btn-danger" >Pending approval</button>

							@else{{-- if(Auth::user()->id != $list->id && $myRequests->wherePivot('status',0)) --}}
				
									<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelreq{{$list->id}}"><a href='{{url("/users/cancel_request/$list->id")}}'></a>Sent friend request</button>
								
							{{-- @else --}}

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


		<div id="friendlist" style="display: none">
			<div class="img-thumbnail">
				@foreach($friends as $f)
					<div class="flist img-thumbnail">
						<img class="img-responsive" src="{{$f->avatar}}" style="width: 150px; height: 150px;">
						<p>Name: {{$f->name}}</p>
					</div>
				@endforeach
			</div>
		</div>

		<div id="pendinglist" style="display: none">
			<div class="img-thumbnail">
				@foreach($pend_req as $pr)
					<div class="flist img-thumbnail">
						<img class="img-responsive" src="{{$pr->avatar}}">
						<p>Name:  {{$pr->name}}</p>
					</div>
					<div class="btns">
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
{{-- - - - - - - - - - - - - - - - - - - - - - - - - - - - --}}


@endsection