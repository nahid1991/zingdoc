@extends('layouts.header_loggedin')
	@section('drop')
		<div id="full-body">
			<div class="full-body-conteiner">
				<div class="container">
					<div class="row">
						



						<div class="col-xs-12 col-sm-4 col-md-3">
							<div class="pof-sidenav">

								<ul><li>
										<a href="{{ url('/homepage') }}">Appointments</a></li><li>
										<a href="{{ url('/set-appointment') }}">Set Office hour</a></li><li>
										<a href="{{ url('/doc-profile') }}">Profile</a></li><li>
										<a href="{{ url('/doc-profile-edit') }}">Edit Profile</a></li><li>
										<a href="{{ url('/doc-blog') }}">Blog</a></li><li>
										<a href="{{ url('/doc-comments') }}">Comments</a></li><li>
										<a href="{{ url('/doc-account-settings') }}">Account Settings</a></li><li>
										<a href="{{ url('/doctor-calendar') }}">Schedule Calendar</a></li><li>
										<a href="{{ url('/auth/logout') }}">Logout</a>
									</li></ul>
							</div>
						</div>


						

						<div class="col-xs-12 col-sm-8 col-md-9">
							<div class="pof-content">
								<div class="pof-header2">
									<div class="title"><h2><label>Patient Name: </label><br>{{ $p_name }}</h2>
									</div>
									
									<div class="clearfix"></div>
								</div>
								<div class="pof-desc padding">
									<div class="pofeidt">
										
									{!!Form::open(['url'=>'/prescribe', 'id'=>'contact-form'])!!}
									<input type="hidden" name="p_name" value="{{ $p_name }}">
									<input type="hidden" name="p_user" value="{{ $p_user }}">
									<input type="hidden" name="p_appoint" value="{{ $appoint }}">	
									<input type="hidden" name="d_user" value="{{ $user->username }}">	
									<div class="doctorsignup-holder edit-holder">
										<label>Issue</label>
										<input name="issue" type="text" class="form-control" placeholder="Issue" required>
									</div>
									<div class="doctorsignup-holder edit-holder">
										<label>Comments</label>
										 <textarea class="edit-textarea" name="comment" placeholder="Comments" required>
										</textarea>
									</div>
									<div class="doctorsignup-holder edit-holder">
										<label>Prescription</label>
										 <textarea class="edit-textarea" name="prescription" placeholder="Comments" required>
										</textarea>
									</div>	
									{!!Form::submit('SUBMIT')!!}
									{!!Form::close()!!}
										


									</div>
								</div>
							</div><!-- End .pof-content -->
						</div><!-- End .col -->
					</div><!-- End .row -->
				</div><!-- End .conteiner -->
			</div><!-- End full-body-conteiner -->
@stop