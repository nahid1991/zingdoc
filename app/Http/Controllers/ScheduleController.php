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
    	// echo($request->input('all'));
        $verify = DB::table('doctor_schedule')
            ->where('doctor_user', '=', $user->username)
            ->get();
        // echo(sizeof($verify));
        // foreach($verify as $ver){
        //     echo ($ver->days);
        // }

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
                'starting_time' => $request->input('starting_time'),
                'ending_time' => $request->input('ending_time'),
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
                'starting_time' => $request->input('starting_time'),
                'ending_time' => $request->input('ending_time'),
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
                'starting_time' => $request->input('starting_time'),
                'ending_time' => $request->input('ending_time'),
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
                'starting_time' => $request->input('starting_time'),
                'ending_time' => $request->input('ending_time'),
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
                'starting_time' => $request->input('starting_time'),
                'ending_time' => $request->input('ending_time'),
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
                'starting_time' => $request->input('starting_time'),
                'ending_time' => $request->input('ending_time'),
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
                'starting_time' => $request->input('starting_time'),
                'ending_time' => $request->input('ending_time'),
             ]);
            }
    	}

    	

    	// echo($request->input('starting_time'));
    	// echo($request->input('ending_time'));
    	
    	// echo jddayofweek ( cal_to_jd(CAL_GREGORIAN, date("m"),date("d"), date("Y")) , 2 );
    	// echo('done');
    	return redirect('/set-appointment');
    }


    public function form_patient($id){
        $user = \Auth::user();
        $doctor_info = DB::table('users')
            ->join('doctor_entity', 'users.username', '=', 'doctor_entity.doctor_user')
            ->where('users.username', '=', $id)
            ->get();
        return view('patient.appointment', compact('user', 'doctor_info'));
        // echo($doctor_info->speciality);

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
                'appointed_at' => '10:30 am',
                'patient_name' => $request->input('name'),
            ]);

        return redirect('/search');
    }
}
