@extends('layouts.header_loggedin')
	@section('drop')
		<div id="full-body">
			<div class="full-body-conteiner">
				<div class="container">
					<div class="row">
						<!--<?php
							//$side_link3 = 'class="current"';
							//include 'includes/doctor-admin-sidebar.php';
						?>-->


						<div class="col-xs-12 col-sm-4 col-md-3">
							<div class="pof-sidenav">
								@foreach($doctor as $doc)
								@if($doc->propic)
								<div class="pof-img">
									<img src="/{{ $doc->propic }}">
								</div>
								@endif
								@if(!$doc->propic)
								<div class="pof-img">
									<img src="/images/pro-holder.jpg">
								</div>
								@endif
								@endforeach
							</div>
						</div>



						

						<div class="col-xs-12 col-sm-8 col-md-9">
							
							<div class="pof-content">
								<div class="pof-header2">
									@foreach($doctor as $doc)
									<div class="title"><h2>{{ $doc->name }}</h2><p>{{ $doc->practice_name }}  &nbsp;  |  &nbsp; {{ $doc->speciality }}</p></div>
									<!--<a href="doctor-admin-edit-profile.php" class="link">Edit Profile</a>-->
									<div class="clearfix"></div>
									@endforeach
								</div>
								@foreach($doctor_info as $d_i)
								<div class="pof-desc padding">
									<div class="vprof-htext">
										{{ $d_i->about }}
									</div>
									<div class="vprof-qualification">
											<div class="row">
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<div class="membership">
														<h2>Membership</h2>
														<ul class="qualification-list">
															
															<li>{{ $d_i->membership }}</li>
														</ul>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<div class="membership certification">
														<h2>Certification</h2>
														<ul class="qualification-list">
															<li>{{ $d_i->certifications }}</li>
														</ul>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<div class="membership insurance">
														<h2>Insurance Accept</h2>
														<ul class="qualification-list">
															<li>{{ $d_i->insurance }}</li>
														</ul>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<div class="membership experiance">
														<h2>Experience</h2>
														<ul class="qualification-list">
															<li>{{ $d_i->title }} ({{ $d_i->start }} - {{ $d_i->end }})</li>
														</ul>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<div class="membership specilaztion">
														<h2>Specializiations</h2>
														<ul class="qualification-list">
															<li>{{ $d_i->specializations }}</li>
														</ul>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<div class="membership awards">
														<h2>Award and Recogonizations</h2>
														<ul class="qualification-list">
															<li>{{ $d_i->award }}</li>
														</ul>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<div class="membership education">
														<h2>Education</h2>
														<ul class="qualification-list">
															<li>{{ $d_i->education }}</li>
														</ul>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<div class="membership registration">
														<h2>Registrations</h2>
														<ul class="qualification-list">
															<li>{{ $d_i->registration }}</li>
														</ul>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<div class="membership language">
														<h2>Language</h2>
														<ul class="qualification-list">
															<li>{{ $d_i->language }}</li>
														</ul>
													</div>
												</div>
										 </div>
									</div><!-- End .vprof-qualification -->
									@endforeach







									<!-- End .vprof-qualification -->
									<div class="vprof-bottom">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="doctor-profile-tab">
													<ul class="doctor-tab" id="myTab">
													  <li class="active"><a href="#home" data-toggle="tab"><i class="icon icon-picture-o icon-2x img-icon"></i> IMAGES</a></li>
													  <li><a href="#profile" data-toggle="tab"><i class="icon icon-video-camera icon-2x img-icon"></i>  VIDEOS</a></li>
													   <li><a href="#blog-tab" data-toggle="tab"><i class="icon icon-file-text-o icon-2x img-icon"></i>  BLOG</a></li>
													</ul>
													<div class="tab-content">
														<div class="tab-pane active " id="home">
															<ul class ="images-pane image-overlay vprof-image">
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, itaque."><img src="/images/images-demo2.jpg"></a></li>
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="/images/images-demo2.jpg"></a></li>
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="/images/images-demo2.jpg"></a></li>
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="/images/images-demo2.jpg"></a></li>
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="/images/images-demo2.jpg"></a></li>
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="/images/images-demo2.jpg"></a></li>
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="/images/images-demo2.jpg"></a></li>
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="/images/images-demo2.jpg"></a></li>
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="/images/images-demo2.jpg"></a></li>
																<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="/images/images-demo2.jpg"></a></li>
															</ul>
														</div>
														<div class="tab-pane" id="profile">
															<ul class ="images-pane video-overlay vprof-image">
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="/images/video-demo.jpg"></a></li>
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="/images/video-demo.jpg"></a></li>
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="/images/video-demo.jpg"></a></li>
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="/images/video-demo.jpg"></a></li>
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="/images/video-demo.jpg"></a></li>
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="/images/video-demo.jpg"></a></li>
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="/images/video-demo.jpg"></a></li>
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="/images/video-demo.jpg"></a></li>
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="/images/video-demo.jpg"></a></li>
																<li><a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="/images/video-demo.jpg"></a></li>
															</ul>
														</div>
														<div class="tab-pane" id="blog-tab">
															<ul class ="images-pane">
																<div class="comments-box">
																	 <div class="commenter-img"><img src="/images/avatar.jpg"></div>
																	 <div class="comment-details">
																	 		<h2>NICOLLA MCCANE</h2><span>6 days ago</span>
																	 		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
																	 </div>

																</div>
																<div class="comments-box">
																	 <div class="commenter-img"><img src="/images/avatar.jpg"></div>
																	 <div class="comment-details">
																	 		<h2>NICOLLA MCCANE</h2><span>6 days ago</span>
																	 		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
																	 </div>
																	 
																</div>
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