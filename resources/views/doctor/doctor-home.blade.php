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
                        <div class="top-pof-head">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="title mt-7px">View Appointments</div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">

                                    <ul class="view-type-link">
                                        <li><a class="current" href="{{ url('/homepage') }}" rel="tooltip" title="Day View"><img src="/images/day-view.png" alt=""><span></span></a></li><<li>>
                                                <a href="{{ url('/doctor-week') }}" rel="tooltip" title="Week View"><img src="/images/week-view.png" alt=""><span></span></a></li><li>
                                        <a href="{{ url('/doctor-calendar') }}" rel="tooltip" title="Month View"><img src="/images/month-view.png" alt=""><span></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="pof-content">
                                    <div class="pof-header3">
                                        <div class="title">Appointments</div>
                                    </div>
                                    <div class="pof-desc">
                                        <ul class="appoin-list">
                                            <table border="0" style="width:100%; background: #F1F1F1">
                                            @foreach($user_info as $u_i)
                                                @if($u_i)
                                                <tr>
                                                    <th style="text-align:center"><h5>
                                                            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($u_i->appointment_time))->format('h:i A') }}
                                                        </h5></th>
                                                    <td rowspan="2" style="text-align:center" width="70%"><h5><a href="#">{{ $u_i->patient_name }}</a><a href="#">
                                                                <t><img src="images/checkmark.png" width="20px" height="20px" style="float:right;"></t></a></h5></td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align:center"><h5>
                                                            {{ \Carbon\Carbon::createFromTimeStamp(strtotime($u_i->appointment_end))->format('h:i A') }}</h5></td>
                                                </tr>
                                                @endif
                                            @endforeach
                                            </table>
                                        </ul>
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