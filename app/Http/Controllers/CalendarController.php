<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CalendarController extends Controller
{
    public function show(){
    	return view('doctor.doctor-calendar');
    }
}
