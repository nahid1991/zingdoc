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
							<div class="top-epof-head">
								<div class="row">
									<div class="col-xs-12 col-sm-5 col-md-5">
										<div class="edpof-left">
											<div class="doctorsignup-holder edit-holder epof-editholder">
												<h1>{{ $user->name }}</h1>
												
												<label for="">Select Doctor</label>
												 {!!Form::open(['url'=>'/find-doc', 'id'=>'contact-form'])!!}
												 <select name="doctor_user">
												 	<option value="">Select</option>
												 @foreach($listed_doc_pat as $ldp)
													<option value="{{ $ldp->doctor_user }}">{{ $ldp->doctor_name }}</option>
												 @endforeach											
												</select>
													{!!Form::submit('Go')!!}
													<!-- <a href="doctor-admin-appointments-day-view.php">LOGIN</a> -->
												{!!Form::close()!!}
												
											</div>

										</div>
									</div>
									<div class="col-xs-12 col-sm-7 col-md-7 edpof-right">
											
									</div>
								</div>								
							</div>
							
							<script type="text/javascript">
							    $(function(){
							       $('[rel="tooltip"]').tooltip({placement: 'top'});
							    });
							</script>


							<!-- <div class="top-pof-head">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="title mt-7px">View Appointments</div>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6">
										<ul class="view-type-link">
											<li><a class="current" href="entity-admin-appointments-view.php" rel="tooltip" title="Day View"><img src="images/day-view.png" alt=""><span></span></a></li><li>
												<a href="entity-admin-appointments-week-view.php" rel="tooltip" title="Week View"><img src="images/week-view.png" alt=""><span></span></a></li><li>
												<a href="entity-admin-appointments-month-view.php" rel="tooltip" title="Month View"><img src="images/month-view.png" alt=""><span></span></a></li>
										</ul>
									</div>
								</div>								
							</div> -->



							

							
				</div><!-- End .conteiner -->
				
			</div><!-- End full-body-conteiner -->
			
@stop