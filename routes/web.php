<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\User;

Route::get('/users', 'UserController@showUser');

// Route::get('/users', 'UserController@showUser');

// Route::get('/users/profile/{id}', 'UserController@showProfile');

Route::post('add_friend/{id}',function($id){
	$user = User::find($id);
	$connections = Auth::user()->myRequests->merge(Auth::user()->theirRequests);
	// dd($user);
	Auth::user()->addFriend($id);

	// return view('/pages/users',compact('connections'));

	return back();
});

Route::post('accept_request/{id}', function($id){
	Auth::user()->acceptRequest($id);
	Session::flash('message','Friend Added');
	return redirect('/users');
	// return back();
});


Route::post('decline_request/{id}', function($id){
	Auth::user()->declineRequest($id);

	return redirect('/users');
});

Route::post('/users/cancel_request/{id}',function($id){
	Auth::user()->cancelRequest($id);

	return redirect('/users');
});


// Route::get('/users/profile', 'UserController@showProfile');

Route::post('/users/profile/newPost','UserController@saveNewPost');

Route::get('/users/profile','UserController@showPosts');

Route::post('like', 'LikeController@addLike');

Route::post('unlike', 'LikeController@deleteLike');

Route::post('/users/profile','UserController@editProfile');

Route::post('/users/{post}/comments','CommentsController@store');

Route::post('/edit_post/{id}','PostController@editPost');

Route::post('/delete_post/{id}','PostController@deletePost');



// Route::get('/users/register','RegistrationController@create');

// Route::post('/users/register','RegistrationController@store');



// Route::get('/login','SessionsController@create');

// Route::get('/logout','SessionsController@destroy')





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
