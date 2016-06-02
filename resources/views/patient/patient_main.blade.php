@extends('layouts.header_loggedin')
	@section('drop')
		<div id="full-body">
			<div class="full-body-conteiner">
				<div class="container">
					<div class="row">
						<!--<?php
							//$side_link1 = 'class="current"';
							//include 'includes/patient-admin-sidebar.php';
						?>-->
						<div class="col-xs-12 col-sm-4 col-md-3">
							<div class="pof-sidenav">
								<div class="pof-img">
									<img src="images/patient-profile.jpg" height="150px" width="150px">
								</div>
								<ul><li>
										<a href="/search/{{$time}}">Find Doctor</a></li><li>
										<a href="{{ url('/homepage') }}">Appointments</a></li><li>
										<a href="{{ url('/patient-comments') }}">Comments</a></li><li>
										<a href="{{ url('/patient-profile') }}">Profile</a></li><li>
										<a href="{{ url('/auth/logout') }}">Logout</a></li></ul>
							</div>
						</div><!-- End .col -->

						<div class="col-xs-12 col-sm-8 col-md-9">
							<div class="pof-content">
								<div class="pof-header2">
									<div class="title"><h2>{{ $user->name }}</h2></div>
									<div class="clearfix"></div>
								</div>
								<div class="pof-desc padding">									
									<div class="pofeidt">
										<div class="pof-edittitle">
											<h5>Appointments</h5>
										</div>

										<div class="row">
											<div class="col-xs-12 col-sm-6 col-md-6">
												<div class="patient-admin-app-view">								
													<div class="appt-time-block">
									                    <p class="appt-date">
									                        <i class="icon icon-calendar icon-2x"></i> <span class="strong">Jan 21, 2014</span>
									                    </p>
									                    <p class="appt-time">
									                        <i class="icon icon-time icon-2x"></i> At <span class="strong">10:30 AM</span>
									                    </p>
										                <div class="clearfix"></div>
										            </div>
													<div class="doctor-short-profile">
														<div class="img-holder"><img src="images/doctor-profile.jpg"></div>
														<div class="desc">									
															<h5>Dr. Alla Dorfman</h5>
															<p>DDS&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Dentist</p>
															<p><b>Blood Pressure Issues</b></p>
														</div>
													</div>													
												</div><!-- patient-admin-app-view End -->			
											</div>
											<div class="col-xs-12 col-sm-6 col-md-6">
												<div class="patient-admin-app-view">								
													<div class="appt-time-block">
									                    <p class="appt-date">
									                        <i class="icon icon-calendar icon-2x"></i> <span class="strong">Feb 10, 2014</span>
									                    </p>
									                    <p class="appt-time">
									                        <i class="icon icon-time icon-2x"></i> At <span class="strong">10:30 AM</span>
									                    </p>
										                <div class="clearfix"></div>
										            </div>
													<div class="doctor-short-profile">
														<div class="img-holder"><img src="images/doctor.jpg"></div>
														<div class="desc">									
															<h5>Dr. Nice Jekob</h5>
															<p>DDS&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Dentist</p>
															<p><b>Blood Pressure Issues</b></p>
														</div>
													</div>													
												</div><!-- patient-admin-app-view End -->			
											</div>
										</div>

									</div><!-- End .pofedit -->
								</div>
							</div><!-- End .pof-content -->
						</div><!-- End .col -->

					</div><!-- End .row -->
				</div><!-- End .conteiner -->
			</div><!-- End full-body-conteiner -->
@stop