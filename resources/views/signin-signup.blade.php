@extends('layouts.header')
	@section('drop')
		<!-- <div id="banner-holder">
			<div class="page-heading">
				login or create an account
			</div>
			<img src="/images/banner.jpg"/>
		</div> --><!-- End #banner-holder -->
		<div id="full-body">
			<div class="tabs-content">
					<!-- <ul class="nav nav-tabs tab-nav" id="myTab">
					  <li><a href="#home" data-toggle="tab">PATIENTS</a></li>
					  <li><a href="#profile" data-toggle="tab">DOCTORS</a></li>
					</ul> -->
					<div class="tab-content">
						<ul class="nav nav-tabs tab-nav" id="myTab">
					  <li class="active"><a href="#home" data-toggle="tab">SIGN IN</a></li>
					  <li><a href="#home" data-toggle="tab">:)</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane patients-pane active " id="home">
								<div class="container">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">	
											<div class="row">
													<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">	
													<div class="patient-login">
															<h5>Login</h5>
															<p>If you have an account with us, please log in.</p>
															{!!Form::open(['url'=>'/auth/login', 'id'=>'contact-form'])!!}
															<div class="patient-holder doctor-area">
																{!! Form::text('email',Input::old('email'),['class'=>'form-control', 'placeholder'=>'EMAIL']) !!}
																 <!-- <input name="country" required type="text" class="form-control"   placeholder="EMAIL"/> -->
															</div>
															<div class="patient-holder doctor-area">
																{!! Form::password('password',['class'=>'form-control', 'placeholder'=>'PASSWORD']) !!}
																 <!-- <input name="country" required type="text" class="form-control"   placeholder="PASSWORD"/> -->
															</div>
															<div class="doctorsignup-button">
																{!!Form::submit('LOGIN')!!}
																<!-- <a href="doctor-admin-appointments-day-view.php">LOGIN</a> -->
															</div>
															<div class="clearfix"></div>
															<a class="forgot-pass" href="forgot-password.php">Forgot Password?</a>
															</div>
															{!!Form::close()!!}
												
												</div>
												<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">	
													<div class="patient-login right-text">
														<h5>Create An Account</h5>
														<p>
															Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam</p>
														<div class="login-holder doctors-holder">
															<a class="dropdown-toggle" href="#popup1" href="{{ url('/sign_up_patient') }}">SIGN UP</a>
															<!-- <a class="dropdown-toggle" href="#popup1">Sign Up</a> -->
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div><!-- End .tab-pane -->
							
			</div>
	@stop