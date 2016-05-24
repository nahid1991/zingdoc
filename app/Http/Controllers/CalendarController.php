<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use DB;

class CalendarController extends Controller
{
    public function show(){
    	$user = \Auth::user();
    	$month = Carbon::now();
    	$num_month = $month->month;
    	$num_year = $month->year;
    	// echo($month->month);
    	$month = $month->format('F Y');
    	return view('doctor.doctor-calendar', compact('user', 'month', 'num_month', 'num_year'));
    }


    public function make($username, $year, $month, $day){
    	$user = \Auth::user();
        $date = Carbon::create($year, $month, $day);

        // echo($date->year);
        $date_human = $date->year.'-'.$date->month.'-'.$date->day;
        $name_o_day = $date->format('l');

        $doc_timing = DB::table('users')
            ->join('doctor_timing', 'users.username', '=', 'doctor_timing.doc_user')
            ->where('username', '=', $user->username)
            ->where('day', '=', $name_o_day)
            ->get();
        $doc_days = DB::table('users')
            ->join('doctor_schedule', 'users.username', '=', 'doctor_schedule.doctor_user')
            ->where('username', '=', $user->username)
            ->get();

        if($date>Carbon::now()){
            
            $doctor_schedule = DB::table('users')
            ->join('doctor_schedule', 'users.username', '=', 'doctor_schedule.doctor_user')
            ->where('users.username', '=', $user->username)
            ->where('days', '=', $name_o_day)
            ->get();
        foreach($doctor_schedule as $doc_info){
            $starting = $doc_info->starting_time;
            $ending = $doc_info->ending_time;
            $ending = Carbon::createFromFormat('l g:i A', $name_o_day."  ".$ending);
            $starting = Carbon::createFromFormat('l g:i A', $name_o_day."  ".$starting);
            $starting_hour = $starting->hour;
            $ending_hour = $ending->hour;

            for($i = $starting_hour; $i <= $ending_hour; $i++){
                $hours[] = $i;
                $hour = Carbon::createFromTime($i);
                $hour_formatted[] = $hour->format('g');
                
            }
        }




        // $date = Carbon::create($year, $month, $day);
        // Carbon::createFromFormat('Y-m-d H', '1975-05-21 22')->toDateTimeString();
        // $name_o_day = $date->format('l');
        // $date = Carbon::createFromFormat('Y-m-d', $year."-".$month."-".$day)->toDateTimeString();

        // echo($date_human);

        return view('doctor.doctor-scheduler', compact('user', 'doctor_schedule', 'name_o_day', 'hours',
            'hour_formatted', 'date_human', 'doc_timing', 'date', 'doc_days'));
        }

       
        return redirect('/doctor-calendar');
        
        
    }

    public function sche(Request $request){
        // echo('<h1>'.$request->input('interval').'</h1>');
        // $time = Carbon::createFromTime($request->input('starting_interval'), $request->input('starting_min'));
        $user = \Auth::user();
        $date = explode('-', $request->input('date'));
        $start_hour = Carbon::create($date[0], $date[1], $date[2], 
            $request->input('starting_interval'), $request->input('starting_min'));
        $start_hour = $start_hour->format('g:i A');
        
        $s_h = $request->input('starting_interval');
        $start_min = $request->input('starting_min');

        $time = Carbon::create($date[0], $date[1], $date[2], $s_h, $start_min);
        $i = Carbon::create($date[0], $date[1], $date[2], $s_h, $start_min);

        $end_interval = Carbon::create($date[0], $date[1], $date[2], $s_h, $start_min);
        $end_interval->addMinutes($request->input('duration'));
        $end_time = $end_interval->format('g:i A');
        
        while($i->diffInMinutes($end_interval)){
            $slot = $i->format('g:i A');
            DB::table('time_slot')
                ->insert([
                    'd_user' => $request->input('username'),
                    'slot' => $slot,
                    'day_of_week' => $request->input('day'),
                    'slot_date' => $i
                ]);
            $i = $i->addMinutes($request->input('interval'));
        }

        DB::table('doctor_timing')
            ->insert([
                'doc_user' => $request->input('username'),
                'start_interval' => $start_hour,
                'end_interval' => $end_time,
                'day' => $request->input('day'),
                'reason' => $request->input('reason'),
                'interval' => $request->input('interval'),
                'type' => $request->input('type'), 
                'date' => $time
        ]);

        if($user->user_type == 2){
            return redirect('/doctor-calendar');
        }

        if($user->user_type == 3){
            return redirect('/calendar/'.$request->input('username'));
        }
        
    }
}
