<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\Auth\RegisterRequest;

use DB;

use Carbon\Carbon;

use Illuminate\Support\Facades\Input;

use File;

use Mail;

use Flash;

use Session;

use Illuminate\Support\Facades\Redirect;

class TestController extends Controller
{
    public function test(RegisterRequest $request){
    	$pass1 = $request->input('password');
    	$pass2 = $request->input('password_confirmation');

    	if(strcmp($pass1, $pass2) == 0){

            $confirmation_code = str_random(30);
            $conf = array($confirmation_code);

            
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
                    'user_type' => $request->input('user_type'),
                    'confirmation_code' => $confirmation_code,
            ]);



            

            // Mail::send('email.verify', $confirmation_code, function($message) {
            //     $message->to(Input::get('email'), Input::get('username'))
            //     ->subject('Verify your email address');
            // });


            Session::flash('message', "Please check your email.");

            Mail::send('email.verify',  ['conf' => $confirmation_code], function($message) {
                $message->from('nahidshaiket10300@gmail.com', 'Laravel');
                $message->to(Input::get('email'), Input::get('username'))
                    ->subject('Verify your email address');
            });
            return Redirect::back();
            
        }
    	else{
    		Session::flash('message', "Password did not match");
            return Redirect::back();
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
            if($user->confirmed == 1){
                if($user->user_type == 1){
                    $user_info = DB::table('users')
                        ->join('appointment_user', 'users.username', '=', 'appointment_user.doctor_user')
                        ->where('users.username', '=', $user->username)
                        ->where('approved', '=', 1)
                        ->get();

                    $doc_time_today = DB::table('doctor_timing')
                        ->where('doc_user', '=', $user->username)
                        ->where('schedule_date', '=', Carbon::today())
                        ->get();

                    $doc_time_next_day = DB::table('doctor_timing')
                        ->where('doc_user', '=', $user->username)
                        ->where('schedule_date', '=', Carbon::today()->addDay())
                        ->get();
                    $doc_time_3rd_day = DB::table('doctor_timing')
                        ->where('doc_user', '=', $user->username)
                        ->where('schedule_date', '=', Carbon::today()->addDays(2))
                        ->get();
                    $doc_time_4th_day = DB::table('doctor_timing')
                        ->where('doc_user', '=', $user->username)
                        ->where('schedule_date', '=', Carbon::today()->addDays(3))
                        ->get();
                    $doc_time_5th_day = DB::table('doctor_timing')
                        ->where('doc_user', '=', $user->username)
                        ->where('schedule_date', '=', Carbon::today()->addDays(4))
                        ->get();
                    $doc_time_6th_day = DB::table('doctor_timing')
                        ->where('doc_user', '=', $user->username)
                        ->where('schedule_date', '=', Carbon::today()->addDays(5))
                        ->get();
                    $doc_time_7th_day = DB::table('doctor_timing')
                        ->where('doc_user', '=', $user->username)
                        ->where('schedule_date', '=', Carbon::today()->addDays(6))
                        ->get();
                    return view('doctor.doctor_main', compact('user', 'user_info', 'doc_time_today', 'doc_time_next_day',
                        'doc_time_3rd_day', 'doc_time_4th_day', 'doc_time_5th_day', 'doc_time_6th_day', 'doc_time_7th_day'));
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
                    $doctors = DB::table('users')
                        ->where('user_type', '=', 1)
                        ->get();
                    // $admin_doctor = DB::table('users')
                    //     ->join('doctor_entity', 'users.username', '=', 'doctor_entity.doctor_user')
                    //     ->where('entity_user', '=', $user->username)
                    //     ->get();
                    

                    // foreach($user_info as $u_i){
                    //     echo($u_i->doctor_user);
                    // }

                    // return view('doctor.doctor_main', compact('user', 'user_info'));
                    return view('entity.entity-admin-dashboard', compact('user', 'doctors'));
                }
            }
            else{
               
                \Auth::logout();
                return redirect('/sign_it')->withErrors([
                    'email' => 'Please verify your email.',
                ]);
            }
        }
    }


    public function run(){
        // $date = Carbon::createFromTime(9, 30)->diffInSeconds(Carbon::now());
        // $compareDate = Carbon::createFromTime(11, 40);
        // $newFormat = $compareDate->format('g:i A');
        // $format = $date->format('g:i A');
        // echo($format->diffInHours($newFormat));
//        $date = Carbon::now()->addDays(365);
//        $date = $date->toDayDateTimeString('l');
        //echo("This works");
        echo("<table border=\"1|0\">
							<tr>
								<th>Start</th>
								<td>9:30AM</td>
								<th>End</th>
								<td>10:30AM</td>
							<tr>
						</table>");
    }

    public function propic(Request $request)
    {
       
        $destination = 'propics/';
        $file = Input::file('image')->getClientOriginalExtension();
        // Input::file('image');
        // $file = Input::file('image');
        // die(var_dump( $_FILES[Input::file('image')]));
        // echo($file->getClientOriginalExtension());
         $user = \Auth::user();
        // $file = Input::file('image');
        // if (File::exists($file))
        // {
        //     echo "Yup. It exists.";
        // }

        // $file->move($destination, $file->getClientOriginalName());
        // echo($file);

        $user = \Auth::user();
        $imagename = $user->id.".".$file;
        $path = str_replace("\\", "/", Input::file('image')->move($destination."/", $imagename));
        DB::table('users')->where('username', $user->username)
            ->update([
               'propic' => $path
            ]);
        if($user->user_type == 1)
        {
            return redirect('/doc-profile-edit');
        }
        if($user->user_type == 3)
        {
            return redirect('/entity-profile-edit');
        }
//        echo($path);
    }





    public function email($confirmation_code)
    {
        if( ! $confirmation_code)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user = DB::table('users')
            ->where('confirmation_code', '=', $confirmation_code)
            ->first();

        if ( ! $user)
        {
            throw new InvalidConfirmationCodeException;
        }

        // $user->update(['confirmed' => true]);
        // $user->update(['confirmation_code' => null]);
        DB::table('users')
            ->where('confirmation_code', '=', $confirmation_code)
            ->update(['confirmation_code' => null,
                    'confirmed' => 1]);

        Flash::message('You have successfully verified your account.');

        return redirect('/sign_it');
    }


    public function cover(Request $request)
    {

        $destination = 'coverpic/';
        $file = Input::file('image')->getClientOriginalExtension();
        // Input::file('image');
        // $file = Input::file('image');
        // die(var_dump( $_FILES[Input::file('image')]));
        // echo($file->getClientOriginalExtension());
        $user = \Auth::user();
        // $file = Input::file('image');
        // if (File::exists($file))
        // {
        //     echo "Yup. It exists.";
        // }

        // $file->move($destination, $file->getClientOriginalName());
        // echo($file);

        $user = \Auth::user();
        $imagename = $user->id.".".$file;
        $path = str_replace("\\", "/", Input::file('image')->move($destination."/", $imagename));
        DB::table('users')->where('username', $user->username)
            ->update([
                'cover_pic' => $path
            ]);

        return Redirect::back();
//        echo($path);
    }

}
