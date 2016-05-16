<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

class CalendarController extends Controller
{
    public function show(){
    	$user = \Auth::user();
    	$month = Carbon::now();
    	$num_month = $month->month;
    	$num_year = $month->year;
    	// echo($month->month);
    	$month = $month->format('F Y');
    	return view('doctor.doctor-calendar', compact('user', 'month', 'num_month', 'num_year'));
    }


    public function make($username, $year, $month, $day){
    	echo($day.'-'.$month.'-'.$year);
    }
}
