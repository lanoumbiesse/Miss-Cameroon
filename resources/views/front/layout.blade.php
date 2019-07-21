<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="{{ config('app.locale') }}"> <!--<![endif]-->
<head>

	<!--- basic page needs
	================================================== -->
	<meta charset="utf-8">
	<title>People's choice</title>
	<meta name="description" content="{{ isset($post) && $post->meta_description ? $post->meta_description : __('description') }}">
	<meta name="author" content="@lang(lcfirst ('Author'))">
	@if(isset($post) && $post->meta_keywords)
		<meta name="keywords" content="{{ $post->meta_keywords }}">
	@endif
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- mobile specific metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
	================================================== -->

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<!-- Bootstrap core CSS -->
	<link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="{{ asset('css/mdb.min.css')}}" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="{{ asset('css/style.min.css')}}" rel="stylesheet">
	<style type="text/css">
		@media (min-width: 800px) and (max-width: 850px) {
						.navbar:not(.top-nav-collapse) {
								background: #1C2331!important;
						}
				}
	</style>
	@yield('css')

	<style>
		.search-wrap .search-form::after {
			content: "@lang('Press Enter to begin your search.')";
		}
	</style>


	<!-- script
	================================================== -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>

	<!-- favicons
	================================================== -->
	<link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
	<link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">

</head>

<body id="top">
@include('front.navmenu')
@include('front.carousel')

   @yield('main')

   <!-- footer
   ================================================== -->

	   <!--Footer-->
	   <footer class="page-footer text-center font-small mt-4 wow fadeIn">

	     <!--Call to action-->

	     <!--/.Call to action-->


	     <!-- Social icons -->
	     <div class="pb-4" style="background-color:white;">
						<img src="{{asset('/images/logo1.png')}}" width="100">

				 <a href="#" target="_blank" class="btn-social btn-facebook"><i class="fab fa-facebook-f"></i></a>
  				<a href="#" target="_blank" class="btn-social btn-instagram"><i class="fab fa-instagram"></i></a>
  				<a href="#" target="_blank" class="btn-social btn-twitter"><i class="fab fa-twitter"></i></a>

	     </div>
	     <!-- Social icons -->

	     <!--Copyright-->
	     <div class="footer-copyright py-3">
	       © 2019 Copyright:
	       <a href="#" target="_blank"> Weloobe.com </a>
	     </div>
	     <!--/.Copyright-->

	   </footer>

   <div id="preloader">
    	<div id="loader"></div>
   </div>

   <!-- Java Script
   ================================================== -->
   <script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
   <script src="{{ asset('js/plugins.js') }}"></script>
   <script src="{{ asset('js/main.js') }}"></script>
   <script>
	   $(function() {
		   $('#logout').click(function(e) {
			   e.preventDefault();
			   $('#logout-form').submit()
		   })
	   })
   </script>

	 <!-- SCRIPTS -->
	 <!-- JQuery -->
	 <script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>
	 <!-- Bootstrap tooltips -->
	 <script type="text/javascript" src="{{ asset('js/popper.min.js')}}"></script>
	 <!-- Bootstrap core JavaScript -->
	 <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
	 <!-- MDB core JavaScript -->
	 <script type="text/javascript" src="{{ asset('js/mdb.min.js')}}"></script>
		 <!-- Initializations -->
 <script type="text/javascript">
	 // Animations initialization
	 new WOW().init();

 </script>

   @yield('scripts')

</body>

</html>
