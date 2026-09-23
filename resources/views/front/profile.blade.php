@extends('front.layoutprofile')
@section('css')
	<link href="{{asset('css/card.css')}}" rel="stylesheet">
	<link href="{{asset('css/home.css')}}" rel="stylesheet">
  <link href="{{asset('css/profile.css')}}" rel="stylesheet">


@endsection
@section('main')

<!--Main layout-->
<main>
  <div class="container">

    <!--Section: Main info-->
    <section class="mt-5 row col-md-12 col-sm-12 col-xs-12 profile-page d-flex justify-content-center align-items-center" id="sectioncard">

      <!--Grid row-->
	<article class="card col-md-12 col-lg-12 col-sm-12 col-xs-12 px-4 cardprofile">

    <div class="row">
	                <div class="col-md-6 col-sm-12  ml-auto mr-auto">
        	           <div class="profile text-center">
	                        <div class="avatar">
	                            <img src="{{asset($candidate->pictures()->where('type','44')->first()->chemin)}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
	                        </div>
	                        <div class="name">
	                            <h3 class="title">{{$candidate->nom}} {{$candidate->prenom}}</h3>
                              <div class="nbvotes row text-center justify-content-center align-items-center">
                               <p><i class="fa fa-heart"></i></p><span class="title">{{$candidate->nbvote}}</span> <span class="title1" style="padding-right: 15px;"> Votes</span>
                               <p><i class="fa fa-birthday-cake"></i></p><span class="title">{{\Carbon\Carbon::parse($candidate->date_nais)->age}}</span> <span class="title1"> Ans</span>
															 @if(!empty($candidate->numero_candidate) && ($candidate->numero_candidate !=0))
															 <p class="numb">
															 <span class="title">Candidate N<sup>o</sup>: {{$candidate->numero_candidate}}</span>
														 </p>
															@endif
														 </div>
	                        </div>
													@if(!empty($candidate->rang))
													<h5 style="font-weight: 400;">{{$candidate->rang}}</h5>
													@endif
	                    </div>
    	            </div>


                </div>


                <div class="row">
            	                <div class="col-md-6 col-sm-12 ">

              <div class="name">
                  <h3 class="title1">A propos</h3>
                  <div class="description text-center">
                  <p>{{$candidate->shortdesc}}</p>
             </div>

                          @if(!empty($candidate->facebook_link))
                  				<a href="{{url($candidate->facebook_link)}}" target="_blank" class="btn-social btn-facebook"><i class="fab fa-facebook-f"></i></a>
                  				@endif
                  				@if(!empty($candidate->instagram_link))
                  				<a href="{{url($candidate->instagram_link)}}" target="_blank" class="btn-social btn-instagram"><i class="fab fa-instagram"></i></a>
                  				@endif
                  				@if(!empty($candidate->twitter_link))
                  				<a href="{{url($candidate->twitter_link)}}" target="_blank" class="btn-social btn-twitter"><i class="fab fa-twitter"></i></a>
                  				@endif
                          <button   class="btn btn-secondary btn-lg" onclick="showmodal({{$candidate->id}})" style="padding: 12px 30px;">Voter pour moi
												</button>
            	                    </div>
                	            </div>

                              <div class="col-md-6 col-sm-12 ">

              <div class="name">
                  <h3 class="title1">Découvrez ma vidéo</h3>
                  <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$candidate->video_link}}" allowfullscreen></iframe>
                  </div>

                    </div>
                </div>


              </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">

            <div class="name">
                <h3 class="title1 text-center" style="margin-top:30px;">Mon projet / Mission</h3>
                <div class="description1 text-justify " style="margin-bottom:50px;">
       <p>{{$candidate->longdesc}} </p>
           </div>
         </div>
         </div>
 </div>
  </article>
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
								<input type="hidden" value="{{$candidate->id}}"  name="id_candidate" id="c4"/>
								<input type="hidden" value="{{$candidate->web_id}}"  name="web_id" id="c5"/>
								<div class="col-md-12 row my-3" style="justify-content: center;">
								<button type="submit" class="btn btn-primary" style="background-color: #c13584 !important;">Suibant</button>
								</div>
								</form>

								@else

							  @if(empty($statut))
								<div class="text-center py-1">
								<p class="btext titresection text-center">Vous avez <strong>1</strong> vote gratuit.</p>
								<hr class="my-0">
								<a href="{{url('/vote/free/'.$candidate->id.'/v')}}" onclick="disablebt({{$candidate->id}})"  class="btn btn-secondary">Voter</a>
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
								<p style="font-size: 12px; font-weight: bold;" id="netapayer">1 euro=1.46 CAD</p>
								</div>
								<input type="hidden" value="{{$candidate->id}}"  name="id_candidate" id="c4"/>
								<input type="hidden" value="{{$candidate->web_id}}"  name="web_id" id="c5"/>
								<div class="col-md-12 row my-3" style="justify-content: center;">
								<button type="submit" class="btn btn-primary" style="background-color: #c13584 !important;">Suibant</button>
								</div>
								</form>


                </div>
							@endif
            </div>


        </div>
        <!--/.Content-->
    </div>
</div>
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
