
 <section class="ftco-section ftco-no-pt" style="margin-top: 10px;" id="candidatesection">
      
         @if($endvote==1)
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                  <strong>Fin des votes !</strong> Les votes ont été arrêtés..
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
             @endif
      <div class="container-fluid px-md-2 blog-entry">
    
                                    <h1 class="row" style="color: white;
font-weight: bold;
margin: 15px 0px;
    margin-right: 0px;
    margin-left: 0px;
font-size: 26px;
text-align: center;

display: block;
margin-left: auto;
margin-right: auto;"> CANDIDATES OUEST </h1>

        <div class="row">
            
           
            @foreach($candidates as $key=> $candidate)

			@if(!empty($candidate->pictures()->first()))
          <div class="col-xs-12 col-sm-6 col-md-4" style="padding: 10px;" data-aos="fade-up">
          	<a href="{{url('/profile/'.$candidate->web_id)}}" >
          	   <span class="font-bold" style="float: right;z-index: 10001; position: absolute;top: 10px;right: 10px;font-weight:bold;
          	   background-color: #e82294; border: 1px solid #e82294;padding: 10px;color: white;border-top-right-radius: 16px;"> @if($affichage==1) {{round($candidate->nbvote*100/$totalvote1,3)}}% de @else {{$candidate->nbvote}} @endif Votes </span>
          	<figure>
                        
            <div class="model img d-flex align-items-end" style="background-image: url({{$candidate->pictures()->where('type','44')->first()->chemin}});">
            	<div class="desc w-100 px-4">
								<div class="info w-100 mb-4">
								
								</div>
	              <div class="text w-100 mb-3 s_product_text">
	             	<h2><button type="button" class="meta" onclick="showamountpage({{$candidate->id}});return false;">
	              	{{$candidate->nom}}<br> {{$candidate->prenom}}
	              		
	              		<div style="margin-left:0px;color: #f5dc22;font-family: cursive;"> {{$candidate->rang}} 
	              		@if(!empty($candidate->numero_candidate) && ($candidate->numero_candidate !=0))<span style="margin-left: 10px;"> No {{$candidate->numero_candidate}}</span>
	              		@endif</div>
	              		<div style="margin-left:0px;color: #f5dc22;font-family: cursive;">
	              		@if(!empty($candidate->waist))<span style="margin-left: 10px;"> {{$candidate->waist}}</span>
	              		@endif</div>
	              		 @if($endvote!=1)
	              	 	<div  class="btn_3"> voter pour elle</div>
	              	 	@endif
	              	</button></h2> 
	              </div>
              </div>
            </div>
            </figure>
           </a>
          </div>
            @if($key==8)
             
          <!--<div class="main3 row col-sm-12" data-aos="fade-up">
            <div class="col-md-6 col-sm-12" style="margin-top: 15px;margin-bottom: 10px;">
              <center>
                <h2 class="title title-center white">
                  <span class="yel">COMICASH</span>
                </h2>
                <p style="font-weight: bold;
    font-family: 'Quicksand','Roboto';font-size:18px;">Participez au jeu concours, faites votre pronostic et gagnez une cagnotte; <span style="color:#efbf0b; font-size:20px;">300000fcfa</span> à gagner.</p>
                <div class="add_to_cart">
                  <a href="{{url('/comicash')}}" class="btn_3" style="background-color: #7f07d9;
    color: white;">Je participe</a>
                  
              </div>
              </center>
            </div>
            <div class="col-md-6 col-sm-12">
            	 <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/NfBNcAqdY8E" allowfullscreen style="height: 100%;width: 90%;position: relative;left: 5%;"></iframe>
            	 <img src="{{asset('images/comicash.jpg')}}" class="img-fluid rounded-start" width="300" alt="https://vote.misscameroun.org/TOP 6">
            </div>
          </div>-->
          
            @endif
            @endif
            @endforeach
            
            
            
          
         
			

        </div>
        
                         <h1 class="row" style="color: white;
font-weight: bold;
margin: 15px 0px;
    margin-right: 0px;
    margin-left: 0px;
font-size: 26px;
text-align: center;

