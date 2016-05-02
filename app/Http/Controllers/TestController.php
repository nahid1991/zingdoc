<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\Auth\RegisterRequest;

class TestController extends Controller
{
    public function test(RegisterRequest $request){
    	echo('test');
    }
}
