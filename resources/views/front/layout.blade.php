<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="{{ config('app.locale') }}"> <!--<![endif]-->
<head>

	<!--- basic page needs
	================================================== -->
	<meta charset="utf-8">
	<title>{{ isset($post) && $post->seo_title ? $post->seo_title :  __(lcfirst('Title')) }}</title>
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
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="css/mdb.min.css" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="css/style.min.css" rel="stylesheet">
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
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

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
	     <div class="pt-4">
	       <a class="btn btn-outline-white" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" target="_blank" role="button">Download MDB
	         <i class="fas fa-download ml-2"></i>
	       </a>
	       <a class="btn btn-outline-white" href="https://mdbootstrap.com/education/bootstrap/" target="_blank" role="button">Start free tutorial
	         <i class="fas fa-graduation-cap ml-2"></i>
	       </a>
	     </div>
	     <!--/.Call to action-->

	     <hr class="my-4">

	     <!-- Social icons -->
	     <div class="pb-4">
	       <a href="https://www.facebook.com/mdbootstrap" target="_blank">
	         <i class="fab fa-facebook-f mr-3"></i>
	       </a>

	       <a href="https://twitter.com/MDBootstrap" target="_blank">
	         <i class="fab fa-twitter mr-3"></i>
	       </a>

	       <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
	         <i class="fab fa-youtube mr-3"></i>
	       </a>

	       <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
	         <i class="fab fa-google-plus-g mr-3"></i>
	       </a>

	       <a href="https://dribbble.com/mdbootstrap" target="_blank">
	         <i class="fab fa-dribbble mr-3"></i>
	       </a>

	       <a href="https://pinterest.com/mdbootstrap" target="_blank">
	         <i class="fab fa-pinterest mr-3"></i>
	       </a>

	       <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
	         <i class="fab fa-github mr-3"></i>
	       </a>

	       <a href="http://codepen.io/mdbootstrap/" target="_blank">
	         <i class="fab fa-codepen mr-3"></i>
	       </a>
	     </div>
	     <!-- Social icons -->

	     <!--Copyright-->
	     <div class="footer-copyright py-3">
	       © 2018 Copyright:
	       <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> MDBootstrap.com </a>
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
	 <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	 <!-- Bootstrap tooltips -->
	 <script type="text/javascript" src="js/popper.min.js"></script>
	 <!-- Bootstrap core JavaScript -->
	 <script type="text/javascript" src="js/bootstrap.min.js"></script>
	 <!-- MDB core JavaScript -->
	 <script type="text/javascript" src="js/mdb.min.js"></script>
		 <!-- Initializations -->
 <script type="text/javascript">
	 // Animations initialization
	 new WOW().init();
 </script>

   @yield('scripts')

</body>

</html>
