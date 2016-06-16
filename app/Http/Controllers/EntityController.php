<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Carbon\Carbon;

use Twilio;

use Services_Twilio;

use Redirect;

use Mail;

use App\Http\Requests\Auth\RegisterRequest;

use Illuminate\Support\Facades\Input;


class EntityController extends Controller
{
    public function appointments(){
    	$user = \Auth::user();
        
        $listed_doc_pat = DB::table('users')
            ->join('doctor_entity', 'users.username', '=', 'doctor_entity.entity_user')
            ->where('users.username', '=', $user->username)
            ->get();
        return view('entity.entity-admin-appointments-view', compact('user', 'listed_doc_pat'));
    }

    public function settings(){
    	return view('entity.entity-admin-account-setting');
    }

    public function test(Request $request){
        return redirect('/doctor/'.$request->input('doctor_user'));
    }

    public function trial($username){
        // echo($username);
        $user = \Auth::user();
        $doc_info = DB::table('users')
            ->where('username', '=', $username)
            ->first();
        $doc_schedule = DB::table('users')
            ->join('doctor_schedule', 'users.username', '=', 'doctor_schedule.doctor_user')
            ->where('username', '=', $username)
            ->get();
        $listed_doc_pat = DB::table('users')
            ->join('doctor_entity', 'users.username', '=', 'doctor_entity.entity_user')
            // ->join('appointment_user', 'users.username', '=', 'appointment_user.admin_user')
            ->where('users.username', '=', $user->username)
            ->get();
        $patient_list = DB::table('users')
            ->join('appointment_user', 'users.username', '=', 'appointment_user.doctor_user')
            ->where('username', '=', $username)
            ->get();
        $month = Carbon::today()->month;
        $year = Carbon::today()->year;
        return view('entity.doctor-result', compact('user', 'doc_info', 'doc_schedule',
            'listed_doc_pat', 'patient_list', 'username',
            'month', 'year'));
        // return redirect('/find-doc/'.$doc_info->username);
    }

    public function cancel($username, $p_name){
        DB::table('appointment_user')
            ->where('doctor_user', '=', $username)
            ->where('patient_name', '=', $p_name)
            ->delete();
        $user = \Auth::user();
        $doc_info = DB::table('users')
            ->where('username', '=', $username)
            ->first();
        $doc_schedule = DB::table('users')
            ->join('doctor_schedule', 'users.username', '=', 'doctor_schedule.doctor_user')
            ->where('username', '=', $username)
            ->get();
        $listed_doc_pat = DB::table('users')
            ->join('doctor_entity', 'users.username', '=', 'doctor_entity.entity_user')
            ->where('users.username', '=', $user->username)
            ->get();
        $patient_list = DB::table('users')
            ->join('appointment_user', 'users.username', '=', 'appointment_user.doctor_user')
            ->where('username', '=', $username)
            ->get();
        return view('entity.doctor-result', compact('user', 'doc_info', 'doc_schedule', 'listed_doc_pat', 'patient_list'));
    }


    public function approve($username, $p_name, $time, $serial){
        $trick = DB::table('appointment_user')
            ->where('doctor_user', '=', $username)
            ->where('patient_name', '=', $p_name)
            ->where('appointment_time', '=', $time)
            ->first();
        
        
        // echo($pu);
        DB::table('appointment_user')
            ->insert([
                'patient_user' => $trick->patient_user,
                'doctor_user' => $trick->doctor_user,
                'admin_user' => $trick->admin_user,
                'name' => $trick->name,
                'issues' => $trick->issues,
                'approved' => 1,
                'email' => $trick->email,
                'phone_number' => $trick->phone_number,
                'appointed_at' => $trick->appointed_at,
                'patient_name' => $trick->patient_name,
                'appointment_time' => $time,
                'appointment_end' => $trick->appointment_end,
                'actual_date' => $trick->actual_date,
                'sl_no' => $trick->sl_no
            ]);

        DB::table('appointment_user')
            ->where('doctor_user', '=', $username)
            ->where('patient_name', '=', $p_name)
            ->where('approved', '=', NULL)
            ->delete();

        $doc_info = DB::table('users')
            ->where('username', '=', $username)
            ->first();
        $appointment_time = Carbon::createFromFormat('Y-m-d h:i:s', $time);
        $hour = $appointment_time->format('h:i A');
        $date = $appointment_time->format('jS \\of F');

        $account_sid = "AC0ea2b450fbf9bcaa2aaa8464536c6f85"; // Your Twilio account sid
        $auth_token = "3501d13a64fbe6c80a5f30d6d36459ca"; // Your Twilio auth token

        $client = new Services_Twilio($account_sid, $auth_token);
        $client->account->messages->sendMessage(
            '+12565302615', // From a Twilio number in your account
            '+880'.$trick->phone_number, // Text any number
            'Hello subscriber your appointment request for DR.'.$doc_info->name.' for '.$hour.' '.
                $date.' SL no.'.$serial.' has been accepted.'
        );


        return Redirect::back();
    }


