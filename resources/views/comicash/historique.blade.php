@extends('front.layout2')
@section('head')
<style type="text/css">
    body {
    background: url('/images/cagnotte.jpg') repeat center center !important;
}
.btn_3{
    color:#e82294 !important;
}
.bg-dark{
    background-color: #e82294 !important;
}
.accordion-button{
    background-color: white !important;
}

.list-group-item.active {
    z-index: 2;
    color: #fff;
    background-color: #e82294 !important;
    border-color: #e82294 !important;
}

.img-circle{
    width: 50px;
    height: 50px;
    border-radius: 50%;
    float: left;
    position: relative;
}

.accordion-button::after{
    display:none !important;
}

.list-group-item+.list-group-item {
    border-top-width: 1px !important;
}
.accordion-button .col-md-6{
    width: 50%;
}
</style>
<script type="text/javascript">

</script>
<!-- Bootstrap core CSS -->
<link href="{{asset('bootstrap-5.0.2-dist/css/bootstrap.min.css')}}" rel="stylesheet">

@endsection
@section('main')



<section class="ftco-section ftco-no-pt align-items-center" style="margin: 0px 0px 60px 0px !important;
" id="topsection">
      
      
      
        <div class="text text-center col-md-6 mt-5" style="margin: 0 auto;">
    
        <h3 style="color: white;
    font-family: 'quicksand','Roboto';">Mon Historique</h3>

<div class="accordion accordion-flush" id="accordionFlushExample">
    @foreach($cagnottes as $cagnotte)
  <div class="accordion-item mb-2" style="border: 2px solid #99bbe5;">
      
    <h2 class="accordion-header">
        
      <button class="accordion-button" style="display: inline-block;">
        <div class="row col-md-12">
               <div class="col-md-6">
        <p style="margin-bottom:0px;"><span style="color:#e82294;">{{$cagnotte->name}}</span><br>
        <span>{{$cagnotte->created_at}}</span></p>
        </div>
        <div class="col-md-6">
        <p style="margin-bottom:0px;"><span>Région :<span style="color: #959747;">{{$cagnotte->region}}</span></span><br>
        <span>Montant ordre :<span style="color: #e82294;">{{$cagnotte->amount}} fcfa</span></span><br>
        <span>Montant desordre :<span style="color: #e82294;">{{$cagnotte->amount_2}} fcfa</span></span></p>
        </div>
        </div>
        
        <div class="row col-md-12">
            <hr style="color:#e82294;">
               <div class="col-md-6">
        <p style="margin-bottom:0px;"><span style="color:#e82294;">Classement</span><br>
        <?php $ordre=explode(',',$cagnotte->classement);for($i=0;$i<sizeof($ordre);$i++){?>
        <span>{{$i+1}}. Candidate No {{$ordre[$i]}}</span><br>
        <?php }?>
        </p>
        </div>
        <div class="col-md-6">
        <p style="margin-bottom:0px;">
        <span>Ma mise :<span style="color: #e82294;">{{$cagnotte->montant_user}} fcfa</span></span><br>
        <span>Statut :<span style="color: #959747;">{{$cagnotte->statut}}</span></span></p>
        
        </div>
        </div>
        
      </button>
     
      
      
      
    </h2>
  
  </div>
 
  @endforeach
</div>

   
        </div>
        
      
  
</section>




<div class="modal fade right" id="sideModalfacebook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-keyboard="false" data-backdrop="static">

  <!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-side modal-top-right" role="document">


    <div class="modal-content">
      <div class="modal-header" style="background-color:#e82294 !important;">
        <h4 class="modal-title w-100 white-text" id="myModalLabel">Connectez-vous pour continuer</h4>
        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"  class="white-text">&times;</span>
        </button>-->
      </div>
      <div class="modal-body">
       <p class="btext titresection text-center mb-0" style="color: black !important;">Vous devez d'abord  vous Connectez avant de participer au jeu !</p>
		<div class="text-center mt-0 mb-2">
		<a href="{{url('/getfacebookurl')}}" class="btn btn-fb" style="color:white;"><i class="fab fa-facebook-f pr-1"></i>Se connecter avec facebook</a>
		</div>
      </div>

    </div>
  </div>
</div>




<div class="modal fade right" id="sideModalfailed1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">

  <!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-side modal-top-right" role="document">


    <div class="modal-content">
      <div class="modal-header" style="background-color:#e82294 !important;">
        <h4 class="modal-title w-100 white-text" id="myModalLabel1" style="font-size:14px;">Vous avez déja sélectionner cette candidate.</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"  class="white-text">&times;</span>
        </button>
      </div>

    </div>
  </div>
</div>

@endsection

@section('footer')
<script src="{{asset('bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js')}}"></script>


<script src="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.js"></script>




@endsection
