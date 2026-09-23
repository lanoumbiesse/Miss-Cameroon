<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="{{ config('app.locale') }}"> <!--<![endif]-->

<head>
  <meta charset="utf-8">
    <title>People's choice</title>
    <meta name="description" content="Miss Cameroun Vote">
    <meta name="author" content="@lang(lcfirst ('Author'))">
    @if(isset($post) && $post->meta_keywords)
        <meta name="keywords" content="{{ $post->meta_keywords }}">
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,700,900" rel="stylesheet">
    <link href="{{asset('css/aos.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- Css Styles -->


    @include('front.partials.headertopmodelcss')
    @include('front.partials.headerwintercss')
    <link href="{{asset('css/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('js/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/style1.css')}}" rel="stylesheet">
  <link href="{{asset('css/home.css')}}" rel="stylesheet">
  <link href="{{asset('css/card.css')}}" rel="stylesheet">

       <style type="text/css">
             body{
       background: url('/images/theater-1713816.jpg') repeat center center;
      }
            .header-section{
                 background: #e82294 !important;
            }
            .ftco-footer {
                background: #e82294 !important;
            }
            .model:after {
         background: none !important;
     }
      .model .info ul{
        padding-bottom: 135px !important;
     }
     .blog-entry .meta {
       font-size: 20px;
    background: #e82294 !important;
    top: -161px !important;
    border-radius: 10px;
    color: white;
    font-weight: bold;
    border: 1px solid #e82294 !important;
}

    .s_product_text .like_us {
    width: 30px;
    height: 30px;
    line-height: 37px;
    color: #ffffff !important;
    background-color: #fd007a !important;
    }

    .btn_3{
    background-color: white;
    color: black;
    border-color: white;
    margin-left: -5px;
    margin-top: 5px;
    font-family: "Gotham Pro";
    text-align: center !important;
    }
    .btn_3:hover {
    background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d) !important;
    color: white !important;
    border-color: #e1306c !important;
}
    
    figure{
    background: #fff;
    border-radius: 16px;
    padding: 1rem;
    }
    figure:hover{
     background: #e82294  !important;
    }
   /* .ftco-section .model:hover {
   -ms-transform: scale(1.1);
-moz-transform: scale(1.1);
-webkit-transform: scale(1.1);
-o-transform: scale(1.1);
transform: scale(1.1);
}*/
   /* .banner_part{
        background: url(/images/bg1.jpg) no-repeat center center;
        background-size: cover;
        }

        .main_menu .main-menu-item ul li .nav-link {
            color: #fff;
            font-size: 16px;
        }

        .menu_fixed  ul li .nav-link {
            color: black !important;
        }

    .banner_text_iner h3, .banner_text_iner h1{
        color: white;
    }*/

    .swiper-slide .img-fluid{
        /*height: auto !important;
        max-height: 300px !important;*/

    }
    .swiper-slide{
        /*width: 350px !important;*/
    }
    #gallery{


    /*background-color: white;
    border-radius: 20px;
    border: 2px solid white;*/
    background: url(/images/backk6.jpg) center center repeat-x;
    }

    .main3 {
    color: #fff;
    min-height: 300px;
    padding: 24px 0px 20px 0px;
    background: url(/images/fond.jpg) center center repeat-x;
    width: 100%;
    margin: 10px 15px 20px 6px !important;
}
.main3 p,.main3 .title{
   color: white;
}
.main3 a.btn {
    margin: 0;
    margin-top: 30px;
    padding-left: 0;
    padding-right: 0;
    text-align: center;
    width: 139px;
    font-size: 12px;
    font-weight: bold;
    font-family: "Gotham Pro";
    letter-spacing: 0.1px;
    border-bottom: 4px solid #192c3e;
    transition: all 0.2s ease;
}
.btn.btn-large {
    padding: 15px 21px;
    font-size: 10px;
    height: 46px;
    font-size: 13px;
    letter-spacing: 0.02em;
}
.btn.btn-white {
    font-weight: 700;
    letter-spacing: 0.2em;
    text-transform: uppercase;
    font-size: 12px;
    color: #365573;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    box-shadow: 0 7px 15px 0 rgb(101 186 206 / 5%);
    background: #fff;
    background-position: right center;
    border-bottom: 2px solid #fff;
}

.main3 a.btn:hover {
    background: #e82294;
    color: #fff;
    border-color: #e82294;
    /* border-color: #fff; */
}


.embed-responsive {
    position: relative;
    display: block;
    width: 100%;
    padding: 0;
    overflow: hidden;
}

.get-started-btn{

    background: #565656;
    color: white;
    border:1px solid #565656;
    padding: 10px;
    text-align: center;
    vertical-align: middle;
    position: relative;
    border-radius: 10px;
    top: 15px;
}
.get-started-btn:hover{
    text-decoration: none;
    color: white;
}
.carousel-item img{
        max-width: 200px !important;
}
.partenaires{
   margin: 0px 10px;
    background: white;
    border:1px solid white;
    border-radius: 20px;
}
    

