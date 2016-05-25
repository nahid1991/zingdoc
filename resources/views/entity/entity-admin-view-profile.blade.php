@extends('layouts.header_loggedin')
	@section('drop')
		<div id="full-body">
			<div class="full-body-conteiner">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-4 col-md-3">
							<div class="pof-sidenav">
                                <div class="cover-pic">
                                    @if($user->cover_pic)
                                        <div class="pof-img">
                                            <img src="/{{ $user->cover_pic }}"/>
                                        </div>
                                    @else
                                        <div class="pof-img">
                                            <img src="/images/clinic-profile.jpg">
                                        </div>
                                    @endif

                                    @if($user->propic)
                                        <div class="pof-img">
                                            <img src="{{ $user->propic }}"/>
                                        </div>
                                    @else
                                        <div class="pof-img">
                                            <img src="/images/profile-pic.jpg"/>
                                        </div>
                                    @endif
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
									<a href="{{ url('/entity-profile-edit') }}" class="link link2">Edit Profile</a>
									<div class="clearfix"></div>
								</div>
								@foreach($en_info as $e_i)
								<div class="pof-desc padding">
									<div class="vprof-htext">
									    {{ $e_i->overview }}
                                    </div>
									<div class="doctor-profile-location eprofile-location">
											<div class="row">
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<div class="doctor-adress-panel">
														<div class="doctor-address">
															<h2>Ridgewood, New York</h2>
														</div>
														<div class="doctor-place">
															<a href="clinic-profile.php"><h2>{{ $user->name }}</h2></a>
															<p>{{ $e_i->address }}<br/> {{ $e_i->location }}</p>
														</div>
													</div>
												</div>
											</div>
										</div><!-- END .doctor-profile-location -->
									<div class="vprof-qualification">
											<div class="row">
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<div class="membership specilaztion">
														<h2>Specializiations</h2>
														<ul class="qualification-list">
															<li>{{ $e_i->specializations }}</li>
														</ul>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<div class="membership language">
														<h2>Services</h2>
														<ul class="qualification-list">
															<li>{{ $e_i->services }}</li>
														</ul>
													</div>
												</div>
												<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
													<div class="membership awards">
														<h2>Award and Recogonizations</h2>
														<ul class="qualification-list">
															<li>{{ $e_i->award }}</ul>
													</div>
												</div>
										 </div>
									</div>
									@endforeach<!-- End .vprof-qualification -->
									<!-- End .vrpof-bottom -->
								</div>
							</div><!-- End .pof-content -->
						</div><!-- End .col -->
					</div><!-- End .row -->
				</div><!-- End .conteiner -->
			</div><!-- End full-body-conteiner -->
@stop