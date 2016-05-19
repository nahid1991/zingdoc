<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class PatientController extends Controller
{
    public function comments()
    {
    	return view('patient.patient-admin-comments');
    }

    public function profile(){
    	$user = \Auth::user();
    	return view('patient.patient-admin-profile', compact('user'));
    }

    

    public function appointed(){
    	$user = \Auth::user();
    	return view('patient.appointment', compact('user'));
    }

    public function docprof($username){
        $user = \Auth::user();
        $doctor = DB::table('users')
            ->where('username', '=', $username)
            ->get();
        $doctor_info = DB::table('doctor_profile')
            ->where('doctor_user', '=', $username)
            ->get();
        
        return view('doctor-profile-public', compact('user', 'doctor', 'doctor_info'));
    }
}
