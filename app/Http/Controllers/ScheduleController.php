<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\DoctorScheduleRequest;

use App\Http\Requests;

use DateTime;

use DB;

use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function make(DoctorScheduleRequest $request)
    {
    	$user = \Auth::user();
        $starting_time = explode(":", $request->input('starting_time'));
        $starting_format = Carbon::createFromTime($starting_time[0], $starting_time[1]);
        $starting = $starting_format->format('g:i A');

        $ending_time = explode(":", $request->input('ending_time'));
        $ending_format = Carbon::createFromTime($ending_time[0], $ending_time[1]);
        $ending = $ending_format->format('g:i A');

        
        
        $verify = DB::table('doctor_schedule')
            ->where('doctor_user', '=', $user->username)
            ->get();
        

        $check = '';

    	if($request->input('day1')){
    		// echo($request->input('day1'));
            foreach($verify as $test){
                if($request->input('day1') == $test->days)
                {
                    // break;
                    $check = 'matched';
                }
            }
    		
            if($check != 'matched'){
                DB::table('doctor_schedule')->insert([
                'doctor_user' => $user->username,
                'days' => $request->input('day1'),
                'created_at' => date("Y-m-d h:i:sa"),
                'starting_time' => $starting,
                'ending_time' => $ending,
             ]);
            }
            
    	}
    	


        if($request->input('day2')){
    		// echo($request->input('day2'));
    		foreach($verify as $test){
                if($request->input('day2') == $test->days)
                {
                    // break;
                    $check = 'matched';
                }
            }
            
            if($check != 'matched'){
                DB::table('doctor_schedule')->insert([
                'doctor_user' => $user->username,
                'days' => $request->input('day2'),
                'created_at' => date("Y-m-d h:i:sa"),
                'starting_time' => $starting,
                'ending_time' => $ending,
             ]);
            }
    	}

    	if($request->input('day3')){
    		// echo($request->input('day3'));
    		foreach($verify as $test){
                if($request->input('day3') == $test->days)
                {
                    // break;
                    $check = 'matched';
                }
            }
            
            if($check != 'matched'){
                DB::table('doctor_schedule')->insert([
                'doctor_user' => $user->username,
                'days' => $request->input('day3'),
                'created_at' => date("Y-m-d h:i:sa"),
                'starting_time' => $starting,
                'ending_time' => $ending,
             ]);
            }
    	}

    	if($request->input('day4')){
    		// echo($request->input('day4'));
    		foreach($verify as $test){
                if($request->input('day4') == $test->days)
                {
                    // break;
                    $check = 'matched';
                }
            }
            
            if($check != 'matched'){
                DB::table('doctor_schedule')->insert([
                'doctor_user' => $user->username,
                'days' => $request->input('day4'),
                'created_at' => date("Y-m-d h:i:sa"),
                'starting_time' => $starting,
                'ending_time' => $ending,
             ]);
            }
    	}
    	if($request->input('day5')){
    		// echo($request->input('day5'));
    		foreach($verify as $test){
                if($request->input('day5') == $test->days)
                {
                    // break;
                    $check = 'matched';
                }
            }
            
            if($check != 'matched'){
                DB::table('doctor_schedule')->insert([
                'doctor_user' => $user->username,
                'days' => $request->input('day5'),
                'created_at' => date("Y-m-d h:i:sa"),
                'starting_time' => $starting,
                'ending_time' => $ending,
             ]);
            }
    	}
    	if($request->input('day6')){
    		// echo($request->input('day6'));
    		foreach($verify as $test){
                if($request->input('day6') == $test->days)
                {
                    // break;
                    $check = 'matched';
                }
            }
            
            if($check != 'matched'){
                DB::table('doctor_schedule')->insert([
                'doctor_user' => $user->username,
                'days' => $request->input('day6'),
                'created_at' => date("Y-m-d h:i:sa"),
                'starting_time' => $starting,
                'ending_time' => $ending,
             ]);
            }
    	}
    	
        if($request->input('day7')){
    		// echo($request->input('day7'));
    		foreach($verify as $test){
                if($request->input('day7') == $test->days)
                {
                    // break;
                    $check = 'matched';
                }
            }
            
            if($check != 'matched'){
                DB::table('doctor_schedule')->insert([
                'doctor_user' => $user->username,
                'days' => $request->input('day7'),
                'created_at' => date("Y-m-d h:i:sa"),
                'starting_time' => $starting,
                'ending_time' => $ending,
             ]);
            }
    	}




    	

    	
    	return redirect('/set-appointment');
    }


    public function form_patient($username, $date, $time, $serial, $end_date){
        $user = \Auth::user();
        $doctor_info = DB::table('users')
            ->join('doctor_entity', 'users.username', '=', 'doctor_entity.doctor_user')
            ->where('users.username', '=', $username)
            ->get();

        $date = Carbon::createFromFormat('Y-m-d H:i:s', $date);
        $t_f = $date->format('g:i A');
        $d_f = $date->format('F').' '. $date->day.', '.$date->format('Y');
        $end_date = Carbon::createFromFormat('Y-m-d H:i:s', $end_date);
//        echo($d_f);
        return view('patient.appointment', compact('user', 'doctor_info', 'date', 'time', 'd_f', 't_f', 'serial', 'end_date'));
//        echo($serial);
        // echo($doctor_info->speciality);
//        echo($date);
        // echo($id);
    }


    public function submission(Request $request){
        $user = \Auth::user();
        $admin = DB::table('users')
            ->where('username', '=', $request->input('entity_user'))
            ->first();

        DB::table('appointment_user')->insert([
                'patient_user' => $request->input('user_username'),
                'doctor_user' => $request->input('doctor_user'),
                'admin_user' => $request->input('entity_user'),
                'name' => $admin->name,
                'issues' => $request->input('issues'),
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone_number'),
                'appointed_at' => $request->input('time'),
                'patient_name' => $request->input('name'),
                'appointment_time' => $request->input('date'),
                'sl_no' => $request->input('serial'),
                'appointment_end' => $request->input('end_date')
            ]);

        return redirect('/search');
//        echo($request->input('serial'));
    }
}
