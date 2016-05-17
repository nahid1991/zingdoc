<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\Auth\RegisterRequest;

use DB;

use Carbon\Carbon;

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
                $user_info = DB::table('users')
                    ->join('appointment_user', 'users.username', '=', 'appointment_user.doctor_user')
                    ->where('users.username', '=', $user->username)
                    ->where('approved', '=', 1)
                    ->get();
                return view('doctor.doctor_main', compact('user', 'user_info'));
            }
            if($user->user_type == 2){
                $user_info = DB::table('users')
                    ->join('appointment_user', 'users.username', '=', 'appointment_user.patient_user')
                    ->where('users.username', $user->username)
                    ->first();
                // echo($user_info->username[0]);
                return view('patient.patient_main', compact('user', 'user_info'));
            }
            if($user->user_type == 3){
                $user_info = DB::table('users')
                    ->join('doctor_entity', 'users.username', '=', 'doctor_entity.doctor_user')
                    ->where('users.username', $user->username)
                    ->get();
                // return view('doctor.doctor_main', compact('user', 'user_info'));
                return view('entity.entity-admin-dashboard', compact('user', 'user_info'));
            }
        }
    }


    public function run(){
        // $date = Carbon::createFromTime(9, 30)->diffInSeconds(Carbon::now());
        // $compareDate = Carbon::createFromTime(11, 40);
        // $newFormat = $compareDate->format('g:i A');
        // $format = $date->format('g:i A');
        // echo($format->diffInHours($newFormat));
        $date = Carbon::now();
        $date = $date->toDayDateTimeString('l');
        echo($date);
    }


}
