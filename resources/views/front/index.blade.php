@extends('front.layout')
@section('css')
	<link href="{{asset('css/card.css')}}" rel="stylesheet">
	<link href="{{asset('css/home.css')}}" rel="stylesheet">

@endsection
@section('main')

<!--Main layout-->
<main>
  <div class="container">
		
    <!--Section: Main info-->
<!--@include('front.countdown')-->




    <section class="mt-5 wow fadeIn row col-md-12 col-sm-12 col-xs-12" id="sectioncard">

      <!--Grid row-->

			@foreach($candidates as $candidate)

			@if(!empty($candidate->pictures()->first()))
			<article class="card col-md-3   col-lg-3 col-sm-6 col-xs-6 px-0">
			  <div class="card__info-hover">
			      <div class="card__clock-info">
			        <span class="card__time">Découvrir Son Profil</span>
			      </div>

			  </div>
			  <div class="card__img"></div>
			  <a href="{{url('/profile/'.$candidate->web_id)}}" class="card_link">
			     <div class="card__img--hover" style="background-image: url({{$candidate->pictures()->where('type','44')->first()->chemin}}); background-position:top center;"></div>
			   </a>
			  <div class="card__info">

					<div class="row">
						@if(!empty($candidate->numero_candidate) && ($candidate->numero_candidate !=0))
						<div class="numb">
						<span>Candidate N<sup>o</sup>: {{$candidate->numero_candidate}}</span>
					 </div>
					 @endif
					<div class="nbvotes">
					 <i class="fa fa-heart"></i><span class="card__category nb">{{$candidate->nbvote}}</span> <span class="card__category"> Votes</span>
				 </div>
				 </div>
			    <h3 class="card__title">{{$candidate->nom}} {{$candidate->prenom}}</h3>
					@if(!empty($candidate->rang))
					<h5 style="font-weight: 400;">{{$candidate->rang}}</h5>
					@endif
				<!--	 <button type="button" class="btn btn-secondary row col-12"  onclick="showmodal({{$candidate->id}})">Voter</button>-->
					 <!--<span class="card__author" title="author">Suivez moi sur:</span>-->

				<div class="col-12 row">

				@if(!empty($candidate->facebook_link))
				<a href="{{url($candidate->facebook_link)}}" target="_blank" class="btn-social btn-facebook"><i class="fab fa-facebook-f"></i></a>
				@endif
				@if(!empty($candidate->instagram_link))
				<a href="{{url($candidate->instagram_link)}}" target="_blank" class="btn-social btn-instagram"><i class="fab fa-instagram"></i></a>
				@endif
				@if(!empty($candidate->twitter_link))
				<a href="{{url($candidate->twitter_link)}}" target="_blank" class="btn-social btn-twitter"><i class="fab fa-twitter"></i></a>
				@endif
				</div>
			  </div>

			</article>
			@endif
@endforeach

<br><br>





      <!--Grid row-->

    </section>
    <!--Section: Main info-->
