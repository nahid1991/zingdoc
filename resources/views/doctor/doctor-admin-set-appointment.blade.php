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
												@foreach($doctor_schedule as $doc_info)
												<tr>
													<td>{{ $doc_info->days }}</td>
													<td> <p>{{ $doc_info->starting_time }} - {{ $doc_info->ending_time }}</p>  <a class="close" href="#">X</a></td>
												</tr>
												@endforeach
												<!-- <tr>
													<td>Sat</td>
													<td> <p>10:00 am - 5:00 pm</p>  <a class="close" href="#">X</a></td>
												</tr> -->
											</table>
											<div class="clearfix"></div>
											<div class="addbtn_cont">
												<a href="#" id="toggle-btn" class="addbtn">+ Add Day &amp; Hour</a>
												{!!Form::open(['url'=>'/schedule-make'])!!}
												<div id="toggle-content" class="add_form_container">
													<div class="arrow"></div>
													<div class="add_form">
														<div class="form-cont">
															<label>From</label> 
															<select name="starting_time">
												 				<option value="">Select</option>
												 				<option value="0:00">12:00 AM</option>
												 				<option value="0:30">12:30 AM</option>
												 				<option value="1:00">1:00 AM</option>
												 				<option value="1:30">1:30 AM</option>
												 				<option value="2:00">2:00 AM</option>
												 				<option value="2:30">2:30 AM</option>
												 				<option value="3:00">3:00 AM</option>
												 				<option value="3:30">3:30 AM</option>
												 				<option value="4:00">4:00 AM</option>
												 				<option value="4:30">4:30 AM</option>
												 				<option value="5:00">5:00 AM</option>
												 				<option value="5:30">5:30 AM</option>
												 				<option value="6:00">6:00 AM</option>
												 				<option value="6:30">6:30 AM</option>
												 				<option value="7:00">7:00 AM</option>
												 				<option value="7:30">7:30 AM</option>
												 				<option value="8:00">8:00 AM</option>
												 				<option value="8:30">8:30 AM</option>
												 				<option value="9:00">9:00 AM</option>
												 				<option value="9:30">9:30 AM</option>
												 				<option value="10:00">10:00 AM</option>
												 				<option value="10:30">10:30 AM</option>
												 				<option value="11:00">11:00 AM</option>
												 				<option value="11:30">11:30 AM</option>
												 				<option value="12:00">12:00 PM</option>
												 				<option value="12:30">12:30 PM</option>
												 				<option value="13:00">1:00 PM</option>
												 				<option value="13:30">1:30 PM</option>
												 				<option value="14:00">2:00 PM</option>
												 				<option value="14:30">2:30 PM</option>
												 				<option value="15:00">3:00 PM</option>
												 				<option value="15:30">3:30 PM</option>
												 				<option value="16:00">4:00 PM</option>
												 				<option value="16:30">4:30 PM</option>
												 				<option value="17:00">5:00 PM</option>
												 				<option value="17:30">5:30 PM</option>
												 				<option value="18:00">6:00 PM</option>
												 				<option value="18:30">6:30 PM</option>
												 				<option value="19:00">7:00 PM</option>
												 				<option value="19:30">7:30 PM</option>
												 				<option value="20:00">8:00 PM</option>
												 				<option value="20:30">8:30 PM</option>
												 				<option value="21:00">9:00 PM</option>
												 				<option value="21:30">9:30 PM</option>
												 				<option value="22:00">10:00 PM</option>
												 				<option value="22:30">10:30 PM</option>
												 				<option value="23:00">11:00 PM</option>
																<option value="23:30">11:30 PM</option>
												 			</select>
															<label>To</label> 
															<select name="ending_time">
												 				<option value="">Select</option>
												 				<option value="0:00">12:00 AM</option>
												 				<option value="0:30">12:30 AM</option>
												 				<option value="1:00">1:00 AM</option>
												 				<option value="1:30">1:30 AM</option>
												 				<option value="2:00">2:00 AM</option>
												 				<option value="2:30">2:30 AM</option>
												 				<option value="3:00">3:00 AM</option>
												 				<option value="3:30">3:30 AM</option>
												 				<option value="4:00">4:00 AM</option>
												 				<option value="4:30">4:30 AM</option>
												 				<option value="5:00">5:00 AM</option>
												 				<option value="5:30">5:30 AM</option>
												 				<option value="6:00">6:00 AM</option>
												 				<option value="6:30">6:30 AM</option>
												 				<option value="7:00">7:00 AM</option>
												 				<option value="7:30">7:30 AM</option>
												 				<option value="8:00">8:00 AM</option>
												 				<option value="8:30">8:30 AM</option>
												 				<option value="9:00">9:00 AM</option>
												 				<option value="9:30">9:30 AM</option>
												 				<option value="10:00">10:00 AM</option>
												 				<option value="10:30">10:30 AM</option>
												 				<option value="11:00">11:00 AM</option>
												 				<option value="11:30">11:30 AM</option>
												 				<option value="12:00">12:00 PM</option>
												 				<option value="12:30">12:30 PM</option>
												 				<option value="13:00">1:00 PM</option>
												 				<option value="13:30">1:30 PM</option>
												 				<option value="14:00">2:00 PM</option>
												 				<option value="14:30">2:30 PM</option>
												 				<option value="15:00">3:00 PM</option>
												 				<option value="15:30">3:30 PM</option>
												 				<option value="16:00">4:00 PM</option>
												 				<option value="16:30">4:30 PM</option>
												 				<option value="17:00">5:00 PM</option>
												 				<option value="17:30">5:30 PM</option>
												 				<option value="18:00">6:00 PM</option>
												 				<option value="18:30">6:30 PM</option>
												 				<option value="19:00">7:00 PM</option>
												 				<option value="19:30">7:30 PM</option>
												 				<option value="20:00">8:00 PM</option>
												 				<option value="20:30">8:30 PM</option>
												 				<option value="21:00">9:00 PM</option>
												 				<option value="21:30">9:30 PM</option>
												 				<option value="22:00">10:00 PM</option>
												 				<option value="22:30">10:30 PM</option>
												 				<option value="23:00">11:00 PM</option>
																<option value="23:30">11:30 PM</option>
												 			</select>														
	
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
																<!--<p>Please choose one day at a time</p>-->
																<label class="btn btn-primary"><input type="checkbox" name="day1" value="Monday" id="option1">Mon</label>
																<label class="btn btn-primary"><input type="checkbox" name="day2" value="Tuesday" id="option2">Tue</label>
																<label class="btn btn-primary"><input type="checkbox" name="day3" value="Wednesday" id="option3">Wed</label>
																<label class="btn btn-primary"><input type="checkbox" name="day4" value="Thursday" id="option4">Thu</label>
																<label class="btn btn-primary"><input type="checkbox" name="day5" value="Friday" id="option5">Fri</label>
																<label class="btn btn-primary"><input type="checkbox" name="day6" value="Saturday" id="option6">Sat</label>
																<label class="btn btn-primary"><input type="checkbox" name="day7" value="Sunday" id="option7">Sun</label>
															</div>															
														</div>

														<div class="ft">															
															<div class="row">
																<div class="col-xs-6 col-sm-6 col-md-6">
																	<input type="checkbox" name="all" value="1"> Apply to all</input>
																</div>
																<div class="col-xs-6 col-sm-6 col-md-6">
																	<input type="submit" value="Add"/>
																</div>
															</div>
														</div>
													</div>
												</div>
												{!!Form::close()!!}		
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
