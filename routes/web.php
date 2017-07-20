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

use App\User;

Route::get('/',function(){
$users = User::all();
$connections = Auth::user()->myRequests->merge(Auth::user()->theirRequests);
$pending_requests = Auth::user()->pendingRequests();
$friends = Auth::user()->friends();

return view('/profile', compact('users','connections','pending_requests','friends'));
});

Route::get('/users', 'UserController@showUser');

Route::get('/users/profile/{id}', 'UserController@showProfile');

Route::post('add_friend/{id}',function($id){
	$user = User::find($id);
	$connections = Auth::user()->myRequests->merge(Auth::user()->theirRequests);
	// dd($user);
	Auth::user()->addFriend($id);

	// return view('/pages/users',compact('connections'));

	return back();
});






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
