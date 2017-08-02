<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    function myRequests(){
        return $this->belongsToMany('App\User', 'friend_requests', 'from', 'to');
    }

    function theirRequests(){
        return $this->belongsToMany('App\User', 'friend_requests', 'to', 'from');
    }

    function pendingRequests() {
        return $this->theirRequests()->wherePivot('status',0)->get();
    }

    function friends() {
        return $this->theirRequests()->wherePivot('status',1)->get()->merge($this->myRequests()->wherePivot('status',1)->get());
    }

    function addFriend($id){
        $this->myRequests()->attach($id);
    }

    function acceptRequest($id){
        $this->theirRequests()->where('from',$id)->first()->pivot->update(['status'=>1,
            ]);
    }

    function declineRequest($id){
        $this->theirRequests()->detach($id);
    }

    function cancelRequest($id){
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> efca031c3b815c21bdf011c91544b72658072863
        $this->myRequests()->detach($id);
    }

    function unFriend($id){
<<<<<<< HEAD
=======
=======
>>>>>>> 17669a2ebdec0d0e6c9d6822a677aa4fc0c05aff
>>>>>>> efca031c3b815c21bdf011c91544b72658072863
        $this->myRequests()->detach($id);
        $this->theirRequests()->detach($id);
    }

    function likes(){
        return $this->hasMany('App\Like');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

}
