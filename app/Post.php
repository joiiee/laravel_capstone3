<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Auth;

class Post extends Model
{
    function user(){
    	return $this->belongsTo('App\User');
    }

    function likes(){
    	return $this->hasMany('App\Like');
    }

    public function comments(){
    	return $this->hasMany(Comment::class);
    }

    public function addComment($body){
    	// $this->comments()->create(compact('body'));

    	Comment::create([
    		'body' => $body,
    		'post_id' => $this->id,
    		'user_id' => Auth::user()->id,
    	]);
    }
}