@if(isset($candidates2))
		<!--Section: Main info-->
			<h3 class="text-center white-text" style="text-align:center; font-weight:bold;"> Candidates Est </h3>

		<section class="mt-5 wow fadeIn row col-md-12 col-sm-12 col-xs-12 sectioncard">


		@foreach($candidates2 as $candidate)

		@if(!empty($candidate->pictures()->first()))
		<article class="card col-md-3   col-lg-3 col-sm-6 col-xs-6 px-0">
			<div class="card__info-hover">
					<div class="card__clock-info">
						<span class="card__time">Découvrir Son Profil</span>
					</div>

			</div>
			<div class="card__img"></div>
			<a href="{{url('/profile/'.$candidate->web_id)}}" class="card_link">
				 <div class="card__img--hover" style="background-image: url({{$candidate->pictures()->where('type','44')->first()->chemin}});background-position:top center;"></div>
			 </a>
			<div class="card__info">
				<div class="row">
					@if(!empty($candidate->numero_candidate) && ($candidate->numero_candidate !=0))
					<div class="numb">
					<span>Candidate N<sup>o</sup>: {{$candidate->numero_candidate}}</span>
				 </div>
				 @endif
				<div class="nbvotes">
				 <i class="fa fa-heart"></i><span class="card__category nb">{{$candidate->nbvote}}</span> <span class="card__category"> Votes</span>
			 </div>
			 </div>
				<h3 class="card__title">{{$candidate->nom}} {{$candidate->prenom}}</h3>
			<!--	<button type="button" class="btn btn-secondary row col-12"  onclick="showmodal({{$candidate->id}})">Voter</button>-->
				 <!--<span class="card__author" title="author">Suivez moi sur:</span>-->

			<div class="col-12 row">

			@if(!empty($candidate->facebook_link))
			<a href="{{url($candidate->facebook_link)}}" target="_blank" class="btn-social btn-facebook"><i class="fab fa-facebook-f"></i></a>
			@endif
			@if(!empty($candidate->instagram_link))
			<a href="{{url($candidate->instagram_link)}}" target="_blank" class="btn-social btn-instagram"><i class="fab fa-instagram"></i></a>
			@endif
			@if(!empty($candidate->twitter_link))
			<a href="{{url($candidate->twitter_link)}}" target="_blank" class="btn-social btn-twitter"><i class="fab fa-twitter"></i></a>
			@endif
			</div>
			</div>

		</article>
		@endif
		@endforeach
		<!--Grid row-->

	</section>
	<!--Section: Main info-->
@endif
		<div class="container" style="margin-top:50px;">
			<h2 class="my-5 h3 text-center text-white">Nos partenaires</h2>
	    <div class="carousel slide" data-ride="carousel">
	        <div class="carousel-inner">
	            <div class="carousel-item active">
	                <div class="row">
	                    <div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art.jpg')}}" alt="1 slide"></div>
	                    <div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/tradex.jpeg')}}" alt="2 slide"></div>
	                    <div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/bonbonr.jpeg')}}" alt="3 slide"></div>
											<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/imhome.jpg')}}" alt="3 slide"></div>

	                </div>
	            </div>

	            <div class="carousel-item">
	                <div class="row">
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art1.jpeg')}}" alt="1 slide"></div>
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art2.jpeg')}}" alt="2 slide"></div>
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art3.jpeg')}}" alt="3 slide"></div>
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art4.jpeg')}}" alt="3 slide"></div>
	                </div>
	            </div>


	            <div class="carousel-item">
	                <div class="row">
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art5.jpeg')}}" alt="1 slide"></div>
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art6.jpeg')}}" alt="2 slide"></div>
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art7.jpeg')}}" alt="3 slide"></div>
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art8.jpeg')}}" alt="3 slide"></div>
	                </div>
	            </div>


	            <div class="carousel-item">
	                <div class="row">
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art9.jpeg')}}" alt="1 slide"></div>
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art10.jpeg')}}" alt="2 slide"></div>
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art11.jpeg')}}" alt="3 slide"></div>
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art12.jpeg')}}" alt="3 slide"></div>
	                </div>
	            </div>


	            <div class="carousel-item">
	                <div class="row">
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art13.jpeg')}}" alt="1 slide"></div>
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art14.jpeg')}}" alt="2 slide"></div>
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art15.jpeg')}}" alt="3 slide"></div>
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art16.jpeg')}}" alt="3 slide"></div>
	                </div>
	            </div>

	            <div class="carousel-item">
	                <div class="row">
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art18.jpeg')}}" alt="1 slide"></div>
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/tradex.jpg')}}" alt="2 slide"></div>
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/imhome.jpg')}}" alt="3 slide"></div>
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art17.jpeg')}}" alt="3 slide"></div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>

  </div>
</main>

