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
								@if($user->propic)
								<div class="pof-img">
									<img src="{{ $user->propic }}">
								</div>
								@endif
								@if(!$user->propic)
								<div class="pof-img">
									<img src="images/pro-holder.jpg">
								</div>
								@endif
								<ul><li>
										<a href="{{ url('/homepage') }}">Appointments</a></li><li>
										<a href="{{ url('/set-appointment') }}">Set Timing</a></li><li>
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
									<div class="title"><h2>{{ $user->name }}</h2><p>{{ $user->speciality }}</p></div>
									<a href="{{ url('/doc-profile') }}" class="link">View Profile</a>
									<div class="clearfix"></div>
								</div>
								<div class="pof-desc padding">
									<div class="pofeidt">
										<div class="pof-edittitle">
											<h5>Change Profile Picture</h5>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Profile Picture</label>
											{!! Form::open(['url' => '/propic', 'files' => true, 'enctype'=>'multipart/form-data']) !!}
											<div class="upload-photo">
												{!! Form::file('image',['class'=>'btn btn-default',]) !!}
												{!! Form::submit('UPLOAD') !!}									
											</div>
											{!!Form::close()!!}
										</div>

										<div class="clearfix"></div>

										<div class="pof-edittitle">
											<h5>Overview</h5>
										</div>
									
									
									{!!Form::open(['url'=>'/doc-data', 'id'=>'contact-form'])!!}
										
										<div class="doctorsignup-holder edit-holder">
											<label>Profile Overview</label>
											
											 <textarea class="edit-textarea" name="about">
											</textarea>
											
										</div>
										<div class="pof-edittitle">
											<h5>Contact Info</h5>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Location</label>
											 <input name="location" type="text" class="form-control" placeholder="Location">
										</div>
										<div class="doctorsignup-holder edit-holder">
										<label>Clinic</label>
									</div>
									<div class="doctorsignup-holder edit-holder">
										<label>Address</label>
										 <textarea class="edit-textarea" placeholder="Address" name="address">
										</textarea>
									</div>
										<div class="pof-edittitle">
											<h5>Experience</h5>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Title</label>
											 <input name="title" type="text" class="form-control" placeholder="title">
										</div>
										<div class="doctorsignup-holder edit-holder year">
											<label>Start</label>
											 <input name="start"   type="text" class="form-control">
										</div>
										<div class="doctorsignup-holder edit-holder year">
											<label>End</label>
											 <input name="end"   type="text" class="form-control">
										</div>
										<!-- <div class="doctorsignup-holder edit-holder year">
											<a href="#">Add New</a>
										</div> --> 
										<div class="clearfix"></div>
										<div class="pof-edittitle">
											<h5>Specializations</h5>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Membership</label>
											 <input name="membership"   type="text" class="form-control"  placeholder="Membership">
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Certifications</label>
											 <input id="certifications" name="certifications"   type="text" class="form-control">
											 
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Insurrance Acccept</label>
											 <input id="insurrance" name="insurance"   type="text" class="form-control">
											 
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Specializations</label>
											 <input id="specilzations" name="specializations"   type="text" class="form-control">
											 
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Education</label>
											 <input id="education" name="education" type="text" class="form-control">
											 
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Language</label>
											 <input id="language" name="language"   type="text" class="form-control">
											 
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Awards and Recognations</label>
											 <textarea name ="award" class="edit-textarea"></textarea>
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Registrations</label>
											 <input name="registration" type="text" class="form-control"  placeholder="Registration">
										</div>
										{!!Form::submit('SUBMIT')!!}

										{!!Form::close()!!}
										<!-- End Specilization Section -->







										
										


									</div><!-- End .pofedit -->
								</div>
							</div><!-- End .pof-content -->
						</div><!-- End .col -->
					</div><!-- End .row -->
				</div><!-- End .conteiner -->
			</div><!-- End full-body-conteiner -->
@stop