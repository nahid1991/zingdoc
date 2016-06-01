<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Carbon\Carbon;

use Twilio;

use Services_Twilio;

use Redirect;


class EntityController extends Controller
{
    // public function dashboard(){
    // 	return view('entity-admin-dashboard');
    // }

    public function appointments(){
    	$user = \Auth::user();
        
        $listed_doc_pat = DB::table('users')
            ->join('doctor_entity', 'users.username', '=', 'doctor_entity.entity_user')
            // ->join('appointment_user', 'users.username', '=', 'appointment_user.admin_user')
            ->where('users.username', '=', $user->username)
            ->get();
            //doctors who are already 



        
        
        return view('entity.entity-admin-appointments-view', compact('user', 'listed_doc_pat'));

        



        // return view('entity.entity-admin-appointments-view', compact('user', 'listed_doc_pat', 'doc_info', 'pat_info', 
        //     'sche_doc_pat', 'test'));
        // foreach($sche_doc_pat as $sdp){
        //     $pat_info = DB::table('users')
        //         ->where('username', '=', $sdp->patient_user)
        //         ->get();
        // }
        // foreach($doc_info as $doc_inf){
            
        //     // ->join('doctor_schedule', 'doctor_schedule.doctor_user', '=', 'users.username')
        //     //     ->where('users.username', '=', $list_doc->doctor_user)
        //     //     ->get();
        //     // echo($list_doc->doctor_user);
        //         echo($doc_inf->name);
        // }

        // return view('entity.entity-admin-appointments-view', compact('user', 'listed_doc_pat', 'doc_info', 'pat_info', 
        //     'sche_doc_pat', 'test'));
        // return view('entity.entity-admin-appointments-view', compact('user'));

        // echo($user->created_at);
    }

    



    public function settings(){
    	return view('entity.entity-admin-account-setting');
    }

    public function test(Request $request){
        // $user = \Auth::user();
        // $doc_info = DB::table('users')
        //     ->where('username', '=', $request->input('doctor_user'))
        //     ->first();
        // $doc_schedule = DB::table('users')
        //     ->join('doctor_schedule', 'users.username', '=', 'doctor_schedule.doctor_user')
        //     ->where('username', '=', $request->input('doctor_user'))
        //     ->get();
        // $listed_doc_pat = DB::table('users')
        //     ->join('doctor_entity', 'users.username', '=', 'doctor_entity.entity_user')
        //     // ->join('appointment_user', 'users.username', '=', 'appointment_user.admin_user')
        //     ->where('users.username', '=', $user->username)
        //     ->get();
        // $patient_list = DB::table('users')
        //     ->join('appointment_user', 'users.username', '=', 'appointment_user.doctor_user')
        //     ->where('username', '=', $request->input('doctor_user'))
        //     ->get();
        // return view('entity.doctor-result', compact('user', 'doc_info', 'doc_schedule', 'listed_doc_pat', 'patient_list'));
        // return redirect('/find-doc/'.$doc_info->username);
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
        return view('entity.doctor-result', compact('user', 'doc_info', 'doc_schedule', 'listed_doc_pat', 'patient_list', 'username'));
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
            // ->join('appointment_user', 'users.username', '=', 'appointment_user.admin_user')
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
                'appointment_end' => $trick->appointment_end
            ]);

        DB::table('appointment_user')
            ->where('doctor_user', '=', $username)
            ->where('patient_name', '=', $p_name)
            ->where('approved', '=', NULL)
            ->delete();

        $doc_info = DB::table('users')
            ->where('username', '=', $username)
            ->first();
//        $doc_schedule = DB::table('users')
//            ->join('doctor_schedule', 'users.username', '=', 'doctor_schedule.doctor_user')
//            ->where('username', '=', $username)
//            ->get();
//        $listed_doc_pat = DB::table('users')
//            ->join('doctor_entity', 'users.username', '=', 'doctor_entity.entity_user')
//            // ->join('appointment_user', 'users.username', '=', 'appointment_user.admin_user')
//            ->where('users.username', '=', $user->username)
//            ->get();
//        $patient_list = DB::table('users')
//            ->join('appointment_user', 'users.username', '=', 'appointment_user.doctor_user')
//            ->where('username', '=', $username)
//            ->get();
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
//        return view('entity.doctor-result', compact('user', 'doc_info', 'doc_schedule', 'listed_doc_pat', 'patient_list'));
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

    public function calendar($username){
        $user = \Auth::user();
        $doc_info = DB::table('users')
            ->where('username', '=', $username)
            ->first();
        $month = Carbon::now();
        $num_month = $month->month;
        $num_year = $month->year;
        // echo($month->month);
        $month = $month->format('F Y');
        return view('entity.entity-doctor-calendar', compact('user', 'month', 'num_month', 'num_year', 'doc_info'));
        // echo($username);
    }


    public function make($username, $year, $month, $day){
        // echo($username);
        $user = \Auth::user();
        $date = Carbon::create($year, $month, $day, '00', '00');
        $doc_info = DB::table('users')
            ->where('username', '=', $username)
            ->first();

        // echo($doc_info->username);
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

       
        return redirect('/calendar/'.$username);
        
        
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

}
