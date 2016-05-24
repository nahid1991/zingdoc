@extends('layouts.header_loggedin')
	@section('drop')
		<div id="full-body">
			<div class="full-body-conteiner">
				<div class="container">

					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-3">
							<div class="pof-sidenav">
								<div class="cover-pic">
									<img src="/images/clinic-profile.jpg">
									<div class="pof-img">
										<img src="/images/profile-pic.jpg"/>
									</div>									
								</div>
								<ul><li><a href="{{ url('/homepage') }}">Entity Dashboard</a></li><li>
										<a href="{{ url('/entity-appointments') }}">Appointment</a></li><li>
										<a href="{{ url('/entity-profile') }}">Profile</a></li><li>
										<a href="{{ url('/entity-profile-edit') }}">Edit Profile</a></li><li>
										<a href="{{ url('/entity-account-settings') }}">Account Settings</a></li><li>
										<a href="{{ url('/auth/logout') }}">Logout</a></li></ul>
							</div>
						</div><!-- End .col -->
						
						<div class="col-xs-12 col-sm-8 col-md-9">
							<div class="top-epof-head">
								<div class="row">
									<div class="col-xs-12 col-sm-5 col-md-5">
										<div class="edpof-left">
											<div class="doctorsignup-holder edit-holder epof-editholder">
												<h1>{{ $user->name }}</h1>
												
												<label for="">Select Doctor</label>
												 {!!Form::open(['url'=>'/find-doc/', 'id'=>'contact-form'])!!}
												 <select name="doctor_user">
												 	<option value="">Select</option>
												 @foreach($listed_doc_pat as $ldp)
													<option value="{{ $ldp->doctor_user }}">{{ $ldp->doctor_name }}</option>
												 @endforeach											
												</select>
													{!!Form::submit('Go')!!}
													<!-- <a href="doctor-admin-appointments-day-view.php">LOGIN</a> -->
												{!!Form::close()!!}
												
											</div>

										</div>
									</div>
									<div class="col-xs-12 col-sm-7 col-md-7 edpof-right">
											<div  class="edshedule-left">

												<div class="epof-title"><h5>{{ $doc_info->name }}</h5><p>DDS  &nbsp;  |  &nbsp; {{ $doc_info->speciality }}</p></div>
												<div class="epof-shedule">
													@foreach($doc_schedule as $d_s)
													<div class="shedule edshedule">
														{{ $d_s->days }} {{ $d_s->starting_time }} - {{ $d_s->ending_time }}
													</div>
													
													@endforeach
												</div>
											</div>
											@if($doc_info->propic)
											<div class="edpof-image"><img src="/{{ $doc_info->propic }}"></div>
											@endif
											@if(!$doc_info->propic)
											<div class="edpof-image"><img src="/images/pro-holder.jpg"></div>
											@endif
									</div>
								</div>								
							</div>
							
							<script type="text/javascript">
							    $(function(){
							       $('[rel="tooltip"]').tooltip({placement: 'top'});
							    });
							</script>


							<div class="top-pof-head">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="title mt-7px">View Appointments</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6">
										<ul class="view-type-link">
											<li><a class="current" href="entity-admin-appointments-view.php" rel="tooltip" title="Day View"><img src="/images/day-view.png" alt=""><span></span></a></li><li>
												<!-- <a href="entity-admin-appointments-week-view.php" rel="tooltip" title="Week View"><img src="/images/week-view.png" alt=""><span></span></a></li><li> -->
												<a href="{{ action('EntityController@calendar', [$doc_info->username]) }}" rel="tooltip" title="Month View"><img src="/images/month-view.png" alt=""><span></span></a></li>
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
												@foreach($patient_list as $p_l)
												@if($p_l->approved != 1)
												<li>
													<div class="s-left">
														<h2>{{ $p_l->patient_name }}</h2>
														<p>Apppointment requested by: {{ $p_l->patient_user }}</p>
														<p>{{ $p_l->issues }}</p>
													</div><div class="s-right">
														<div class="time">{{ $p_l->appointed_at }}</div>
														<ul class="action">
															<li><a href="{{  action('EntityController@approve', [$doc_info->username, $p_l->patient_name, $p_l->appointment_time])  }}" rel="tooltip" title="Check In"><i class="icon icon-arrow-right"></i></a></li>
															<!-- <li><a href="#" rel="tooltip" title="Check Out"><i class="icon icon-arrow-left current"></i></a></li> -->
															<li><a href="{{  action('EntityController@cancel', [$doc_info->username, $p_l->patient_name])  }}" rel="tooltip" title="Cancel"><i class="icon icon-times"></i></a></li>
														</ul>
													</div>
												</li>
												@endif
												@endforeach
												
												<!-- <li>
													<div class="s-left">
														<h2>Bismith Jonh</h2>
														<p>Diabetic Issues</p>
													</div><div class="s-right">
														<div class="time">10:30 AM - 11:00 AM</div>
														<ul class="action">
															<li><a href="#" rel="tooltip" title="Check In"><i class="icon icon-arrow-right"></i></a></li>
															<li><a href="#" rel="tooltip" title="Check Out"><i class="icon icon-arrow-left current"></i></a></li>
															<li><a href="#" rel="tooltip" title="Cancel"><i class="icon icon-times"></i></a></li>
														</ul>
													</div>
												</li><li>
													<div class="s-left">
														<h2>Bismith Jonh</h2>
														<p>Diabetic Issues</p>
													</div><div class="s-right">
														<div class="time">11:00 AM  - 12:00 PM</div>
														<ul class="action">
															<li><a href="#" rel="tooltip" title="Check In"><i class="icon icon-arrow-right"></i></a></li>
															<li><a href="#" rel="tooltip" title="Check Out"><i class="icon icon-arrow-left"></i></a></li>
															<li><a href="#" rel="tooltip" title="Cancel"><i class="icon icon-times current"></i></a></li>
														</ul>
													</div>
												</li><li class="current">
													<div class="s-left">
														<h2>Mic A Ting</h2>
														<p>Diabetic Issues</p>
													</div><div class="s-right">
														<div class="time">12 PM  - 12:30 PM</div>
														<ul class="action">
															<li><a href="#" rel="tooltip" title="Check In"><i class="icon icon-arrow-right current"></i></a></li>
															<li><a href="#" rel="tooltip" title="Check Out"><i class="icon icon-arrow-left"></i></a></li>
															<li><a href="#" rel="tooltip" title="Cancel"><i class="icon icon-times"></i></a></li>
														</ul>
													</div>
												</li><li>
													<div class="s-left">
														<h2>Bismith Jonh</h2>
														<p>Diabetic Issues</p>
													</div><div class="s-right">
														<div class="time">2:00 PM  - 2:30 PM</div>
														<ul class="action">
															<li><a href="#" rel="tooltip" title="Check In"><i class="icon icon-arrow-right"></i></a></li>
															<li><a href="#" rel="tooltip" title="Check Out"><i class="icon icon-arrow-left"></i></a></li>
															<li><a href="#" rel="tooltip" title="Cancel"><i class="icon icon-times"></i></a></li>
														</ul>
													</div>
												</li><li>
													<div class="s-left">
														<h2>Bismith Jonh</h2>
														<p>Diabetic Issues</p>
													</div><div class="s-right">
														<div class="time">2:30 PM  - 3:30 PM</div>
														<ul class="action">
															<li><a href="#" rel="tooltip" title="Check In"><i class="icon icon-arrow-right"></i></a></li>
															<li><a href="#" rel="tooltip" title="Check Out"><i class="icon icon-arrow-left"></i></a></li>
															<li><a href="#" rel="tooltip" title="Cancel"><i class="icon icon-times"></i></a></li>
														</ul>
													</div>
												</li><li>
													<div class="s-left">
														<h2>Bismith Jonh</h2>
														<p>Diabetic Issues</p>
													</div><div class="s-right">
														<div class="time">3:30 PM - 4:00 PM</div>
														<ul class="action">
															<li><a href="#" rel="tooltip" title="Check In"><i class="icon icon-arrow-right"></i></a></li>
															<li><a href="#" rel="tooltip" title="Check Out"><i class="icon icon-arrow-left"></i></a></li>
															<li><a href="#" rel="tooltip" title="Cancel"><i class="icon icon-times"></i></a></li>
														</ul>
													</div>
												</li> -->
											</ul>
										</div><!-- End .pof-desc -->
									</div><!-- End .pof-content -->
								</div>

								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="patient-details">
										<div class="single-pof-pic">
											<img src="/images/patient-pof-pic.jpg" alt=""/>
										</div>
										<div class="single-pof-dsc">
											<h2>Mic A Ting</h2>
											<h3>Blood Pressure Issues</h3>
											<p>
												DOB: 12 -  25 - 1945
												<br>
												Age: 68 Years
												<br>
												Tel.: 2514- 2541-2516
											</p>											
										</div>
									</div>
								</div>
							</div>

							</div><!-- End .pof-content -->
						</div><!-- End .col -->
					</div><!-- End .row -->
				</div><!-- End .conteiner -->
				
			</div><!-- End full-body-conteiner -->
			
@stop