display: block;
margin-left: auto;
margin-right: auto;"> CANDIDATES NORD-OUEST  </h1>

        <div class="row">
            
           
              
            @foreach($candidates2 as $key=> $candidate)

			@if(!empty($candidate->pictures()->first()))
          <div class="col-xs-12 col-sm-6 col-md-4" style="padding: 10px;" data-aos="fade-up">
          	<a href="{{url('/profile/'.$candidate->web_id)}}" >
          	   <span class="font-bold" style="float: right;z-index: 10001; position: absolute;top: 10px;right: 10px;font-weight:bold;
          	   background-color: #e82294; border: 1px solid #e82294;padding: 10px;color: white;border-top-right-radius: 16px;">@if($affichage==1) {{round($candidate->nbvote*100/$totalvote2,3)}}% de @else {{$candidate->nbvote}} @endif Votes  </span>
          	<figure>
                        
            <div class="model img d-flex align-items-end" style="background-image: url({{$candidate->pictures()->where('type','44')->first()->chemin}});background-size: contain;background-repeat: repeat;">
            	<div class="desc w-100 px-4">
								<div class="info w-100 mb-4">
								
								</div>
	              <div class="text w-100 mb-3 s_product_text">
	             	<h2><button type="button" class="meta" onclick="showamountpage({{$candidate->id}});return false;">
	              	{{$candidate->nom}}<br> {{$candidate->prenom}}
	              		
	              		<div style="margin-left:0px;color: #f5dc22;font-family: cursive;"> {{$candidate->rang}} 
	              		@if(!empty($candidate->numero_candidate) && ($candidate->numero_candidate !=0))<span style="margin-left: 10px;"> No {{$candidate->numero_candidate}}</span>
	              		@endif</div>
	              		 @if($endvote!=1)
	              	 	<div  class="btn_3"> voter pour elle</div>
	              	 	@endif
	              	</button></h2> 
	              </div>
              </div>
            </div>
            </figure>
           </a>
          </div>
            @if($key==8)
             
          <!--<div class="main3 row col-sm-12" data-aos="fade-up">
            <div class="col-md-6 col-sm-12" style="margin-top: 15px;margin-bottom: 10px;">
              <center>
                <h2 class="title title-center white">
                  <span class="yel">COMICASH</span>
                </h2>
                <p style="font-weight: bold;
    font-family: 'Quicksand','Roboto';font-size:18px;">Participez au jeu concours, faites votre pronostic et gagnez une cagnotte; <span style="color:#efbf0b; font-size:20px;">300000fcfa</span> à gagner.</p>
                <div class="add_to_cart">
                  <a href="{{url('/comicash')}}" class="btn_3" style="background-color: #7f07d9;
    color: white;">Je participe</a>
                  
              </div>
              </center>
            </div>
            <div class="col-md-6 col-sm-12">
            	 <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/NfBNcAqdY8E" allowfullscreen style="height: 100%;width: 90%;position: relative;left: 5%;"></iframe>
            	 <img src="{{asset('images/comicash.jpg')}}" class="img-fluid rounded-start" width="300" alt="https://vote.misscameroun.org/TOP 6">
            </div>
          </div>-->
          
            @endif
            @endif
            @endforeach
            
            </div>
            
         


            
        
      </div>
    </section>

@foreach($candidates as $candidate)
<div id="modal-code-{{$candidate->id}}" class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal_miss">
            <form action="{{url('/vote/paid/')}}" method="POST" id="formVote">
            <div class="modal-header head-table">
               <h3 class="white-text">{{$candidate->nom}} {{$candidate->prenom}}</h3>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">

<div class="row" id="blocInfos">
                        


