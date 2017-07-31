<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use Auth;

class CommentsController extends Controller
{
    public function store(Post $post) {

    	$this->validate(request(),['body'=>'required|min:2']);

    	$post->addComment(request('body'));
        foreach($post->comments as $comment){
            echo '<li class="list-group-item">
                <strong>'.
                    $comment->created_at->diffForHumans().': &nbsp;
                </strong>'.
                $comment->body.'
                by:&nbsp;'.$comment->user->name.'
            </li>';
        }
    	// Comment::create([
    	// 	'body' => request('body'),
    	// 	'post_id' => $post->id,
    	// 	'user_id' => Auth::user()->id,
    	// ]);

    	//return back();
    } 
}
