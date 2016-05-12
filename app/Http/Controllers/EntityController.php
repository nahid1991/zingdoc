<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

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

    public function profile(){
    	return view('entity.entity-admin-view-profile');
    }

    public function profileEdit(){
    	return view('entity.entity-admin-edit-profile');
    }

    public function settings(){
    	return view('entity.entity-admin-account-setting');
    }

    public function test(Request $request){
        $user = \Auth::user();
        $doc_info = DB::table('users')
            ->where('username', '=', $request->input('doctor_user'))
            ->first();
        $doc_schedule = DB::table('users')
            ->join('doctor_schedule', 'users.username', '=', 'doctor_schedule.doctor_user')
            ->where('username', '=', $request->input('doctor_user'))
            ->get();
        $listed_doc_pat = DB::table('users')
            ->join('doctor_entity', 'users.username', '=', 'doctor_entity.entity_user')
            // ->join('appointment_user', 'users.username', '=', 'appointment_user.admin_user')
            ->where('users.username', '=', $user->username)
            ->get();
        $patient_list = DB::table('users')
            ->join('appointment_user', 'users.username', '=', 'appointment_user.doctor_user')
            ->where('username', '=', $request->input('doctor_user'))
            ->get();
        return view('entity.doctor-result', compact('user', 'doc_info', 'doc_schedule', 'listed_doc_pat', 'patient_list'));
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


    public function approve($username, $p_name){
        $trick = DB::table('appointment_user')
            ->where('doctor_user', '=', $username)
            ->where('patient_name', '=', $p_name)
            ->first();
        $user = \Auth::user();
        
        
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
            ]);

        DB::table('appointment_user')
            ->where('doctor_user', '=', $username)
            ->where('patient_name', '=', $p_name)
            ->where('approved', '=', 0)
            ->delete();

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


}