<div class="col-sm-6 col-lg-6 col-md-6 col-xs-12" id="elt_form">


	<div class="row">
	<div class="col-xs-4">
	<img src="{{asset('images/partenaires/camtel1.jpg')}}" style="width:100px;height:100px;margin:5px; border:2px solid #8e44ad;float:right" class="img-responsive">
	</div>
	<div class="col-xs-4">
	<img src="{{asset('images/partenaires/canal2.jpeg')}}" style="width:100px;height:100px;margin:5px; border:2px solid #8e44ad;float:right" class="img-responsive">
	</div>

	</div>
    <div class="row"><input type="hidden" name="candidat" value="{{$candidate->id}}" id="candidat"></div>
    <hr class="myhr my-1">

   
	<label for="dev"><span class="obligatoire">*</span>Sélectionner la devise paiement</label>
	<select name="devise_{{$candidate->id}}" class="form-control"  required="" onchange="selectdevise(this,{{$candidate->id}})">
	<option value="">--CHOISIR--</option>
	<option value="XAF">FRANC CFA</option>
	<option value="EUR">EURO</option>
	<option value="USD">DOLLAR</option>
	</select>
	<div id="bloc_xaf_{{$candidate->id}}" style="display: none;">
	<label class="control-label" for="username"><span class="obligatoire">*</span>
	Entrer le montant: <span style="color:#003a73;font-weight:600;">1VOTE = 100XAF</span>
	</label>
	<div class="input-group">
	<input type="number" class="form-control ipText etranger" id="montant1_{{$candidate->id}}" name="montant1_{{$candidate->id}}" min="100" step="100" placeholder="Minimum = 100fcfa" required="">
	</div>
	</div>

	<div id="bloc_eur_usd_{{$candidate->id}}" style="display: none;">
	<label class="control-label" for="username"><span class="obligatoire">*</span>
	Entrer le montant: <span style="color:#003a73;font-weight:600;">4VOTES = 1USD | 5VOTES = 1EUR</span>
	</label>
	<div class="input-group">
	<input type="number" class="form-control ipText etranger" id="montant2_{{$candidate->id}}" name="montant2_{{$candidate->id}}" min="1" step="1" placeholder="Minimum = 1 EUR/USD" required="">
	</div>
	</div>


	<div class="row" style="margin-left: 0px;">
	<button type="button" class="close btn btn-primary waves-effect waves-light mynextbt1" data-dismiss="modal" aria-label="Close">
	Annuler | Fermer                
	</button>
	<button type="submit" class="btn btn-primary waves-effect waves-light mynextbt" id="btn_paid">
	 PROCEDER AU PAIEMENT               
	</button>

	</div>
	
	<div class="row mt-4 ml-1">
	    <span class="like_us mr-1"><i class="ti-heart"></i></span> @if($affichage==1) {{round($candidate->nbvote*100/$totalvote1,3)}}% de @else {{$candidate->nbvote}} @endif Votes
	</div>

</div>

<div class="col-sm-6 col-lg-6 col-md-6 col-xs-8" id="img_cdt">
	<img src="{{asset($candidate->pictures()->where('type','44')->first()->chemin)}}" id="img_vote">
</div>

</div>
</div>
<!--<div class="modal-footer">
<div class="main3 row col-sm-12" data-aos="fade-up">
<div class="col-md-6 col-sm-12" style="margin-top: 15px;margin-bottom: 10px;">
  <center>
    <h2 class="title title-center white">
      About <span class="yel">Company</span>
    </h2>
    <p class="italic">
      Izycoins is the first Ubiquitous Cloud Based platform exclusively for Cryptocurrency Arbitrage Trading.
    </p>
    <a href="#" class="btn btn-white btn-large">En Savoir Plus</a>
  </center>
</div>
<div class="col-md-6 col-sm-12">
	 <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/NfBNcAqdY8E" allowfullscreen style="height: 100%;width: 90%;position: relative;left: 5%;"></iframe>
</div>
</div> 
   
</div>-->
            </form>
        </div>
    </div>
</div>

@endforeach


@foreach($candidates2 as $candidate)
<div id="modal-code-{{$candidate->id}}" class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal_miss">
            <form action="{{url('/vote/paid/')}}" method="POST" id="formVote">
            <div class="modal-header head-table">
               <h3 class="white-text">{{$candidate->nom}} {{$candidate->prenom}}</h3>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">

<div class="row" id="blocInfos">
                        


