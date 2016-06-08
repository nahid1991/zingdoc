<?php

	/* draws a calendar */
	function draw_calendar($username,$month,$year){

		/* draw table */
		$calendar = '<table cellpadding="0" cellspacing="10" class="calendar">';

		/* table headings */
		$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
		$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

		/* days and weeks vars now ... */
		$running_day = date('w',mktime(0,0,0,$month,1,$year));
		$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
		$days_in_this_week = 1;
		$day_counter = 0;
		$dates_array = array();

		/* row for week one */
		$calendar.= '<tr class="calendar-row">';

		/* print "blank" days until the first of the current week */
		for($x = 0; $x < $running_day; $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
			$days_in_this_week++;
		endfor;

		/* keep going with days.... */
		for($list_day = 1; $list_day <= $days_in_month; $list_day++):
			$calendar.= '<td class="calendar-day" align="center">';
				/* add in the day number */
				// $calendar.= '<div class="day-number">'.$list_day.'</div> <a href="#"><div class="noof-apn"><h2>'.rand(5, 15).'</h2><span>Appoinments</span> </div></a> ';
				$calendar.= '<div class="day-number">
					</div> <a href="/scheduling/'.$username.'/'.$year.'/'.$month.'/'.$list_day.'"  id='.$list_day.'>
					<div style="position:inherit;"><h2>'.$list_day.'</h2>
					<div class='.$list_day.' style="position:relative;">
					</div></div></a>'
					;
				/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			$calendar.= str_repeat('<p> </p>',2);


			$calendar.= '</td>';

			$calendar.=  "<script type=\"text/javascript\">
				$(\"a#$list_day\").mouseenter(function(){
				var link = $('a#$list_day').attr('href');
				console.log(link);
                       $.ajax({
                       url: link,
               			data: {},
               			type:'GET',
               			dataType: 'html',
               error: function(){
                   alert(\"Data not found\");
               },
               success:function(data){
               //alert('success');
//               $(\".$list_day\").css(\"display\", \"block\")});
				 $(\".$list_day\").empty();
               $(\".$list_day\").append(data);
               $(\".$list_day\").css(\"display\", \"block\");
//               $(\".$list_day\").fadeIn(1000);

               		} // End of success function of ajax form
           		}); // End of ajax call
				});
				$(\"a#$list_day\").mouseleave(function(){
					$(\".$list_day\").css(\"display\", \"none\");
//					$(\".$list_day\").fadeOut(1000);
					$(\".$list_day\").empty();

				});


//				$(\"#$list_day\").mouseover(function(e){
//					e.preventDefault();
//					$.get('/test' function(data){
//						console.log(data);
//					});
//				});
			</script>";




			if($running_day == 6):
				$calendar.= '</tr>';
				if(($day_counter+1) != $days_in_month):
					$calendar.= '<tr class="calendar-row">';
				endif;
				$running_day = -1;
				$days_in_this_week = 0;
			endif;
			$days_in_this_week++; $running_day++; $day_counter++;
		endfor;

		/* finish the rest of the days in the week */
		if($days_in_this_week < 8):
			for($x = 1; $x <= (8 - $days_in_this_week); $x++):
				$calendar.= '<td class="calendar-day-np"> </td>';
			endfor;
		endif;

		/* final row */
		$calendar.= '</tr>';

		/* end the table */
		$calendar.= '</table>';



		
		/* all done, return result */
		return $calendar;
	}
	
?>
@extends('layouts.header_loggedin')
	@section('drop')
		<div id="full-body">
			<div class="full-body-conteiner">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-3">
							<div class="pof-sidenav">
								@if($user->propic)
								<div class="pof-img">
									<img src="/{{ $user->propic }}">
								</div>
								@endif
								@if(!$user->propic)
								<div class="pof-img">
									<img src="images/pro-holder.jpg">
								</div>
								@endif
									<ul><li>
											<a href="{{ url('/homepage') }}">Home</a></li><li>
											<a href="{{ url('/set-appointment') }}">Set Office hour</a></li><li>
											<a href="{{ url('/doc-profile') }}">Profile</a></li><li>
											<a href="{{ url('/doc-profile-edit') }}">Edit Profile</a></li><li>
											<a href="{{ url('/doc-blog') }}">Blog</a></li><li>
											<a href="{{ url('/doc-comments') }}">Comments</a></li><li>
											<a href="{{ url('/doc-account-settings') }}">Account Settings</a></li><li>
											<a href="{{ url('/doctor-calendar') }}">Schedule Calendar</a></li><li>
											<a href="{{ url('/auth/logout') }}">Logout</a>
										</li></ul>
							</div>
						</div>
						{{--<div id="container">--}}
							{{--<h1>jQuery Tutorial - Pop-up div on hover</h1>--}}
							{{--<p>--}}
								{{--To show hidden div, simply hover your mouse over--}}
								{{--<a href="#" id="trigger">this link</a>.--}}
							{{--</p>--}}

							{{--<!-- HIDDEN / POP-UP DIV -->--}}


						{{--</div>--}}


						<div class="col-xs-12 col-sm-8 col-md-9">
							



							<div class="top-pof-head">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="title mt-7px" ><a href="#">View Appointments</a></div>

									</div>

									<div class="col-xs-12 col-sm-6 col-md-6">
										<ul class="view-type-link">
											<li><a class="current" href="{{ url('/homepage') }}" rel="tooltip" title="Day View"><img src="/images/day-view.png" alt=""><span></span></a></li><li>
												<a href="{{ url('/doctor-week') }}" rel="tooltip" title="Week View"><img src="/images/week-view.png" alt=""><span></span></a></li><li>
												<a href="{{ url('/doctor-calendar') }}" rel="tooltip" title="Month View"><img src="/images/month-view.png" alt=""><span></span></a></li></ul>
									</div>
								</div>								
							</div>

							

							<div class="pof-content">
								<div class="pof-header3">
									<div class="title">Schedule of {{ $month_format }}
									<p><a href="{{ action('CalendarController@prev_month', [$month, $year]) }}" style="float:left; padding-left:10px;" rel="tooltip" title="Previous month">Back in time</a>
										<a href="{{ action('CalendarController@next_month', [$month, $year]) }}" style="float:right; padding-right:10px;" rel="tooltip" title="Next month">To the future</a></p></div>
								</div>
								<div class="pof-desc">
									<div class="clearfix"></div>

									<div class="monthview-cal-container">
										<?php 
											echo draw_calendar( $user->username, $month ,  $year );
										?>										
									</div>
								</div><!-- End .pof-desc -->
							</div><!-- End .pof-content -->
							<script type="text/javascript">
								$(function(){
									$('[rel="tooltip"]').tooltip({placement: 'top'});
								});
							</script>



							</div><!-- End .pof-content -->
						</div><!-- End .col -->
					</div><!-- End .row -->
				</div><!-- End .conteiner -->
			</div><!-- End full-body-conteiner -->




@stop