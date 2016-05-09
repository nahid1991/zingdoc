<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PatientController extends Controller
{
    public function comments()
    {
    	return view('patient.patient-admin-comments');
    }

    public function profile(){
    	return view('patient.patient-admin-profile');
    }
}
