@extends('layouts.header_loggedin')
@section('drop')
	<div id="full-body">
		<div class="full-body-conteiner">
			<div class="container">
				<div class="row">
					@foreach($errors->all() as $error)
						<p class="alert alert-danger">{!!$error!!}</p>
					@endforeach
					<div class="col-xs-12 col-sm-4 col-md-3">
						<div class="pof-sidenav">
							@if($user->propic)
								<div class="pof-img">
									<img src="/{{ $user->propic }}">
								</div>
							@endif
							@if(!$user->propic)
								<div class="pof-img">
									<img src="/images/pro-holder.jpg">
								</div>
							@endif
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
						<div class="pof-content">
							<div class="pof-header">
								@foreach($doctor_schedule as $doc_info)
									@if($doc_info)
										<div class="title">{{ $date->format('jS F') }} {{ $name_o_day }}'s schedule {{ $doc_info->starting_time }} - {{ $doc_info->ending_time }}<br>
										</div>
									@endif
								@endforeach
							</div>


							<div class="pof-desc padding">
								<div class="row">
									<div class="col-xs-12 col-sm-5 col-md-5">
										@foreach($doctor_schedule as $doc_info)
											@if($doc_info)
												<div class="lebel">{{ $name_o_day }}'s schedule:</div>
											@else
												<div class="lebel"><p>{{ $name_o_day }}'s schedule: Today you have nothing.<p></div>
											@endif
										@endforeach

									</div><!-- End .col -->
									<div class="col-xs-12 col-sm-7 col-md-7">


										<table class="schedule">
											@foreach($doc_timing as $d_t)
												@if($d_t)
													<tr>
														<td>{{ $d_t->day }}</td>
														<td> <p>{{ $d_t->start_interval }} - {{ $d_t->end_interval }} - @if($d_t->type == 'monthly')
																For this month.

															@elseif($d_t->type == 'yearly')
																	For this year.

															@else
																	For this days.

															@endif

															<p><a class="close"
																href="{{ action('CalendarController@sche_del', [$d_t->date, $d_t->schedule_date, $d_t->username]) }}">Remove for this day</a>
																<a class="close"
																   href="{{ action('CalendarController@sche_del_plan', [$d_t->date, $d_t->username, $d_t->type]) }}">Remove total plan</a>
																@if($d_t->type == 'yearly')
																	<a class="close"
																	   href="{{ action('CalendarController@sche_del_month', [$d_t->date, $d_t->username, $d_t->type]) }}">Remove only for this month</a>
																@endif
															</p><br>
														</td>
													</tr>
													<br>
													<div class="clearfix"></div>


												@endif
											@endforeach

										</table>
										<div class="clearfix"></div>
										@foreach($doctor_schedule as $doc_info)
											@if($doc_info)
												<div class="addbtn_cont">
													<a href="#" id="toggle-btn" class="addbtn">+ Make schedule</a>
													{!!Form::open(['url'=>'/set-timing'])!!}
													<div id="toggle-content" class="add_form_container">
														<div class="arrow"></div>
														<div class="add_form">
															<div class="form-cont">
																<input type="hidden" name="username" value="{{ $user->username }}">
																<input type="hidden" name="day" value="{{ $name_o_day }}">
																<input type="hidden" name="date" value="{{ $date_human }}">
																<label>From</label>
																<select name="starting_interval" required>
																	<option value="">Hour</option>

																	@foreach($hours as $hour)
																		<option value="{{ $hour }}">{{ $hour }}</option>
																	@endforeach

																</select>

																<select name="starting_min" required>
																	<option value="00">00</option>
																	<option value="30">30</option>
																</select>

																<label>For</label>
																<select name="duration" required>
																	<option value="">Duration</option>
																	<option value="30">30 minutes</option>
																	<option value="60">1 hour</option>
																	<option value="90">1 hour 30 minutes</option>
																	<option value="120">2 hours</option>
																	<option value="180">3 hours</option>
																	<option value="240">4 hours</option>
																	<option value="300">5 hours</option>
																	<option value="360">6 hours</option>
																	<option value="420">7 hours</option>
																	<option value="480">8 hours</option>
																</select>
																<br>
																<label>Interval</label>
																<select name="interval" required>
																	<option value="">Interval</option>
																	<option value="15">15 mins</option>
																	<option value="30">30 mins</option>
																</select>
																<label>Reason</label>
																<select name="reason">
																	<option value="">Reason</option>
																	<option value="appointments">Appointment</option>
																	<option value="others">Other</option>
																</select>


																<div class="clearfix"></div>



															</div>

															<div class="ft">
																<div class="row">
																	<div class="col-xs-6 col-sm-6 col-md-6">
																		<input type="radio" name="type" value="monthly"> This month</input>
																		<input type="radio" name="type" value="yearly"> This year</input>
																		<br>


																	</div>
																	<div class="col-xs-6 col-sm-6 col-md-6">
																		<input type="submit" value="Add"/>
																	</div>
																</div>
															</div>
														</div>
													</div>
													{!!Form::close()!!}
													@elseif(!$doc_info)
														<h2>No schedule today.</h2>
													@endif
													@endforeach







													<script type="text/javascript">
														$('#toggle-btn').click(function() {
															if ($(this).hasClass("current")) {
																$(this).removeClass("current");
															}
															else {$(this).addClass("current");}

															$('#toggle-content').slideToggle(500);
														});
													</script>
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


												</div>
									</div><!-- End .col -->
								</div><!-- End .row -->
							</div><!-- End .pof-desc -->
						</div><!-- End .pof-content -->
					</div><!-- End .col -->
				</div><!-- End .row -->
			</div><!-- End .conteiner -->
		</div><!-- End full-body-conteiner -->
	</div>
@stop
