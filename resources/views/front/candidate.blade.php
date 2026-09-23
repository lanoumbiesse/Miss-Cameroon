@extends('front.layout1')
@section('head')
<style type="text/css">
	.section_padding{
		    padding: 170px 0px !important;
	}
	.social_icon i,.add_to_cart i{
		line-height:45px !important;
	}
	.like_us{
		line-height: 32px !important;
		margin-left: 0px !important;
	}
	.ti-heart{
		font-size: 16px;
	}
	.product_image_area,.product_list{
		background: #ffff !important;
	}
  .s_product_text .btn_3{
  background-color: #e82294;
    color: white;
  }
  .s_product_text .add_to_cart{
    margin:0px !important;
  }
</style>
@endsection
@section('main')

 @include('front.partials.carousel')
 @if($endvote==1)
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                  <strong>Fin des votes !</strong> Les votes ont été arrêtés..
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
             @endif
  <!--================Single Product Area =================-->
  <div class="product_image_area section_padding" style="margin-top: -100px;" id="candidatesection">
    <div class="container">
      <div class="row s_product_inner">
        <div class="col-lg-5">
          <div class="product_slider_img">
            <div id="vertical">
                 @foreach($candidate->pictures()->get() as $key=> $picture)
    
                 <div data-thumb="{{asset($picture->chemin)}}">
                            <img src="{{asset($picture->chemin)}}" />
                          </div>
            	@endforeach
             
            </div>
          </div>
        </div>
        <div class="col-lg-5 offset-lg-1">
          <div class="s_product_text">
            <h3>{{$candidate->nom}} {{$candidate->prenom}}</h3>
            <h2><a href="#" class="like_us"> <i class="ti-heart"></i> </a> <span style="    color: #e82294;">@if($affichage==1) {{round($candidate->nbvote*100/$totalvote,3)}}% de @else {{$candidate->nbvote}} @endif Votes </span></h2>
            <ul class="list">
              <li>
                <a class="active" href="#">
                  <span>Numéro</span> : {{$candidate->numero_candidate}}</a>
              </li>
              <li>
                <a href="#"> <span>Statut</span> : 	@if(!empty($candidate->waist)) {{$candidate->waist}}
	              		@endif</a>
              </li>
              <li>
                <a href="#"> <span>Profession</span> : @if(!empty($candidate->shortdesc)){{$candidate->shortdesc}}
	              		@endif</a>
              </li>
              <!--<li>
                <a href="#"> <span>Titre</span> : <span style="width: 300px;color: #e82294;position:absolute;">{{$candidate->rang}}</span></a>
              </li>-->
            </ul>
            <p>
                {{$candidate->shortdesc}}
            </p>
            <div class="card_area" style="margin-top: -25px;">
                 @if($endvote!=1)
              <div class="add_to_cart">
                 <a href="#" class="btn_3" onclick="showamountpage();return false;">Voter pour elle</a>
                  
              </div>
              @endif
              <div class="social_icon">
                  <a href="{{$candidate->facebook_link}}" class="fb" target="_blank"><i class="ti-facebook"></i></a>
                  <a href="{{$candidate->instagram_link}}" class="li" target="_blank"><i class="ti-instagram"></i></a>
                  <a href="#" class="tw"><i class="ti-twitter-alt"></i></a>
              </div>
            </div>
            
             <!--<div class="card_area" style="margin-top: -25px;">
                  <p style="font-weight: bold;
    font-family: 'Quicksand','Roboto';">Participez au jeu concours, faites votre pronostic et gagnez une cagnotte; <span style="color:#e82294; font-size:20px;">300000fcfa</span> à gagner.</p>
              <div class="add_to_cart">
                  <a href="{{url('/comicash')}}" class="btn_3" style="background-color: #7f07d9;
    color: white;">Je participe</a>
                  
              </div>
              
            </div>-->
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->

 

  <!-- product_list part start-->
  <section class="product_list best_seller padding_bottom" style="margin-top: -150px;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="section_tittle text-center">
            <h2>Meilleures votes</h2>
          </div>
        </div>
      </div>
      <div class="row">
          @foreach($candidates as $key=> $candidate1)
          <div class="col-lg-3 col-sm-6">
              <div class="single_category_product">
                  <div class="single_category_img">
                      <img src="{{asset($candidate1->pictures()->where('type','44')->first()->chemin)}}" alt="">
                      <div class="category_social_icon">
                          <ul>
                              <li><a href="#"><i class="ti-heart"></i></a></li>
                              <li><a href="#"><i class="ti-bag"></i></a></li>
                          </ul>
                      </div>
                      <div class="category_product_text">
                          <a href="{{url('/profile/'.$candidate1->web_id)}}"><h5>{{$candidate1->nom}} {{$candidate1->prenom}}</h5></a>
                          <!--<p class="like_us"><i class="ti-heart"></i>{{$candidate1->nbvote}} votes</p>-->
                      </div>
                  </div>
              </div>
          </div>
          @endforeach
          
      </div>
    </div>
  </section>
  <!-- product_list part end-->


<div id="modal-code" class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
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
	    <span class="like_us mr-1"><i class="ti-heart"></i></span> @if($affichage==1) {{round($candidate->nbvote*100/$totalvote,3)}}% de @else {{$candidate->nbvote}} @endif Votes
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

@endsection

@section('footer')
<script src="{{ asset('winter/js/custom.js')}}"></script>
<script type="text/javascript">
  
  function showamountpage(){
    $("#modal-code").modal('show');
  }
 	function disablebt(id){
  document.getElementById('#=vote_'+id).disabled = true;
}

	function selectdevise(val,id){
		if(val.value=="USD" || val.value=='EUR'){
			$('#bloc_xaf_'+id).hide();
			$('#bloc_eur_usd_'+id).show();
			document.getElementById("montant1_"+id).required = false;
			document.getElementById("montant2_"+id).required = true;
		}
		if(val.value=="XAF"){
			$('#bloc_xaf_'+id).show();
			$('#bloc_eur_usd_'+id).hide();
			document.getElementById("montant1_"+id).required = true;
			document.getElementById("montant2_"+id).required = false;
		}
	}
</script>
@endsection