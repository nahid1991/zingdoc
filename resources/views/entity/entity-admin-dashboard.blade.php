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
										<a href="{{ url('/entity-sign-doctor') }}">Sign up Doctor</a></li><li>
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

									</div><!-- End edashboard -->
									<div class="doctorsignup-holder add-doctor">
											<a href="#" id="toggle-btn" href="#">ADD DOCTOR</a>
												<div id="toggle-content" class="add_form_container">
													<div class="arrow"></div>
													{!! Form::open(['url' => '/add-doctor']) !!}
													<div class="add_form">
														<div class="form-cont">
															
															<label>Select Doctor</label>
															 <select name="username">
																<option value="">Select</option>
																@foreach($doctors as $doctor)
																	@if(!$doctor->ad_user)
																		<option name="" value="{{ $doctor->username }}">{{ $doctor->name }}</option>
																	@endif
																@endforeach
															</select>
														</div>

														<div class="ft">										
															<input type="submit" value="Add"/>
														</div>
													</div><!-- END .add_form -->
													{!! Form::close() !!}

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
									</div>
									<br/><br/>
									<div class="doctorsignup-holder add-doctor">
										<a href="#" id="toggle-btn2" href="#">REGISTER DOCTOR</a>
										<div id="toggle-content2" class="add_form_container">
											<div class="arrow"></div>
											{!! Form::open(['url' => '/doctor-register']) !!}
											<div class="add_form">
												<div class="form-cont">
													<div class="clearfix"></div>
													<br/>
													<input type="hidden" name="admin_name" value="{{$user->name}}">
													<input type="hidden" name="user_type" value="1"/>
													<input type="hidden" name="agreed" value="1"/>
													<input type="hidden" name="password" value="zingdoc"/>
													<input type="hidden" name="admin_user" value="{{$user->username}}"/>
													<input type="text" name="name" placeholder="Full Name" required
														   style="min-width:100%;border-radius:5px;padding:10px;"/><br/><br/>
													<input type="text" name="email" placeholder="Email" required
														   style="min-width:100%;border-radius:5px;padding:10px;"/><br/><br/>
													<input type="text" name="username" placeholder="Username" required
														   style="min-width:100%;border-radius:5px;padding:10px;"/><br/><br/>
													<input type="text" name="phone_number" placeholder="Phone Number" required
														   style="min-width:100%;border-radius:5px;padding:10px;"/><br/><br/>

													<select name="speciality" required>
														<option value="">DOCTOR'S SPECIALITY</option>
														<option value="cardiologist">Cardiologist</option>
														<option value="opthalmist">Opthalmist</option>
														<option value="pediatrist">Pediatrist</option>
														<option value="dentist">Dentist</option>
													</select>
													<br/><br/>
													<input type="text" required name="location" placeholder="Location"
														   style="min-width:100%;border-radius:5px;padding:10px;"/><br/><br/>
													<input type="text" name="practice_name "placeholder="Entry or Practice Name" required
														   style="min-width:100%;border-radius:5px;padding:10px;"/>
												</div>

												<div class="ft">
													<input type="submit" value="Add"/>

												</div>
											</div><!-- END .add_form -->
											{!! Form::close() !!}


											<div class="clearfix"></div>
										</div>
									</div>
									<script type="text/javascript">
										$('#toggle-btn2').click(function() {
											if ($(this).hasClass("current")) {
												$(this).removeClass("current");
											}
											else {$(this).addClass("current");}

											$('#toggle-content2').slideToggle(500);
										});
									</script>

								</div>
							</div><!-- End .pof-content -->
						</div><!-- End .col -->
					</div><!-- End .row -->
				</div><!-- End .conteiner -->
			</div><!-- End full-body-conteiner -->
@stop