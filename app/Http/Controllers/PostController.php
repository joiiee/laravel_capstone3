<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostController extends Controller
{
    public function editPost(Request $request, $id){
        // dd($request);
        // $this->validate($request,[
        //  'pwhat'=>'required',
        //  'pwhere'=>'required',
        //  'pwhen'=>'required',
        //  'pcaption'=>'required',
        //  'pimage'=>'image|nullable|max:1999'
        // ]);

    	// $post_tbe = Post::first();
        $post_tbe = Post::find($id);
        $post_tbe->user_id=Auth::user()->id;
        $post_tbe->what=$request->postwhat;
        $post_tbe->where=$request->postwhere;
        $post_tbe->when=$request->postwhen;
        $post_tbe->caption=$request->postcaption;

        if (empty($request->postimage)) {
            // $post_tbe->imagepost='noimagepost.jpg';
        } else {
            $pimage=$request->postimage;
            $filename=time().'.'.$pimage->getClientOriginalExtension();
            $pimage->move('imageUploads/edited/',$filename);
            $post_tbe->imagepost='imageUploads/edited/'.$filename;
        }

        $post_tbe->save();

        return back();

        // $post_tbe->imagepost=$request->postimage;


    	// return view('pages/profile',compact('post_tbe'));

    	// $edit_post->what=$request->pwhat;

    }

    public function deletePost($id) {
        $post_tbd = Post::find($id);
        $post_tbd->delete();

        return back();
    }

    
}
