<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Carbon\Carbon;

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
      $user = \Auth::user();
      $user_info = DB::table('users')
        ->join('doctor_profile', 'users.username', '=', 'doctor_profile.doctor_user')
        ->where('users.username', '=', $user->username)
        ->get();

    	return view('doctor.doctor-admin-view-profile', compact('user', 'user_info'));
    }

    public function make_profile(Request $request){
        $user = \Auth::user();
        
        DB::table('doctor_profile')
          ->where('doctor_user', '=', $user->username)
          ->delete();


        DB::table('doctor_profile')
          ->insert([
              'doctor_user' => $user->username,
              'about' => $request->input('about'),
              'location' => $request->input('location'),
              'address' => $request->input('address'),
              'title' => $request->input('title'),
              'start' => $request->input('start'),
              'end' => $request->input('end'),
              'membership' => $request->input('membership'),
              'certifications' => $request->input('certifications'),
              'insurance' => $request->input('insurance'),
              'specializations' => $request->input('specializations'),
              'education' => $request->input('education'),
              'language' => $request->input('language'),
              'award' => $request->input('award'),
              'registration' => $request->input('registration'),
            ]);
        DB::table('users')
            ->where('username', '=', $user->username)
            ->update([
                'location' => $request->input('location'),
                'address' => $request->input('address')
            ]);
        return redirect('/doc-profile-edit');
    }

    public function profileEdit(){
      $user = \Auth::user();
      $doc_info = DB::table('users')
        ->join('doctor_profile', 'users.username', '=', 'doctor_profile.doctor_user')
        ->where('username', '=', $user->username)
        ->first();
      if($doc_info)
      {
        return view('doctor.doctor-admin-edit-profile', compact('user', 'doc_info'));
      }
      if(!$doc_info){
        return view('doctor.doctor-admin-edit-profile-empty', compact('user'));
      }
    }

    public function blog(){
      $user = \Auth::user();
    	return view('doctor.doctor-admin-blog', compact('user'));
    }

    public function comments(){
      $user = \Auth::user();
    	return view('doctor.doctor-admin-comments', compact('user'));
    }

    public function settings(){
      $user = \Auth::user();
    	return view('doctor.doctor-admin-account-setting', compact('user'));
    }

    public function doc_checked($p_user, $p_name, $appoint){
        $user = \Auth::user();
        // echo($appoint);
        return view('doctor.doctor-prescribe', compact('user', 'p_user', 'p_name', 'appoint'));
    }

    public function prescribe(Request $request){
        $user = \Auth::user();
        // echo($request->input('appoint'));


        DB::table('visit_record')
            ->insert([
                'd_username' => $user->username,
                'p_username' => $request->input('p_user'),
                'patient_name' => $request->input('p_name'),
                'issue' => $request->input('issue'),
                'comments' => $request->input('comment'),
                'prescription' => $request->input('prescription'),
                'visit_time' => $request->input('p_appoint')
            ]);
       
        $temp = DB::table('appointment_user')
            ->where('patient_user', '=', $request->input('p_user'))
            ->where('doctor_user', '=', $request->input('d_user'))
            ->where('approved', '=', '1')
            ->where('appointment_time', '=', $request->input('appoint'))
            ->get();

        



        DB::table('appointment_user')
            ->where('patient_user', '=', $request->input('p_user'))
            ->where('doctor_user', '=', $request->input('d_user'))
            ->where('approved', '=', '1')
            ->where('appointment_time', '=', $request->input('p_appoint'))
            ->delete();

        return redirect('/homepage');
    }


