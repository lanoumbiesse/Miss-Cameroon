<!DOCTYPE html>
<html lang="en">

<head>
  <title>Inscription</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Oswald:400,700">
  <link rel="stylesheet" href="<?php echo url('/'); ?>/deejee/fonts/icomoon/style.css">

  <link rel="stylesheet" href="<?php echo url('/'); ?>/deejee/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo url('/'); ?>/deejee/css/magnific-popup.css">
  <link rel="stylesheet" href="<?php echo url('/'); ?>/deejee/css/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo url('/'); ?>/deejee/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo url('/'); ?>/deejee/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?php echo url('/'); ?>/deejee/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="<?php echo url('/'); ?>/deejee/css/mediaelementplayer.css">
  <link rel="stylesheet" href="<?php echo url('/'); ?>/deejee/css/animate.css">
  <link rel="stylesheet" href="<?php echo url('/'); ?>/deejee/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="<?php echo url('/'); ?>/deejee/css/fl-bigmug-line.css">


  <link rel="stylesheet" href="<?php echo url('/'); ?>/deejee/css/aos.css">

  <link rel="stylesheet" href="<?php echo url('/'); ?>/deejee/css/style.css">

</head>

<body>



  <div class="site-wrap">

    <div class="site-navbar mt-4">
      <div class="container py-1">
        <div class="row align-items-center">
         
          


        </div>
      </div>
    </div>
  </div>

  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div> <!-- .site-mobile-menu -->

  <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('<?php echo url('/'); ?>/deejee/images/background.jpg');"
    data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
          <h1 class="text-white">INSCRIPTIONS</h1>
         
        </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row">
  
        <div class="col-md-12 col-lg-7 mb-5">
  
  
  
          <form action="https://vote.misscameroun.org/inscrire1" class="contact-form" method="post" enctype="multipart/form-data">
              
            
  
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                  @if($t=='success')
                <label class="font-weight-bold" for="fullname" style="color: white;">Étape 2: Finalisez votre inscription.</label>

                  @else
                <label class="font-weight-bold" for="fullname" style="color: white;">Étape 1: Entrez votre numéro de téléphone, puis payez les frais d'inscription. Une fois les frais payés, vous pourrez poursuivre votre inscription.</label>
               @endif
              </div>
            </div>
            
            
             <div class="row form-group">
              <div class="col-md-12">
                <label class="font-weight-bold" for="tel">Numéro de téléphone *</label>
                <input type="text" id="tel" class="form-control{{ $errors->has('numtel') ? ' is-invalid' : '' }}" placeholder="Saisissez votre numéro de téléphone" name="numtel" required>
                 @if ($errors->has('numtel'))
                <span class="invalid feedback"role="alert">
                    <strong style="color:red">{{ $errors->first('numtel') }}.</strong>
                </span>
                @endif
              </div>
            </div>
            
           
            
            
  
  
          
  
            <div class="row form-group">
              <div class="col-md-12">
                  @if($t=='success')
                  <h4 style="color:green;">Votre paiement a reussi ! </h4>
                  <input type="submit" value="Poursuivez votre inscription" class="btn btn-primary py-3 px-4">
                  @else
                 <h4 style="color:red;">NB: Vous serez redirigé pour payer les frais d'inscription ! </h4>
                <input type="submit" value="Procéder au paiement" class="btn btn-primary py-3 px-4">
                @endif
              </div>
            </div>
  
  
          </form>
        </div>
  
        <div class="col-lg-4 ml-auto">
          <div class="p-4 mb-3 bg-white">
           <h3 class="h5 font-weight-bold mb-3" style ="color:red"><u>NOTEZ BIEN</u></h3>
            <p style="color:red">Après votre inscription en ligne , vous recevrez un appel ou un message du COMICA , à fin  de finaliser votre inscription. </p>
            
            <p style="color:red">Les frais d'inscriptions s'élèvent à 10.000 fcfa et se payent en ligne.  <!--<a class="font-weight-bold" style ="color:red" href = "https://vote.misscameroun.org/images/calendrier.jpeg">ici</a>--></p>
            
  
          </div>
          
          
            <div class="p-4 mb-3 bg-white">
            <h3 class="h5 text-black mb-3">Contact Info</h3>
            <p class="mb-0 font-weight-bold text-black">Adresse</p>
            <p class="mb-4 text-black">Pharmacie Mvog-Ada,Yaounde,Cameroun</p>
  
            <p class="mb-0 font-weight-bold text-black">Telephone</p>
            <p class="mb-4"><a href="#">+237 693 14 73 13 , +237 656 37 26 66 , +237 677 75 16 56 , +237 695 84 79 83 </a></p>
  
            <p class="mb-0 font-weight-bold text-black">Adresse Email</p>
            <p class="mb-0"><a href="#">misscameroun@misscameroun.org , vanessa@misscameroun.org</a></p>
  
          </div>
          
          
  
       
  

  

  </div>
   </div>
    </div>
     </div>

  <script src="<?php echo url('/'); ?>/deejee/js/jquery-3.3.1.min.js"></script>
  <script src="<?php echo url('/'); ?>/deejee/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?php echo url('/'); ?>/deejee/js/jquery-ui.js"></script>
  <script src="<?php echo url('/'); ?>/deejee/js/popper.min.js"></script>
  <script src="<?php echo url('/'); ?>/deejee/js/bootstrap.min.js"></script>
  <script src="<?php echo url('/'); ?>/deejee/js/owl.carousel.min.js"></script>
  <script src="<?php echo url('/'); ?>/deejee/js/mediaelement-and-player.min.js"></script>
  <script src="<?php echo url('/'); ?>/deejee/js/jquery.stellar.min.js"></script>
  <script src="<?php echo url('/'); ?>/deejee/js/jquery.countdown.min.js"></script>
  <script src="<?php echo url('/'); ?>/deejee/js/jquery.magnific-popup.min.js"></script>
  <script src="<?php echo url('/'); ?>/deejee/js/bootstrap-datepicker.min.js"></script>
  <script src="<?php echo url('/'); ?>/deejee/js/aos.js"></script>
  <script src="<?php echo url('/'); ?>/deejee/js/circleaudioplayer.js"></script>

  <script src="<?php echo url('/'); ?>/deejee/js/main.js"></script>

</body>

</html>