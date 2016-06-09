<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

use Carbon\Carbon;

class SearchController extends Controller
{
    public function search($time){
    	$user = \Auth::user();

        $doctors = DB::table('users')
            ->where('user_type', '=', '1')
    		->get();
    	return view('patient.find', compact('user', 'doctors', 'time'));

    }
    
    public function slot_finder($user, $day){
            $next = Carbon::createFromFormat('Y-m-d h:i:s', $day)->addDays(7);
            $prev = Carbon::createFromFormat('Y-m-d h:i:s', $day)->subDays(7);
            $year = Carbon::createFromFormat('Y-m-d h:i:s', $day)->year;
            $next_year = Carbon::createFromFormat('Y-m-d h:i:s', $day)->lastOfYear()->addDay();
            $prev_year = Carbon::createFromFormat('Y-m-d h:i:s', $day)->firstOfYear()->subDay()->firstOfYear();


            $jan = Carbon::createFromFormat('Y-m-d h:i:s', $day)->firstOfYear();
            $feb = Carbon::createFromFormat('Y-m-d h:i:s', $day)->firstOfYear()->addMonth();
            $mar = Carbon::createFromFormat('Y-m-d h:i:s', $day)->firstOfYear()->addMonths(2);
            $apr = Carbon::createFromFormat('Y-m-d h:i:s', $day)->firstOfYear()->addMonths(3);
            $may = Carbon::createFromFormat('Y-m-d h:i:s', $day)->firstOfYear()->addMonths(4);
            $jun = Carbon::createFromFormat('Y-m-d h:i:s', $day)->firstOfYear()->addMonths(5);
            $jul = Carbon::createFromFormat('Y-m-d h:i:s', $day)->firstOfYear()->addMonths(6);
            $aug = Carbon::createFromFormat('Y-m-d h:i:s', $day)->firstOfYear()->addMonths(7);
            $sep = Carbon::createFromFormat('Y-m-d h:i:s', $day)->firstOfYear()->addMonths(8);
            $oct = Carbon::createFromFormat('Y-m-d h:i:s', $day)->firstOfYear()->addMonths(9);
            $nov = Carbon::createFromFormat('Y-m-d h:i:s', $day)->firstOfYear()->addMonths(10);
            $dec = Carbon::createFromFormat('Y-m-d h:i:s', $day)->firstOfYear()->addMonths(11);

            $first_day = Carbon::createFromFormat('Y-m-d h:i:s', $day);
            $second_day = Carbon::createFromFormat('Y-m-d h:i:s', $day)->addDay();
            $third_day = Carbon::createFromFormat('Y-m-d h:i:s', $day)->addDays(2);
            $fourth_day = Carbon::createFromFormat('Y-m-d h:i:s', $day)->addDays(3);
            $fifth_day = Carbon::createFromFormat('Y-m-d h:i:s', $day)->addDays(4);
            $sixth_day = Carbon::createFromFormat('Y-m-d h:i:s', $day)->addDays(5);
            $seventh_day = Carbon::createFromFormat('Y-m-d h:i:s', $day)->addDays(6);

            $first_slots = DB::table('time_slot')
                ->where('d_user', '=', $user)
                ->where('created_for', '=', $first_day)
                ->where('booked', '=', 0)
                ->get();

            $second_slots = DB::table('time_slot')
                ->where('d_user', '=', $user)
                ->where('created_for', '=', $second_day)
                ->where('booked', '=', 0)
                ->get();

            $third_slots = DB::table('time_slot')
                ->where('d_user', '=', $user)
                ->where('created_for', '=', $third_day)
                ->where('booked', '=', 0)
                ->get();

            $fourth_slots = DB::table('time_slot')
                ->where('d_user', '=', $user)
                ->where('created_for', '=', $fourth_day)
                ->where('booked', '=', 0)
                ->get();

            $fifth_slots = DB::table('time_slot')
                ->where('d_user', '=', $user)
                ->where('created_for', '=', $fifth_day)
                ->where('booked', '=', 0)
                ->get();

            $sixth_slots = DB::table('time_slot')
                ->where('d_user', '=', $user)
                ->where('created_for', '=', $sixth_day)
                ->where('booked', '=', 0)
                ->get();

            $seventh_slots = DB::table('time_slot')
                ->where('d_user', '=', $user)
                ->where('created_for', '=', $seventh_day)
                ->where('booked', '=', 0)
                ->get();




///slot/'.$user.'/'.$next.'

            $work = '<h4>Book an Appointment</h4><p>
                    <a class="test" href="#" style="width: 60%; border: 3px solid rgb(115, 173, 33); 
					    padding: 10px; margin: 250px;">Choose a month</a>
					    <a id="next_year" href="/slot/'.$user.'/'.$prev_year.'">
					    <img src="/images/back.png" alt="" width="20px" height="20px"></a>
					    '.$year.'
						<a id="prev_year" href="/slot/'.$user.'/'.$next_year.'">
						<img src="/images/forward.png" alt="" width="20px" height="20px"></a></p>
					<div class="month-popup" style="display:none">
					    <p style="text-align: center; color: #1a1a1a"><a id="jan" href="/slot/'.$user.'/'.$jan.'">
					    <strong>January</strong></a></p>
					    <p style="text-align: center; color: #1a1a1a"><a id="feb" href="/slot/'.$user.'/'.$feb.'">
					    <strong>February</strong></a></p>
					    <p style="text-align: center; color: #1a1a1a"><a id="mar" href="/slot/'.$user.'/'.$mar.'">
					    <strong>March</strong></a></p>
					    <p style="text-align: center; color: #1a1a1a"><a id="apr" href="/slot/'.$user.'/'.$apr.'">
					    <strong>April</strong></a></p>
					    <p style="text-align: center; color: #1a1a1a"><a id="may" href="/slot/'.$user.'/'.$may.'">
					    <strong>May</strong></a></p>
					    <p style="text-align: center; color: #1a1a1a"><a id="jun" href="/slot/'.$user.'/'.$jun.'">
					    <strong>June</strong></a></p>
					    <p style="text-align: center; color: #1a1a1a"><a id="jul" href="/slot/'.$user.'/'.$jul.'">
					    <strong>July</strong></a></p>
					    <p style="text-align: center; color: #1a1a1a"><a id="aug" href="/slot/'.$user.'/'.$aug.'">
					    <strong>August</strong></a></p>
					    <p style="text-align: center; color: #1a1a1a"><a id="sep" href="/slot/'.$user.'/'.$sep.'">
					    <strong>September</strong></a></p>
					    <p style="text-align: center; color: #1a1a1a"><a id="oct" href="/slot/'.$user.'/'.$oct.'">
					    <strong>October</strong></a></p>
					    <p style="text-align: center; color: #1a1a1a"><a id="nov" href="/slot/'.$user.'/'.$nov.'">
					    <strong>November</strong></a></p>
					    <p style="text-align: center; color: #1a1a1a"><a id="dec" href="/slot/'.$user.'/'.$dec.'">
					    <strong>December</strong></a></p>
                    </div><br>
					<p class="ds"><a id="prev" href="/slot/'.$user.'/'.$prev.'" style="float:left;position:absolute">
					<img src="/images/back.png" width="20px" height="20px">Previous week</a>
					
						<a id="next" href="/slot/'.$user.'/'.$next.'" style="float:right">Next week
						<img src="/images/forward.png" width="20px" height="20px"></a></p><br>
					<br>
						

             <div id="'.$user.'-slides"><div class="slide">
                            <div class="appoinment-day">
                                <table>
                                    <tr>
                                       <th>';
            $work.= '<div class="header-tile-date-name">'.$first_day->format('l').'</div>';
            $work.= '<div class="header-tile-date-value">'.$first_day->format('jS F').'</div>';
            $work.= '</th></tr>';
            foreach($first_slots as $fr_slots){
                $work.= '<tr><td><a href="/appointment-form/'.$fr_slots->d_user.'/'.$fr_slots->slot_date.'/'.$fr_slots->slot.
                    '/'.$fr_slots->serial.'/'.$fr_slots->slot_end.'">'.$fr_slots->slot.
                    '<p>Serial:'.$fr_slots->serial.'</p></a></td></tr>';
            };
            $work.= '</table></div></div>';


            $work.= '<div class="slide">
					<div class="appoinment-day">
					    <table>
							<tr>
						    	<th>';
            $work.= '<div class="header-tile-date-name">'.$second_day->format('l').'</div>';
            $work.= '<div class="header-tile-date-value">'.$second_day->format('jS F').'</div>';
            $work.= '</th></tr>';
            foreach($second_slots as $sn_slots){
                $work.= '<tr><td><a href="/appointment-form/'.$sn_slots->d_user.'/'.$sn_slots->slot_date.'/'.$sn_slots->slot.
                    '/'.$sn_slots->serial.'/'.$sn_slots->slot_end.'">'.$sn_slots->slot.
                    '<p>Serial:'.$sn_slots->serial.'</p></a></td></tr>';
            };
            $work.= '</table></div></div>';

            $work.= '<div class="slide">
					<div class="appoinment-day">
					    <table>
							<tr>
						    	<th>';
            $work.= '<div class="header-tile-date-name">'.$third_day->format('l').'</div>';
            $work.= '<div class="header-tile-date-value">'.$third_day->format('jS F').'</div>';
            $work.= '</th></tr>';
            foreach($third_slots as $tr_slots){
                $work.= '<tr><td><a href="/appointment-form/'.$tr_slots->d_user.'/'.$tr_slots->slot_date.'/'.$tr_slots->slot.
                    '/'.$tr_slots->serial.'/'.$tr_slots->slot_end.'">'.$tr_slots->slot.
                    '<p>Serial:'.$tr_slots->serial.'</p></a></td></tr>';
            };

            $work.= '</table></div></div>';

            $work.= '<div class="slide">
					<div class="appoinment-day">
					    <table>
							<tr>
						    	<th>';
            $work.= '<div class="header-tile-date-name">'.$fourth_day->format('l').'</div>';
            $work.= '<div class="header-tile-date-value">'.$fourth_day->format('jS F').'</div>';
            $work.= '</th></tr>';
            foreach($fourth_slots as $ft_slots){
                $work.= '<tr><td><a href="/appointment-form/'.$ft_slots->d_user.'/'.$ft_slots->slot_date.'/'.$ft_slots->slot.
                    '/'.$ft_slots->serial.'/'.$ft_slots->slot_end.'">'.$ft_slots->slot.
                    '<p>Serial:'.$ft_slots->serial.'</p></a></td></tr>';
            };

            $work.= '</table></div></div></div>';

            $work.= '<div class="slide">
					<div class="appoinment-day">
					    <table>
							<tr>
						    	<th>';
            $work.= '<div class="header-tile-date-name">'.$fifth_day->format('l').'</div>';
            $work.= '<div class="header-tile-date-value">'.$fifth_day->format('jS F').'</div>';
            $work.= '</th></tr>';
            foreach($fifth_slots as $ff_slots){
                $work.= '<tr><td><a href="/appointment-form/'.$ff_slots->d_user.'/'.$ff_slots->slot_date.'/'.$ff_slots->slot.
                    '/'.$ff_slots->serial.'/'.$ff_slots->slot_end.'">'.$ff_slots->slot.
                    '<p>Serial:'.$ff_slots->serial.'</a></td></tr>';
            };

            $work.= '</table></div></div>';


            $work.= '<div class="slide">
					<div class="appoinment-day">
					    <table>
							<tr>
						    	<th>';
            $work.= '<div class="header-tile-date-name">'.$sixth_day->format('l').'</div>';
            $work.= '<div class="header-tile-date-value">'.$sixth_day->format('jS F').'</div>';
            $work.= '</th></tr>';
            foreach($sixth_slots as $sx_slots){
                $work.= '<tr><td><a href="/appointment-form/'.$sx_slots->d_user.'/'.$sx_slots->slot_date.'/'.$sx_slots->slot.
                    '/'.$sx_slots->serial.'/'.$sx_slots->slot_end.'">'.$sx_slots->slot.
                    '<p>Serial:'.$sx_slots->serial.'</a></td></tr>';
            };

            $work.= '</table></div></div>';

            $work.= '<div class="slide">
					<div class="appoinment-day">
					    <table>
							<tr>
						    	<th>';
            $work.= '<div class="header-tile-date-name">'.$seventh_day->format('l').'</div>';
            $work.= '<div class="header-tile-date-value">'.$seventh_day->format('jS F').'</div>';
            $work.= '</th></tr>';
            foreach($seventh_slots as $sv_slots){
                $work.= '<tr><td><a href="/appointment-form/'.$sv_slots->d_user.'/'.$sv_slots->slot_date.'/'.$sv_slots->slot.
                    '/'.$sv_slots->serial.'/'.$sv_slots->slot_end.'">'.$sv_slots->slot.
                    '<p>Serial:'.$sv_slots->serial.'</a></td></tr>';
            };



            

            $work.= '</table></div></div>';

            echo($work);
        }



    
}
