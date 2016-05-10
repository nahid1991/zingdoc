<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class SearchController extends Controller
{
    public function search(){
    	$user = \Auth::user();
    	$doctors = DB::table('users')
    		->where('user_type', '=', '1')
    		->get();
    	foreach($doctors as $doctor){
    		$doctor_info = DB::table('users')
    			->join('doctor_schedule', 'users.username', '=', 'doctor_schedule.doctor_user')
    			->where('users.username', '=', $doctor->username)
    			->get();
    	}
    	return view('patient.find', compact('user', 'doctors', 'doctor_info'));
    }
}
