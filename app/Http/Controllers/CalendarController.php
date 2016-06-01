<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use DB;

use Redirect;

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
        $date = Carbon::create($year, $month, $day, '00', '00');


        $date_human = $date->year.'-'.$date->month.'-'.$date->day;
        $name_o_day = $date->format('l');

        $doc_timing = DB::table('users')
            ->join('doctor_timing', 'users.username', '=', 'doctor_timing.doc_user')
            ->where('username', '=', $user->username)
            ->where('schedule_date', '=', $date)
            ->get();
        $doc_days = DB::table('users')
            ->join('doctor_schedule', 'users.username', '=', 'doctor_schedule.doctor_user')
            ->where('username', '=', $user->username)
            ->get();

        if($date>=Carbon::today()){
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
        $created_date = Carbon::create($date[0], $date[1], $date[2], '00','00'); //date when created
        $month_date = Carbon::create($date[0], $date[1], $date[2], '00','00'); //date for monthly
        $year_date = Carbon::create($date[0], $date[1], $date[2], '00','00'); //date yearly
        $start_hour = Carbon::create($date[0], $date[1], $date[2], 
            $request->input('starting_interval'), $request->input('starting_min'));
        $start_hour = $start_hour->format('g:i A');
        
        $s_h = $request->input('starting_interval');
        $start_min = $request->input('starting_min');

        $time = Carbon::create($date[0], $date[1], $date[2], $s_h, $start_min);

        $j = Carbon::create($date[0], $date[1], $date[2], $s_h, $start_min);
        $k = Carbon::create($date[0], $date[1], $date[2], $s_h, $start_min);
        $l = Carbon::create($date[0], $date[1], $date[2], $s_h, $start_min);




        $w = Carbon::create($date[0], $date[1], $date[2], $s_h, $start_min);
        $x = Carbon::create($date[0], $date[1], $date[2], $s_h, $start_min);


        $c_d = Carbon::create($date[0], $date[1], $date[2], '00','00');





        $e_i = Carbon::create($date[0], $date[1], $date[2], $s_h, $start_min);//end for loop
        $e_i->addMinutes($request->input('duration'));//end for loop

        $e_i2 = Carbon::create($date[0], $date[1], $date[2], $s_h, $start_min);//end for loop
        $e_i2->addMinutes($request->input('duration'));//end for loop


        $end_interval = Carbon::create($date[0], $date[1], $date[2], $s_h, $start_min);
        $end_interval->addMinutes($request->input('duration'));
        $end_time = $end_interval->format('g:i A');
        $verify = 0;

        /*Monthly function*/
        if($request->input('type') == 'monthly') {
            $end_date = $k->lastOfMonth()->addDay();
            while($l<=$end_date){
                while($j->diffInMinutes($e_i)){
                    $test = DB::table('time_slot')
                        ->where('slot_date', '=', $j)
                        ->where('d_user', '=', $request->input('username'))
                        ->where('created_for', '=', $created_date)
                        ->first();
                    if($test)
                    {
                        $verify = 1;
                        break;
                    }
                    $j = $j->addMinutes(15);
                }
                $j = Carbon::create($j->year, $j->month, $j->day, $s_h, $start_min)->addDays(7);
                $l = $l->addDays(7);
                $e_i->addDays(7);
                $created_date = $created_date->addDays(7);
            }

            if($verify == 0){
                while($w<=$end_date){
                    $serial = 1;
                    while($x->diffInMinutes($e_i2)){

                        $slot = $x->format('g:i A');
                        DB::table('time_slot')
                            ->insert([
                                'd_user' => $request->input('username'),
                                'slot' => $slot,
                                'day_of_week' => $request->input('day'),
                                'slot_date' => $x,
                                'created_for' => $c_d,
                                'index_time' => $time,
                                'serial' => $serial
                            ]);
                        $x = $x->addMinutes($request->input('interval'));
                        $serial = $serial+1;
                    }
                    $x = Carbon::create($x->year, $x->month, $x->day, $s_h, $start_min)->addDays(7);
                    $w = $w->addDays(7);



                    DB::table('doctor_timing')
                        ->insert([
                            'doc_user' => $request->input('username'),
                            'start_interval' => $start_hour,
                            'end_interval' => $end_time,
                            'day' => $request->input('day'),
                            'reason' => $request->input('reason'),
                            'interval' => $request->input('interval'),
                            'type' => $request->input('type'),
                            'date' => $time,
                            'schedule_date' => $c_d
                        ]);
                    $time->addDays(7);
                    $c_d = $c_d->addDays(7);
                    $e_i2->addDays(7);
                }



                if($user->user_type == 1){
                    return Redirect::back();
                }

                if($user->user_type == 3){
                    return Redirect::back();
                }
            }
        }





        /*Yearly function*/
        if($request->input('type') == 'yearly') {
            $end_date = $k->lastOfYear()->addDay();
            while($l<=$end_date){
                while($j->diffInMinutes($e_i)){
                    $test = DB::table('time_slot')
                        ->where('slot_date', '=', $j)
                        ->where('d_user', '=', $request->input('username'))
                        ->where('created_for', '=', $created_date)
                        ->first();
                    if($test)
                    {
                        $verify = 1;
                        break;
                    }
                    $j = $j->addMinutes(15);
                }
                $j = Carbon::create($j->year, $j->month, $j->day, $s_h, $start_min)->addDays(7);
                $l = $l->addDays(7);
                $e_i->addDays(7);
                $created_date = $created_date->addDays(7);
            }

            if($verify == 0){
                while($w<=$end_date){
                    $serial = 1;
                    while($x->diffInMinutes($e_i2)){

                        $slot = $x->format('g:i A');
                        DB::table('time_slot')
                            ->insert([
                                'd_user' => $request->input('username'),
                                'slot' => $slot,
                                'day_of_week' => $request->input('day'),
                                'slot_date' => $x,
                                'created_for' => $c_d,
                                'index_time' => $time,
                                'serial' => $serial
                            ]);
                        $x = $x->addMinutes($request->input('interval'));
                        $serial = $serial+1;
                    }
                    $x = Carbon::create($x->year, $x->month, $x->day, $s_h, $start_min)->addDays(7);
                    $w = $w->addDays(7);



                    DB::table('doctor_timing')
                        ->insert([
                            'doc_user' => $request->input('username'),
                            'start_interval' => $start_hour,
                            'end_interval' => $end_time,
                            'day' => $request->input('day'),
                            'reason' => $request->input('reason'),
                            'interval' => $request->input('interval'),
                            'type' => $request->input('type'),
                            'date' => $time,
                            'schedule_date' => $c_d
                        ]);
                    $time->addDays(7);
                    $c_d = $c_d->addDays(7);
                    $e_i2->addDays(7);
                }



                if($user->user_type == 1){
                    return Redirect::back();
                }

                if($user->user_type == 3){
                    return Redirect::back();
                }
            }
        }




        /*Daily function*/
        if(!$request->input('type')){
            $end_date = Carbon::create($date[0], $date[1], $date[2], $s_h, $start_min);
            $end_date->addMinutes($request->input('duration'));
            while($l<=$end_date){
                $test = DB::table('time_slot')
                     ->where('slot_date', '=', $l)
                     ->where('d_user', '=', $request->input('username'))
                     ->where('created_for', '=', $created_date)
                     ->first();
                if($test)
                {
                     $verify = 1;
                     break;
                }
                $l->addMinutes(15);
            }



            if($verify == 0){
                DB::table('doctor_timing')
                    ->insert([
                        'doc_user' => $request->input('username'),
                        'start_interval' => $start_hour,
                        'end_interval' => $end_time,
                        'day' => $request->input('day'),
                        'reason' => $request->input('reason'),
                        'interval' => $request->input('interval'),
                        'type' => $request->input('type'),
                        'date' => $time,
                        'schedule_date' => $created_date
                    ]);



                while($time->diffInMinutes($end_interval)){
                    $slot = $time->format('g:i A');
                    DB::table('time_slot')
                        ->insert([
                            'd_user' => $request->input('username'),
                            'slot' => $slot,
                            'day_of_week' => $request->input('day'),
                            'slot_date' => $x,
                            'created_for' => $created_date,
                            'index_time' => $time
                        ]);
                    $time = $time->addMinutes($request->input('interval'));
                }
            }



            if($user->user_type == 1){
                return Redirect::back();
            }

            if($user->user_type == 3){
                return Redirect::back();
            }
        }






        else{
            if($user->user_type == 1){
                return Redirect::back()->withErrors([
                    'schedule_date' =>'Your timing clash with each other.',
                ]);
            }

            if($user->user_type == 3){
                return Redirect::back()->withErrors([
                    'Your timing clash with each other.',
                ]);
            }
        }
    }


    /*
     *
     * Daily schedule delete
     *
     */
    public function sche_del($date, $index, $username){
        DB::table('doctor_timing')
            ->where('date', '=', $date)
            ->where('doc_user', '=', $username)
            ->delete();
        DB::table('time_slot')
            ->where('d_user', '=', $username)
            ->where('index_time', '=', $date)
            ->delete();
        return Redirect::back();
    }



    /*
     *
     * total plan delete
     *
     */
    public function sche_del_plan($date, $username, $type){
//        echo($date.' '.$index.' '.$username.' '.$type);
        $user = \Auth::user();

        if($type == 'yearly'){
            $end_date = Carbon::createFromFormat('Y-m-d H:i:s', $date);
            $end_date->lastOfYear()->addDay();
            $new_date = Carbon::createFromFormat('Y-m-d H:i:s', $date);
//            $for_loop_start = Carbon::createFromFormat('Y-m-d H:i:s', $date);
//            echo($end_date.' '.$date);
            while($new_date<=$end_date){

                DB::table('doctor_timing')
                    ->where('doc_user', '=', $username)
                    ->where('type', '=', $type)
                    ->where('date', '=', $new_date)
                    ->delete();
                DB::table('time_slot')
                    ->where('d_user', '=', $username)
                    ->where('index_time', '=', $new_date)
                    ->delete();
                $new_date->addDays(7);
            }


            if($user->user_type == 1){
                return Redirect::back();
            }

            if($user->user_type == 3){
                return Redirect::back();
            }
        }



        if($type == 'monthly'){
            $end_date = Carbon::createFromFormat('Y-m-d H:i:s', $date);
            $end_date->lastOfMonth()->addDay();
            $new_date = Carbon::createFromFormat('Y-m-d H:i:s', $date);
//            echo($end_date.' '.$date);
            while($new_date<=$end_date){
                DB::table('doctor_timing')
                    ->where('doc_user', '=', $username)
                    ->where('type', '=', $type)
                    ->where('date', '=', $new_date)
                    ->delete();
                DB::table('time_slot')
                    ->where('d_user', '=', $username)
                    ->where('index_time', '=', $new_date)
                    ->delete();
                $new_date->addDays(7);
            }

            if($user->user_type == 1){
                return Redirect::back();
            }

            if($user->user_type == 3){
                return Redirect::back();
            }
        }
    }



    /*
     *
     *
     *
     * Delete only for month
     *
     *
     */

    public function sche_del_month($date, $username, $type){
        $user = \Auth::user();
        $end_date = Carbon::createFromFormat('Y-m-d H:i:s', $date);
        $end_date->lastOfMonth()->addDay();
        $new_date = Carbon::createFromFormat('Y-m-d H:i:s', $date);
//            echo($end_date.' '.$date);
        while($new_date<=$end_date){
            DB::table('doctor_timing')
                ->where('doc_user', '=', $username)
                ->where('type', '=', $type)
                ->where('date', '=', $new_date)
                ->delete();
            DB::table('time_slot')
                ->where('d_user', '=', $username)
                ->where('index_time', '=', $new_date)
                ->delete();
            $new_date->addDays(7);
        }

        if($user->user_type == 1){
            return Redirect::back();
        }

        if($user->user_type == 3){
            return Redirect::back();
        }
    }
}
