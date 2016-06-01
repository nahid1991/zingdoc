<!DOCTYPE html>
<html lang="en">
	<head>
		<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
		<META HTTP-EQUIV="Expires" CONTENT="-1">
		<link rel="shortcut icon" href="{{ asset('/images/ico/favicon.png') }}">
	    <style>
		/*body {
			  font-family: Arial, sans-serif;
			  background: url(http://www.shukatsu-note.com/wp-content/uploads/2014/12/computer-564136_1280.jpg) no-repeat;
			  background-size: cover;
			  height: 100vh;
			}*/

			/*h1 {
			  text-align: center;
			  font-family: Tahoma, Arial, sans-serif;
			  color: #06D85F;
			  margin: 80px 0;
			}*/

			.box {
			  margin: 0 auto;
			  background: rgba(255, 255, 255, 0.2);
			  padding: 5px;
			  border: 2px solid #fff;
			  border-radius: 20px/50px;
			  background-clip: padding-box;
			  text-align: center;
			}

			.button {
			  font-size: 1em;
			  padding: 10px;
			  color: #123123;
			  border-radius: 20px/50px;
			  text-decoration: none;
			  cursor: pointer;
			  transition: all 0.3s ease-out;
			}

			.button:hover {
			  background: #f1f1f1;
			}

			.overlay {
			  position: fixed;
			  top: 0;
			  bottom: 0;
			  left: 0;
			  right: 0;
			  background: rgba(0, 0, 0, 0.7);
			  transition: opacity 500ms;
			  visibility: hidden;
			  opacity: 0;
			  z-index: 9999999;
			}

			.overlay:target {
			  visibility: visible;
			  opacity: 1;
			}

			.popup {
			  margin: 70px auto;
			  padding: 20px;
			  background: #fff;
			  border-radius: 5px;
			  width: 30%;
			  position: relative;
			  transition: all 5s ease-in-out;
			  height: 50%;
			}

			.popup .something {
			  top: 90px;
			  right: 80px;
			  position: relative;
			  font-size: 30px;
			  color: #000000;
			  font-family: Tahoma, Arial, sans-serif;
			}


			.popup .something:hover{
			  top: 90px;
			  right: 80px;
			  position: relative;
			  font-size: 30px;
			  color: #9999ff;
			  font-family: Tahoma, Arial, sans-serif;
			}


			.popup h2 {
			  right: 180px;
			  top:80px;
			  position: relative;
			  font-size: 30px;
			  color: #000000;
			  font-family: Tahoma, Arial, sans-serif;
			}

			.popup .close {
			  position: absolute;
			  top: 20px;
			  right: 30px;
			  transition: all 200ms;
			  font-size: 30px;
			  font-weight: bold;
			  text-decoration: none;
			  color: #333;
			}

			.popup .close:hover {
			  color: #06D85F;
			}

			

			@media screen and (max-width: 700px) {
			  .box {
			    width: 70%;
			  }
			  .popup {
			    width: 70%;
			  }
			}







		</style>




		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Doctor Patient Management</title>

		<!-- Bootstrap core CSS -->
		<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/style-responsive.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/font-awesome.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/jquery.bxslider.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('/css/prettyPhoto.css') }}">


		<!-- Just for debugging purposes. Don't actually copy this line! -->
		<!--[if lt IE 9]><script src="./js/ie8-responsive-file-warning.js"></script><![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		
		
		<!-- JS Min
		================================================== -->
	 	<!-- <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> -->
		<script src="{{ asset('/js/jquery-1.8.3.min.js') }}"></script>
		<script src="{{ asset('/js/modernizr.custom.js') }}"></script>
		
		
		<!-- Script And CSS for Datepicker
		================================================== -->		
	    <script src="{{ asset('/js/jquery.datetimepicker.js') }}"></script>
		<link rel="stylesheet" type="text/css" href="{{ asset('/css/jquery.datetimepicker.css') }}"/>


		<!-- textext autosuggest Styles and Scripts  -->
		<link rel="stylesheet" href="{{ asset('/css/textext-autosuggest.css') }}" type="text/css" />		
		<script src="{{ asset('/js/textext-autosuggest/textext-autosuggest.js') }}" type="text/javascript"></script>
		{{--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>--}}


		
	</head>

	<body>
		
		<div id="header">
			<div class="container">
				<div class="row test">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">	
						<a href="{{ url('/homepage') }}"><img src="/images/logo.png" alt=""/></a>						
					</div>
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">	
						<div class="top-nav">
							<ul>
								<li><a href="{{ url('/auth/logout') }}">Sign Out</a></li>
								<!-- <li>|</li> -->
								<!-- <li> -->
									<!-- <a href="#" class="box">Sign Up</a> -->
									<!-- <a class="dropdown-toggle" href="#popup1">Sign Up</a> -->
									<!-- <a href="{{ url('/test') }}" onClick="return popup(this, 'notes')" data-toggle="dropdown">Sign Up</a>
									<!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign Up</a> -->
									<!-- <ul class="dropdown-menu">
									  <li><a href="{{ url('/sign_up_patient') }}">Patient Sign Up</a></li>
									  <li><a href="{{ url('/sign_up_doctor') }}">Doctor Sign Up</a></li>
									</ul>
 -->


									<!-- <div id="popup1" class="overlay">
  										<div class="popup">
		    							
		      								
									    
		    							<a class="close" href="">&times;</a>
		    							<a href="{{ url('/sign_up_patient') }}" class="something">Patient Sign Up</a>
		      								<h2>or</h2>
									  	<a href="{{ url('/sign_up_doctor') }}" class="something">Doctor Sign Up</a>
		    						
		  							</div>
									</div>	 -->

   								    <!-- <div class="dropdown">
									  <button class="dropbtn">Sign up</button>
									  <div class="dropdown-content">
									  	<a href="{{ url('/sign_up_doctor') }}">Doctor Sign Up</a>
									    <a href="{{ url('/sign_up_patient') }}">Patient Sign Up</a>
									  < /div-->
									  
									<!-- </div> -->
								<!-- </li> -->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!-- End #header -->

		@yield('drop')
		
			<div class="footer">
				<div class="container">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="footer-link">
							<ul class="footer-nav">
								<li><a href="#">Home</a></li>
								<li>|</li>
								<li><a href="#">About Us</a></li>
								<li>|</li>
								<li><a href="#">Advertise with Us</a></li>
								<li>|</li>
								<li><a href="#">Contact Us</a></li>
							</ul>
							<p> &copy;2014 . All Rights Reserved.</p>
							<ul class="social-nav">
								<li class="fb"><a href="#"></a></li>
								<li class="tw"><a href="#"></a></li>
								<li class="in"><a href="#"></a></li>
								<li class="yt"><a href="#"></a></li>
							</ul>
						</div>
							
					</div>
				</div>
			</div><!-- End .footer -->
		</div><!-- End #full-body -->


		<!-- Bootstrap core JavaScript
		================================================== -->
		<script src="/js/bootstrap.js"></script>		
	    <script src="/js/jquery.bxslider.js"></script>
	    <script type="text/javascript" src="/js/jquery.mockjax.js"></script>
	    <script type="text/javascript" src="/js/jquery.autocomplete.js"></script>
	    <script type="text/javascript" src="/js/countries.js"></script>
	    <script type="text/javascript" src="/js/autosuggestdemo.js"></script>
		<script src="/js/jquery.prettyPhoto.js"></script>
	    <script src="/js/scripts.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
	</body>

</html>