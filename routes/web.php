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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth/register');
});

use App\User;
use Illuminate\Http\Request;

Route::get('/users', 'UserController@showUser');

// Route::get('/users', 'UserController@showUser');

// Route::get('/users/profile/{id}', 'UserController@showProfile');

Route::post('add_friend/{id}',function($id){
	$user = User::find($id);
	$connections = Auth::user()->myRequests->merge(Auth::user()->theirRequests);
	// dd($user);
	Auth::user()->addFriend($id);
	Session::flash('message', $user->name. ' has been added.');

	// return view('/pages/users',compact('connections'));

	return back();
});

Route::post('accept_request/{id}', function($id){
	Auth::user()->acceptRequest($id);
	$user = User::find($id);
	Session::flash('message','You accepted ' .$user->name. '\'s request.');
	return redirect('/users');
	// return back();
});


Route::post('decline_request/{id}', function($id){
	Auth::user()->declineRequest($id);
	$user = User::find($id);
	Session::flash('message','You declined ' .$user->name. '\'s request.');

	return redirect('/users');
});

Route::post('/users/cancel_request/{id}',function($id){
	Auth::user()->cancelRequest($id);
	$user = User::find($id);
	Session::flash('message','You cancelled your request to ' .$user->name);
	return redirect('/users');
});

Route::post('/users/unfriend/{id}',function($id){
	Auth::user()->unFriend($id);
	$user = User::find($id);
	Session::flash('message','You unfriend ' .$user->name.'.');
	return redirect('/users');
});



// Route::get('/users/profile', 'UserController@showProfile');

Route::post('/users/profile/newPost','UserController@saveNewPost');

Route::get('/users/profile','UserController@showPosts');

Route::get('/homes','UserController@showAllPosts');

Route::get('like', 'LikeController@addLike');


Route::get('test','LikeController@test');


<<<<<<< HEAD

=======
>>>>>>> 9ac16a85a31be2e0e475914a130da587632fe980
Route::get('unlike', 'LikeController@deleteLike');

Route::post('/users/profile','UserController@editProfile');

<<<<<<< HEAD
Route::get('/users/profile/{id}','UserController@theirProfile');

Route::get('/users/profile/{id}','UserController@theirProfileHome');

=======
>>>>>>> 9ac16a85a31be2e0e475914a130da587632fe980
Route::post('/users/{post}/comments','CommentsController@store');

Route::post('/homes/{post}/comments','CommentsController@store');

Route::post('/edit_post/{id}','PostController@editPost');

Route::post('/delete_post/{id}','PostController@deletePost');

Route::get('search', function(Request $request){
	$search=$request->search;
	$users=User::where('name','LIKE','%'.$search.'%')->get();

	return view('pages/search',compact('search','users'));
});



// Route::get('/users/register','RegistrationController@create');

// Route::post('/users/register','RegistrationController@store');


<<<<<<< HEAD

// Route::get('/login','SessionsController@create');

=======
<<<<<<< HEAD

// Route::get('/login','SessionsController@create');

=======

// Route::get('/login','SessionsController@create');

<<<<<<< HEAD
=======
Route::post('/users/profile','UserController@editProfile');

Route::post('/users/{post}/comments','CommentsController@store');

Route::post('/edit_post/{id}','PostController@editPost');

Route::post('/delete_post/{id}','PostController@deletePost');



// Route::get('/users/register','RegistrationController@create');

// Route::post('/users/register','RegistrationController@store');



// Route::get('/login','SessionsController@create');

>>>>>>> 17669a2ebdec0d0e6c9d6822a677aa4fc0c05aff
>>>>>>> efca031c3b815c21bdf011c91544b72658072863
>>>>>>> 9ac16a85a31be2e0e475914a130da587632fe980
// Route::get('/logout','SessionsController@destroy')





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
