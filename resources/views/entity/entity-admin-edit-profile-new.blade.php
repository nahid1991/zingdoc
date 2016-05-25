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
                                <a href="{{ url('/entity-profile') }}" class="link link2">View Profile</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="pof-desc padding">
                                <div class="pofeidt">

                                    <div class="pof-edittitle">
                                        <h5>Change Profile Pictures</h5>
                                    </div>
                                    <div class="doctorsignup-holder edit-holder">
                                        <label>Logo</label>
                                        <div class="upload-photo">
                                            {!! Form::open(['url' => '/propic', 'files' => true, 'enctype'=>'multipart/form-data']) !!}
                                            <div class="upload-photo">
                                                {!! Form::file('image',['class'=>'btn btn-default',]) !!}
                                                {!! Form::submit('UPLOAD') !!}
                                            </div>
                                            {!!Form::close()!!}
                                        </div>
                                    </div>
                                    <div class="doctorsignup-holder edit-holder">
                                        <label>Cover Photo</label>
                                        <div class="upload-photo">
                                            {!! Form::open(['url' => '/cover-photo', 'files' => true, 'enctype'=>'multipart/form-data']) !!}
                                            <div class="upload-photo">
                                                {!! Form::file('image',['class'=>'btn btn-default',]) !!}
                                                {!! Form::submit('UPLOAD') !!}
                                            </div>
                                            {!!Form::close()!!}
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="pof-edittitle">
                                        <h5>Overview</h5>
                                    </div>
                                    {!! Form::open(['url' => '/admin-profile-edit']) !!}
                                    <div class="doctorsignup-holder edit-holder year-ddown">
                                        <label for="">Year Established</label>
                                        <select name="year">
                                            <option value="">Year</option>
                                            <option value="{{ $en_info->year }}">{{ $en_info->year }}</option>
                                            <option value="2012">2012</option>
                                            <option value="2011">2011</option>
                                            <option value="2010">2010</option>
                                            <option value="2009">2009</option>
                                        </select>
                                    </div>

                                    <div class="doctorsignup-holder edit-holder">
                                        <label for="">Entity Overview</label>
                                        <textarea class="edit-textarea" name="overview">{{ $en_info->overview }}</textarea>
                                    </div>
                                    <div class="pof-edittitle">
                                        <h5>Contact Info</h5>
                                    </div>
                                    <div class="doctorsignup-holder edit-holder">
                                        <label for="">Location</label>
                                        <input name="location" required="" type="text" class="form-control" value="{{ $en_info->location }}">
                                    </div>
                                    <div class="doctorsignup-holder edit-holder">
                                        <label for="">Address</label>
										 <textarea class="edit-textarea" name="address">{{ $en_info->address }}
										</textarea>
                                    </div>

                                    <div class="pof-edittitle">
                                        <h5>Specializations</h5>
                                    </div>
                                    <div class="doctorsignup-holder edit-holder">
                                        <label>Specializations</label>
                                        <input id="specilzations" name="specializations" required="" type="text" class="form-control"
                                               value="{{ $en_info->specializations }}">

                                    </div>
                                    <div class="doctorsignup-holder edit-holder">
                                        <label for="">Services</label>
                                        <input id="services" name="services" required="" type="text" class="form-control"  value="{{ $en_info->services }}">

                                    </div>
                                    <div class="doctorsignup-holder edit-holder">
                                        <label for="">Awards and Recognitions</label>
                                        <textarea class="edit-textarea" name="award">{{ $en_info->award }}</textarea>
                                    </div>
                                    <div class="doctorsignup-holder edit-holder">
                                        <input type="submit" value="Submit">
                                    </div>
                                    {!! Form::close() !!}


                                </div><!-- End .pofedit -->
                            </div>
                        </div><!-- End .pof-content -->
                    </div><!-- End .col -->
                </div><!-- End .row -->
            </div><!-- End .conteiner -->
        </div><!-- End full-body-conteiner -->
        <script>
            $('#datetimepicker_mask').datetimepicker({
                mask:'9999/19/39 29:59'
            });
        </script>
@stop