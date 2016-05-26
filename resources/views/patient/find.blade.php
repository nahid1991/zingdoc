@extends('layouts.header_loggedin')
	@section('drop')
		<div id="full-body">
			<div class="doctor-list">
				<div class="container">
					<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 ">
						<div class="search-box">
							<span>Refine Your Search</span>
							<div class="search-area">
								<div class="dropdown-holder">
									<select class="select_box" name="roomtype">	
										<option value="">Dentists</option>										
									</select>						  
								</div>
								<div class="dropdown-holder">
									<input type="text" name="lastname" placeholder="New York"/>						  
								</div>
								<div class="dropdown-holder">
									<select class="select_box" name="roomtype">	
										<option value="">Reason for Visit</option>										
									</select>						  
								</div>
								<div class="dropdown-holder">
									<select class="select_box" name="roomtype">	
										<option value="">Gender</option>										
									</select>						  
								</div>
								<div class="dropdown-holder">
									<select class="select_box" name="roomtype">	
										<option value="">Insurance</option>										
									</select>						  
								</div>
								<div class="dropdown-holder">
									<select class="select_box" name="roomtype">	
										<option value="">Language</option>										
									</select>						  
								</div>
								<div class="availability" data-type="availability" id="availabilityFilters">
									<p>Availability</p>
									<div class="btn-group" data-toggle="buttons">
										<label class="btn btn-primary"><input type="radio" name="options" id="option1">Any</label>
										<label class="btn btn-primary"><input type="radio" name="options" id="option2">S</label>
										<label class="btn btn-primary"><input type="radio" name="options" id="option3">M</label>
										<label class="btn btn-primary"><input type="radio" name="options" id="option4">T</label>
										<label class="btn btn-primary"><input type="radio" name="options" id="option5">W</label>
										<label class="btn btn-primary"><input type="radio" name="options" id="option6">T</label>
										<label class="btn btn-primary"><input type="radio" name="options" id="option7">F</label>
										<label class="btn btn-primary"><input type="radio" name="options" id="option8">S</label>
									</div>
									<div class="clearfix"></div>
								</div>
							<div class="search"><a href="">Search</a></div>
						</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-10 col-lg-10 ">
						<div class="doctor-holder">
							<div class="page-title"><span>Doctors in New York</span></div>
							
							<ul class="doctor-details">
								@foreach($doctors as $doctor)
								<li>
										@if($doctor->propic)
										<div class="doctor-img"><img src="/{{ $doctor->propic }}" alt="supposed to be a pic here"/></div>
										@endif
										@if(!$doctor->propic)
										<div class="doctor-img"><img src="/images/pro-holder.jpg" alt="supposed to be a pic here"/></div>
										@endif
										<div class="doctor-name">
											<a href="{{ action('PatientController@docprof', [$doctor->username]) }}"><h2>{{ $doctor->name }}</h2></a>										
											<div class="specialist">{{ $doctor->practice_name }}<br><p>{{ $doctor->location }}</p></div>
										</div>
										<div class="right-area">
											<div class="ratings">
												<h2>{{ $doctor->speciality }}</h2>
												<!-- <ul>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
												</ul> -->
												<!-- <marquee><p><b>5.0</b></p></marquee> -->
												<h5><strong><b><i>Rating: 5.0</i></b></strong></h5>
											</div>
											<div class="booking"><a id="doctor_{{ $doctor->id }}" href="#{{ $doctor->id }}">Get An Appointment</a></div>
										</div>

										<div class="clearfix"></div>										

										<div id="{{ $doctor->username }}" class="search-page">
											<h4>Book an Appointment</h4>
											<p class="ds">Click a time below to book an appointment.</p>					
													
											<div id="{{ $doctor->username }}-slides">
											  <div class="slide">
											  	<div class="appoinment-day">
											  		<table>
											  			<tr>
											  				<th>
												                <div class="header-tile-date-name">Sun</div>
												                <div class="header-tile-date-value">{{ $sun }}</div>
											  				</th>
											  			</tr>
											  			<!-- <tr><td><a href="{{ url('/get-appointment') }}">10:30 am</a></td></tr> -->
											  			@foreach($doctor_info_sun as $doc)
											  			@if($doctor->username == $doc->d_user)
											  			<tr><td><a href="{{ action('ScheduleController@form_patient', [$doc->d_user, $doc->slot_date, $doc->slot]) }}">{{ $doc->slot }}</a></td></tr>
											  			@endif
											  			@endforeach
											  		</table>
											  	</div>
											  </div><!-- End Slide Item -->
											  
											  <div class="slide">
											  	<div class="appoinment-day">
											  		<table>
											  			<tr>
											  				<th>
												                <div class="header-tile-date-name">Mon</div>
												                <div class="header-tile-date-value">{{ $mon }}</div>
											  				</th>
											  			</tr>
											  			@foreach($doctor_info_mon as $doc)
											  			@if($doctor->username == $doc->d_user)
											  			<tr><td><a href="{{ action('ScheduleController@form_patient', [$doc->d_user, $doc->slot_date, $doc->slot]) }}">{{ $doc->slot }}</a></td></tr>
											  			@endif
											  			@endforeach
											  		</table>
											  	</div>
											  </div><!-- End Slide Item -->
											  
											  <div class="slide">
											  	<div class="appoinment-day">
											  		<table>
											  			<tr>
											  				<th>
												                <div class="header-tile-date-name">Tue</div>
												                <div class="header-tile-date-value">{{ $tue }}</div>
											  				</th>
											  			</tr>
											  			@foreach($doctor_info_tue as $doc)
											  			@if($doctor->username == $doc->d_user)
											  			<tr><td><a href="{{ action('ScheduleController@form_patient', [$doc->d_user, $doc->slot_date, $doc->slot]) }}">{{ $doc->slot }}</a></td></tr>
											  			@endif
											  			@endforeach
											  		</table>
											  	</div>
											  </div><!-- End Slide Item -->
											  
											  <div class="slide">
											  	<div class="appoinment-day">
											  		<table>
											  			<tr>
											  				<th>
												                <div class="header-tile-date-name">Wed</div>
												                <div class="header-tile-date-value">{{ $wed }}</div>
											  				</th>
											  			</tr>
											  			@foreach($doctor_info_wed as $doc)
											  			@if($doctor->username == $doc->d_user)
											  			<tr><td><a href="{{ action('ScheduleController@form_patient', [$doc->d_user, $doc->slot_date, $doc->slot]) }}">{{ $doc->slot }}</a></td></tr>
											  			@endif
											  			@endforeach
											  		</table>
											  	</div>
											  </div><!-- End Slide Item -->
											  
											  <div class="slide">
											  	<div class="appoinment-day">
											  		<table>
											  			<tr>
											  				<th>
												                <div class="header-tile-date-name">Thu</div>
												                <div class="header-tile-date-value">{{ $thu }}</div>
											  				</th>
											  			</tr>
											  			@foreach($doctor_info_thu as $doc)
											  			@if($doctor->username == $doc->d_user)
											  			<tr><td><a href="{{ action('ScheduleController@form_patient', [$doc->d_user, $doc->slot_date, $doc->slot]) }}">{{ $doc->slot }}</a></td></tr>
											  			@endif
											  			@endforeach
											  		</table>
											  	</div>
											  </div><!-- End Slide Item -->
											  
											  <div class="slide">
											  	<div class="appoinment-day">
											  		<table>
											  			<tr>
											  				<th>
												                <div class="header-tile-date-name">Fri</div>
												                <div class="header-tile-date-value">{{ $fri }}</div>
											  				</th>
											  			</tr>
											  			@foreach($doctor_info_fri as $doc)
											  			@if($doctor->username == $doc->d_user)
											  			<tr><td><a href="{{ action('ScheduleController@form_patient', [$doc->d_user, $doc->slot_date, $doc->slot]) }}">{{ $doc->slot }}</a></td></tr>
											  			@endif
											  			@endforeach
											  		</table>
											  	</div>
											  </div><!-- End Slide Item -->
											  
											  <div class="slide">
											  	<div class="appoinment-day">
											  		<table>
											  			<tr>
											  				<th>
												                <div class="header-tile-date-name">Sat</div>
												                <div class="header-tile-date-value">{{ $sat }}</div>
											  				</th>
											  			</tr>
											  			@foreach($doctor_info_sat as $doc)
											  			@if($doctor->username == $doc->d_user)
											  			<tr><td><a href="{{ action('ScheduleController@form_patient', [$doc->d_user, $doc->slot_date, $doc->slot]) }}">{{ $doc->slot }}</a></td></tr>
											  			@endif
											  			@endforeach
											  		</table>
											  	</div>
											  </div><!-- End Slide Item -->

											  <!--<div class="slide">
											  	<div class="appoinment-day">
											  		<table>
											  			<tr>
											  				<th>
												                <div class="header-tile-date-name">Sun</div>
												                <div class="header-tile-date-value">16 FEB</div>
											  				</th>
											  			</tr>
											  			<tr><td><a href="get-an-appoinment.php">10:30 am</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">11:30 am</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">12:30 pm</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">1:30 pm</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">2 pm</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">2:30 pm</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">3 pm</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">4 pm</a></td></tr>
											  		</table>
											  	</div>
											  </div>--><!-- End Slide Item -->
											  
											  <!-- <div class="slide">
											  	<div class="appoinment-day">
											  		<table>
											  			<tr>
											  				<th>
												                <div class="header-tile-date-name">Mon</div>
												                <div class="header-tile-date-value">17 FEB</div>
											  				</th>
											  			</tr>
											  			<tr><td><a href="get-an-appoinment.php">12 am</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">1 pm</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">2 pm</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">3 pm</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">4 pm</a></td></tr>
											  		</table>
											  	</div>
											  </div> --><!-- End Slide Item -->
											  
											  <!-- <div class="slide">
											  	<div class="appoinment-day">
											  		<table>
											  			<tr>
											  				<th>
												                <div class="header-tile-date-name">Tue</div>
												                <div class="header-tile-date-value">18 FEB</div>
											  				</th>
											  			</tr>
											  			<tr><td><a href="get-an-appoinment.php">10:30 am</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">11 am</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">2 pm</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">2:30 pm</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">4 pm</a></td></tr>
											  		</table>
											  	</div>
											  </div><!-- End Slide Item -->
											  
											  <!-- <div class="slide">
											  	<div class="appoinment-day">
											  		<table>
											  			<tr>
											  				<th>
												                <div class="header-tile-date-name">Wed</div>
												                <div class="header-tile-date-value">19 FEB</div>
											  				</th>
											  			</tr>
											  			<tr><td><a href="get-an-appoinment.php">12:30 pm</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">1:30 pm</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">2:30 pm</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">3:30 pm</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">4:30 pm</a></td></tr>
											  		</table>
											  	</div>
											  </div> --><!-- End Slide Item -->
											  
											  <!-- <div class="slide">
											  	<div class="appoinment-day">
											  		<table>
											  			<tr>
											  				<th>
												                <div class="header-tile-date-name">Thu</div>
												                <div class="header-tile-date-value">20 FEB</div>
											  				</th>
											  			</tr>
											  			<tr><td><a href="get-an-appoinment.php">12:30 pm</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">2 pm</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">4:15 pm</a></td></tr>
											  		</table>
											  	</div>
											  </div> --><!-- End Slide Item -->
											  
											  <!-- <div class="slide">
											  	<div class="appoinment-day">
											  		<table>
											  			<tr>
											  				<th>
												                <div class="header-tile-date-name">Fri</div>
												                <div class="header-tile-date-value">21 FEB</div>
											  				</th>
											  			</tr>
											  		</table>
											  	</div>
											  </div> --><!-- End Slide Item -->
											  
											 <!--  <div class="slide">
											  	<div class="appoinment-day">
											  		<table>
											  			<tr>
											  				<th>
												                <div class="header-tile-date-name">Sat</div>
												                <div class="header-tile-date-value">22 FEB</div>
											  				</th>
											  			</tr>
											  			<tr><td><a href="get-an-appoinment.php">3 pm</a></td></tr>
											  			<tr><td><a href="get-an-appoinment.php">4 pm</a></td></tr>
											  		</table>
											  	</div>
											  </div> --><!-- End Slide Item -->

											</div>	
											<div class="clearfix"></div>		
										</div><!-- End #doctor-appoinment Appoinment Section -->
									



									<script type="text/javascript">
											$(document).ready(function(){
											  	$('#{{ $doctor->username }}').slideUp();
											  $('#{{ $doctor->username }}-slides').bxSlider({
											    mode: 'horizontal',
											    slideWidth: 100,
											    infiniteLoop: false,
											    pager: false,
											    minSlides: 7,
											    maxSlides: 7,
											    moveSlides: 1,
											    slideMargin: 8
											  });

											});

											    $('#doctor_{{ $doctor->id }}').click(function() {
											    	if ($(this).hasClass("active")) {
														$(this).removeClass("active");
											    	}
											    	else {$(this).addClass("active");}
											    	
											    	$('#{{ $doctor->username }}').slideToggle(500);
											    });
										</script>
										<div class="clearfix"></div>

										</li>


								@endforeach
										

									
								<!--<li>
									<div class="doctor-img"><img src="images/doctor.jpg" alt=""/></div>
										<div class="doctor-name">
											<a href="doctor-profile.php"><h2>Dr. Jaklin Farnish</h2></a>
											<div class="specialist">BDS, MDS - Periodontics, Dip Skin Aesthetics</div>
											<div class="city">217 centre.<br/>New York,NY 10013</div>
										</div>
										<div class="right-area">
											<div class="ratings">
												<h2>Dentist</h2>
												<ul>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
												</ul>
											</div>
											<div class="booking"><a href="">Get An Appointment</a></div>
										</div>
										<div class="clearfix"></div>

								</li>	
								<li>
								<div class="doctor-img"><img src="images/doctor.jpg" alt=""/></div>
										<div class="doctor-name">
											<a href="doctor-profile.php"><h2>Dr. Jaklin Farnish</h2></a>
											<div class="specialist">BDS, MDS - Periodontics, Dip Skin Aesthetics</div>
											<div class="city">217 centre.<br/>New York,NY 10013</div>
										</div>
										<div class="right-area">
											<div class="ratings">
												<h2>Dentist</h2>
												<ul>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
												</ul>
											</div>
											<div class="booking"><a href="">Get An Appointment</a></div>
										</div>
										<div class="clearfix"></div>

								</li>	
								<li>
									<div class="doctor-img"><img src="images/doctor.jpg" alt=""/></div>
										<div class="doctor-name">
											<a href="doctor-profile.php"><h2>Dr. Jaklin Farnish</h2></a>
											<div class="specialist">BDS, MDS - Periodontics, Dip Skin Aesthetics</div>
											<div class="city">217 centre.<br/>New York,NY 10013</div>
										</div>
										<div class="right-area">
											<div class="ratings">
												<h2>Dentist</h2>
												<ul>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
												</ul>
											</div>
											<div class="booking"><a href="">Get An Appointment</a></div>
										</div>
										<div class="clearfix"></div>
								</li>	
								<li>
									<div class="doctor-img"><img src="images/doctor.jpg" alt=""/></div>
										<div class="doctor-name">
											<a href="doctor-profile.php"><h2>Dr. Jaklin Farnish</h2></a>
											<div class="specialist">BDS, MDS - Periodontics, Dip Skin Aesthetics</div>
											<div class="city">217 centre.<br/>New York,NY 10013</div>
										</div>
										<div class="right-area">
											<div class="ratings">
												<h2>Dentist</h2>
												<ul>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
												</ul>
											</div>
											<div class="booking"><a href="">Get An Appointment</a></div>
										</div>
										<div class="clearfix"></div>
								</li>	
								<li>
									<div class="doctor-img"><img src="images/doctor.jpg" alt=""/></div>
										<div class="doctor-name">
											<a href="doctor-profile.php"><h2>Dr. Jaklin Farnish</h2></a>
											<div class="specialist">BDS, MDS - Periodontics, Dip Skin Aesthetics</div>
											<div class="city">217 centre.<br/>New York,NY 10013</div>
										</div>
										<div class="right-area">
											<div class="ratings">
												<h2>Dentist</h2>
												<ul>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
												</ul>
											</div>
											<div class="booking"><a href="">Get An Appointment</a></div>
										</div>
										<div class="clearfix"></div>
								</li>	
								<li>
									<div class="doctor-img"><img src="images/doctor.jpg" alt=""/></div>
										<div class="doctor-name">
											<a href="doctor-profile.php"><h2>Dr. Jaklin Farnish</h2></a>
											<div class="specialist">BDS, MDS - Periodontics, Dip Skin Aesthetics</div>
											<div class="city">217 centre.<br/>New York,NY 10013</div>
										</div>
										<div class="right-area">
											<div class="ratings">
												<h2>Dentist</h2>
												<ul>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
												</ul>
											</div>
											<div class="booking"><a href="">Get An Appointment</a></div>
										</div>
									<div class="clearfix"></div>
								</li>-->
								<!--	
								<li>
									<div class="doctor-img"><img src="images/doctor.jpg" alt=""/></div>
										<img src="/images/patient-profile.jpg" alt=""/></div>
										<div class="doctor-name">
											<a href="doctor-profile.php"><h2></h2></a>
											<div class="specialist">BDS, MDS - Periodontics, Dip Skin Aesthetics</div>
											<div class="city">217 centre.<br/>New York,NY 10013</div>
										</div>
										<div class="right-area">
											<div class="ratings">
												<h2>Dentist</h2>
												<ul>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
													<li><img src="images/ratings.png" alt=""/></li>
												</ul>
											</div>
											<div class="booking"><a href="">Get An Appointment</a></div>
										</div>
										<div class="clearfix"></div>
								</li>-->
													
							</ul>


							


							<div class="search-pagination">
								<div id="paginate"></div>
								<script src="js/jquery.paginate.js" type="text/javascript"></script>
								<script type="text/javascript">
								$(function() {
									$("#paginate").paginate({
										count 		: 100,
										start 		: 1,
										display     : 8,
										border					: true,
										border_color			: '#e0e0e0',
										text_color  			: '#208589',
										background_color    	: '#f2f2f2',	
										border_hover_color		: '#e0e0e0',
										text_hover_color  		: '#fff',
										background_hover_color	: '#14bac1', 
										images					: false,
										mouse					: 'press'
									});
								});
								</script>
							</div>

						</div>
					</div>
				</div>
			</div>
			</div>
@stop