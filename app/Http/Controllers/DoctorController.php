<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DoctorController extends Controller
{
    public function setAppoint(){
    	return view('doctor.doctor-admin-set-appointment');
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
