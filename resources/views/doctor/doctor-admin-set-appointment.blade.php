@extends('layouts.header_loggedin')
	@section('drop')
		<div id="full-body">
			<div class="full-body-conteiner">
				<div class="container">
					<div class="row">
					
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
								<div class="pof-header">
									<div class="title">Set Appointments</div>
								</div>
								<div class="pof-desc padding">
									<div class="row">
										<div class="col-xs-12 col-sm-5 col-md-5">
											<div class="lebel">Set Working Day &amp; Hour :</div>
										</div><!-- End .col -->
										<div class="col-xs-12 col-sm-7 col-md-7">
											<table class="schedule">
												<tr>
													<td>Mon - Thu</td>
													<td> <p>10:00 am - 6:00 pm</p>  <a class="close" href="#">X</a></td>
												</tr>
												<tr>
													<td>Sat</td>
													<td> <p>10:00 am - 5:00 pm</p>  <a class="close" href="#">X</a></td>
												</tr>
											</table>
											<div class="clearfix"></div>
											<div class="addbtn_cont">
												<a href="#" id="toggle-btn" class="addbtn">+ Add Day &amp; Hour</a>
												<div id="toggle-content" class="add_form_container">
													<div class="arrow"></div>
													<div class="add_form">
														<div class="form-cont">
															<label>From</label> <input class="time-auto" type="text" value="">
															<label>To</label> <input class="time-auto" type="text" value="">														
	
															<script type="text/javascript">
																$('#time-auto')
																	.textext({
																		plugins : 'autocomplete filter',
            															useSuggestionsToFilter : true
																	})
																	.bind('getSuggestions', function(e, data)
																	{
																		var list = [
																				'Basic',
																				'Closure',
																				'Cobol',
																				'Delphi',
																				'Erlang',
																				'Fortran',
																				'Go',
																				'Groovy',
																				'Haskel',
																				'Java',
																				'JavaScript',
																				'OCAML',
																				'PHP',
																				'Perl',
																				'Python',
																				'Ruby',
																				'Scala'
																			],
																			textext = $(e.target).textext()[0],
																			query = (data ? data.query : '') || ''
																			;

																		$(this).trigger(
																			'setSuggestions',
																			{ result : textext.itemManager().filter(list, query) }
																		);
																	})
																	;
															</script>
															<div class="clearfix"></div>
															<div class="btn-group" data-toggle="buttons">
																<label class="btn btn-primary"><input type="checkbox" name="options" id="option1">Mon</label>
																<label class="btn btn-primary"><input type="checkbox" name="options" id="option2">Tue</label>
																<label class="btn btn-primary"><input type="checkbox" name="options" id="option3">Wed</label>
																<label class="btn btn-primary"><input type="checkbox" name="options" id="option4">Thu</label>
																<label class="btn btn-primary"><input type="checkbox" name="options" id="option5">Fri</label>
																<label class="btn btn-primary"><input type="checkbox" name="options" id="option6">Sat</label>
																<label class="btn btn-primary"><input type="checkbox" name="options" id="option7">Sun</label>
															</div>															
														</div>

														<div class="ft">															
															<div class="row">
																<div class="col-xs-6 col-sm-6 col-md-6">
																	<input type="checkbox" name="" value=""> Apply to all
																</div>
																<div class="col-xs-6 col-sm-6 col-md-6">
																	<input type="submit" value="Add"/>
																</div>
															</div>
														</div>
													</div>
												</div>		
												<div class="clearfix"></div>										
												<script type="text/javascript">
												    $('#toggle-btn').click(function() {
												    	if ($(this).hasClass("current")) {
															$(this).removeClass("current");
												    	}
												    	else {$(this).addClass("current");}
												    	
												    	$('#toggle-content').slideToggle(500);
												    });
												</script>
											</div>
										</div><!-- End .col -->
									</div><!-- End .row -->
								</div><!-- End .pof-desc -->
							</div><!-- End .pof-content -->
						</div><!-- End .col -->
					</div><!-- End .row -->
				</div><!-- End .conteiner -->
			</div><!-- End full-body-conteiner -->
@stop