.ftco-navbar-light.scrolled .nav-link {
    color: #ffff !important;
    font-weight: bold !important;
}
.ftco-navbar-light.scrolled .nav-item.active > a {
    color: #f9b79f  !important;
}
.ftco-navbar-light.scrolled .navbar-brand {
    color: white !important;
    font-weight: 800 !important;
}
.bg-dark,.ftco-navbar-light.scrolled{
    background: #e82294 !important;
    font-weight: bold;
}

.modal_miss{
    background: #e82294 !important;
    color: white;
    font-weight: bold;
}
.white-text{
    color: white;
    font-weight: bold;
}
.mynextbt,.mynextbt1{
    padding: 10px 10px;
    margin-top: 20px;
    text-align: center;
    font-size: 14px;
    font-weight: bold;
    font-family: "Gotham Pro";
 
    
    transition: all 0.2s ease;
 
    background-color: white !important;
    color: #365573 !important;
}
.mynextbt{
    border-bottom: 4px solid #900459 !important;
}
.mynextbt1{
    padding: 10px 10px !important;
    margin-right: 10px;
}
.close{
    opacity: 0.95 !important;
}
.mynextbt:hover {
    color: #fff;
    border-radius: 15px;
    -moz-transition-duration: 0.3s;
    -webkit-transition-duration: 0.3s;
    -o-transition-duration: 0.3s;
    transition-duration: 0.3s;
    box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
}

.facebook{
    margin-left: 0px !important;
}
.myhr{
    color: white;
    border: 1px solid white;
}
.titresection{
    color: white !important;
}

.strikethough {
    width: 100%;
    text-align: center;
    border-bottom: 2px solid white;
    line-height: 0.1em;
    margin: 10px 0 15px;
    color: white;
}
.strikethough span {
    background: #e82294;
    padding: 0 10px;
    font-weight: bold;
}

.show1 ul{
    display: block;
    background-color: #f3048d;
    color: white
}
.ftco-navbar-light .navbar-nav > .nav-item > .nav-link {
    font-weight: bold;
    }
    .ftco-navbar-light .navbar-nav > .nav-item.active > a {
    color: #e8b29e;
    font-weight: 800 !important;
}
.navbar-brand span {
    color: #e8b29e !important;
}
.ftco-navbar-light.scrolled .navbar-toggler{
    color: white !important;
}

.navbar-nav>.user-menu .user-image {
    float: left;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    margin-right: 10px;
    margin-top: -2px;
}
.user-head{
    height: 175px;
    position: relative;
    left: 30%;
    text-align: center;
}
.user-menu .dropdown-toggle,.user-menu ul p{
    color: white !important;
}
.user-menu ul {
    background-color: #e82294 !important;
}

.show1 ul{
background-color: #e82294 !important;
}
.swiper-slide .img-fluid{
        height: 100px;
    width: auto !important;
}
    </style>
    @yield('head')
</head>

<body>
    <!-- Page Preloder -->
    <!--<div id="preloder">
        <div class="loader"></div>
    </div>-->
    @include('front.partials.header')

    @yield('main')


      <section id="gallery" class="gallery">
            <h2 class="my-0 text-center" style="color:white;">Nos partenaires</h2>
      <div class="container-fluid" data-aos="fade-up">
        <div class="gallery-slider swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><a href="{{asset('images/partenaires/camtel1.jpg')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('images/partenaires/camtel1.jpg')}}" class="img-fluid" alt=""></a>
            <!--<a href="#" class="get-started-btn">En savoir plus >></a>-->
            </div>
            <div class="swiper-slide"><a href="{{asset('images/partenaires/blue.png')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('images/partenaires/blue.png')}}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="{{asset('images/partenaires/art1.jpeg')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('images/partenaires/art1.jpeg')}}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="{{asset('images/partenaires/hilton.jpeg')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('images/partenaires/hilton.jpeg')}}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="{{asset('images/partenaires/port.jpeg')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('images/partenaires/port.jpeg')}}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="{{asset('images/partenaires/minfi.jpeg')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('images/partenaires/minfi.jpeg')}}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="{{asset('images/partenaires/canal2.jpeg')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('images/partenaires/canal2.jpeg')}}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="{{asset('images/partenaires/supermont.jpeg')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('images/partenaires/supermont.jpeg')}}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a href="{{asset('images/partenaires/bank.png')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('images/partenaires/bank.png')}}" class="img-fluid" alt=""></a></div>
            <!--<div class="swiper-slide"><a href="{{asset('images/partenaires/art7.jpeg')}}" class="gallery-lightbox" data-gall="gallery-carousel"><img src="{{asset('images/partenaires/art7.jpeg')}}" class="img-fluid" alt=""></a></div>-->
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->

    @include('front.partials.footer')

    @include('front.partials.topmodeljs')
    @include('front.partials.headerwinterjs')

     @yield('footer')
 <script src="{{asset('js/aos.js')}}"></script>
  <script src="{{asset('js/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('js/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('js/vendor/main.js')}}"></script>
</body>

</html>