//    public function patient_profile($username){
//        $user = \Auth::user();
//        // echo($username);
//        $patient = DB::table('visit_record')
//          ->where('d_username', '=', $user->username)
//          ->where('p_username', '=', $username)
//          ->get();
//        return view('doctor.patient-profile-view', compact('patient'));
//    }

    public function week_view(){
        $user = \Auth::user();
        return view('doctor.doctor-week-view', compact('user'));
    }

    public function schedule_week($user, $day){
        $next = Carbon::createFromFormat('Y-m-d h:i:s', $day)->addDays(7);
        $prev = Carbon::createFromFormat('Y-m-d h:i:s', $day)->subDays(7);

        $first_day = Carbon::createFromFormat('Y-m-d h:i:s', $day);
        $second_day = Carbon::createFromFormat('Y-m-d h:i:s', $day)->addDay();
        $third_day = Carbon::createFromFormat('Y-m-d h:i:s', $day)->addDays(2);
        $fourth_day = Carbon::createFromFormat('Y-m-d h:i:s', $day)->addDays(3);
        $fifth_day = Carbon::createFromFormat('Y-m-d h:i:s', $day)->addDays(4);
        $sixth_day = Carbon::createFromFormat('Y-m-d h:i:s', $day)->addDays(5);
        $seventh_day = Carbon::createFromFormat('Y-m-d h:i:s', $day)->addDays(6);

        $first_slots = DB::table('appointment_user')
            ->where('doctor_user', '=', $user)
            ->where('actual_date', '=', $first_day)
            ->where('approved', '=', 1)
            ->get();

        $second_slots = DB::table('appointment_user')
            ->where('doctor_user', '=', $user)
            ->where('actual_date', '=', $second_day)
            ->where('approved', '=', 1)
            ->get();

        $third_slots = DB::table('appointment_user')
            ->where('doctor_user', '=', $user)
            ->where('actual_date', '=', $third_day)
            ->where('approved', '=', 1)
            ->get();

        $fourth_slots = DB::table('appointment_user')
            ->where('doctor_user', '=', $user)
            ->where('actual_date', '=', $fourth_day)
            ->where('approved', '=', 1)
            ->get();

        $fifth_slots = DB::table('appointment_user')
            ->where('doctor_user', '=', $user)
            ->where('actual_date', '=', $fifth_day)
            ->where('approved', '=', 1)
            ->get();

        $sixth_slots = DB::table('appointment_user')
            ->where('doctor_user', '=', $user)
            ->where('actual_date', '=', $sixth_day)
            ->where('approved', '=', 1)
            ->get();

        $seventh_slots = DB::table('appointment_user')
            ->where('doctor_user', '=', $user)
            ->where('actual_date', '=', $seventh_day)
            ->where('approved', '=', 1)
            ->get();

        /*
         * first day
         */
        $work = '<p><a class="prev" href="/doctor-week-view/'.$user.'/'.$prev.'" style="float:left;position:absolute">
					<img src="/images/back.png" width="20px" height="20px">Previous week</a>
						<a id="next" href="/doctor-week-view/'.$user.'/'.$next.'" style="float:right">Next week
						<img src="/images/forward.png" width="20px" height="20px"></a></p><br>';
        $work .= '<div class="slide">';
        $work .='<div class="dradmin-appoinment">';
        $work .='<table>
				<tr>
					<th>';
        $work .='<div class="header-tile-date-name">'.$first_day->format('l').'</div>
				<div class="header-tile-date-value">'.$first_day->format('jS F').'</div>';
        foreach($first_slots as $fr_s){
            $work .='<tr><td><a href="#" rel="tooltip" data-placement="right" 
            title='.$fr_s->patient_name.' '.$fr_s->issues.'>
            '.$fr_s->patient_name.' '.$fr_s->issues.'<br/><span>'.Carbon::createFromFormat('Y-m-d h:i:s', $fr_s->appointment_time)->format('h:i A')
                .'</span></a></td></tr>';
        }
        $work .='    </th>
				</tr>';
        $work .='</table>';
        $work .='</div>';
        $work .='</div>';

        /*
         * second day
         */
        $work .= '<div class="slide">';
        $work .='<div class="dradmin-appoinment">';
        $work .='<table>
				<tr>
					<th>';
        $work .='<div class="header-tile-date-name">'.$second_day->format('l').'</div>
				<div class="header-tile-date-value">'.$second_day->format('jS F').'</div>';
        foreach($second_slots as $fr_s){
            $work .='<tr><td><a href="#" rel="tooltip" data-placement="right" 
            title='.$fr_s->patient_name.' '.$fr_s->issues.'>
            '.$fr_s->patient_name.'<br/><span>'.Carbon::createFromFormat('Y-m-d h:i:s', $fr_s->appointment_time)->format('h:i A')
                .'</span></a></td></tr>';
        }
        $work .='    </th>
				</tr>';
        $work .='</table>';
        $work .='</div>';
        $work .='</div>';

        /*
         * third day
         */
        $work .= '<div class="slide">';
        $work .='<div class="dradmin-appoinment">';
        $work .='<table>
				<tr>
					<th>';
        $work .='<div class="header-tile-date-name">'.$third_day->format('l').'</div>
				<div class="header-tile-date-value">'.$third_day->format('jS F').'</div>';
        foreach($third_slots as $fr_s){
            $work .='<tr><td><a href="#" rel="tooltip" data-placement="right" 
            title='.$fr_s->patient_name.' '.$fr_s->issues.'>
            '.$fr_s->patient_name.'<br/><span>'.Carbon::createFromFormat('Y-m-d h:i:s', $fr_s->appointment_time)->format('h:i A')
                .'</span></a></td></tr>';
        }
        $work .='    </th>
				</tr>';
        $work .='</table>';
        $work .='</div>';
        $work .='</div>';

        /*
         * fourth day
         */
        $work .= '<div class="slide">';
        $work .='<div class="dradmin-appoinment">';
        $work .='<table>
				<tr>
					<th>';
        $work .='<div class="header-tile-date-name">'.$fourth_day->format('l').'</div>
				<div class="header-tile-date-value">'.$fourth_day->format('jS F').'</div>';
        foreach($fourth_slots as $fr_s){
            $work .='<tr><td><a href="#" rel="tooltip" data-placement="right" 
            title='.$fr_s->patient_name.' '.$fr_s->issues.'>
            '.$fr_s->patient_name.'<br/><span>'.Carbon::createFromFormat('Y-m-d h:i:s', $fr_s->appointment_time)->format('h:i A')
                .'</span></a></td></tr>';
        }
        $work .='    </th>
				</tr>';
        $work .='</table>';
        $work .='</div>';
        $work .='</div>';

        /*
         * fifth day
         */
        $work .= '<div class="slide">';
        $work .='<div class="dradmin-appoinment">';
        $work .='<table>
				<tr>
					<th>';
        $work .='<div class="header-tile-date-name">'.$fifth_day->format('l').'</div>
				<div class="header-tile-date-value">'.$fifth_day->format('jS F').'</div>';
        foreach($fifth_slots as $fr_s){
            $work .='<tr><td><a href="#" rel="tooltip" data-placement="right" 
            title='.$fr_s->patient_name.' '.$fr_s->issues.'>
            '.$fr_s->patient_name.'<br/><span>'.Carbon::createFromFormat('Y-m-d h:i:s', $fr_s->appointment_time)->format('h:i A')
                .'</span></a></td></tr>';
        }
        $work .='    </th>
				</tr>';
        $work .='</table>';
        $work .='</div>';
        $work .='</div>';



        /*
         * sixth day
         */
        $work .= '<div class="slide">';
        $work .='<div class="dradmin-appoinment">';
        $work .='<table>
				<tr>
					<th>';
        $work .='<div class="header-tile-date-name">'.$sixth_day->format('l').'</div>
				<div class="header-tile-date-value">'.$sixth_day->format('jS F').'</div>';
        foreach($sixth_slots as $fr_s){
            $work .='<tr><td><a href="#" rel="tooltip" data-placement="right" 
            title='.$fr_s->patient_name.' '.$fr_s->issues.'>
            '.$fr_s->patient_name.'<br/><span>'.Carbon::createFromFormat('Y-m-d h:i:s', $fr_s->appointment_time)->format('h:i A')
                .'</span></a></td></tr>';
        }
        $work .='    </th>
				</tr>';
        $work .='</table>';
        $work .='</div>';
        $work .='</div>';

        /*
         * seventh day
         */
        $work .= '<div class="slide">';
        $work .='<div class="dradmin-appoinment">';
        $work .='<table>
				<tr>
					<th>';
        $work .='<div class="header-tile-date-name">'.$seventh_day->format('l').'</div>
				<div class="header-tile-date-value">'.$seventh_day->format('jS F').'</div>';
        foreach($seventh_slots as $fr_s){
            $work .='<tr><td><a href="#" rel="tooltip" data-placement="right" 
            title='.$fr_s->patient_name.' '.$fr_s->issues.'>
            '.$fr_s->patient_name.'<br/><span>'.Carbon::createFromFormat('Y-m-d h:i:s', $fr_s->appointment_time)->format('h:i A')
                .'</span></a></td></tr>';
        }
        $work .='    </th>
				</tr>';
        $work .='</table>';
        $work .='</div>';
        $work .='</div>';

        echo($work);
    }
}
