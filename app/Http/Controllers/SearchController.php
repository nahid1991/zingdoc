<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Carbon\Carbon;

class SearchController extends Controller
{
    public function search(){
    	$user = \Auth::user();
    	
        $sun = Carbon::parse('next sunday')->format('jS F');
        $mon = Carbon::parse('next monday')->format('jS F');
        $tue = Carbon::parse('next tuesday')->format('jS F');
        $wed = Carbon::parse('next wednesday')->format('jS F');
        $thu = Carbon::parse('next thursday')->format('jS F');
        $fri = Carbon::parse('next friday')->format('jS F');
        $sat = Carbon::parse('next saturday')->format('jS F');
        // $day = Carbon::today()->format('l'); 
        
        // if($day == 'Monday'){
        //     $mon = Carbon::parse('next monday')->format('jS F');
        // }
        // if($day != 'Monday'){
        //     $mon = Carbon::parse('this monday')->format('jS F');
        // }





        // if($day == 'Tuesday'){
        //     $tue = Carbon::parse('next tuesday')->format('jS F');
        // }
        // if($day != 'Tuesday'){
        //     $tue = Carbon::parse('this tuesday')->format('jS F');
        // }





        // if($day == 'Wednesday'){
        //     $wed = Carbon::parse('next wednesday')->format('jS F');
        // }
        // if($day != 'Wednesday'){
        //     $wed = Carbon::parse('this wednesday')->format('jS F');
        // }





        // if($day == 'Thursday'){
        //     $thu = Carbon::parse('next thursday')->format('jS F');
        // }
        // if($day != 'Thursday'){
        //     $thu = Carbon::parse('this thursday')->format('jS F');
        // }
     


        // if($day == 'Friday'){
        //     $fri = Carbon::parse('next friday')->format('jS F');
        // }
        // if($day != 'Friday'){
        //     $fri = Carbon::parse('this friday')->format('jS F');
        // }



        // if($day == 'Saturday'){
        //     $sat = Carbon::parse('next saturday')->format('jS F');
        // }
        // if($day != 'Saturday'){
        //     $sat = Carbon::parse('this saturday')->format('jS F');
        // }




        // if($day == 'Sunday'){
        //     $sun = Carbon::parse('next sunday')->format('jS F');
        // }
        // if($day != 'Sunday'){
        //     $sun = Carbon::parse('this sunday')->format('jS F');
        // }




        $doctors = DB::table('users')
    		->where('user_type', '=', '1')
    		->get();
    	foreach($doctors as $doctor){
    		$doctor_info = DB::table('users')
    			->join('doctor_timing', 'users.username', '=', 'doctor_timing.doctor_user')
    			->where('users.username', '=', $doctor->username)
    			->get();
    	}

    	return view('patient.find', compact('user', 'doctors', 'doctor_info', 'sun', 'mon', 'tue', 'wed', 
            'thu', 'fri', 'sat'));
        // $date = Carbon::parse('next monday')->toDateString();
        // $date = Carbon::today()->format('l');
        
        // $date = $date->format('l jS \\of F Y h:i:s A');
        // echo($date);
        // echo($sun." ".$mon." ".$tue." ".$wed." ".$thu." ".$fri." ".$sat);
    }
}
