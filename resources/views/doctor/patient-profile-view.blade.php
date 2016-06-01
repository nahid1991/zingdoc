@extends('layouts.header_loggedin')
	@section('drop')
		<div id="full-body">
			<div class="full-body-conteiner">
				<div class="container">
					<div class="row">
						<!--<?php
							//$side_link1 = 'class="current"';
							//include 'includes/doctor-admin-sidebar.php';
						?>-->
						
						<div class="col-xs-12 col-sm-4 col-md-3">
							<div class="pof-sidenav">
								<div class="pof-img">
									<img src="/images/pro-holder.jpg">
								</div>
								<ul><li>
										<a href="{{ url('/homepage') }}">Appointments</a></li><li>
										<a href="{{ url('/set-appointment') }}">Set Office hour</a></li><li>
										<a href="{{ url('/doc-profile') }}">Profile</a></li><li>
										<a href="{{ url('/doc-profile-edit') }}">Edit Profile</a></li><li>
										<a href="{{ url('/doc-blog') }}">Blog</a></li><li>
										<a href="{{ url('/doc-comments') }}">Comments</a></li><li>
										<a href="{{ url('/doc-account-settings') }}">Account Settings</a></li><li>
										<a href="{{ url('/auth/logout') }}">Logout</a></li></ul>
							</div>
						</div>




						<div class="col-xs-12 col-sm-8 col-md-9">
							<div class="top-pof-head">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="title mt-7px">Patient record</div>
									</div>
									
								</div>								
							</div>
							

							<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-6">
									<div class="pof-content">
										<div class="pof-header3">
											<div class="title">Today's Appointment</div>
										</div>
										<div class="pof-desc">
											<ul class="appoin-list">
												@foreach($patient as $pat)
												
												<li>
													<div class="s-left">
														<h2><label><i>Patient Name: </i></label> {{ $pat->patient_name }}</h2>
														<p><h5><i>Visited you for: </i><br><b>{{ $pat->issue }}</b></h5></p>
														<p><h5><i>Prescribed: </i><br><b>{{ $pat->prescription }}</b></h5></p>
														<p><h5><i>Comment: </i><br><b>{{ $pat->comments }}</b></h5></p>
													</div><div class="s-right">
														<div class="time"></div>
														<ul class="action">
															<li><h5><b>{{  Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $pat->visit_time)->diffForHumans() }}</b></h5></li>
															<!-- <li><a href="#" rel="tooltip" title="Check Out"><i class="icon icon-arrow-left current"></i></a></li> -->
															
														</ul>
													</div>
												</li>
												
												@endforeach
											</ul>
										</div><!-- End .pof-desc -->
									</div><!-- End .pof-content -->
								</div>

								

						</div><!-- End .col -->
					</div><!-- End .row -->
				</div><!-- End .conteiner -->
			</div><!-- End full-body-conteiner -->


							<script type="text/javascript">
							    $(function(){
							       $('[rel="tooltip"]').tooltip({placement: 'top', html: true});
							    });
							</script>
	@stop