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
                                    <a href="{{ url('/appointments') }}">Today's appointments</a></li><li>
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
                                        <li><a class="current" href="{{ url('/homepage') }}" rel="tooltip"
                                               title="Day View"><img src="/images/day-view.png" alt=""><span></span></a></li><li>
                                            <a href="{{ url('/doctor-week') }}" rel="tooltip"
                                               title="Week View"><img src="/images/week-view.png" alt=""><span></span></a></li><li> -->
                                            <a href="{{ url('/doctor-calendar') }}" rel="tooltip"
                                               title="Month View"><img src="/images/month-view.png" alt=""><span></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function(){
                                $('[rel="tooltip"]').tooltip({
                                    html: true
                                });
                            });
                        </script>

                        <div class="pof-content">
                            <div class="pof-header3">
                                <div class="title">Appointments</div>
                            </div>
                            <div class="pof-desc">
                                <div id="appoinment-admin">
                                    <div id="appoinment-admin-slides">



                                    <div class="clearfix"></div>
                                </div><!-- End #doctor-appoinment Appoinment Section -->

                                <script type="text/javascript">

                                    $.ajax({
                                        url: '/doctor-week-view/{{$user->username}}/{{\Carbon\Carbon::today()}}',
                                        data: {},
                                        type:'GET',
                                        dataType: 'html',
                                        error: function(){
                                            alert("Data not found");
                                        },
                                        success:function(data){
//                                                    $(".s").empty();

                                            $('#appoinment-admin-slides').html(data);

                                        }});

//                                    $("a").on('click', '#next',function(e){
//                                        e.preventDefault();
//                                        var link = $(this).attr('href');
//                                        console.log(link);
//                                        $.ajax({
//                                            url: $(this).attr('href'),
//                                            data: {},
//                                            type:'GET',
//                                            dataType: 'html',
//                                            error: function(){
//                                                alert("Data not found");
//                                            },
//                                            success:function(data){
//                                                $("#appoinment-admin-slides").html(data);
//
//                                            } // End of success function of ajax form
//                                        }); // End of ajax call
//                                        return false;
//                                    });

                                    $("#appoinment-admin-slides").on('click', '#next', function(e){
                                        e.preventDefault();
                                        $.ajax({
                                            url: $(this).attr('href'),
                                            data: {},
                                            type:'GET',
                                            dataType: 'html',
                                            error: function(){
                                                alert("Data not found");
                                            },
                                            success:function(data){
//                                                    $(".s").empty();
//                                                $("#appoinment-admin-slides").slideToggle();
                                                $("#appoinment-admin-slides").html(data);
//                                                $("#appoinment-admin-slides").css("display", "block");
//                                                $("#appoinment-admin-slides").slideToggle();

                                            } // End of success function of ajax form
                                        }); // End of ajax call
                                        return false;
                                    });
                                    $("#appoinment-admin-slides").on('click', '#prev', function(e){
                                        e.preventDefault();
                                        $.ajax({
                                            url: $(this).attr('href'),
                                            data: {},
                                            type:'GET',
                                            dataType: 'html',
                                            error: function(){
                                                alert("Data not found");
                                            },
                                            success:function(data){
//                                                    $(".s").empty();
//                                                $("#appoinment-admin-slides").slideToggle();
                                                $("#appoinment-admin-slides").html(data);
//                                                $("#appoinment-admin-slides").css("display", "block");
//                                                $("#appoinment-admin-slides").slideToggle();
                                            } // End of success function of ajax form
                                        }); // End of ajax call
                                        return false;
                                    });
                                </script>
                            </div>
                        </div><!-- End .pof-content -->
                    </div><!-- End .col -->
                </div><!-- End .row -->
            </div><!-- End .conteiner -->
        </div><!-- End full-body-conteiner -->
        </div>
@stop