<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Post;


class UserController extends Controller
{
    function showUser(Request $request) {
	// $lists = User::all();

     //    $pend_req = Auth::user()->pendingRequests();

	// $connections = Auth::user()->myRequests->merge(Auth::user()->theirRequests);

	// return view('pages/users',
    //        compact('lists','connections', 'pend_req')
    //    );
        
        $lists = User::all();

        $users = User::all();

        $connections = Auth::user()->myRequests->merge(Auth::user()->theirRequests);

        $pend_req = Auth::user()->pendingRequests();

        $friends = Auth::user()->friends();

        $theirRequests=Auth::user()->theirRequests();

        $myRequests=Auth::user()->myRequests();

        return view('/pages/users',
            compact('lists','users','connections','friends','pend_req','theirRequests','myRequests')
        );

    }

    // function showProfile() {
    //     $friends = Auth::user()->friends();
    // 	// $prof = User::find();

    // 	// dd($prof);

    // 	return view('pages/profile',compact('friends'));
    // }

    function saveNewPost(Request $request){
        $new_post = new Post();
        $new_post->user_id= Auth::user()->id;

        $new_post->what=$request->whatpost;
        $new_post->where=$request->wherepost;
        $new_post->when=$request->whenpost;
        $new_post->caption=$request->caption;
        // $new_post->imagepost=$request->imgpost;
        if (!empty($request->postimage)){
            $image=$request->imgpost;
            $filenames = time().'.'. $image->getClientOriginalExtension();
            // $path=public_path('imageUploads/'.$filename);
            // $image= Image::make($image->getRealPath())->resize(200,200)->save($path);
            $image->move('imageUploads',$filenames);
            $new_post->imagepost= 'imageUploads/'.$filenames;
        }
        $new_post->save();

        return redirect('/users/profile');
    }

    function showPosts(){
        $posts = Post::latest()->get();
        $friends = Auth::user()->friends();
        $connections = Auth::user()->myRequests->merge(Auth::user()->theirRequests);
        $users = User::all();

        return view('/pages/profile', compact('posts','friends','connections','users'));
    }

<<<<<<< HEAD
    function showAllPosts(){
        $posts = Post::latest()->get();
        $friends = Auth::user()->friends();
        $connections = Auth::user()->myRequests->merge(Auth::user()->theirRequests);
        $users = User::all();

        return view('/pages/home', compact('posts','friends','connections','users'));
    }

=======
>>>>>>> 17669a2ebdec0d0e6c9d6822a677aa4fc0c05aff
    function editProfile(Request $request) {
        $this->validate($request,[
            'profname'=>'required',
            'profemail'=>'required',
            'profpic'=>'image|nullable|max:1999'
        ]);

        $edit_prof = Auth::user();
        $edit_prof->name=$request->profname;
        $edit_prof->email=$request->profemail;
        
        if (empty($request->profpic)) {
            $edit_prof->avatar=Auth::user()->avatar;
        } else {
            $myimage=$request->profpic;
            $filenames = time().'.'. $myimage->getClientOriginalExtension();
            $myimage->move('user',$filenames);
            $edit_prof->avatar= 'user/'.$filenames;
        }
        
        $edit_prof->save();

        return back();
        // return redirect('/users/profile');
    }

    // }


}
