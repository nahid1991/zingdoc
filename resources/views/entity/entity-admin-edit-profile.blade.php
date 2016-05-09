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
									<a href="entity-admin-view-profile.php" class="link link2">View Profile</a>
									<div class="clearfix"></div>
								</div>
								<div class="pof-desc padding">
									<div class="pofeidt">

										<div class="pof-edittitle">
											<h5>Change Profile Pictures</h5>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Logo</label>
											<div class="upload-photo">
												<input name="" type="file">
												<button type="button" class="btn btn-default" data-toggle="button">UPLOAD</button>												
											</div>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Cover Photo</label>
											<div class="upload-photo">
												<input name="" type="file">
												<button type="button" class="btn btn-default" data-toggle="button">UPLOAD</button>												
											</div>
										</div>

										<div class="clearfix"></div>

										<div class="pof-edittitle">
											<h5>Overview</h5>
										</div>
										<div class="doctorsignup-holder edit-holder year-ddown">
											<label for="">Year Established</label>
											 <select>	
												<option value="">YYYY</option>	
												<option value="">2012</option>	
												<option value="">2011</option>										
												<option value="">2010</option>	
												<option value="">2009</option>										
											</select>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label for="">Entity Name</label>
											 <input name="country" required="" type="text" class="form-control"  value="Callen-Lorde Community Health Center">
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label for="">Entity Overview</label>
											 <textarea class="edit-textarea">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
											</textarea>
										</div>
										<div class="pof-edittitle">
											<h5>Contact Info</h5>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label for="">Location</label>
											 <input name="country" required="" type="text" class="form-control" value="Ridgewood, New York">
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label for="">Clinic</label>
											 <select>	
												<option value="">Tribica Dental Care</option>	
												<option value="">Cardiologist</option>	
												<option value="">Opthalmist</option>										
												<option value="">Pediatrist</option>	
												<option value="">Dentist</option>										
											</select>
										</div>
									<div class="doctorsignup-holder edit-holder">
										<label for="">Address</label>
										 <textarea class="edit-textarea">
										</textarea>
									</div>
									<div class="doctorsignup-holder edit-holder day-time">
											<label for="">Day and Time</label>
											 <input name="country" required="" type="text" class="form-control" value="Day & Time" id="datetimepicker_mask">
										</div>
										<div class="pof-edittitle">
											<h5>Specilaztions</h5>
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
											<label for="">Services</label>
											 <input id="services" name="services" required="" type="text" class="form-control"  value="">
											 <script type="text/javascript">
											    $('#services')
											        .textext({ plugins : 'tags autocomplete', tagsItems : ['Immunizations', 'TB Skin Tests', 'General health examinations']})
											        .bind('getSuggestions', function(e, data)
											        {
											            var list = ['Immunizations', 'TB Skin Tests', 'General health examinations'],
											                textext = $(e.target).textext()[0],
											                query = (data ? data.query : '') || ''
											                ;
											            $(this).trigger( 'setSuggestions', { result : textext.itemManager().filter(list, query) });
											        })
											        ;
											</script>
										</div>
									<div class="doctorsignup-holder edit-holder">
										<label for="">Awards and Recognations</label>
										 <textarea class="edit-textarea">
										</textarea>
									</div>



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
			<script>
			$('#datetimepicker_mask').datetimepicker({
				mask:'9999/19/39 29:59'
			});
		</script>
@stop