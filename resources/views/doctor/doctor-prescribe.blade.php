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
									<a href="doctor-admin-view-profile.php" class="link">View Profile</a>
									<div class="clearfix"></div>
								</div>
								<div class="pof-desc padding">
									<div class="pofeidt">
										
										{!!Form::open(['url'=>'/doc-data', 'id'=>'contact-form'])!!}
										
										<div class="doctorsignup-holder edit-holder">
											<label></label>
											 <input name="location" type="text" class="form-control" placeholder="Location">
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Profile Overview</label>
											 <textarea class="edit-textarea" name="about" placeholder="Say something about yourself">
											</textarea>
										</div>
										<div class="pof-edittitle">
											<h5>Contact Info</h5>
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
											 <input name="start"   type="text" class="form-control" value="Year">
										</div>
										<div class="doctorsignup-holder edit-holder year">
											<label>End</label>
											 <input name="end"   type="text" class="form-control" value="Year">
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
											 <input id="certifications" name="certifications"   type="text" class="form-control"  value="">
											 <script type="text/javascript">
											    $('#certifications')
											        .textext({ plugins : 'tags autocomplete', tagsItems : [  ]})
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
											 <input id="insurrance" name="insurance"   type="text" class="form-control"  value="">
											 <!--<script type="text/javascript">
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
											</script>-->
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Specializations</label>
											 <input id="specilzations" name="specilzations"   type="text" class="form-control"  value="">
											 <!--<script type="text/javascript">
											    $('#specilzations')
											        .textext({ plugins : 'tags autocomplete', tagsItems : []})
											        .bind('getSuggestions', function(e, data)
											        {
											            var list = ['Endodontist', 'Implantologist', 'Orthodontist'],
											                textext = $(e.target).textext()[0],
											                query = (data ? data.query : '') || ''
											                ;
											            $(this).trigger( 'setSuggestions', { result : textext.itemManager().filter(list, query) });
											        })
											        ;
											</script>-->
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Education</label>
											 <input id="education" name="education" type="text" class="form-control"  value="">
											 <!--<script type="text/javascript">
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
											</script>-->
										</div>
										<div class="doctorsignup-holder edit-holder">
											<label>Language</label>
											 <input id="language" name="language"   type="text" class="form-control"  value="">
											 <!--<script type="text/javascript">
											    $('#language')
											        .textext({ plugins : 'tags autocomplete', tagsItems : [  ]})
											        .bind('getSuggestions', function(e, data)
											        {
											            var list = ['English', 'Spenish', 'Franch', 'Hindi'],
											                textext = $(e.target).textext()[0],
											                query = (data ? data.query : '') || ''
											                ;
											            $(this).trigger( 'setSuggestions', { result : textext.itemManager().filter(list, query) });
											        })
											        ;
											</script>-->
										
										{!!Form::submit('SUBMIT')!!}

										{!!Form::close()!!}
										<!-- End Specilization Section -->


										
										
										<!-- End Photo Section -->

	
										<!-- End Videos Section -->


									</div><!-- End .pofedit -->
								</div>
							</div><!-- End .pof-content -->
						</div><!-- End .col -->
					</div><!-- End .row -->
				</div><!-- End .conteiner -->
			</div><!-- End full-body-conteiner -->
@stop