<div class="col-sm-6 col-lg-6 col-md-6 col-xs-12" id="elt_form">


	<div class="row">

	<div class="col-xs-4">
	<img src="{{asset('images/partenaires/camtel1.jpg')}}" style="width:100px;height:100px;margin:5px; border:2px solid #8e44ad;float:right" class="img-responsive">
	</div>
	<div class="col-xs-4">
	<img src="{{asset('images/partenaires/canal2.jpeg')}}" style="width:100px;height:100px;margin:5px; border:2px solid #8e44ad;float:right" class="img-responsive">
	</div>

	</div>
    <div class="row"><input type="hidden" name="candidat" value="{{$candidate->id}}" id="candidat"></div>
    <hr class="myhr my-1">
    <!--<div class="row facebook">
        @if(Auth::user())
         @if(empty($statut))
        <p class="btext titresection text-center mb-0">Vous avez 1 vote gratuit</p>
        <div class="text-center mt-0 mb-2">
        <div class="add_to_cart">
          <a href="{{url('/vote/free/'.$candidate->id)}}" onclick="disablebt({{$candidate->id}})" class="btn_3" id="vote_{{$candidate->id}}">Voter gratuitement</a>
        </div>
        </div>
        @endif
        @else
		<p class="btext titresection text-center mb-0">Connectez-vous avec facebook pour voter gratuitement</p>
		<div class="text-center mt-0 mb-2">
		<a href="{{url('/getfacebookurl')}}" class="btn btn-fb"><i class="fab fa-facebook-f pr-1"></i>Se connecter avec facebook</a>
		</div>
		@endif
		<h5 class="strikethough"><span>Faire un vote payant</span></h5>
	</div>-->
   
	<label for="dev"><span class="obligatoire">*</span>Sélectionner la devise paiement</label>
	<select name="devise_{{$candidate->id}}" class="form-control"  required="" onchange="selectdevise(this,{{$candidate->id}})">
	<option value="">--CHOISIR--</option>
	<option value="XAF">FRANC CFA</option>
	<option value="EUR">EURO</option>
	<option value="USD">DOLLAR</option>
	</select>
	<div id="bloc_xaf_{{$candidate->id}}" style="display: none;">
	<label class="control-label" for="username"><span class="obligatoire">*</span>
	Entrer le montant: <span style="color:#003a73;font-weight:600;">1VOTE = 100XAF</span>
	</label>
	<div class="input-group">
	<input type="number" class="form-control ipText etranger" id="montant1_{{$candidate->id}}" name="montant1_{{$candidate->id}}" min="100" step="100" placeholder="Minimum = 100fcfa" required="">
	</div>
	</div>

	<div id="bloc_eur_usd_{{$candidate->id}}" style="display: none;">
	<label class="control-label" for="username"><span class="obligatoire">*</span>
	Entrer le montant: <span style="color:#003a73;font-weight:600;">4VOTES = 1USD | 5VOTES = 1EUR</span>
	</label>
	<div class="input-group">
	<input type="number" class="form-control ipText etranger" id="montant2_{{$candidate->id}}" name="montant2_{{$candidate->id}}" min="1" step="1" placeholder="Minimum = 1 EUR/USD" required="">
	</div>
	</div>


	<div class="row" style="margin-left: 0px;">
	<button type="button" class="close btn btn-primary waves-effect waves-light mynextbt1" data-dismiss="modal" aria-label="Close">
	Annuler | Fermer                
	</button>
	<button type="submit" class="btn btn-primary waves-effect waves-light mynextbt" id="btn_paid">
	 PROCEDER AU PAIEMENT               
	</button>

	</div>
	
	<div class="row mt-4 ml-1">
	    <span class="like_us mr-1"><i class="ti-heart"></i></span> @if($affichage==1) {{round($candidate->nbvote*100/$totalvote2,3)}}% de @else {{$candidate->nbvote}} @endif Votes 
	</div>

</div>

<div class="col-sm-6 col-lg-6 col-md-6 col-xs-8" id="img_cdt">
	<img src="{{asset($candidate->pictures()->where('type','44')->first()->chemin)}}" id="img_vote">
</div>

</div>
</div>
<!--<div class="modal-footer">
<div class="main3 row col-sm-12" data-aos="fade-up">
<div class="col-md-6 col-sm-12" style="margin-top: 15px;margin-bottom: 10px;">
  <center>
    <h2 class="title title-center white">
      About <span class="yel">Company</span>
    </h2>
    <p class="italic">
      Izycoins is the first Ubiquitous Cloud Based platform exclusively for Cryptocurrency Arbitrage Trading.
    </p>
    <a href="#" class="btn btn-white btn-large">En Savoir Plus</a>
  </center>
</div>
<div class="col-md-6 col-sm-12">
	 <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/NfBNcAqdY8E" allowfullscreen style="height: 100%;width: 90%;position: relative;left: 5%;"></iframe>
</div>
</div> 
   
</div>-->
            </form>
        </div>
    </div>
</div>

@endforeach



@foreach($candidates3 as $candidate)
<div id="modal-code-{{$candidate->id}}" class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal_miss">
            <form action="{{url('/vote/paid/')}}" method="POST" id="formVote">
            <div class="modal-header head-table">
               <h3 class="white-text">{{$candidate->nom}} {{$candidate->prenom}}</h3>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">

<div class="row" id="blocInfos">
                        


