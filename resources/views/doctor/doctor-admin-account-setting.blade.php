@extends('layouts.header_loggedin')
	@section('drop')
		<div id="full-body">
			<div class="full-body-conteiner">
				<div class="container">
					<div class="row">
						

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
											<a href="{{ url('/homepage') }}">Home</a></li><li>
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
									<div class="title"><h2>Dr. Alla Dorfman</h2><p>DDS  &nbsp;  |  &nbsp; Dentist</p></div>
									<div class="clearfix"></div>
								</div>
								<div class="pof-desc padding">									
									<div class="pofeidt">
										<div class="pof-edittitle">
											<h5>Change Password</h5>
										</div>
										{!! Form::open(['url' => '/reset-pass']) !!}
										<div class="doctorsignup-holder edit-holder">
											<label>Current Password</label>
											<input name="password" required="" type="password" class="form-control"
												   placeholder="PASSWORD">
											<label>New Password</label>
											<input id="password" name="new-password" required="" type="password" class="form-control"
												   placeholder="NEW PASSWORD">
											<label>Retype New Password</label>
											<p id="identify" style="display:none; color:red">Password did not match</p>
											<input id="retype" name="retyped-password" required="" type="password" class="form-control"
												   placeholder="RETYPE NEW PASSWORD">
											<input type="submit" class="btn btn-default" value="SUBMIT">
										</div>
										{!! Form::close() !!}
									</div><!-- End .pofedit -->
								</div>
								<script type="text/javascript">
									$("#retype").on('keyup', function(){
										var pass = $("#password").val();
										var retype = $("#retype").val();
										if(pass != retype){
											$("#identify").css("display", "block");
										}
										else{
											$("#identify").css("display", "none");
										}
									})
								</script>
							</div><!-- End .pof-content -->
						</div><!-- End .col -->
					</div><!-- End .row -->
				</div><!-- End .conteiner -->
			</div><!-- End full-body-conteiner -->
@stop