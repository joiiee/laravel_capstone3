{{-- - - - - - - users.blade.php - - - -  - - --}}
<br>
<div class="row container-fluid">
	<div class="col-md-6">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewpends">Pending Request ( {{count($pend_req)}} )</button>
	</div>

	<div class="col-md-6">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewfriends">
			Friend List  ( {{count($friends)}} )</button>
	</div>
</div>

<div class="modal fade" id="viewpends" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Pending Request</h4>
			</div>


			<div class="modal-body">
				<div class="img-thumbnail">
					@foreach($pend_req as $pr)
						<div class="flist img-thumbnail">
							<img class="img-responsive" src="{{$pr->avatar}}">
							<p>Name:  {{$pr->name}}</p>
						</div>
						
						<form method="POST" action='{{url("accept_request/$pr->id")}}'>
						{{csrf_field()}}
							<button class="btn btn-primary">Accept</button>
						</form>

						<form method="POST" action='{{url("decline_request/$pr->id")}}'>
						{{csrf_field()}}
							<button class="btn btn-danger">Decline</button>
						</form>
					@endforeach
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>	
</div>

<div class="modal fade" id="viewfriends" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Friend List</h4>
			</div>

			<div class="modal-body">
				<div class="img-thumbnail">
					@foreach($friends as $f)
						<div class="flist img-thumbnail">
							<img class="img-responsive" src="{{$f->avatar}}">
							<p>Name: {{$f->name}}</p>
						</div>
					@endforeach
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>	
</div>
<br>
{{-- </div> --}}

<div class="container col-md-9 col-sm-12">
	<div class="container-fluid img-thumbnail">
		@foreach($lists as $list)
			@if(Auth::user()->id != $list->id)	
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
													
													@elseif(Auth::user()->id != $list->id && $connections->contains($list->id) == $friends->contains($list->id))

													<button type="button">Following</button>

													@else

													<button type="button">Friend Requested</button>

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
			@endif
		@endforeach
	</div>
</div>

{{-- 	<div class="col-md-3 col-sm-12">
	<h3>Friend Request</h3>
	<h5>Pending:</h5>
	<input type="text" name="pendingReq" value="">
</div> --}}



{{-- - - - - - - profile.blade.php - - - - - -  --}}

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

{{--- - - - - - UserController (editProfile method) - - - - - - - --}}

 function editProfile(Request $request) {
        $this->validate($request,[
            'profname'=>'required',
            'profemail'=>'required',
            'profpic'=>'image|nullable|max:1999'
        ]);

        //Handle File Upload
        if ($request->hasFile('profpic')) {
            //Get filename with the extension
            $filenameWithExt = $request->file('profpic')->getClientOriginalName();
            //Get just filename
            $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get just extension
            $extension=$request->file('profpic')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            //Upload the image
            $path=$request->file('profpic')->storeAs('public/user',$fileNameToStore);
        } 

        //Update user
        $edit_profile = Auth::user();
        $edit_profile->name=$request->input('profname');
        $edit_profile->email=$request->input('profemail');
        
        if ($request->hasFile('profpic')) {
            $edit_profile->avatar=$fileNameToStore;
        }

        {{-- else {
            $fileNameToStore='noimage.jpg';
        } --}}

        // $edit_profile->avatar=$fileNameToStore;
        	// $image=$request->imgpost;
            // $filename = time().'.'. $image->getClientOriginalExtension();

            // $path=public_path('imageUploads/'.$filename);
            // $image= Image::make($image->getRealPath())->resize(200,200)->save($path);

            // $image->move('imageUploads',$filename);
            // $new_post->imagepost= 'imageUploads/'.$filename;

        $edit_profile->save();

        return redirect('/users/profile')->with('success','Profile Updated');
    }


    {{-- web.php --}}
// Route::post('/users/profile/{id}', function($id){
// 	$lists = User::find($id);
// 	Auth::user()->editProfile($id);
// 	return back();
// }

Route::get('/profile', function(){
	return view('users/profile')
}

Route::post('/users/profile','UserController@editProfile');