<!-- Central Modal Medium Warning -->
@foreach($candidates as $candidate)
<div class="modal fade" id="voteview_{{$candidate->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-default" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
							<h3 class="white-text">{{$candidate->nom}} {{$candidate->prenom}}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">

							@if(!Auth::check())
							<p class="btext titresection text-center">Connectez-vous avec facebook pour voter gratuitement</p>
							  <hr class="my-0">
                <div class="text-center py-1">
                    <a href="{{url('/getfacebookurl')}}" class="btn btn-fb"><i class="fab fa-facebook-f pr-1"></i>Se connecter avec facebook</a>
                </div>
								<hr class="my-0">
								<p class="btext titresection text-center">Voter en utilisant nos offres payantes</p>
								<form method="post" action="{{url('/vote/paid/')}}">

									<table border="1" class="col-md-12 ml-auto mr-auto">
									  <tr class="trhead">
									  <td> 1 vote = </td>
									  <td> 100 XAF </td>
									  </tr>
									  <tr class="trhead">
									  <td>  5 votes =</td>
									  <td> 1 euro</td>
									  </tr>
									</table>


								<div class="form-row col-md-12 ml-auto mr-auto" id="mobilepart_{{$candidate->id}}">
								<h5 class="strikethough"><span>Payez avec Mtn ou Orange</span></h5>
								<label for="c1" class="row">Entrez le montant en fcfa</label>
								<input type="number" value="" onkeyup="checkmobileval(this,{{$candidate->id}});" onchange="checkmobileval(this,{{$candidate->id}});" placeholder="100 XAF" name="amount_{{$candidate->id}}" min="100" step="100" class="currency" id="c1_{{$candidate->id}}" required />
								</div>

								<div class="form-row col-md-12 ml-auto mr-auto" id="paypalpart_{{$candidate->id}}">
								<h5 class="strikethough"><span>Payez avec Paypal</span></h5>
								<label for="c1" class="row">Entrez le montant en euro (1 euro=1.46 Dollar Canadien)</label>
								<input type="number" value=""  onkeyup="checkpaypalval(this,{{$candidate->id}});" onchange="checkpaypalval(this,{{$candidate->id}});" placeholder="10 euro" name="amountpaypal_{{$candidate->id}}" min="1" step="1" class="currency" id="c2_{{$candidate->id}}" required />
								<p style="font-size: 12px; font-weight: bold;" id="netapayer">1 euro=1.46 CAD</p>
								</div>
								<input type="hidden" value="{{$candidate->id}}"  name="id_candidate">
								<div class="col-md-12 row my-3" style="justify-content: center;">
								<button type="submit" class="btn btn-primary" style="background-color: #c13584 !important;">suivant</button>
								</div>
								</form>

								@else

							  @if(empty($statut))
								<div class="text-center py-1">
								<p class="btext titresection text-center">Vous avez <strong>1</strong> vote gratuit.</p>
								<hr class="my-0">
								<a href="{{url('/vote/free/'.$candidate->id)}}" onclick="disablebt({{$candidate->id}})"  class="btn btn-secondary">Voter</a>
								<hr class="my-0">
								@else
								<p class="btext titresection text-center">Vous avez déja utiliser votre vote gratuit de la journée.</p>
								@endif
								<p class="btext titresection text-center">Voter en utilisant nos offres payantes</p>

								<form method="post" action="{{url('/vote/paid/')}}">

									<table border="1" class="col-md-12 ml-auto mr-auto">
										<tr class="trhead">
										<td> 1 vote = </td>
										<td> 100 XAF </td>
										</tr>
										<tr class="trhead">
										<td>  5 votes =</td>
										<td> 1 euro</td>
										</tr>
									</table>


								<div class="form-row col-md-12 ml-auto mr-auto" id="mobilepart_{{$candidate->id}}">
								<h5 class="strikethough"><span>Payez avec Mtn ou Orange</span></h5>
								<label for="c1" class="row">Entrez le montant en fcfa</label>
								<input type="number" value="" onkeyup="checkmobileval(this,{{$candidate->id}});" onchange="checkmobileval(this,{{$candidate->id}});" placeholder="100 XAF" name="amount_{{$candidate->id}}" min="100" step="100" class="currency" id="c1_{{$candidate->id}}" required />
								</div>

								<div class="form-row col-md-12 ml-auto mr-auto" id="paypalpart_{{$candidate->id}}">
								<h5 class="strikethough"><span>Payez avec Paypal</span></h5>
								<label for="c1" class="row">Entrez le montant en euro (1 euro=1.46 Dollar Canadien)</label>
								<input type="number" value=""  onkeyup="checkpaypalval(this,{{$candidate->id}});" onchange="checkpaypalval(this,{{$candidate->id}});" placeholder="10 euro" name="amountpaypal_{{$candidate->id}}" min="1" step="1" class="currency" id="c2_{{$candidate->id}}" required />
								<p style="font-size: 12px; font-weight: bold;" id="netapayer">1 euro=1.46CAD</p>
								</div>
								<input type="hidden" value="{{$candidate->id}}"  name="id_candidate">
								<div class="col-md-12 row my-3" style="justify-content: center;">
								<button type="submit" class="btn btn-primary" style="background-color: #c13584 !important;">suivant</button>
								</div>
								</form>

								</div>
							@endif
            </div>


        </div>
        <!--/.Content-->
    </div>
