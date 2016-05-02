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
							<div class="signup-text">
								<h5>Patient Sign Up</h5>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat laoreet dolore magna aliquam erat volutpat.</p>
							</div>
							<form name="" id="contact-form" action="search.html" method="get">
								<div class="doctorsignup-holder">
									 <input name="country" required type="text" class="form-control"   placeholder="FULL NAME"/>
								</div>
								<div class="doctorsignup-holder">
									 <input name="country" required type="text" class="form-control"   placeholder="PASSWORD"/>
								</div>
								<div class="doctorsignup-holder">
									 <input name="country" required type="text" class="form-control"   placeholder="CONFIRM PASSWORD"/>
								</div>
								<div class="doctorsignup-holder">
									 <input name="country" required type="text" class="form-control"   placeholder="LOCATION/ZIPCODE"/>
								</div>
								<div class="doctorsignup-holder">
									 <input name="country" required type="text" class="form-control"   placeholder="EMAIL"/>
								</div>
								<div class="doctorsignup-button">
										<a href="#">SIGN UP</a>
								</div>
							</form>
						</div>
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
							<div class="doctor-login-right">
									<h5>Patient Login</h5>
									<p>If You have an account with us, please log in.</p>
								<form name="" id="contact-form" action="search.html" method="get">
								<div class="doctorsignup-holder doctor-login">
									 <input name="country" required type="text" class="form-control"   placeholder="Username"/>
								</div>
								<div class="doctorsignup-holder doctor-login">
									 <input name="country" required type="text" class="form-control"   placeholder="Password"/>
								</div>
								<div class="doctorslogin-button">
										<a href="patient-admin-dashboard.php">LOGIN</a>
								</div>
							</form>
							</div>
						</div>
					</div>
				</div>
			</div><!-- End #doctor-signup -->
	@stop