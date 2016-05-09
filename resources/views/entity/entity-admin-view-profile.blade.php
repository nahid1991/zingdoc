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
							<div class="pof-content">
								<div class="pof-header2">
									<div class="title e-view-ptitle"><h2>Callen-Lorde Community Health Center</h2></div>
									<a href="entity-admin-edit-profile.php" class="link link2">Edit Profile</a>
									<div class="clearfix"></div>
								</div>
								<div class="pof-desc padding">
									<div class="vprof-htext">
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent 
									</div>
									<div class="doctor-profile-location eprofile-location">
											<div class="row">
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<div class="doctor-adress-panel">
														<div class="doctor-address">
															<h2>Ridgewood, New York</h2>
														</div>
														<div class="doctor-place">
															<a href="clinic-profile.php"><h2>Tribeca Dental Care</h2></a>										
															<p>#A-102, Marve Link Apartment, Marve Road Forest Ave Ridgewood<br/> NY 11385</p>
														</div>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<div class="doctor-shedule">
														<div class="shedule">
															MON - WED<br/>
															9:30 AM - 9:30 PM
														</div>
														<div class="shedule">
															SAT - SUN<br/>
															9:30 AM - 9:30 PM
														</div>
													</div>
												</div>
											</div>
										</div><!-- END .doctor-profile-location -->
									<div class="vprof-qualification">
											<div class="row">
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<div class="membership specilaztion">
														<h2>Specializiations</h2>
														<ul class="qualification-list">
															<li>Dentist</li>
															<li>Cosmetic Dentist</li>
															<li>Orthodonostist</li>
														</ul>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<div class="membership language">
														<h2>Services</h2>
														<ul class="qualification-list">
															<li>Immunizations</li>
															<li>TB Skin Test</li>
															<li>Generral Health Examinations</li>
														</ul>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<div class="membership awards">
														<h2>Award and Recogonizations</h2>
														<ul class="qualification-list">
															<li>Award By The Presedient of India for exceptional Work in Raising Dental Units And as a Commending officer</li>
														</ul>
													</div>
												</div>
										 </div>
									</div><!-- End .vprof-qualification -->
									<div class="vprof-bottom">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="doctor-profile-tab">
													<ul class="doctor-tab" id="myTab">
													  <li class="active"><a href="#home" data-toggle="tab"><i class="icon icon-picture-o icon-2x img-icon"></i> IMAGES</a></li>
													  <li><a href="#profile" data-toggle="tab"><i class="icon icon-video-camera icon-2x img-icon"></i>  VIDEOS</a></li>
													</ul>
													<div class="tab-content">
														<div class="tab-pane active " id="home">
															<ul class ="images-pane image-overlay vprof-image">
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, itaque."><img src="images/images-demo2.jpg"></a></li>
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="images/images-demo2.jpg"></a></li>
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="images/images-demo2.jpg"></a></li>
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="images/images-demo2.jpg"></a></li>
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="images/images-demo2.jpg"></a></li>
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="images/images-demo2.jpg"></a></li>
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="images/images-demo2.jpg"></a></li>
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="images/images-demo2.jpg"></a></li>
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="images/images-demo2.jpg"></a></li>
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="images/images-demo2.jpg"></a></li>
															</ul>
														</div>
														<div class="tab-pane" id="profile">
															<ul class ="images-pane video-overlay vprof-image">
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li>
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li>
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li>
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li>
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li>
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li>
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li>
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li>
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li>
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li>
															</ul>
														</div>
													</div>
												</div><!-- End #doctor-profile-tab-->
											</div>
										</div>
									</div><!-- End .vrpof-bottom -->
								</div>
							</div><!-- End .pof-content -->
						</div><!-- End .col -->
					</div><!-- End .row -->
				</div><!-- End .conteiner -->
			</div><!-- End full-body-conteiner -->
@stop