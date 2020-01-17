<?php

namespace App\Http\Controllers;


use Auth;
use App\User;
use Illuminate\Support\Str;
use App\Mail\UserRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    // $user->sendEmailVerificationNotification();

    public function __construct() {
        $this->middleware('guest', ['except' => ['postLogout']]);
    }

    public function postRegister(Request $request) {

    	$request->validate([
    		'name' 		 => 'required|min:2',
    		'surname' 	 => 'required|min:2',
    		'cohort' 	 => 'required',
    		'department' => 'required|min:2',
    		'email' 	 => 'required|unique:users',
    		'password' 	 => 'required|confirmed|min:8',
    	]);

        if (!Str::endsWith($request->email, '@umuzi.org')) {
            return back()->withInput()->withErrors([
                'errors' => ['Only umuzi email address allowed!']
            ]);
        }

        // Save on database
    	$user = User::create($request->all());

        // Send verification email
        $user->sendEmailVerificationNotification();

    	return back()->with('success', 'Thank you for your registration!');
    }

    public function postLogin(Request $request) {

    	$request->validate([
    		'email' => 'required',
    		'password' => 'required'
    	]);

        if (!Str::endsWith($request->email, '@umuzi.org')) {
            return back()->withInput()->withErrors([
                'errors' => ['Only umuzi email address allowed!']
            ]);
        }

    	if (Auth::attempt($request->only('email', 'password'), false)) {
    		return redirect('/');
    	}

    	return back()->withInput()->withErrors([
            'errors' => ['Wrong account email or password!']
        ]);
    }

    public function postLogout() {
    	return Auth::logout();
    }

}
