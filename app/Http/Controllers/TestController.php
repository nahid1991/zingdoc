<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\Auth\RegisterRequest;

class TestController extends Controller
{
    public function test(RegisterRequest $request){
    	$pass1 = $request->input('password');
    	$pass2 = $request->input('password_confirmation');

    	if(strcmp($pass1, $pass2) == 0){
    		return view('signin-signup');
    	}

    	else{
    		echo($pass1.' ' .$pass2. 'Sorry!!! :(');
    	}
    }
}
