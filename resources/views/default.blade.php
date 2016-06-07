@extends('layouts/header')
	@section('drop')
	@foreach($errors->all() as $error)
        <p class="alert alert-danger">{!!$error!!}</p>
    @endforeach
		<div id="banner-holder">
			<div class="find-doctor">
				<h1>FIND A DOCTOR</h1>

					<div class="input-holder">
						 <input name="country" required type="text" class="form-control" id="autocomplete-ajax"  placeholder="Specialist"/>
					</div>
					<div class="input-holder">
						 <input name="fullname" required type="text" class="form-control zip" placeholder="Zip Code"/>
					</div>
					<div class="button-holder">
						<a href="/search/{{\Carbon\Carbon::today()}}" >Find Now</a>
					</div>

				<script type="text/javascript">
					function formSubmit(){
						document.getElementById("search-form").submit();
					}
				</script>
			</div>
			<img src="images/banner.jpg"/>
		</div><!-- End #banner-holder -->
		<div id="full-body">
			<div class="tabs-content">
					<ul class="nav nav-tabs tab-nav" id="myTab">
					  <li class="active"><a href="#home" data-toggle="tab">PATIENTS</a></li>
					  <li><a href="#profile" data-toggle="tab">DOCTORS</a></li>
					</ul>
					<div class="tab-content homepage-tabs">
						<div class="tab-pane patients active" id="home">
								<div class="container">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">	
											<div class="content_box">
												<div class="img_box">
													<img src="images/find-doctor.png"/>
												</div>
												<h2>Find A Doctor</h2>
												<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
											</div>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">	
											<div class="content_box">
													<div class="img_box">
														<img src="images/appoinment.png"/>
													</div>
													<h2>Book An Appoinment</h2>
													<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
											</div>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">	
											<div class="content_box">
												<div class="img_box">
													<img src="images/confrimation.png"/>
												</div>
												<h2>Confirmation</h2>
												<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div><!-- End .tab-pane -->
							<div class="tab-pane doctors" id="profile">
								<div class="container">
									<div class="row">
										<div class="tabs-slide">
											<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">	
												<div class="slide">
													<div class="content_box">
														<div class="img_box">
															<img src="images/appoinment-shd.png"/>
														</div>
														<h2>Appointment Sheduling</h2>
														<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
													</div>
												 </div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">	
												<div class="slide">
													<div class="content_box">
															<div class="img_box">
																<img src="images/appoinment.png"/>
															</div>
															<h2>Follw Up Reminder</h2>
															<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
														</div>
													</div>
												</div>
											<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">	
												<div class="slide">
														<div class="content_box">
															<div class="img_box">
																<img src="images/prectice.png"/>
															</div>
															<h2>Your Practice Page</h2>
															<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh</p>
														</div>
												</div>
										  </div>
									</div>
								</div>
							</div>
					</div><!-- End .tab-pane -->
					
				</div><!-- End .tab-content -->
			</div>
			<div class="gallery-box">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-4">
							<div class="hospital-wrap">
										<div class="hospital-img"><img src="images/img1.jpg" alt=""/></div>
										<div class="hospital-discr">
											<h5>Lorem Ipsum</h5>
											<p>Duis fringilla fringilla lorem, at ultricies tortor elementum sed. Fusce non ligula tortor.</p>
											<a href="clinic-profile.php">view details</a>
										</div>
									</div>
								</div> <!-- Col End -->	

								<div class="col-xs-12 col-sm-6 col-md-4">
									<div class="hospital-wrap">
										<div class="hospital-img"><img src="images/img2.jpg" alt=""/></div>
										<div class="hospital-discr">
											<h5>Lorem Ipsum</h5>
											<p>Duis fringilla fringilla lorem, at ultricies tortor elementum sed. Fusce non ligula tortor.</p>
											<a href="clinic-profile.php">view details</a>
										</div>
									</div>
								</div> <!-- Col End -->	

								<div class="col-xs-12 col-sm-6 col-md-4">
									<div class="hospital-wrap">
										<div class="hospital-img"><img src="images/img3.jpg" alt=""/></div>
										<div class="hospital-discr">
											<h5>Lorem Ipsum</h5>
											<p>Duis fringilla fringilla lorem, at ultricies tortor elementum sed. Fusce non ligula tortor.</p>
											<a href="clinic-profile.php">view details</a>

										</div>
									</div>
								</div> <!-- Col End -->	
								<div class="col-xs-12 col-sm-6 col-md-4">
									<div class="hospital-wrap">
										<div class="hospital-img"><img src="images/img4.jpg" alt=""/></div>
										<div class="hospital-discr">
											<h5>Lorem Ipsum</h5>
											<p>Duis fringilla fringilla lorem, at ultricies tortor elementum sed. Fusce non ligula tortor.</p>
											<a href="clinic-profile.php">view details</a>
										</div>
									</div>
								</div> <!-- Col End -->	
								<div class="col-xs-12 col-sm-6 col-md-4">
									<div class="hospital-wrap">
										<div class="hospital-img"><img src="images/img5.jpg" alt=""/></div>
										<div class="hospital-discr">
											<h5>Lorem Ipsum</h5>
											<p>Duis fringilla fringilla lorem, at ultricies tortor elementum sed. Fusce non ligula tortor.</p>
											<a href="clinic-profile.php">view details</a>
										</div>
									</div>
								</div> <!-- Col End -->	
								<div class="col-xs-12 col-sm-6 col-md-4">
									<div class="hospital-wrap">
										<div class="hospital-img"><img src="images/img6.jpg" alt=""/></div>
										<div class="hospital-discr">
											<h5>Lorem Ipsum</h5>
											<p>Duis fringilla fringilla lorem, at ultricies tortor elementum sed. Fusce non ligula tortor.</p>
											<a href="clinic-profile.php">view details</a>
										</div>
									</div>
								</div> <!-- Col End -->	
					</div>
				</div>
			</div><!-- End .gallery-box -->
			<div class="prefooter">
				<h1>FEATURED ON</h1>
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<ul>
								<li><a href="#"><img src="images/featured-logo/cnbc.png"></a></li><li><a href="#"><img src="images/featured-logo/priceton.png"></a></li><li><a href="#"><img src="images/featured-logo/business-insider.png"></a></li><li><a href="#"><img src="images/featured-logo/yahoo-finance.png"></a></li>
							</ul>
						</div>
				    	<div class="col-xs-12 col-sm-12 col-md-4">
							<div class="featuerd-logo-bottom">
								<a href="#"><img src="images/featured-logo/entrepreneur.png"></a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4">
							<div class="featuerd-logo-bottom">
								<a href="#"><img src="images/featured-logo/pandodaily.png"></a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4">
							<div class="featuerd-logo-bottom">
								<a href="#"><img src="images/featured-logo/edsurge.png"></a>
							</div>
						</div>
					</div>
				</div>
			</div><!-- End .Prefooter -->
		@stop