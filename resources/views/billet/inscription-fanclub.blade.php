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

  <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url('<?php echo url('/'); ?>/deejee/images/photo3.jpg');"
    data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
          <h1 class="text-white">BILLETS "FAN CLUB" POUR LA FINALE NATIONALE</h1>
         
        </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row">
  
        <div class="col-md-12 col-lg-7 mb-5" style="margin:auto;">
  
  
  
          <form action="https://vote.misscameroun.org/billet/inscrire-fanclub" class="contact-form" method="post" enctype="multipart/form-data">
              
            
  
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="fullname">Nom *</label>
                <input type="text" id="fullname" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" placeholder="Saisissez votre nom" name="nom" required>
                 @if ($errors->has('nom'))
                <span class="invalid feedback"role="alert">
                    <strong style="color:red">{{ $errors->first('nom') }}.</strong>
                </span>
                @endif
              </div>
            </div>
             <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="prenom">Prenom *</label>
                <input type="text"  class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" id="prenom" placeholder="Saisissez votre prenom" name="prenom" required>
                @if ($errors->has('prenom'))
                <span class="invalid feedback"role="alert">
                    <strong style="color:red">{{ $errors->first('prenom') }}.</strong>
                </span>
                @endif
              </div>
            </div>
            
            
            <div class="row form-group">
              <div class="col-md-12">
                <label class="font-weight-bold" for="email">Email *</label>
                <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Saisissez votre adresse email" name="email" required>
                  @if ($errors->has('email'))
                <span class="invalid feedback"role="alert">
                    <strong style="color:red">{{ $errors->first('email') }}.</strong>
                </span>
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
                <label class="font-weight-bold" for="age">Numero CNI </label>
                <input type="text" id="cni" class="form-control{{ $errors->has('cni') ? ' is-invalid' : '' }}" placeholder="Saisissez votre numero de cni" name="cni">
                  @if ($errors->has('cni'))
                <span class="invalid feedback"role="alert">
                    <strong style="color:red">{{ $errors->first('cni') }}.</strong>
                </span>
                @endif
              </div>
            </div>
            
          <div class="row form-group">
              <div class="col-md-12">
                <label class="font-weight-bold" for="age">Nombre de billets </label>
                <input type="number" id="nbre_billet" class="form-control{{ $errors->has('nbre_billet') ? ' is-invalid' : '' }}" placeholder="Saisissez le nombre de billet souhaite" name="nbre_billet">
                  @if ($errors->has('nbre_billet'))
                <span class="invalid feedback"role="alert">
                    <strong style="color:red">{{ $errors->first('nbre_billet') }}.</strong>
                </span>
                @endif
              </div>
            </div>
            
         
            
           
            
         
            
          
            
        
            
         
  
  
          
  
            <div class="row form-group">
              <div class="col-md-12">
                <input type="submit" value="Commander" class="btn btn-primary py-3 px-4">
              </div>
              <p><i></i>NB: vous serez redirigé pour effectuer le paiement.</i></p>
            </div>
  
  
          </form>
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