    public function doc_checked($username, $name){
        echo($username." ".$name);
    }

    public function doc_cancel($username, $name){
        echo($username." ".$name);
    }

    public function add_doctor(Request $request){
        // echo($request->input('username'));
        $user = \Auth::user();
        $temp = DB::table('users')
            ->where('username', '=', $request->input('username'))
            ->first();
        DB::table('doctor_entity')
            ->insert([
                'doctor_user' => $request->input('username'),
                'entity_user' => $user->username,
                'entity_name' => $user->name,
                'doctor_name' => $temp->name,
                'doc_speciality' => $temp->speciality,
            ]);
        DB::table('users')
            ->where('username', '=', $request->input('username'))
            ->update([
                'ad_user' => $user->username,
            ]);
        return redirect('/homepage');
    }

    public function calendar($username, $month, $year){
        $user = \Auth::user();
        $doc_info = DB::table('users')
            ->where('username', '=', $username)
            ->first();
        $mon = Carbon::create($year,$month,'01','00','00');
        $num_month = $mon->month;
        $num_year = $mon->year;
        // echo($month->month);
        $yr = $mon->format('Y');
        $mon = $mon->format('F');

        return view('entity.entity-doctor-calendar', compact('user', 'month', 'num_month',
            'num_year', 'doc_info', 'mon', 'year', 'yr', 'username'));
        // echo($username);
    }


    public function make($username, $year, $month, $day){
        $user = \Auth::user();
        $date = Carbon::create($year, $month, $day, '00', '00');
        $doc_info = DB::table('users')
            ->where('username', '=', $username)
            ->first();
        $date_human = $date->year.'-'.$date->month.'-'.$date->day;
        $name_o_day = $date->format('l');

        $doc_timing = DB::table('users')
            ->join('doctor_timing', 'users.username', '=', 'doctor_timing.doc_user')
            ->where('username', '=', $username)
            ->where('schedule_date', '=', $date)
            ->get();
        $doc_days = DB::table('users')
            ->join('doctor_schedule', 'users.username', '=', 'doctor_schedule.doctor_user')
            ->where('username', '=', $username)
            ->get();

        if($date>=Carbon::today()){
            
            $doctor_schedule = DB::table('users')
                ->join('doctor_schedule', 'users.username', '=', 'doctor_schedule.doctor_user')
                ->where('users.username', '=', $username)
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




        

        return view('entity.entity-doctor-schedule', compact('user', 'doctor_schedule', 'name_o_day', 'hours',
            'hour_formatted', 'date_human', 'doc_timing', 'date', 'doc_days', 'doc_info'));
        }

       
        return Redirect::back();
        
        
    }




    public function en_make_profile(Request $request){
        $user = \Auth::user();

        DB::table('entity_profile')
            ->where('e_user', '=', $user->username)
            ->delete();


        DB::table('entity_profile')
            ->insert([
                'e_user' => $user->username,
                'overview' => $request->input('overview'),
                'location' => $request->input('location'),
                'address' => $request->input('address'),
                'specializations' => $request->input('specializations'),
                'services' => $request->input('services'),
                'award' => $request->input('award'),
            ]);
        DB::table('users')
            ->where('username', '=', $user->username)
            ->update([
                'location' => $request->input('location'),
                'address' => $request->input('address'),
            ]);
        return Redirect::back();
    }


