<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Auth;

class LikeController extends Controller
{
    function addLike(Request $request){
    	$new_like = new Like();
    	$new_like->user_id = Auth::user()->id;
    	$new_like->post_id = $request->post_id;
    	$new_like->save();
    }

    function deleteLike(Request $request){
    	$like = Like::where('post_id',$request->post_id)->where('user_id',Auth::user()->id)->first();
    	$like->delete();
    }
}
