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
                                        <table border="0" style="width:100%; background: #F1F1F1; text-align:center">
                                            <tr>
                                                <th style="text-align:center"><h3>Visited On</h3></th>
                                                <th style="text-align:center"><h3>Issue</h3></th>
                                                <th style="text-align:center"><h3>Prescription</h3></th>
                                                <th style="text-align:center"><h3>Comment</h3></th>
                                            </tr>
                                        @foreach($patient as $pt)
                                            <tr>
                                                <td><h5>{{\Carbon\Carbon::createFromFormat
                                                ('Y-m-d h:i:s', $pt->visit_time)->format('jS F')}}</h5></td>
                                                <td><h5>{{$pt->issue}}</h5></td>
                                                <td><h5>{{$pt->prescription}}</h5></td>
                                                <td><h5>{{$pt->comments}}</h5></td>
                                            </tr>
                                        @endforeach
                                        </table>
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