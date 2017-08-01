<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\User;

class RegistrationController extends Controller
{
    public function create() {
    	// return view('sessions/create');
    }


    public function store() {
    	// $this->validate(request(),[
    	// 	'name' =>'required',
    	// 	'email'=>'required|email',
    	// 	'password'=>'required',
    	// 	'avatar'=>'required|confirmed'
    	// ]);

    	// $user = User::create(request(['name','email','password','avatar']));

    	// // \Auth::login();
    	// auth()->login($user);

    	// return redirect()->home();

    }
}