</div>
@endforeach


<!-- Central Modal Medium Warning -->
@if(isset($candidates2))
@foreach($candidates2 as $candidate)
<div class="modal fade" id="voteview_{{$candidate->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-default" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
							<h3 class="white-text">{{$candidate->nom}} {{$candidate->prenom}}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">

							@if(!Auth::check())
							<p class="btext titresection text-center">Connectez-vous avec facebook pour voter gratuitement</p>
							  <hr class="my-0">
                <div class="text-center py-1">
                    <a href="{{url('/getfacebookurl')}}" class="btn btn-fb"><i class="fab fa-facebook-f pr-1"></i>Se connecter avec facebook</a>
                </div>
								<hr class="my-0">
								<p class="btext titresection text-center">Voter en utilisant nos offres payantes</p>
								<form method="post" action="{{url('/vote/paid/')}}">

									<table border="1" class="col-md-12 ml-auto mr-auto">
									  <tr class="trhead">
									  <td> 1 vote = </td>
									  <td> 100 XAF </td>
									  </tr>
									  <tr class="trhead">
									  <td>  5 votes =</td>
									  <td> 1 euro</td>
									  </tr>
									</table>


								<div class="form-row col-md-12 ml-auto mr-auto" id="mobilepart_{{$candidate->id}}">
								<h5 class="strikethough"><span>Payez avec Mtn ou Orange</span></h5>
								<label for="c1" class="row">Entrez le montant en fcfa</label>
								<input type="number" value="" onkeyup="checkmobileval(this,{{$candidate->id}});" onchange="checkmobileval(this,{{$candidate->id}});" placeholder="100 XAF" name="amount_{{$candidate->id}}" min="100" step="100" class="currency" id="c1_{{$candidate->id}}" required />
								</div>

								<div class="form-row col-md-12 ml-auto mr-auto" id="paypalpart_{{$candidate->id}}">
								<h5 class="strikethough"><span>Payez avec Paypal</span></h5>
								<label for="c1" class="row">Entrez le montant en euro</label>
								<input type="number" value=""  onkeyup="checkpaypalval(this,{{$candidate->id}});" onchange="checkpaypalval(this,{{$candidate->id}});" placeholder="10 euro" name="amountpaypal_{{$candidate->id}}" min="1" step="1" class="currency" id="c2_{{$candidate->id}}" required />
								</div>
								<input type="hidden" value="{{$candidate->id}}"  name="id_candidate">
								<div class="col-md-12 row my-3" style="justify-content: center;">
								<button type="submit" class="btn btn-primary" style="background-color: #c13584 !important;">suivant</button>
								</div>
								</form>

								@else

							  @if(empty($statut))
								<div class="text-center py-1">
								<p class="btext titresection text-center">Vous avez <strong>1</strong> vote gratuit.</p>
								<hr class="my-0">
								<a href="{{url('/vote/free/'.$candidate->id)}}" onclick="disablebt({{$candidate->id}})"  class="btn btn-secondary">Voter</a>
								<hr class="my-0">
								@else
								<p class="btext titresection text-center">Vous avez déja utiliser votre vote gratuit de la journée.</p>
								@endif
								<p class="btext titresection text-center">Voter en utilisant nos offres payantes</p>

								<form method="post" action="{{url('/vote/paid/')}}">

									<table border="1" class="col-md-12 ml-auto mr-auto">
										<tr class="trhead">
										<td> 1 vote = </td>
										<td> 100 XAF </td>
										</tr>
										<tr class="trhead">
										<td>  5 votes =</td>
										<td> 1 euro</td>
										</tr>
									</table>


								<div class="form-row col-md-12 ml-auto mr-auto" id="mobilepart_{{$candidate->id}}">
								<h5 class="strikethough"><span>Payez avec Mtn ou Orange</span></h5>
								<label for="c1" class="row">Entrez le montant en fcfa</label>
								<input type="number" value="" onkeyup="checkmobileval(this,{{$candidate->id}});" onchange="checkmobileval(this,{{$candidate->id}});" placeholder="100 XAF" name="amount_{{$candidate->id}}" min="100" step="100" class="currency" id="c1_{{$candidate->id}}" required />
								</div>

								<div class="form-row col-md-12 ml-auto mr-auto" id="paypalpart_{{$candidate->id}}">
								<h5 class="strikethough"><span>Payez avec Paypal</span></h5>
								<label for="c1" class="row">Entrez le montant en euro</label>
								<input type="number" value=""  onkeyup="checkpaypalval(this,{{$candidate->id}});" onchange="checkpaypalval(this,{{$candidate->id}});" placeholder="10 euro" name="amountpaypal_{{$candidate->id}}" min="1" max="99" step="1" class="currency" id="c2_{{$candidate->id}}" required />
								<p style="font-size: 12px; font-weight: bold;">La somme maximale pour Paypal est limité à 99 euros, au-delà vous pouvez payer en plusieurs fois.</p>
								</div>
								<input type="hidden" value="{{$candidate->id}}"  name="id_candidate">
								<div class="col-md-12 row my-3" style="justify-content: center;">
								<button type="submit" class="btn btn-primary" style="background-color: #c13584 !important;">Suivant</button>
								</div>
								</form>

								</div>
							@endif
            </div>


        </div>
        <!--/.Content-->
    </div>
</div>
@endforeach
@endif
<!-- Central Modal Medium Warning-->
<div class="modal fade right" id="sideModalTR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-side modal-top-right" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100 white-text" id="myModalLabel">Statut</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"  class="white-text">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p class="btext titresection text-center">{{session('successfree')}}</p>


      </div>

    </div>
  </div>
</div>

<div class="modal fade right" id="sideModalfailed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-side modal-top-right" role="document">


    <div class="modal-content">
      <div class="modal-header" style="background-color:red !important;">
        <h4 class="modal-title w-100 white-text" id="myModalLabel">Statut</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"  class="white-text">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p class="btext titresection text-center">{{session('failedpaid')}}</p>


      </div>

    </div>
  </div>
</div>

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script>
$('#c2').mask('000000000');
@if(Session::has('successfree'))
	$('#sideModalTR').modal('show');
@endif
@if(Session::has('failedpaid'))
	$('#sideModalfailed').modal('show');
@endif
function setoperator(operator){
$('#c3').val(operator);
}
</script>
<script type="text/javascript" src="{{asset('js/modal1.js')}}"></script>



@endsection

@endsection
