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
                    <div class="commentUser">
                        <img class="img-circle commentAvatar" alt="User avatar" style="width: 34px; height: 34px; object-fit: cover;" src="'.
                        asset($comment->user->avatar).' ">
                        <div>
                            <strong>'.$comment->user->name.'</strong>
                            <span class="dateCommented">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>  '.$comment->created_at->diffForHumans().'</span>
                        </div>
                    </div>
                    <div class="commentBody">'.
                        $comment->body
                    .'</div>
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
