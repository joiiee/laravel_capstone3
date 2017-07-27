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
        $new_post->imagepost=$request->imgpost;
        $new_post->save();

        return redirect('/users/profile');
    }

    function showPosts(){
        $posts = Post::all();
        $friends = Auth::user()->friends();
        $connections = Auth::user()->myRequests->merge(Auth::user()->theirRequests);
        $users = User::all();

        return view('/pages/profile', compact('posts','friends','connections','users'));
    }

}
