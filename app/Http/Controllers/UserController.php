<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;


class UserController extends Controller
{
    function showUser(Request $request) {
    	$lists = User::all();
    	$connections = Auth::user()->myRequests->merge(Auth::user()->theirRequests);
    	return view('pages/users',compact('lists','connections'));
    }

    // function showProfile($id) {
    // 	$prof = User::find($id);

    // 	// dd($prof);

    // 	return view('pages/profile',compact('prof'));
    // }





}
