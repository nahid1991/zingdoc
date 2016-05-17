<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

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
    	return view('doctor.doctor-admin-view-profile');
    }

    public function profileEdit(){
    	return view('doctor.doctor-admin-edit-profile');
    }

    public function blog(){
    	return view('doctor.doctor-admin-blog');
    }

    public function comments(){
    	return view('doctor.doctor-admin-comments');
    }

    public function settings(){
    	return view('doctor.doctor-admin-account-setting');
    }
}
