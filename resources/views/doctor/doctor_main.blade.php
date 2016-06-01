@extends('layouts.header_loggedin')
	@section('drop')
		<div id="full-body">
			<div class="full-body-conteiner">
				<div class="container">
					<div class="row">
						<!--<?php
							//$side_link1 = 'class="current"';
							//include 'includes/doctor-admin-sidebar.php';
						?>-->
						
						<div class="col-xs-12 col-sm-4 col-md-3">
							<div class="pof-sidenav">
								@if($user->propic)
								<div class="pof-img">
									<img src="{{ $user->propic }}">
								</div>
								@endif
								@if(!$user->propic)
								<div class="pof-img">
									<img src="images/pro-holder.jpg">
								</div>
								@endif
								<ul><li>
										<a href="{{ url('/homepage') }}">Appointments</a></li><li>
										<a href="{{ url('/set-appointment') }}">Set Office hour</a></li><li>
										<a href="{{ url('/doc-profile') }}">Profile</a></li><li>
										<a href="{{ url('/doc-profile-edit') }}">Edit Profile</a></li><li>
										<a href="{{ url('/doc-blog') }}">Blog</a></li><li>
										<a href="{{ url('/doc-comments') }}">Comments</a></li><li>
										<a href="{{ url('/doc-account-settings') }}">Account Settings</a></li><li>
										<a href="{{ url('/auth/logout') }}">Logout</a></li><li>
										<a href="{{ url('/doctor-calendar') }}" rel="tooltip" title="Month View">Schedule Calendar</a></li></ul>
							</div>
						</div>




						<div class="col-xs-12 col-sm-8 col-md-9">
							<div class="top-pof-head">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="title mt-7px">View Appointments</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6">
										<ul class="view-type-link">
											{{--<li><a class="current" href="{{ url('/homepage') }}" rel="tooltip" title="Day View"><img src="/images/day-view.png" alt=""><span></span></a></li><li>--}}
												<!-- <a href="{{ url('/doctor-calendar') }}" rel="tooltip" title="Week View"><img src="/images/week-view.png" alt=""><span></span></a></li><li> -->
												{{--<a href="{{ url('/doctor-calendar') }}" rel="tooltip" title="Month View"><img src="/images/month-view.png" alt=""><span></span></a></li>--}}
										</ul>
									</div>
								</div>								
							</div>
							

							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="pof-content">
										<div class="pof-header3">
											<div class="title">Today's Appointment</div>
										</div>
										<div class="pof-desc">
											<ul class="appoin-list">
												@foreach($user_info as $u_i)
												@if($u_i->approved != 2)
												<li>
													<div class="s-left">
														<h2><a href="{{ action('DoctorController@patient_profile', [$u_i->patient_user]) }}">{{ $u_i->patient_name }}</a></h2>
														<p>{{ $u_i->issues }}</p>
													</div><div class="s-right">
														<div class="time">{{ $u_i->appointed_at }}</div>
														<ul class="action">
															<li><a href="{{  action('DoctorController@doc_checked', [$u_i->patient_user, $u_i->patient_name, $u_i->appointment_time])  }}" 
																rel="tooltip" title="Checked"><i class="icon icon-arrow-right"></i></a></li>
															<!-- <li><a href="#" rel="tooltip" title="Check Out"><i class="icon icon-arrow-left current"></i></a></li> -->
															
														</ul>
													</div>
												</li>
												@endif
												@endforeach
											</ul>
										</div><!-- End .pof-desc -->
									</div><!-- End .pof-content -->
								</div>

								<div class="col-xs-12 col-sm-6 col-md-6">
									{{--<div class="patient-details">--}}
										{{--<div class="single-pof-pic">--}}
											{{--<img src="/images/patient-pof-pic.jpg" alt=""/>--}}
										{{--</div>--}}
										{{--<div class="single-pof-dsc">--}}
											{{--<h2>Mic A Ting</h2>--}}
											{{--<h3>Blood Pressure Issues</h3>--}}
											{{--<p>--}}
												{{--DOB: 12 -  25 - 1945--}}
												{{--<br>--}}
												{{--Age: 68 Years--}}
												{{--<br>--}}
												{{--Tel.: 2514- 2541-2516--}}
											{{--</p>											--}}
										{{--</div>--}}
									{{--</div>--}}
									<div class="pof-content">
									<table class="schedule">
										{{--@foreach($doc_timing as $d_t)--}}
											{{--@if($d_t)--}}
												{{--<tr>--}}
													{{--<td>{{ $d_t->day }}</td>--}}
													{{--<td> <p>{{ $d_t->start_interval }} - {{ $d_t->end_interval }} - @if($d_t->type == 'monthly')--}}
																{{--For this month.--}}

															{{--@elseif($d_t->type == 'yearly')--}}
																{{--For this year.--}}

															{{--@else--}}
																{{--For this days.--}}

														{{--@endif--}}

														{{--<p><a class="close"--}}
															  {{--href="{{ action('CalendarController@sche_del', [$d_t->date, $d_t->schedule_date, $d_t->username]) }}">Remove for this day</a>--}}
															{{--<a class="close"--}}
															   {{--href="{{ action('CalendarController@sche_del_plan', [$d_t->date, $d_t->username, $d_t->type]) }}">Remove total plan</a>--}}
															{{--@if($d_t->type == 'yearly')--}}
																{{--<a class="close"--}}
																   {{--href="{{ action('CalendarController@sche_del_month', [$d_t->date, $d_t->username, $d_t->type]) }}">Remove only for this month</a>--}}
															{{--@endif--}}
														{{--</p><br>--}}
													{{--</td>--}}
												{{--</tr>--}}
												{{--<br>--}}
												{{--<div class="clearfix"></div>--}}
											<tr>
												
											</tr>


											{{--@endif--}}
										{{--@endforeach--}}

									</table>
									</div>
								</div>
							</div>

						</div><!-- End .col -->
					</div><!-- End .row -->
				</div><!-- End .conteiner -->
			</div><!-- End full-body-conteiner -->


							<script type="text/javascript">
							    $(function(){
							       $('[rel="tooltip"]').tooltip({placement: 'top', html: true});
							    });
							</script>
	@stop