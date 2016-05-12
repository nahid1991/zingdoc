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
        $sche_doc_pat = DB::table('users')
            // ->join('doctor_entity', 'users.username', '=', 'doctor_entity.entity_user')
            ->join('appointment_user', 'users.username', '=', 'appointment_user.admin_user')
            ->where('users.username', '=', $user->username)
            ->get();

        foreach($sche_doc_pat as $sdp){
            $pat_info = DB::table('users')
                ->where('username', '=', $sdp->patient_user)
                ->get();
        }

        foreach($listed_doc_pat as $list_doc){
            $doc_info = DB::table('users')
                ->join('doctor_schedule', 'doctor_schedule.doctor_user', '=', 'users.username')
                ->where('username', '=', $list_doc->doctor_user)
                ->get();
            

            // 
            //     ->where('users.username', '=', $list_doc->doctor_user)
            //     ->get();
            // echo($list_doc->doctor_user);
            // foreach($doc_info as $doc_inf){
            //     $test = $doc_inf;
            // // ->join('doctor_schedule', 'doctor_schedule.doctor_user', '=', 'users.username')
            // //     ->where('users.username', '=', $list_doc->doctor_user)
            // //     ->get();
            // // echo($list_doc->doctor_user);
            //     // echo($doc_inf->name);
            // }
            
        }
        return view('entity.entity-admin-appointments-view', compact('user', 'listed_doc_pat', 'doc_info', 'pat_info', 
                'sche_doc_pat'));





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
        //     'sche_doc_pat'));
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
}
