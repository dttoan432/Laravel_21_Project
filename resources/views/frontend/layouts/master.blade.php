<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>javenist-E-Commerce HTML Template</title>
	<meta name="description" content>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Place favicon.ico in the root directory -->
	<link rel="shortcut icon" type="image/x-icon" href="/frontend/favicon.ico">

	<!-- Ionicons Font CSS-->
    <link rel="stylesheet" href="/frontend/css/ionicons.min.css">
	<!-- font awesome CSS-->
    <link rel="stylesheet" href="/frontend/css/font-awesome.min.css">

	<!-- Animate CSS-->
	<link rel="stylesheet" href="/frontend/css/animate.css">
	<!-- UI CSS-->
	<link rel="stylesheet" href="/frontend/css/jquery-ui.min.css">
	<!-- Chosen CSS-->
	<link rel="stylesheet" href="/frontend/css/chosen.css">
	<!-- Meanmenu CSS-->
	<link rel="stylesheet" href="/frontend/css/meanmenu.min.css">
	<!-- Fancybox CSS-->
	<link rel="stylesheet" href="/frontend/css/jquery.fancybox.css">
	<!-- Normalize CSS-->
	<link rel="stylesheet" href="/frontend/css/normalize.css">
	<!-- Nivo Slider CSS-->
	<link rel="stylesheet" href="/frontend/css/nivo-slider.css">
	<!-- Owl Carousel CSS-->
	<link rel="stylesheet" href="/frontend/css/owl.carousel.min.css">
	<!-- EasyZoom CSS-->
	<link rel="stylesheet" href="/frontend/css/easyzoom.css">
	<!-- Slick CSS-->
	<link rel="stylesheet" href="/frontend/css/slick.css">
	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
	<!-- Default CSS -->
	<link rel="stylesheet" href="/frontend/css/default.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="/frontend/css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="/frontend/css/responsive.css">
    <link rel="stylesheet" href="/frontend/css/account.css">
	<!-- Modernizr Js -->
	<script src="/frontend/js/modernizr-2.8.3.min.js"></script>
</head>
<body>
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<div class="wrapper home">
		@include('frontend.includes.header')

		@yield('content')

		@include('frontend.includes.footer')
	</div>


    <!--All Js Here-->

	<!--Jquery 1.12.4-->
	<script src="/frontend/js/jquery-1.12.4.min.js"></script>
	<!--Popper-->
	<script src="/frontend/js/popper.min.js"></script>
	<!--Bootstrap-->
	<script src="/frontend/js/bootstrap.min.js"></script>
	<!--Imagesloaded-->
	<script src="/frontend/js/imagesloaded.pkgd.min.js"></script>
	<!--Isotope-->
	<script src="/frontend/js/isotope.pkgd.min.js"></script>
	<!--Ui js-->
	<script src="/frontend/js/jquery-ui.min.js"></script>
	<!--Countdown-->
	<script src="/frontend/js/jquery.countdown.min.js"></script>
	<!--Counterup-->
	<script src="/frontend/js/jquery.counterup.min.js"></script>
	<!--ScrollUp-->
	<script src="/frontend/js/jquery.scrollUp.min.js"></script>
	<!--Chosen js-->
	<script src="/frontend/js/chosen.jquery.js"></script>
	<!--Meanmenu js-->
	<script src="/frontend/js/jquery.meanmenu.min.js"></script>
	<!--Instafeed-->
	<script src="/frontend/js/instafeed.min.js"></script>
	<!--EasyZoom-->
	<script src="/frontend/js/easyzoom.min.js"></script>
	<!--Fancybox-->
	<script src="/frontend/js/jquery.fancybox.pack.js"></script>
	<!--Nivo Slider-->
	<script src="/frontend/js/jquery.nivo.slider.js"></script>
	<!--Waypoints-->
	<script src="/frontend/js/waypoints.min.js"></script>
	<!--Carousel-->
	<script src="/frontend/js/owl.carousel.min.js"></script>
	<!--Slick-->
	<script src="/frontend/js/slick.min.js"></script>
	<!--Wow-->
	<script src="/frontend/js/wow.min.js"></script>
	<!--Plugins-->
	<script src="/frontend/js/plugins.js"></script>
	<!--Main Js-->
	<script src="/frontend/js/main.js"></script>
</body>
</html>
