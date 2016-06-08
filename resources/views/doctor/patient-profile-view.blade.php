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
                                    <img src="/{{ $user->propic }}">
                                </div>
                            @endif
                            @if(!$user->propic)
                                <div class="pof-img">
                                    <img src="/images/pro-holder.jpg">
                                </div>
                            @endif
                            <ul><li>
                                    <a href="{{ url('/homepage') }}">Home</a></li><li>
                                    <a href="{{ url('/appointments') }}">Appointments</a></li><li>
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
                        <div class="top-pof-head">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="title mt-7px">View Appointments</div>
                                </div>

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xs-12 col-sm-9 col-md-12">
                                <div class="pof-content">
                                    <div class="pof-header3">
                                        <div class="title">{{ $patient_first->patient_name }}'s records</div>
                                    </div>
                                    <div class="pof-desc">

                                    </div><!-- End .pof-desc -->
                                </div><!-- End .pof-content -->

                            </div>


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