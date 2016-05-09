<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\Auth\RegisterRequest;

use DB;

class TestController extends Controller
{
    public function test(RegisterRequest $request){
    	$pass1 = $request->input('password');
    	$pass2 = $request->input('password_confirmation');

    	if(strcmp($pass1, $pass2) == 0){

            DB::table('users')->insert([
                'email' => $request->input('email'),
                'username' => $request->input('username'),
                'password' => bcrypt($request->input('password')),
                'name' => $request->input('name'),
                'speciality' => $request->input('speciality'),
                'practice_name' => $request->input('practice_name'),
                'phone_number' => $request->input('phone_number'),
                'location' => $request->input('location'),
                'agreed' => $request->input('agreed'),
                'user_type' => $request->input('user_type')
            ]);
    		return redirect('/sign_it');
        }
    	else{
    		echo($pass1.' ' .$pass2. 'Sorry!!! :(');
    	}
    }

    public function sign(){
        
        if(\Auth::check()){
            return redirect('/homepage');
        }

        else{
            return view('signin-signup');
        }
        
    }

    public function home(){
        if(\Auth::user()){
            $user = \Auth::user();
            if($user->user_type == 1){
                return view('doctor.doctor_main');
            }
            if($user->user_type == 2){
                return view('patient.patient_main');
            }
            if($user->user_type == 3){
                return view('entity.entity-admin-dashboard');
            }
        }
    }
}
