<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Carbon\Carbon;

class DoctorController extends Controller
{
    public function setAppoint(){
        $user = \Auth::user();
        
        $doctor_schedule = DB::table('users')
            ->join('doctor_schedule', 'users.username', '=', 'doctor_schedule.doctor_user')
            ->where('users.username', $user->username)
            ->get();
        
    	return view('doctor.doctor-admin-set-appointment', compact('user', 'doctor_schedule'));
    }

    public function profile(){
      $user = \Auth::user();
      $user_info = DB::table('users')
        ->join('doctor_profile', 'users.username', '=', 'doctor_profile.doctor_user')
        ->where('users.username', '=', $user->username)
        ->get();

    	return view('doctor.doctor-admin-view-profile', compact('user', 'user_info'));
    }

    public function make_profile(Request $request){
        $user = \Auth::user();
        
        DB::table('doctor_profile')
          ->where('doctor_user', '=', $user->username)
          ->delete();


        DB::table('doctor_profile')
          ->insert([
              'doctor_user' => $user->username,
              'about' => $request->input('about'),
              'location' => $request->input('location'),
              'address' => $request->input('address'),
              'title' => $request->input('title'),
              'start' => $request->input('start'),
              'end' => $request->input('end'),
              'membership' => $request->input('membership'),
              'certifications' => $request->input('certifications'),
              'insurance' => $request->input('insurance'),
              'specializations' => $request->input('specializations'),
              'education' => $request->input('education'),
              'language' => $request->input('language'),
              'award' => $request->input('award'),
              'registration' => $request->input('registration'),
            ]);
        DB::table('users')
            ->where('username', '=', $user->username)
            ->update([
                'location' => $request->input('location'),
                'address' => $request->input('address')
            ]);
        return redirect('/doc-profile-edit');
    }

    public function profileEdit(){
      $user = \Auth::user();
      $doc_info = DB::table('users')
        ->join('doctor_profile', 'users.username', '=', 'doctor_profile.doctor_user')
        ->where('username', '=', $user->username)
        ->first();
      if($doc_info)
      {
        return view('doctor.doctor-admin-edit-profile', compact('user', 'doc_info'));
      }
      if(!$doc_info){
        return view('doctor.doctor-admin-edit-profile-empty', compact('user'));
      }
    }

    public function blog(){
      $user = \Auth::user();
    	return view('doctor.doctor-admin-blog', compact('user'));
    }

    public function comments(){
      $user = \Auth::user();
    	return view('doctor.doctor-admin-comments', compact('user'));
    }

    public function settings(){
      $user = \Auth::user();
    	return view('doctor.doctor-admin-account-setting', compact('user'));
    }

    public function doc_checked($p_user, $p_name, $appoint){
        $user = \Auth::user();
        // echo($appoint);
        return view('doctor.doctor-prescribe', compact('user', 'p_user', 'p_name', 'appoint'));
    }

    public function prescribe(Request $request){
        $user = \Auth::user();
        // echo($request->input('appoint'));


        DB::table('visit_record')
            ->insert([
                'd_username' => $user->username,
                'p_username' => $request->input('p_user'),
                'patient_name' => $request->input('p_name'),
                'issue' => $request->input('issue'),
                'comments' => $request->input('comment'),
                'prescription' => $request->input('prescription'),
                'visit_time' => $request->input('p_appoint')
            ]);
       
        $temp = DB::table('appointment_user')
            ->where('patient_user', '=', $request->input('p_user'))
            ->where('doctor_user', '=', $request->input('d_user'))
            ->where('approved', '=', '1')
            ->where('appointment_time', '=', $request->input('appoint'))
            ->get();

        

       // foreach($temp as $tmp){
       //      DB::table('appointment_user')
       //          ->insert([
       //              'doctor_user' => $tmp->doctor_user,
       //              'patient_user' => $tmp->patient_user,
       //              'patient_name' => $tmp->patient_name,
       //              'issues' => $request->input('issue'),
       //              'admin_user' => $tmp->admin_user,
       //              'name' => $tmp->name,
       //              'approved' => '2',
       //              'email' => $tmp->email,
       //              'phone_number' => $tmp->phone_number,
       //              'appointed_at' => $tmp->appointed_at,
       //              'patient_name' => $tmp->patient_name,
       //              'appointment_time' => $tmp->appointment_time,
       //      ]);
       // }

        DB::table('appointment_user')
            ->where('patient_user', '=', $request->input('p_user'))
            ->where('doctor_user', '=', $request->input('d_user'))
            ->where('approved', '=', '1')
            ->where('appointment_time', '=', $request->input('p_appoint'))
            ->delete();

        return redirect('/homepage');
    }


    public function patient_profile($username){
        $user = \Auth::user();
        // echo($username);
        $patient = DB::table('visit_record')
          ->where('d_username', '=', $user->username)
          ->where('p_username', '=', $username)
          ->get();
        return view('doctor.patient-profile-view', compact('patient'));
    }
}
