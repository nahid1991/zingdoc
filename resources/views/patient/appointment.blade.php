@extends('layouts.header_loggedin')
	@section('drop')
		<div id="full-body">
			<div class="doctor-signup margin-top10">
				<div class="container">
					<div class="row">
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
							<div class="appt-time-block">
			                    <p class="appt-date">
			                        <i class="icon icon-calendar icon-2x"></i> <span class="strong">Feb 10, 2014</span>
			                    </p>
			                    <p class="appt-time">
			                        <i class="icon icon-time icon-2x"></i> At <span class="strong">10:30 AM</span>
			                    </p>
				                <div class="clearfix"></div>
				                <a href="doctor-profile.php">Change Date &amp; Time</a>
				                <div class="clearfix"></div>
				            </div>
							<div class="doctor-short-profile">
								<div class="img-holder"><img src="images/doctor-profile.jpg"/></div>
								<div class="desc">									
									<h5>Dr. Alla Dorfman</h5>
									<p>DDS&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Dentist</p>
									<p class="adr">
										<b>Tribeca Dental Care</b><br/>
										#A-102, Marve Link Apartment, Marve Road Forest Ave Ridgewood<br> NY 11385
									</p>
								</div>
							</div>
						</div>
						<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
							<div class="signup-text">
								<h5>Get An Appointment</h5>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat laoreet dolore magna aliquam erat volutpat.</p>
							</div>
							<form name="" id="contact-form" action="search.html" method="get">
								<div class="doctorsignup-holder">
									 <input name="country" required type="text" class="form-control"  placeholder="Patient / Visitor Name"/>
								</div>
								<div class="doctorsignup-holder">
									 <input name="country" required type="text" class="form-control"   placeholder="Appointment Reason"/>
								</div>
								<div class="doctorsignup-holder">
									 <input name="country" required type="text" class="form-control"   placeholder="Email"/>
								</div>
								<div class="doctorsignup-holder">
									 <input name="country" required type="text" class="form-control"   placeholder="Mobile"/>
									 <div class="info-text">You will receive an SMS with a verification code on this number.</div>
								</div>
								<div class="doctorsignup-button">
										<a href="#">SUBMIT</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div><!-- End #doctor-signup -->
@stop