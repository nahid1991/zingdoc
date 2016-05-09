@extends('layouts.header_loggedin')
	@section('drop')
		<div id="full-body">
			<div class="full-body-conteiner">
				<div class="container">
					<div class="row">
						<!--<?php
							//$side_link4 = 'class="current"';
							//include 'includes/doctor-admin-sidebar.php';
						?>-->



						<div class="col-xs-12 col-sm-4 col-md-3">
							<div class="pof-sidenav">
								<div class="pof-img">
									<img src="images/doctor-profile.jpg">
								</div>
								<ul><li>
										<a href="{{ url('/homepage') }}">Appointments</a></li><li>
										<a href="{{ url('/set-appointment') }}">Set Appointment</a></li><li>
										<a href="{{ url('/doc-profile') }}">Profile</a></li><li>
										<a href="{{ url('/doc-profile-edit') }}">Edit Profile</a></li><li>
										<a href="{{ url('/doc-blog') }}">Blog</a></li><li>
										<a href="{{ url('/doc-comments') }}">Comments</a></li><li>
										<a href="{{ url('/doc-account-settings') }}">Account Settings</a></li><li>
										<a href="{{ url('/auth/logout') }}">Logout</a></li></ul>
							</div>
						</div>


						

						<div class="col-xs-12 col-sm-8 col-md-9">
							<div class="pof-content">
								<div class="pof-header2">
									<div class="title"><h2>Dr. Alla Dorfman</h2><p>DDS  &nbsp;  |  &nbsp; Dentist</p></div>
									<a href="doctor-admin-view-profile.php" class="link">View Profile</a>
									<div class="clearfix"></div>
								</div>
								<div class="pof-desc padding">
									<div class="pofeidt">
										<div class="pof-edittitle">
											<h5>Change Profile Picture</h5>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Profile Picture</label>
											<div class="upload-photo">
												<input name="" type="file">
												<button type="button" class="btn btn-default" data-toggle="button">UPLOAD</button>												
											</div>
										</div>

										<div class="clearfix"></div>

										<div class="pof-edittitle">
											<h5>Overview</h5>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Full Name</label>
											 <input name="country" required="" type="text" class="form-control"  value="Dr. Alla Dorfman">
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Profile Overview</label>
											 <textarea class="edit-textarea">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
											</textarea>
										</div>
										<div class="pof-edittitle">
											<h5>Contact Info</h5>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Location</label>
											 <input name="country" required="" type="text" class="form-control" value="Ridgewood, New York">
										</div>
										<div class="doctorsignup-holder edit-holder">
										<label>Clinic</label>
										 <select>	
											<option value="">Tribica Dental Care</option>	
											<option value="">Cardiologist</option>	
											<option value="">Opthalmist</option>										
											<option value="">Pediatrist</option>	
											<option value="">Dentist</option>										
										</select>
									</div>
									<div class="doctorsignup-holder edit-holder">
										<label>Address</label>
										 <textarea class="edit-textarea">
										</textarea>
									</div>
										<div class="pof-edittitle">
											<h5>Experience</h5>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Title</label>
											 <input name="country" required="" type="text" class="form-control" value="Doctor at Guropukra Advanced Dental Care">
										</div>
										<div class="doctorsignup-holder edit-holder year">
											<label>Start</label>
											 <input name="country" required="" type="text" class="form-control" value="Year">
										</div>
										<div class="doctorsignup-holder edit-holder year">
											<label>End</label>
											 <input name="country" required="" type="text" class="form-control" value="Year">
										</div>
										<!-- <div class="doctorsignup-holder edit-holder year">
											<a href="#">Add New</a>
										</div> --> 
										<div class="clearfix"></div>
										<div class="pof-edittitle">
											<h5>Specilaztions</h5>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Membership</label>
											 <input name="country" required="" type="text" class="form-control"  value="American Chiropractic Association, American Medical Association">
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Certifications</label>
											 <input id="certifications" name="certifications" required="" type="text" class="form-control"  value="">
											 <script type="text/javascript">
											    $('#certifications')
											        .textext({ plugins : 'tags autocomplete', tagsItems : [ 'Basic', 'JavaScript', 'PHP', 'Scala' ]})
											        .bind('getSuggestions', function(e, data)
											        {
											            var list = ['Basic', 'Closure', 'Cobol', 'Delphi'],
											                textext = $(e.target).textext()[0],
											                query = (data ? data.query : '') || ''
											                ;
											            $(this).trigger( 'setSuggestions', { result : textext.itemManager().filter(list, query) });
											        })
											        ;
											</script>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Insurrance Acccept</label>
											 <input id="insurrance" name="insurrance" required="" type="text" class="form-control"  value="">
											 <script type="text/javascript">
											    $('#insurrance')
											        .textext({ plugins : 'tags autocomplete', tagsItems : [ 'Aetna', 'Ameritas', 'Anthem Blue Cross Blue Shield' ]})
											        .bind('getSuggestions', function(e, data)
											        {
											            var list = ['Aetna', 'Ameritas', 'Anthem Blue Cross Blue Shield'],
											                textext = $(e.target).textext()[0],
											                query = (data ? data.query : '') || ''
											                ;
											            $(this).trigger( 'setSuggestions', { result : textext.itemManager().filter(list, query) });
											        })
											        ;
											</script>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Specilzations</label>
											 <input id="specilzations" name="specilzations" required="" type="text" class="form-control"  value="">
											 <script type="text/javascript">
											    $('#specilzations')
											        .textext({ plugins : 'tags autocomplete', tagsItems : ['Endodontist', 'Implantologist', 'Orthodontist']})
											        .bind('getSuggestions', function(e, data)
											        {
											            var list = ['Endodontist', 'Implantologist', 'Orthodontist'],
											                textext = $(e.target).textext()[0],
											                query = (data ? data.query : '') || ''
											                ;
											            $(this).trigger( 'setSuggestions', { result : textext.itemManager().filter(list, query) });
											        })
											        ;
											</script>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Education</label>
											 <input id="education" name="education" required="" type="text" class="form-control"  value="">
											 <script type="text/javascript">
											    $('#education')
											        .textext({ plugins : 'tags autocomplete', tagsItems : [ 'BDS' ]})
											        .bind('getSuggestions', function(e, data)
											        {
											            var list = ['BDS'],
											                textext = $(e.target).textext()[0],
											                query = (data ? data.query : '') || ''
											                ;
											            $(this).trigger( 'setSuggestions', { result : textext.itemManager().filter(list, query) });
											        })
											        ;
											</script>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Language</label>
											 <input id="language" name="language" required="" type="text" class="form-control"  value="">
											 <script type="text/javascript">
											    $('#language')
											        .textext({ plugins : 'tags autocomplete', tagsItems : [ 'English', 'Franch' ]})
											        .bind('getSuggestions', function(e, data)
											        {
											            var list = ['English', 'Spenish', 'Franch', 'Hindi'],
											                textext = $(e.target).textext()[0],
											                query = (data ? data.query : '') || ''
											                ;
											            $(this).trigger( 'setSuggestions', { result : textext.itemManager().filter(list, query) });
											        })
											        ;
											</script>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Awards and Recognations</label>
											 <textarea class="edit-textarea">Awarded By The President Of India For exceptional Work in Raising Dental Units and as a Commanding Officer</textarea>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Registrations</label>
											 <input name="country" required="" type="text" class="form-control"  value="A-2795 Maharashtra State Dental Council, 1982">
										</div>
										<!-- End Specilization Section -->


										<div class="clearfix"></div>
										<div class="pof-edittitle">
											<h5>Photos</h5>				
										</div>

											<div class="row">
												<div class="col-xs-12 col-sm-7 col-md-7">
													<div class="add-image-view">		
														<ul class ="images-pane image-overlay vprof-image">
															<li><a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, itaque."><img src="images/images-demo2.jpg"></a></li><li>
															<a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="images/images-demo2.jpg"></a></li><li>
																<a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="images/images-demo2.jpg"></a></li><li>
																<a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="images/images-demo2.jpg"></a></li><li>
																<a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="images/images-demo2.jpg"></a></li><li>
																<a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="images/images-demo2.jpg"></a></li><li>
																<a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="images/images-demo2.jpg"></a></li><li>
																<a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="images/images-demo2.jpg"></a></li><li>
																<a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="images/images-demo2.jpg"></a></li><li>
																<a href="images/dummy-photo-gallery/dummy.jpg" data-rel="gallery['photo']" title=""><img src="images/images-demo2.jpg"></a></li>
														</ul>														
													</div>																	
												</div>
												<div class="col-xs-12 col-sm-5 col-md-5">
													<div class="doctorsignup-holder edit-holder uploader-sec">
														<label>Image Upload</label>
														<input type="file"  value="">
														<label>Image Caption</label>
														<textarea name="" id="" cols="30" rows="1"></textarea>
														<button type="button" class="btn btn-default" data-toggle="button">UPLOAD</button>
													</div>													
												</div>
											</div>	
										<!-- End Photo Section -->


										<div class="clearfix"></div>
										<div class="pof-edittitle">
											<h5>Videos</h5>				
										</div>

											<div class="row">
												<div class="col-xs-12 col-sm-7 col-md-7">
													<div class="add-image-view">		
															<ul class ="images-pane video-overlay vprof-image">
																<li>
																	<a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li><li>
																	<a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li><li>
																	<a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li><li>
																	<a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li><li>
																	<a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li><li>
																	<a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li><li>
																	<a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li><li>
																	<a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li><li>
																	<a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li><li>
																	<a href="http://vimeo.com/7874398&width=600" data-rel="gallery['video']" title=""><img src="images/video-demo.jpg"></a></li>
															</ul>													
													</div>																	
												</div>
												<div class="col-xs-12 col-sm-5 col-md-5">
													<div class="doctorsignup-holder edit-holder uploader-sec">
														<label>Video Upload</label>
														<input type="file"  value="">
														<label>Video Caption</label>
														<textarea name="" id="" cols="30" rows="1"></textarea>
														<button type="button" class="btn btn-default" data-toggle="button">UPLOAD</button>
													</div>													
												</div>
											</div>	
										<!-- End Videos Section -->


									</div><!-- End .pofedit -->
								</div>
							</div><!-- End .pof-content -->
						</div><!-- End .col -->
					</div><!-- End .row -->
				</div><!-- End .conteiner -->
			</div><!-- End full-body-conteiner -->
@stop