<div class="col-sm-6 col-lg-6 col-md-6 col-xs-12" id="elt_form">


	<div class="row">

	<div class="col-xs-4">
	<img src="{{asset('images/partenaires/camtel1.jpg')}}" style="width:100px;height:100px;margin:5px; border:2px solid #8e44ad;float:right" class="img-responsive">
	</div>
	<div class="col-xs-4">
	<img src="{{asset('images/partenaires/canal2.jpeg')}}" style="width:100px;height:100px;margin:5px; border:2px solid #8e44ad;float:right" class="img-responsive">
	</div>

	</div>
    <div class="row"><input type="hidden" name="candidat" value="{{$candidate->id}}" id="candidat"></div>
    <hr class="myhr my-1">
    <!--<div class="row facebook">
        @if(Auth::user())
         @if(empty($statut))
        <p class="btext titresection text-center mb-0">Vous avez 1 vote gratuit</p>
        <div class="text-center mt-0 mb-2">
        <div class="add_to_cart">
          <a href="{{url('/vote/free/'.$candidate->id)}}" onclick="disablebt({{$candidate->id}})" class="btn_3" id="vote_{{$candidate->id}}">Voter gratuitement</a>
        </div>
        </div>
        @endif
        @else
		<p class="btext titresection text-center mb-0">Connectez-vous avec facebook pour voter gratuitement</p>
		<div class="text-center mt-0 mb-2">
		<a href="{{url('/getfacebookurl')}}" class="btn btn-fb"><i class="fab fa-facebook-f pr-1"></i>Se connecter avec facebook</a>
		</div>
		@endif
		<h5 class="strikethough"><span>Faire un vote payant</span></h5>
	</div>-->
   
	<label for="dev"><span class="obligatoire">*</span>Sélectionner la devise paiement</label>
	<select name="devise_{{$candidate->id}}" class="form-control"  required="" onchange="selectdevise(this,{{$candidate->id}})">
	<option value="">--CHOISIR--</option>
	<option value="XAF">FRANC CFA</option>
	<option value="EUR">EURO</option>
	<option value="USD">DOLLAR</option>
	</select>
	<div id="bloc_xaf_{{$candidate->id}}" style="display: none;">
	<label class="control-label" for="username"><span class="obligatoire">*</span>
	Entrer le montant: <span style="color:#003a73;font-weight:600;">1VOTE = 100XAF</span>
	</label>
	<div class="input-group">
	<input type="number" class="form-control ipText etranger" id="montant1_{{$candidate->id}}" name="montant1_{{$candidate->id}}" min="100" step="100" placeholder="Minimum = 100fcfa" required="">
	</div>
	</div>

	<div id="bloc_eur_usd_{{$candidate->id}}" style="display: none;">
	<label class="control-label" for="username"><span class="obligatoire">*</span>
	Entrer le montant: <span style="color:#003a73;font-weight:600;">4VOTES = 1USD | 5VOTES = 1EUR</span>
	</label>
	<div class="input-group">
	<input type="number" class="form-control ipText etranger" id="montant2_{{$candidate->id}}" name="montant2_{{$candidate->id}}" min="1" step="1" placeholder="Minimum = 1 EUR/USD" required="">
	</div>
	</div>


	<div class="row" style="margin-left: 0px;">
	<button type="button" class="close btn btn-primary waves-effect waves-light mynextbt1" data-dismiss="modal" aria-label="Close">
	Annuler | Fermer                
	</button>
	<button type="submit" class="btn btn-primary waves-effect waves-light mynextbt" id="btn_paid">
	 PROCEDER AU PAIEMENT               
	</button>

	</div>
	
	<div class="row mt-4 ml-1">
	    <span class="like_us mr-1"><i class="ti-heart"></i></span> {{$candidate->nbvote}} votes 
	</div>

</div>

<div class="col-sm-6 col-lg-6 col-md-6 col-xs-8" id="img_cdt">
	<img src="{{asset($candidate->pictures()->where('type','44')->first()->chemin)}}" id="img_vote">
</div>

</div>
</div>
<!--<div class="modal-footer">
<div class="main3 row col-sm-12" data-aos="fade-up">
<div class="col-md-6 col-sm-12" style="margin-top: 15px;margin-bottom: 10px;">
  <center>
    <h2 class="title title-center white">
      About <span class="yel">Company</span>
    </h2>
    <p class="italic">
      Izycoins is the first Ubiquitous Cloud Based platform exclusively for Cryptocurrency Arbitrage Trading.
    </p>
    <a href="#" class="btn btn-white btn-large">En Savoir Plus</a>
  </center>
</div>
<div class="col-md-6 col-sm-12">
	 <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/NfBNcAqdY8E" allowfullscreen style="height: 100%;width: 90%;position: relative;left: 5%;"></iframe>
</div>
</div> 
   
</div>-->
            </form>
        </div>
    </div>
</div>

@endforeach

