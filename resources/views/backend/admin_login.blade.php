<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin Login</title>
	<meta name="description" content="Metro Admin Template.">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link id="bootstrap-style" href="{{asset('public/backend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/backend/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link id="base-style" href="{{asset('public/backend/css/style.css')}}" rel="stylesheet">
	<link id="base-style-responsive" href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="{{asset('public/backend/img/favicon.ico')}}">
	<style type="text/css">
		body { background: url({{asset('public/backend/img/bg-login.jpg')}}) !important; }
    </style>
</head>

<body>
<div class="container-fluid-full">
<div class="row-fluid">
	<div class="row-fluid">
		<div class="login-box">
			<div class="icons">
				<a href="index.html"><i class="halflings-icon home"></i></a>
				<a href="#"><i class="halflings-icon cog"></i></a>
			</div>
			<p class="alert-danger">
			<?php
				$message = Session::get('message');
			    if ($message) {
				  echo $message;
				  Session::put('message',null);
			     }
			?>
		    </p>
<h2>Login to your account</h2>
	<form class="form-horizontal" action="{{ url('/admin-dashboard') }}" method="post">
		@csrf
		<fieldset>
		<div class="input-prepend" title="Username">
			<span class="add-on"><i class="halflings-icon user"></i></span>
			<input class="input-large span10" name="admin_email" type="text" required="" placeholder="type email address"/>
		</div>
		<div class="clearfix"></div>

		<div class="input-prepend" title="Password">
			<span class="add-on"><i class="halflings-icon lock"></i></span>
			<input class="input-large span10" name="admin_password" id="password" type="password" required="" placeholder="type password"/>
		</div>

		<div class="button-login">	
			<button type="submit" class="btn btn-primary">Login</button>
		</div>
		<div class="clearfix"></div>
	</form>
	<hr>
	<h3>Forgot Password?</h3>
	<p>
		No problem, <a href="#">click here</a> to get a new password.
	</p>	
</div>
</div>
</div>
</div>

<script src="{{asset('public/backend/js/jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery-migrate-1.0.0.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
<script src="{{asset('public/backend/js/modernizr.js')}}"></script>
<script src="{{asset('public/backend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.cookie.js')}}"></script>
<script src="{{asset('public/backend/js/excanvas.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.uniform.min.js')}}"></script>
<script src="{{asset('public/backend/js/custom.js')}}"></script>
 </body>
</html>
