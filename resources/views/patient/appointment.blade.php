@extends('layouts.header_loggedin')
	@section('drop')
		<div id="full-body">
			<div class="doctor-signup margin-top10">
				<div class="container">
					<div class="row">
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
							<div class="appt-time-block">
			                    <p class="appt-date">
			                        <i class="icon icon-calendar icon-2x"></i> <span class="strong">{{ $d_f }}</span>
			                    </p>
			                    <p class="appt-time">
			                        <i class="icon icon-time icon-2x"></i> At <span class="strong">{{ $t_f }}</span>
			                    </p>
				                <div class="clearfix"></div>
				                <div class="clearfix"></div>
				            </div>
							<div class="doctor-short-profile">
								@foreach($doctor_info as $doc)
								@if($doc->propic)
									<div class="img-holder"><img src="/{{ $doc->propic }}"/></div>
								@endif
								@if(!$doc->propic)
									<div class="img-holder"><img src="/images/pro-holder.jpg"/></div>
								@endif
								<div class="desc">									
									<h5>{{ $doc->name }}</h5>
									<p>DDS&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;{{ $doc->speciality }}</p>
									<p class="adr">
										<b>{{ $doc->entity_name }}</b><br/>
										{{ $doc->location }}
									</p>
								</div>
								@endforeach
							</div>
						</div>
						<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
							<div class="signup-text">
								<h5>Get An Appointment</h5>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat laoreet dolore magna aliquam erat volutpat.</p>
							</div>
							<!-- <form name="" id="contact-form" action="search.html" method="get"> -->
							{!!Form::open(['url'=>'/appointing', 'id'=>'contact-form'])!!}
								<input type="hidden" name="user_username" value="{{ $user->username }}">
								<input type="hidden" name="entity_user" value="{{ $doc->entity_user }}">
								<input type="hidden" name="doctor_user" value="{{ $doc->doctor_user }}">
								<input type="hidden" name="date" value="{{ $date }}">
								<input type="hidden" name="time" value="{{ $time }}">
								<input type="hidden" name="serial" value="{{ $serial }}">
								<input type="hidden" name="end_date" value="{{ $end_date }}">
								<div class="doctorsignup-holder">
									{!! Form::text('name',Input::old('name'),['class'=>'form-control', 'placeholder'=>'Patient / Visitor Name']) !!}
									 <!-- <input name="country" required type="text" class="form-control"  placeholder="Patient / Visitor Name"/> -->
								</div>
								<div class="doctorsignup-holder">
									{!! Form::text('issues',Input::old('issues'),['class'=>'form-control', 'placeholder'=>'Appointment Reason']) !!}
									 <!-- <input name="country" required type="text" class="form-control"   placeholder="Appointment Reason"/> -->
								</div>
								<div class="doctorsignup-holder">
									 {!! Form::text('email',Input::old('email'),['class'=>'form-control', 'placeholder'=>'Email']) !!}
									 <!-- <input name="country" required type="text" class="form-control"   placeholder="Email"/> -->
								</div>
								<div class="doctorsignup-holder">
									 {!! Form::text('phone_number',Input::old('phone_number'),['class'=>'form-control', 'placeholder'=>'Mobile']) !!}
									 <!-- <input name="country" required type="text" class="form-control"   placeholder="Mobile"/> -->
									 <div class="info-text">You will receive an SMS with a verification code on this number.</div>
								</div>
								<div class="doctorsignup-button">
									<!-- {!!Form::submit('SUBMIT')!!} -->
									{!!Form::submit('SUBMIT')!!}
								</div>
							{!!Form::close()!!}
							<!-- </form> -->
						</div>
						
					</div>
				</div>
			</div><!-- End #doctor-signup -->
@stop