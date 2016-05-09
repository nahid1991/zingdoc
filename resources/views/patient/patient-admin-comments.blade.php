@extends('layouts.header_loggedin')
	@section('drop')
		<div id="full-body">
			<div class="full-body-conteiner">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-3">
							<div class="pof-sidenav">
								<div class="pof-img">
									<img src="images/patient-profile.jpg">
								</div>
								<ul><li>
										<a href="{{ url('/homepage') }}">Appointments</a></li><li>
										<a href="{{ url('/patient-comments') }}">Comments</a></li><li>
										<a href="{{ url('/patient-profile') }}">Profile</a></li><li>
										<a href="{{ url('/auth/logout') }}">Logout</a></li></ul>
							</div>
						</div>

						<div class="col-xs-12 col-sm-8 col-md-9">
							<div class="pof-content">
								<div class="pof-header2">
									<div class="title"><h2>P. R. Nichol Mendel</h2></div>
									<div class="clearfix"></div>
								</div>
								<div class="pof-desc padding">									
									<div class="pofeidt">
										<div class="pof-edittitle">
											<h5>Comments</h5>
										</div>
															<ul class ="user-comments">
																<div class="comments-box">
																	 <div class="commenter-img"><img src="images/avatar.jpg"></div>
																	 <div class="comment-details">
																	 		<h2>NICOLLA MCCANE</h2><span>02-26-14</span>
																	 		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
																	 </div>

																</div>
																<div class="comments-box">
																	 <div class="commenter-img"><img src="images/avatar.jpg"></div>
																	 <div class="comment-details">
																	 		<h2>NICOLLA MCCANE</h2><span>02-26-14</span>
																	 		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
																	 </div>
																	 
																</div>
																<div class="comments-box">
																	 <div class="commenter-img"><img src="images/avatar.jpg"></div>
																	 <div class="comment-details">
																	 		<h2>NICOLLA MCCANE</h2><span>02-26-14</span>
																	 		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
																	 </div>

																</div>
																<div class="comments-box">
																	 <div class="commenter-img"><img src="images/avatar.jpg"></div>
																	 <div class="comment-details">
																	 		<h2>NICOLLA MCCANE</h2><span>02-26-14</span>
																	 		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
																	 </div>
																	 
																</div>
																<div class="comments-box">
																	 <div class="commenter-img"><img src="images/avatar.jpg"></div>
																	 <div class="comment-details">
																	 		<h2>NICOLLA MCCANE</h2><span>02-26-14</span>
																	 		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
																	 </div>

																</div>
																<div class="comments-box">
																	 <div class="commenter-img"><img src="images/avatar.jpg"></div>
																	 <div class="comment-details">
																	 		<h2>NICOLLA MCCANE</h2><span>02-26-14</span>
																	 		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
																	 </div>
																	 
																</div>
															</ul>

									</div><!-- End .pofedit -->
								</div>
							</div><!-- End .pof-content -->
						</div><!-- End .col -->

					</div><!-- End .row -->
				</div><!-- End .conteiner -->
			</div><!-- End full-body-conteiner -->
@stop