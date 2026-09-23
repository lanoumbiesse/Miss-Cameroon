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
  
  
  
          <form action="https://vote.misscameroun.org/inscrire" class="contact-form" method="post" enctype="multipart/form-data">
              
             @if(isset($t) && $t=='failed')
            <label class="font-weight-bold" for="fullname" style="color: red;">Votre inscription n'a pas été prise en compte, veuillez vous inscrire à nouveau.</label>
             @else
            <label class="font-weight-bold" for="fullname" style="color: white;">Veuillez remplir ce formulaire pour vous inscrire.</label>
            @endif
            <div class="row form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="fullname">Nom *</label>
                <input type="text" id="fullname" class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" placeholder="Saisissez votre nom" name="nom"  required>
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
                <input type="text"  class="form-control{{ $errors->has('prenom') ? ' is-invalid' : '' }}" id="prenom" placeholder="Saisissez votre prenom" name="prenom"  required>
                @if ($errors->has('prenom'))
                <span class="invalid feedback"role="alert">
                    <strong style="color:red">{{ $errors->first('prenom') }}.</strong>
                </span>
                @endif
              </div>
            </div>
            
             <div class="row form-group">
              <div class="col-md-12">
                <label class="font-weight-bold" for="age">Age *</label>
                <input type="text" id="age" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" placeholder="Saisissez votre âge" name="age"  required>
                  @if ($errors->has('age'))
                <span class="invalid feedback"role="alert">
                    <strong style="color:red">{{ $errors->first('age') }}.</strong>
                </span>
                @endif
              </div>
            </div>
            
            <div class="row form-group">
              <div class="col-md-12">
                <label class="font-weight-bold" for="email">Email *</label>
                <input type="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Saisissez votre adresse email" name="email"   required>
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
                <input type="text" id="tel" class="form-control{{ $errors->has('numtel') ? ' is-invalid' : '' }}" placeholder="Saisissez votre numéro de téléphone" name="numtel" value="" required style="background-color: initial !important;">
                 @if ($errors->has('numtel'))
                <span class="invalid feedback"role="alert">
                    <strong style="color:red">{{ $errors->first('numtel') }}.</strong>
                </span>
                @endif
              </div>
            </div>
            
           
            
            <div class="row form-group">
              <div class="col-md-12">
                <label class="font-weight-bold" for="niveau">Niveau Scolaire *</label>
                <input type="text" id="niveau" class="form-control{{ $errors->has('niveau') ? ' is-invalid' : '' }}" placeholder="Saisissez votre niveau scolaire" name="niveau" required>
                 @if ($errors->has('niveau'))
                <span class="invalid feedback"role="alert">
                    <strong style="color:red">{{ $errors->first('niveau') }}.</strong>
                </span>
                @endif
              </div>
            </div>
            
            <div class="row form-group">
              <div class="col-md-12">
                <label class="font-weight-bold" for="profession">Profession *</label>
                <input type="text" id="profession" class="form-control{{ $errors->has('profession') ? ' is-invalid' : '' }}" placeholder="Saisissez votre profeesion" name="profession" required>
                  @if ($errors->has('profession'))
                <span class="invalid feedback"role="alert">
                    <strong style="color:red">{{ $errors->first('profession') }}.</strong>
                </span>
                @endif
              </div>
            </div>
            
            <div class="row form-group">
              <div class="col-md-12">
                <label class="font-weight-bold" for="profession">Pays de residence *</label>
                <input type="text" id="pays" class="form-control{{ $errors->has('pays') ? ' is-invalid' : '' }}" placeholder="Saisissez votre pays de residence" name="pays" required>
                   @if ($errors->has('pays'))
                <span class="invalid feedback"role="alert">
                    <strong style="color:red">{{ $errors->first('pays') }}.</strong>
                </span>
                @endif
              </div>
            </div>
            
             <div class="row form-group">
              <div class="col-md-12">
                <label class="font-weight-bold" for="profession">Ville de residence *</label>
                <input type="text" id="ville" class="form-control{{ $errors->has('ville') ? ' is-invalid' : '' }}" placeholder="Saisissez votre ville de residence" name="ville" required>
                   @if ($errors->has('ville'))
                <span class="invalid feedback"role="alert">
                    <strong style="color:red">{{ $errors->first('ville') }}.</strong>
                </span>
                @endif
              </div>
            </div>
            
            <div class="row form-group">
              <div class="col-md-12">
                <label class="font-weight-bold" for="Ro">Region d'origne *</label>
                <select  name="Ro" required class="form-control">
                  
                   <option value="ADAMAOUA">Adamaoua</option>
                   <option value="CENTRE">Centre</option>
                   <option value="EST">Est</option>
                   <option value="EXTREME NORD">Extreme Nord</option>
                   <option value="LITTORAL">Littoral</option>
                   <option value="NORD">Nord</option>
                   <option value="NORD-OUEST">Nord-Ouest</option>
                   <option value="OUEST">Ouest</option>
                   <option value="SUD">Sud</option>
                   <option value="SUD-OUEST">Sud-Ouest</option>
</select>
              </div>
            </div>
            
                <div class="row form-group">
              <div class="col-md-12">
                <label class="font-weight-bold" for="Rc">Concours de preselection </label>
                <select  name="Rc" required class="form-control">
                   
                   <option value="ADAMAOUA">Adamaoua</option>
                   <option value="CENTRE">Centre</option>
                   <option value="Diaspora">Diaspora</option>
                   <option value="EST">Est</option>
                 <option value="EXTREME NORD">Extreme Nord</option>
                   <option value="LITTORAL">Littoral</option>
                   <option value="NORD">Nord</option>
                   <option value="NORD-OUEST">Nord-Ouest</option>
                   <option value="OUEST">Ouest</option>
                   <option value="SUD">Sud</option>
                   <option value="SUD-OUEST">Sud-Ouest</option>
</select>
              </div>
            </div>
            
        
            
            <div class="row form-group">
              <div class="col-md-12">
                <label class="font-weight-bold" for="profession" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}">Une photo entière de vous * </label>
                   <input type="file" id="img" name="image" accept="image/*" required>
                     @if ($errors->has('image'))
                <span class="invalid feedback"role="alert">
                    <strong style="color:red">{{ $errors->first('image') }}.</strong>
                </span>
                @endif
              </div>
            </div>
  
  
          
  
            <div class="row form-group">
              <div class="col-md-12">
                 <label style="color:green;">NB:En cliquant sur le bouton "s'inscrire", vous serez dirigé vers la page de paiement des frais d'inscription. </label>
                <label style="color:red;">Votre inscription ne sera prise en compte que si vous payez vos frais d'inscription ! </label>

                <input type="submit" value="S'inscrire" class="btn btn-primary py-3 px-4">
              </div>
            </div>
  
  
          </form>
        </div>
  
        <div class="col-lg-4 ml-auto">
          <div class="p-4 mb-3 bg-white">
           <h3 class="h5 font-weight-bold mb-3" style ="color:red"><u>NOTEZ BIEN</u></h3>
            <p style="color:red">Votre inscription ne sera prise en compte que si vous payez vos frais d'inscription. </p>
            
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