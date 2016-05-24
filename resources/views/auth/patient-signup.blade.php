@extends('layouts/header')
	@section('drop')
		<div id="banner-holder">
			<div class="page-heading signup-page">
				 create an account
			</div>
			<img src="images/banner.jpg"/>
		</div><!-- End #banner-holder -->
		<div id="full-body">
			<div class="doctor-signup">
				<div class="container">
					<div class="row">
						<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
							@if (Session::has('message'))
   								<div class="alert alert-info">{{ Session::get('message') }}</div>
							@endif
							<div class="signup-text">
								<h5>Patient Sign Up</h5>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat laoreet dolore magna aliquam erat volutpat.</p>
							</div>
							{!!Form::open(['url'=>'/doctor/register', 'id'=>'contact-form'])!!}
							 <input type="hidden" name="_token" value="{{ csrf_token() }}">
							<!-- <form name="" id="contact-form" action="search.html" method="get"> -->
								<div class="doctorsignup-holder">
									{!! Form::text('name',Input::old('name'),['class'=>'form-control', 'placeholder'=>'FULL NAME']) !!}
									<!-- <input name="country" required type="text" class="form-control"   placeholder="FULL NAME"/> -->
								</div>
								<div class="doctorsignup-holder">
									{!! Form::text('email',Input::old('email'),['class'=>'form-control', 'placeholder'=>'EMAIL']) !!}
									 <!-- <input name="country" required type="text" class="form-control"   placeholder="EMAIL"/> -->
								</div>
								<div class="doctorsignup-holder">
									{!! Form::text('username',Input::old('username'),['class'=>'form-control', 'placeholder'=>'USERNAME']) !!}
									 <!-- <input name="country" required type="text" class="form-control"   placeholder="CONFIRM EMAIL"/> -->
								</div>
								<div class="doctorsignup-holder">
									{!! Form::password('password',['class'=>'form-control', 'placeholder'=>'PASSWORD']) !!}
									 <!-- <input name="country" required type="password" class="form-control"   placeholder="PASSWORD"/> -->
								</div>
								<div class="doctorsignup-holder">
									{!! Form::password('password_confirmation',['class'=>'form-control', 'placeholder'=>'CONFIRM PASSWORD']) !!}
									 <!-- <input name="country" required type="password" class="form-control"   placeholder="CONFIRM PASSWORD"/> -->
								</div>
								<div class="doctorsignup-holder">
									{!! Form::text('location',Input::old('location'),['class'=>'form-control', 'placeholder'=>'LOCATION']) !!}
									 <!-- <input name="country" required type="text" class="form-control"   placeholder="PHONE NUMBER"/> -->
								</div>
								
								<input type="hidden" name="user_type" value="2">
								<div class="doctorsignup-holder checkbox-condition">
									<input type="checkbox" name="agreed" value="1"><p>I agree <a href="#">term &amp; condition</a> of the site</p><br/>
								</div>

								<div class="doctorsignup-button">
										<!-- <a href="doctor-admin-view-appointment.php">SIGN UP</a> -->
										{!!Form::submit('SIGN UP')!!}
								</div>
							<!-- </form> -->
							{!! Form::close() !!}
						</div>
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
							<div class="doctor-login-right">
									<h5>Login</h5>
									<p>If You have an account with us, please log in.</p>
								{!!Form::open(['url'=>'/auth/login', 'id'=>'contact-form'])!!}
								<!-- <form name="" id="contact-form" action="search.html" method="get"> -->
								<div class="doctorsignup-holder doctor-login">
									{!! Form::text('email',Input::old('email'),['class'=>'form-control', 'placeholder'=>'EMAIL']) !!}
									 <!-- <input name="country" required type="text" class="form-control"   placeholder="EMAIL"/> -->
								</div>
								<div class="doctorsignup-holder doctor-login">
									 {!! Form::password('password',['class'=>'form-control', 'placeholder'=>'PASSWORD']) !!}
									 <!-- <input name="country" required type="text" class="form-control"   placeholder="Password"/> -->
								</div>
								<div class="doctorsignup-button">
									{!!Form::submit('LOGIN')!!}
										<!-- <a href="doctor-admin-appointments-day-view.php">LOGIN</a> -->
								</div>
								{!!Form::close()!!}
								</div>
							</form>
							</div>
						</div>
					</div>
				</div>
			</div><!-- End #doctor-signup -->
	@stop