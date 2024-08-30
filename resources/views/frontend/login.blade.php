<!DOCTYPE html>
<html lang="en">


<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="EduChamp : Education HTML Template" />
	
	<!-- OG -->
	<meta property="og:title" content="EduChamp : Education HTML Template" />
	<meta property="og:description" content="EduChamp : Education HTML Template" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="{{asset('user/assets/images/favicon.ico')}}" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('user/assets/images/favicon.png')}}" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>EduChamp : Education HTML Template </title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="{{asset('user/assets/js/html5shiv.min.js')}}"></script>
	<script src="{{asset('user/assets/js/respond.min.js')}}"></script>
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/assets.css')}}">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/typography.css')}}">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/shortcodes/shortcodes.css')}}">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="{{asset('user/assets/css/style.css')}}">
	<link class="skin" rel="stylesheet" type="text/css" href="{{asset('user/assets/css/color/color-1.css')}}">
	
</head>
<body id="bg">
<div class="page-wraper">
	<div id="loading-icon-bx"></div>
	<div class="account-form">
		<div class="account-head" style="background-image:url('{{asset('user/assets/images/background/bg2.jpg')}}');">
			<a href="/"><img src="{{asset('user/assets/images/logo-white-2.png')}}" alt=""></a>
		</div>
		<div class="account-form-inner">
			<div class="account-container">
				<div class="heading-bx left">
					<h2 class="title-head">Login to your <span>Admin Account</span></h2>
					<p>Don't have an account? <a href="/">Go Back Home</a></p>
				</div>	
				<form class="contact-bx" action="{{route('adminlogin')}}" method="POST">
					@csrf
					@if (session('success'))
						<div style="color: green;">
							{{ session('success') }}
						</div>
					@endif
					@if ($errors->any())
						<div style="color: red;">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<div class="row placeani">
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label>Username</label>
									<input name="username" type="text" class="form-control">
								</div>
								@error('username')
                                    <div style="color: red;">{{ $message }}</div>
                                @enderror
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group"> 
									<label>Your Password</label>
									<input name="password" type="password" class="form-control" >
								</div>
								@error('password')
                                    <div style="color: red;">{{ $message }}</div>
                                @enderror
							</div>
						</div>
						<div class="col-lg-12 m-b30">
							<button name="submit" type="submit" value="Submit" class="btn button-md">Login</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- External JavaScripts -->
<script src="{{asset('user/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('user/assets/vendors/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('user/assets/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('user/assets/vendors/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{asset('user/assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
<script src="{{asset('user/assets/vendors/magnific-popup/magnific-popup.js')}}"></script>
<script src="{{asset('user/assets/vendors/counter/waypoints-min.js')}}"></script>
<script src="{{asset('user/assets/vendors/counter/counterup.min.js')}}"></script>
<script src="{{asset('user/assets/vendors/imagesloaded/imagesloaded.js')}}"></script>
<script src="{{asset('user/assets/vendors/masonry/masonry.js')}}"></script>
<script src="{{asset('user/assets/vendors/masonry/filter.js')}}"></script>
<script src="{{asset('user/assets/vendors/owl-carousel/owl.carousel.js')}}"></script>
<script src="{{asset('user/assets/js/functions.js')}}"></script>
<script src="{{asset('user/assets/js/contact.js')}}"></script>
<script src="{{asset('user/assets/vendors/switcher/switcher.js')}}"></script>
</body>

</html>
