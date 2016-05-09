@extends('layouts.header_loggedin')
	@section('drop')
		<div id="full-body">
			<div class="full-body-conteiner">
				<div class="container">
					<div class="row">
						<!--<?php
							//$side_link1 = 'class="current"';
							//include 'includes/entity-admin-sidebar.php';
						?>-->

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
							<div class="pof-content">
								<div class="pof-header3 epof-header4">
									<div class="title">DOCTOR LIST</div>
								</div>
								<div class="pof-desc">
								   <div class="edashboard">
									<div class="entity-dashborad-caresoul">
										<div class="doctor-caresoul-box">	
											<a href="doctor-admin-appointments-day-view.php">
											<div class="slide doctor_profile_img">
													<div class="doctor_profile_img">
													<img src="images/doctor-profile1.jpg"/>
													<div class="doctor-profile-title">
														<h2>Dr.Fedrick Solomon</h2>
														<p>Dermotologist/Cosmotologist</p>
													</div>
													</div>
												</div>
											</div>												
											</a>
											<a href="doctor-admin-appointments-day-view.php">
											<div class="doctor-caresoul-box">	
												<div class="slide doctor_profile_img">
													<img src="images/doctor-profile2.jpg"/>
													<div class="doctor-profile-title">
														<h2>Dr.Alla Dorman</h2>
														<p>Dentist</p>
													</div>
												</div>
											</div>
											</a>
											<a href="doctor-admin-appointments-day-view.php">
											<div class="cdoctor-caresoul-box">	
												<div class="slide doctor_profile_img">
													<img src="images/doctor-profile3.jpg"/>
													<div class="doctor-profile-title">
														<h2>Dr.Eugene Khaytsin</h2>
														<p>Alergist</p>
													</div>
												</div>
											</div>
											</a>
											<a href="doctor-admin-appointments-day-view.php">
											<div class="cdoctor-caresoul-box">	
												<div class="slide doctor_profile_img">
													<img src="images/doctor-profile3.jpg"/>
													<div class="doctor-profile-title">
														<h2>Dr.Eugene Khaytsin</h2>
														<p>Alergist</p>
													</div>
												</div>
											</div>
											</a>
										</div>
									</div><!-- End edashboard -->
									<div class="doctorsignup-holder add-doctor">
											<a href="#" id="toggle-btn" href="#">ADD DOCTOR</a>
												<div id="toggle-content" class="add_form_container">
													<div class="arrow"></div>
													<div class="add_form">
														<div class="form-cont">
															<div class="clearfix"></div>
															
															<label for="">Select Doctor</label>
															 <select>											
																<option value="">Select</option>	
																<option value="">Dr.Eugene Khaytsin</option>											
																<option value="">Dr.Alla Dorman</option>											
																<option value="">Dr.Fedrick Solomon</option>											
															</select>														
														</div>

														<div class="ft">										
															<input type="submit" value="Add"/>
															<div class="clearfix"></div>
														</div>
													</div><!-- END .add_form -->
												<div class="clearfix"></div>	
												</div><!-- END .add_form_container  -->										
												<script type="text/javascript">
												    $('#toggle-btn').click(function() {
												    	if ($(this).hasClass("current")) {
															$(this).removeClass("current");
												    	}
												    	else {$(this).addClass("current");}
												    	
												    	$('#toggle-content').slideToggle(500);
												    });
												</script>	
												<div class="clearfix"></div>	
									</div>
								</div>
							</div><!-- End .pof-content -->
						</div><!-- End .col -->
					</div><!-- End .row -->
				</div><!-- End .conteiner -->
			</div><!-- End full-body-conteiner -->
@stop