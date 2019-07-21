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
    <section class="mt-5 wow fadeIn row col-md-12 col-sm-12 col-xs-12" id="sectioncard">

      <!--Grid row-->
			@foreach($candidates as $candidate)

			<article class="card col-md-3   col-lg-3 col-sm-6 col-xs-6 px-0">
			  <div class="card__info-hover">
			      <div class="card__clock-info">
			        <span class="card__time">Découvrir Son Profil</span>
			      </div>

			  </div>
			  <div class="card__img"></div>
			  <a href="{{url('/profile/'.$candidate->web_id)}}" class="card_link">
			     <div class="card__img--hover" style="background-image: url({{$candidate->pictures()->where('type','44')->first()->chemin}});"></div>
			   </a>
			  <div class="card__info">
					<div class="row nbvotes">
					 <i class="fa fa-heart"></i><span class="card__category nb">{{$candidate->votes()->where('annee',$parametre->annee)->count()}}</span> <span class="card__category"> Votes</span>
				 </div>
			    <h3 class="card__title">{{$candidate->nom}} {{$candidate->prenom}}</h3>
					 <button type="button" class="btn btn-secondary row col-12" onclick="showmodal({{$candidate->id}})">Voter</button>
					 <span class="card__author" title="author">Suivez moi sur:</span>

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
@endforeach




      <!--Grid row-->

    </section>
    <!--Section: Main info-->

		<div class="container" style="margin-top:50px;">
			<h2 class="my-5 h3 text-center text-white">Nos partenaires</h2>
	    <div class="carousel slide" data-ride="carousel">
	        <div class="carousel-inner">
	            <div class="carousel-item active">
	                <div class="row">
	                    <div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art.jpg')}}" alt="1 slide"></div>
	                    <div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/black.jpg')}}" alt="2 slide"></div>
	                    <div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/gimac.jpg')}}" alt="3 slide"></div>
											<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/imhome.jpg')}}" alt="3 slide"></div>

	                </div>
	            </div>
	            <div class="carousel-item">
	                <div class="row">
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/art.jpg')}}" alt="1 slide"></div>
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/black.jpg')}}" alt="2 slide"></div>
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/rmb.jpg')}}" alt="3 slide"></div>
										<div class="col-sm"><img class="d-block w-60" src="{{asset('images/partenaires/valcair.jpg')}}" alt="3 slide"></div>
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
								@else

							  @if(empty($statut))
								<div class="text-center py-1">
								<p class="btext titresection text-center">Vous avez <strong>1</strong> vote gratuit.</p>
								<hr class="my-0">
								<a href="{{url('/vote/free/'.$candidate->id)}}" class="btn btn-secondary">Voter</a>
								<hr class="my-0">
								@else
								<p class="btext titresection text-center">Vous avez déja utiliser votre vote gratuit de la journée.</p>
								@endif
							  <p class="btext titresection text-center">Continuer de voter en utilisant nos offres payantes</p>
								</div>
							@endif
            </div>


        </div>
        <!--/.Content-->
    </div>
</div>
@endforeach
<!-- Central Modal Medium Warning-->
<div class="modal fade right" id="sideModalTR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-side modal-top-right" role="document">


    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100 white-text" id="myModalLabel">Vote bien enregistré</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"  class="white-text">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p class="btext titresection text-center">Continuer de voter à tout moment en utilisant nos offres payantes</p>
      </div>

    </div>
  </div>
</div>

@section('scripts')
<script>
@if(Session::has('successfree'))
	$('#sideModalTR').modal('show');
@endif
</script>
<script type="text/javascript" src="{{asset('js/modal.js')}}"></script>
@endsection

@endsection