    public function en_profileEdit(){
        $user = \Auth::user();
        $en_info = DB::table('users')
            ->join('entity_profile', 'users.username', '=', 'entity_profile.e_user')
            ->where('username', '=', $user->username)
            ->first();
        if($en_info)
        {
            return view('entity.entity-admin-edit-profile-new', compact('user', 'en_info'));
        }
        if(!$en_info){
            return view('entity.entity-admin-edit-profile', compact('user'));
        }
    }



    public function en_profile(){
        $user = \Auth::user();
        $en_info = DB::table('users')
            ->join('entity_profile', 'users.username', '=', 'entity_profile.e_user')
            ->where('users.username', '=', $user->username)
            ->get();

        return view('entity.entity-admin-view-profile', compact('user', 'en_info'));
    }


    public function today($username){
//        echo($username);
        $serials = DB::table('appointment_user')
            ->where('doctor_user', '=', $username)
            ->where('actual_date', '=', Carbon::today())
            ->get();
        $user = \Auth::user();
        $doc_info = DB::table('users')
            ->where('username', '=', $username)
            ->first();
        $doc_schedule = DB::table('users')
            ->join('doctor_schedule', 'users.username', '=', 'doctor_schedule.doctor_user')
            ->where('username', '=', $username)
            ->get();
        $listed_doc_pat = DB::table('users')
            ->join('doctor_entity', 'users.username', '=', 'doctor_entity.entity_user')
            ->where('users.username', '=', $user->username)
            ->get();

        return view('entity.today-serial', compact('user', 'doc_info', 'doc_schedule', 'listed_doc_pat', 'username', 'serials'));
    }


    public function en_prev_month($user, $month, $year){
        if($month == 1){
            $month = 12;
            $year = $year - 1;
//            echo($month);
            return redirect('/calendar/'.$user.'/'.$month.'/'.$year);
        }
        else{
            $month = $month-1;
//            echo($month);
            return redirect('/calendar/'.$user.'/'.$month.'/'.$year);
        }
    }


    public function en_next_month($user, $month, $year){
        if($month == 12){
            $month = 1;
            $year = $year + 1;
//            echo($month);
            return redirect('/calendar/'.$user.'/'.$month.'/'.$year);
        }
        else{
            $month = $month+1;
//            echo($month);
            return redirect('/calendar/'.$user.'/'.$month.'/'.$year);
        }
    }

    public function en_sign_doctor(){
        $user = \Auth::user();
        return view('entity.admin-doctor-signup', compact('user'));
//        return \View::make('entity/admin-doctor-signup');
    }

    public function reg_doctor(Request $request){
        $user = \Auth::user();
        $test = $request->input('password').$request->input('username');
        DB::table('users')->insert([
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($test),
            'name' => $request->input('name'),
            'speciality' => $request->input('speciality'),
            'practice_name' => $request->input('practice_name'),
            'phone_number' => $request->input('phone_number'),
            'location' => $request->input('location'),
            'agreed' => $request->input('agreed'),
            'user_type' => $request->input('user_type'),
            'confirmed' => '1',
        ]);

        DB::table('doctor_entity')->insert([
            'entity_user' => $user->username,
            'doctor_user' => $request->input('username'),
            'entity_name' => $user->name,
            'doctor_name' => $request->input('name'),
            'doc_speciality' => $request->input('speciality'),
        ]);

        Mail::send('email.doctor-admin-email',  ['name' => $request->input('admin_name'),
        'email' => $request->input('email'), 'password' => $test], function($message) {
            $message->from('nahidshaiket10300@gmail.com', 'Laravel');
            $message->to(Input::get('email'), Input::get('username'))
                ->subject('Verify your email address');
        });

        $account_sid = "AC0ea2b450fbf9bcaa2aaa8464536c6f85"; // Your Twilio account sid
        $auth_token = "3501d13a64fbe6c80a5f30d6d36459ca"; // Your Twilio auth token

        $client = new Services_Twilio($account_sid, $auth_token);
        $client->account->messages->sendMessage(
            '+12565302615', // From a Twilio number in your account
            '+880'.$request->phone_number, // Text any number
            'You have been registered as Doctor in Zingdoc by '.$request->admin_name.'. Please check your '.
            $request->email. ' for more details.'
        );

        return Redirect::back();
    }

}
