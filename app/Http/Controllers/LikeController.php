<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Auth;
use App\Post;

class LikeController extends Controller
{
    function addLike(Request $request){
    	$new_like = new Like();
    	$new_like->user_id = Auth::user()->id;
    	$new_like->post_id = $request->post_id;
    	$new_like->save();

        $likes = Post::find($request->post_id)->likes->count();
        return view('/pages/likes',compact('likes'));
    }

    function deleteLike(Request $request){
    	$like = Like::where('post_id',$request->post_id)->where('user_id',Auth::user()->id)->first();
    	$like->delete();

        $likes = Post::find($request->post_id)->likes->count();
        return view('/pages/likes',compact('likes'));
    }


    // function test(Request $request){

    //     $likes = Post::find(1)->likes->count();
    //     dd($likes);
    //     return view('/pages/likes',compact('likes'));
    // }
}
