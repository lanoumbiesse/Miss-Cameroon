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

.model:after {
    background: unset !important;
}


.list-group-item+.list-group-item {
    border-top-width: 1px !important;
}



.main-section{
margin: 0 auto;
margin-top:100px;
background-color: #fff;
border-radius: 5px;
padding: 0px;
}
.user-img{
margin-top:-50px;
}
.user-img img{
height: 100px;
width: 100px;
}
.user-name{
margin:10px 0px;
}
.user-name h1{
font-size:30px;
color:#676363;
}
.user-name button{
position: absolute;
top:-50px;
right:20px;
font-size:30px;
}
.form-input button{
width: 100%;
margin-bottom: 20px;
}
.link-part{
border-radius:0px 0px 5px 5px;
background-color: #ECF0F1;
padding:15px;
border-top:1px solid #c2c2c2;
}
.open-modal{
margin-top:100px !important;
}
</style>
<script type="text/javascript">

</script>
<!-- Bootstrap core CSS -->
<link href="{{asset('bootstrap-5.0.2-dist/css/bootstrap.min.css')}}" rel="stylesheet">

@endsection
@section('main')

<section class="ftco-section ftco-no-pt align-items-center" style="margin: 80px 0px -70px 0px !important;">
    
    <div class="text text-center col-md-6" style="margin: 0 auto;">
        @if(Auth::check())
        <h3 style="color: white;
    font-family: 'quicksand','Roboto';">Bienvenue {{Auth::user()->name}}</h3>
    @endif
    <div class="card mb-3" style="max-width: 700px;
    border: 3px solid #adb7ed;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{asset($cagnotte->image)}}" class="img-fluid rounded-start" alt="{{asset($cagnotte->name)}}">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Classement du {{$cagnotte->name}} </h5>
        <p class="card-text" style="text-align: justify;">Vous devez choisir une candidate pour chacune des positions; puis cliquez sur terminer, le montant indiqué ci après vous sera débité lors de l’enregistrement de votre pronostic afin de gagner la cagnotte.<br>
        Pour faciliter le choix, les candidates ont été classées par région qu'elles représentent.</p>
        <hr>
        <p class="card-text col-md-12"><span class="text-muted" style="font-weight:bold;">Montant cagnotte:<span style="color:#e82294;font-size: 20px;">{{$cagnotte->amount}} fcfa</span></span></p>
        @if(!empty($cagnotte->amount_2))
        <p class="card-text col-md-12"><span class="text-muted" style="font-weight:bold;">Montant cagnotte desordre:<span style="color:#e82294;font-size: 20px;">{{$cagnotte->amount_2}} fcfa</span></span></p>
        @endif
                <p class="card-text col-md-12"><span class="text-muted" style="font-weight:bold;">Montant à débiter:<span style="color:#e82294;font-size: 20px;">{{$cagnotte->montant_mise}} fcfa</span></span></p>

      </div>
      <p style="font-size: 9px;
    font-style: italic;">Dans le cas où il y'a plusieurs gagnants, la cagnotte sera partagée entre eux.</p>
    </div>
  </div>
</div>

</div>
    
</section>

<!--<section class="ftco-section ftco-no-pt align-items-center" style="margin: 0px 0px -100px 0px !important;">
<div class="text text-center col-md-6" style="margin: 0 auto;">
<div class="col-md-12 row">
    <div class="col-md-4" style="width: 25%;"><label style="color: white;
    font-size: 22px;
    font-weight: bold;
    ">Région:</label></div>
    
<div class="col-md-8" style="width: 75%;">
    @if(!empty($successMsg))
  <div class="alert alert-success"> {{ $successMsg }}</div>
@endif
<select name="region" id="region" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" style="min-height: 50px;">
  
  <option selected value="{{$region}}">{{$region}}</option>
  <option value="Centre">Centre</option>
  <option value="Sud">Sud</option>
  <option value="Est">Est</option>
</select>
</div>
</div>
</div>
</section>-->

<section class="ftco-section ftco-no-pt align-items-center" style="margin: 0px 0px 60px 0px !important;
" id="topsection">
      
      
      
        <div class="container-fluid px-md-2 blog-entry">
    
    <form action="{{url('/comicash/top/save/')}}" method="POST" id="formtop">
        <input type="hidden" name="cagnotteid" value="{{$cagnotte->id}}">
        <input type="hidden" name="choice" value="" id="the_choice">
        
<div class="accordion accordion-flush" id="accordionFlushExample">
    <?php for($i=0;$i<sizeof($regions);$i++){ ?>
  <div class="accordion-item" style="background-color:inherit;">
      <!--<input type="hidden" name="valeur_{{$i}}" id="valeur_{{$i}}">
      <input type="hidden" name="region1"  value="{{$region}}">-->
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{$i}}" aria-expanded="false" aria-controls="flush-collapseOne{{$i}}">
        <p style="margin-bottom:0px;"><span style="color:#959747;">{{$regions[$i]}}</span><br>
        <span style="color: #e82294;" id="candidatetext_{{$i}}">Dérouler pour afficher les candidates</span></p>
      </button>
      
    </h2>
    <div id="flush-collapseOne{{$i}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne{{$i}}" >
      <div class="accordion-body">

<div role="tabpanel">

  <div class="list-group" id="myList" role="tablist">
      <div class="row" style="margin-left: -30px;margin-right: -30px;">
    @foreach($candidates as $candidate)
    
    @if($candidate->regioncomicash==$regions[$i])
      
            <div class="col-xs-12 col-sm-6 col-md-4" style="padding: 10px;">
          	<a href="#" >
          	    <!--<span class="font-bold" style="float: left; z-index: 1;position: absolute; top: 10px;left: 10px;font-weight: bold;background-color: #e82294; border: 1px solid #e82294;
            padding: 10px; color: white;border-top-left-radius: 16px;"> <?php echo strlen($candidate->nom.' '.$candidate->prenom) <= 20?  ($candidate->nom.' '.$candidate->prenom): substr($candidate->nom.' '.$candidate->prenom,0,20).'...';?></span>-->
          	   <span class="font-bold" style="float: right;z-index: 1; position: absolute;top: 10px;right: 10px;font-weight:bold;
          	   background-color: #e82294; border: 1px solid #e82294;padding: 10px;color: white;border-top-right-radius: 16px;">{{$candidate->nbvote}} Votes </span>
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
	              	 <div  class="btn_3 mybtn3" data-id="{{$candidate->numero_candidate}}" data-name="{{$candidate->nom.' '.$candidate->prenom}}"> Choisir</div>
	              	</button></h2> 
	              </div>
	              
              </div>
            </div>
            </figure>
           </a>
          </div>
     
    @endif
    @endforeach
    </div>
    
  </div>
</div>

</div>
    </div>
  </div>
  <?php } ?>
 
</div>



<!--<div class="accordion accordion-flush" id="accordionFlushExample">
    <?php for($i=1;$i<=$cagnotte->nombre_candidates;$i++){ ?>
  <div class="accordion-item">
      <input type="hidden" name="valeur_{{$i}}" id="valeur_{{$i}}">
      <input type="hidden" name="region1"  value="{{$region}}">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{$i}}" aria-expanded="false" aria-controls="flush-collapseOne{{$i}}">
        <p style="margin-bottom:0px;"><span style="color:#959747;"><?php if($i==1) echo "Première"; 
        if($i==2) echo "Deuxième"; if($i==3) echo "Troixième"; if($i==4) echo "Quatrième"; if($i==5) echo "Cinquième"; if($i==6) echo "Sixième"; if($i==7) echo "Septième"; 
        if($i==8) echo "Huitième"; if($i==9) echo "Neuvième"; if($i==10) echo "Dixième"; ?></span><br>
        <span style="color: #e82294;" id="candidatetext_{{$i}}">Dérouler pour choisir une candidate</span></p>
      </button>
      
    </h2>
    <div id="flush-collapseOne{{$i}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne{{$i}}" >
      <div class="accordion-body">

<div role="tabpanel">

  <div class="list-group" id="myList" role="tablist">
    @foreach($candidates as $candidate)
    <a class="list-group-item list-group-item-action" data-bs-toggle="list" id="{{$candidate->numero_candidate}}" data-valeur="valeur_{{$i}}" href="#xx{{$candidate->numero_candidate}}" role="tab" data-cid="candidatetext_{{$i}}" data-target="flush-collapseOne{{$i}}" data-numero="{{$candidate->numero_candidate}}" data-id="{{$candidate->id}}" data-nom="{{$candidate->nom}} {{$candidate->prenom}}">
        <div class="col-md-12">
            <div class="col-md-2" style="margin-left: -25px;">
                <img src="{{asset($candidate->pictures()->where('type','44')->first()->chemin)}}" class="img-circle">
            </div>
            <div class="col-md-10" style="text-align: justify;left: 5%;"><span>{{$candidate->nom}} {{$candidate->prenom}}</span><br>
            <span>Candidate Numéro: {{$candidate->numero_candidate}}</span> </div>
        </div>
    </a>
    @endforeach
    
  </div>
</div>

</div>
    </div>
  </div>
  <?php } ?>
 
</div>-->

    
       
       </form>
       
       <button class="btn btn-primary col-md-6 btn-block mt-4 mynextbt waves-effect waves-light" id="btn_paid">
	 TERMINER               
	</button>
        </div>
        
      
  
</section>



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
       <p class="btext titresection text-center">Vous avez déja sélectionner cette candidate.</p>


      </div>

    </div>
  </div>
</div>


<div id="sideModalfacebook" class="modal fade text-center" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog">
<div class="col-lg-8 col-sm-8 col-12 main-section">
<div class="modal-content" id="modallogin">
<div class="col-lg-12 col-sm-12 col-12 user-img">
<img src="{{asset('/images/man01.png')}}">
</div>
<div class="col-lg-12 col-sm-12 col-12 user-name">
<h5>Connectez-vous pour continuer</h5>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<!--<button type="button" class="close" data-dismiss="modal">×</button>-->
</div>
<div class="col-lg-12 col-sm-12 col-12 form-input">
<form action="{{url('/customlogin/')}}" method="POST">
<input type="hidden" name="cagnotteref" value="{{$cagnotte->ref}}">
<div class="form-group">
<input type="number" class="form-control" name="phone" placeholder="Entrez votre numéro de telephone" required>
</div>
<div class="form-group">
<input type="password" class="form-control"  name="password" placeholder="Entrez votre mot de passe" required>
</div>
<button type="submit" class="btn btn-success" style="background-color:#e82294 !important;">Se connecter</button>
</form>
</div>
<div class="col-lg-12 col-sm-12 col-12 link-part">
    <p style="font-size:10px; margin-bottom:-5px;">Je n'ai pas encore de compte ?</p>
<a href="#"  id="createacc">Creer un compte</a>
</div>
</div>

<div class="modal-content" id="modalregister" style="display:none;">
<div class="col-lg-12 col-sm-12 col-12 user-img">
<img src="{{asset('/images/man01.png')}}">
</div>
<div class="col-lg-12 col-sm-12 col-12 user-name">
<h5>Inscription</h5>
<!--<button type="button" class="close" data-dismiss="modal">×</button>-->
</div>
<div class="col-lg-12 col-sm-12 col-12 form-input">
<form action="{{url('/customregister/')}}" method="POST">
<input type="hidden" name="cagnotteref" value="{{$cagnotte->ref}}">
<div class="form-group">
<input type="text" class="form-control" name="nom" placeholder="Entrez votre nom complet" required>
</div>
<div class="form-group">
<input type="number" class="form-control" name="phone1" placeholder="Entrez votre numéro de telephone" required>
</div>
<div class="form-group">
<input type="password" class="form-control"  name="password1" placeholder="Entrez votre mot de passe" required minlength="4">
</div>

<div class="form-group">
<input type="email" class="form-control" name="email" placeholder="Entrez votre mail (facultatif)">
</div>

<button type="submit" class="btn btn-success" style="background-color:#e82294 !important;">S'inscrire</button>
</form>
</div>
<div class="col-lg-12 col-sm-12 col-12 link-part">
    <p style="font-size:10px; margin-bottom:-5px;">J'ai déja un compte ?</p>
<a href="#" id="logacc">Se Connecter</a>
</div>
</div>


</div>
</div>
</div>


<div class="modal fade right" id="sideModalfacebook22" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
       <p class="btext titresection text-center mb-0" style="color: black !important;">Vous devez d'abord  vous Connecter avant de participer au jeu !</p>
		<!--<div class="text-center mt-0 mb-2">
		<a href="{{url('/getfacebookurl')}}" class="btn btn-fb" style="color:white;"><i class="fab fa-facebook-f pr-1"></i>Se connecter avec facebook</a>
		</div>-->
		<div class="col-lg-12 col-sm-12 col-12 main-section">
	
            <div class="col-lg-12 col-sm-12 col-12 form-input">
            <form>
            <div class="form-group">
            <input type="email" class="form-control" placeholder="Enter email" >
            </div>
            <div class="form-group">
            <input type="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-success">Login</button>
            </form>
            </div>
            <div class="col-lg-12 col-sm-12 col-12 link-part">
            <a href="http://www.nicesnippets.com" target="_blank">Forgot Password?</a>
            </div>
            </div>
          
		
		
      </div>

    </div>
  </div>
</div>


<div id="sideModalrecap" class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >

  <!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-side modal-top-right" role="document">


    <div class="modal-content">
      <div class="modal-header" style="background-color:#e82294 !important;">
        <h4 class="modal-title w-100 white-text" id="myModalLabel">Choix de la position</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"  class="white-text">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
           <p class="btext titresection text-left mb-0" style="color: black !important;" id="rang">Cliquer  sur l'un des numéros ci-dessous pour choisir le rang de : <span id="rangname" style="color:#e90798;"></span></p>
          <div class="btn-group mr-2 row" role="group" aria-label="First group">
             <?php for($i=0;$i<$cagnotte->nombre_candidates;$i++){ ?>
            <button type="button" class="btn btn-primary mybtnpos"  data-id="{{$i+1}}" style="background-color: darkslateblue;font-size: 1.8rem;
    padding: 5px 20px 5px 20px;max-width: 72px;">{{$i+1}}</button>
           <?php } ?>
          </div>
         
        </div>
          
       <p class="btext titresection text-left mb-0" style="color: black !important;" id="choiceactuel">Vos choix actuels dans l'ordre sont : </p>
		<div class="text-center mt-0 mb-2" id="choiceorder">
		
		</div>
      </div>
    
    <div class="modal-footer" style="width:100%;">
	<div class="col-12" style="display: -webkit-inline-box;">
   
	
    <div class="col-6">
    	<button type="button" class="close  btn btn-primary waves-effect waves-light mynextbt1" data-bs-dismiss="modal" aria-label="Close">
	Annuler | Fermer                
	</button>
	</div>
	
	 <div class="col-6">
       <button type="submit" class="btn btn-primary waves-effect  waves-light mynextbt" id="nextpaid1" style="background-color:#e82294 !important;color: white !important;
    font-weight: bold;padding: 10px 10px !important;margin-left:-15px;">
	 Continuer mes choix            
	</button>
	<button type="submit" class="btn btn-primary waves-effect  waves-light mynextbt" id="nextpaid" style="background-color:#e82294 !important;color: white !important;
    font-weight: bold;display:none;padding: 10px 10px !important; margin-left:-15px;">
	 Terminer | valider              
	</button> 
    </div>
    
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


<script type="text/javascript">

 $( ".accordion-collapse" ).addClass( "show" );
 
 /*setTimeout(function(){
  $( ".accordion-collapse" ).removeClass( "show" );
}, 3000); */
 

$('#createacc').on('click', function() {
    
    $('#modallogin').hide();
    $('#modalregister').show();
});

$('#logacc').on('click', function() {
    
    $('#modalregister').hide();
    $('#modallogin').show();
});


var nb="<?php echo $cagnotte->nombre_candidates;?>";
console.log(nb);
var a = new Array();
var b = new Array();
var t1=0;
var t2="";
for(var i=0;i<nb;i++){
          a.push(0);
          b.push("");
}

for(var i=0;i<a.length;i++){
          console.log(a[i]);
}


$('#btn_paid').on('click', function() {
    
     var test2=0;
      // $("#choiceorder").empty();
      for(var i=0;i<a.length;i++){
          console.log(a[i]);
        //var childNode="<p style='text-align:left';>"+(i+1)+".  <span style='font-weight:bold';>Candidate No "+a[i]+ "</span>: <span> "+ b[i] +" </span></p>";
       // $("#choiceorder").append(childNode);
      if(a[i]==0){
      alert("Vous devez choisir les candidates pour toutes les positions");
      return;
      }
      }
      
      if(test2==0){
          $("#the_choice").val(a);
         //$("#sideModalrecap").modal('show');
         $("#formtop").submit();
      }
    
});


$('#nextpaid').on('click', function() {
    
     var test2=0;
      // $("#choiceorder").empty();
      for(var i=0;i<a.length;i++){
          console.log(a[i]);
        //var childNode="<p style='text-align:left';>"+(i+1)+".  <span style='font-weight:bold';>Candidate No "+a[i]+ "</span>: <span> "+ b[i] +" </span></p>";
       // $("#choiceorder").append(childNode);
      if(a[i]==0){
      alert("Vous devez choisir les candidates pour toutes les positions");
      return;
      }
      }
      
      if(test2==0){
          $("#the_choice").val(a);
         //$("#sideModalrecap").modal('show');
         $("#formtop").submit();
      }
    
        
    
});

$('#nextpaid1').on('click', function() {
    
      $("#sideModalrecap").modal('hide'); 
    
});

$('.mybtnpos').on('click', function() {
    $("#choiceactuel").show();
  var t=this.getAttribute('data-id');
  console.log(t);  
  $( ".mybtnpos" ).removeClass( "btn-secondary" );
  this.classList.add("btn-secondary");
  
  for(var i=0;i<a.length;i++){
        if(a[i]==t1) a[i]=0;
            }
  
  a[t-1]=t1;
  b[t-1]=t2;
  var test22=0;
  
  $("#choiceorder").empty();
  for(var i=0;i<a.length;i++){
           
       if(a[i]!=0){     
    var childNode="<p style='text-align:left';>"+(i+1)+".  <span style='font-weight:bold;color:#bd970a'>Candidate No "+a[i]+ "</span>: <span style='color:#e90798;'> "+ b[i] +" </span></p>";
       }else{
     var childNode="<p style='text-align:left';>"+(i+1)+".  <span style='font-weight:bold';>-------</span>: <span>----------</span></p>";  
     test22++;
       }
    $("#choiceorder").append(childNode); 
        
    }
    
    if(test22==0){
       $("#nextpaid1").hide();
       $("#nextpaid").show();
    }else{
       $("#nextpaid").hide();
       $("#nextpaid1").show(); 
    }
  

});

$('.mybtn3').on('click', function() {
    
    t1=this.getAttribute('data-id');
   t2=this.getAttribute('data-name');
  console.log(t1);
    
     
      var test2=0;
      for(var i=0;i<a.length;i++){
      if(a[i]==0){
      test2=test2+1;
      }
      }
      if(test2==nb) $("#choiceactuel").hide();
      else $("#choiceactuel").show();
      
$("#rangname").html(t2);
    
$("#sideModalrecap").modal('show');

  //var t=this.value ;
  
   
        
        
   /* if(t==0){
         a[t]=0;
         b[t]="";
    }else{

        if(a[t-1]!=0 && a[t-1]!=t1){
            alert("La candidate No "+a[t-1]+" a déja été selectionneé pour cette position. \n Pour deselectionner la candidate No "+a[t-1]+", choisir l'option *cliquer pour chosir* sous la photo de la candidate.");
            this.value(t);
            return false;
        }else{
            for(var i=0;i<a.length;i++){
                if(a[i]==t1)
                    a[i]=0;
            }
        }
     
    
    a[t-1]=t1;
    b[t-1]=t2;
    
    
     var test2=0;
       $("#choiceorder").empty();
      for(var i=0;i<a.length;i++){
          console.log(a[i]);
        var childNode="<p style='text-align:left';>"+(i+1)+".  <span style='font-weight:bold';>Candidate No "+a[i]+ "</span>: <span> "+ b[i] +" </span></p>";
        $("#choiceorder").append(childNode);
      if(a[i]==0){
      console.log("continue");
      test2=test2+1;
      }
      }
      
     
      
      
      
      if(test2==0){
          $("#the_choice").val(a);
         $("#sideModalrecap").modal('show');
          return;
      }
      
    }
      */  
    
});


var ref="<?php echo $cagnotte->ref;?>";
$('#region').change(function(){
    window.location.href = '/comicash/top/'+ref+'/'+$(this).val();
})

$('.myregion').change(function(){
    console.log($(this).val());
     var $this = $(this);
    var $id = $this.data('id');
    console.log($id);
})



var test="<?php echo $test;?>";
if(test==0){
    $("#sideModalfacebook").modal('show');
}
var toadd=[];
var nb="<?php echo $cagnotte->nombre_candidates;?>";
console.log(nb);
$('.list-group-item').on('click', function() {
    var $this = $(this);
    var $id = $this.data('id');
    var $nom = $this.data('nom');
    var $numero = $this.data('numero');
    
 for( i=1;i<=nb;i++){
        
        var val=$("#valeur_"+i).val();
        console.log(val);
        if(val==$id){
            //alert("deja");
            $this.removeClass('active');
            
            var elt = document.getElementById($numero);
                $("#sideModalfailed1").modal('show');
                  window.setTimeout(function() {
               $("#sideModalfailed1").modal('hide');
            }, 2000);
            
            return 1;
        }
        
    }
    
    /*if(toadd.includes($id))
        alert("deja");*/
        //return;
    
    //toadd.push($id);
    
    //console.log(elt);
    //document.getElementById("myList").removeChild(elt);
    document.getElementById($this.data('target')).classList.remove('show');
    /*if($("#"+$this.data('valeur')).val()==$id)
     $("#"+$this.data('valeur')).val("");
     else*/
    $("#"+$this.data('valeur')).val($id);
    
    
    
    
    $("#"+$this.data('cid')).html($nom+" No:"+$numero);
    
    console.log($nom);
    console.log(toadd[0]);
    console.log(toadd.length);
    
    
    
    //myArray.remove(8);


    //$('.active').removeClass('active');
    //$this.toggleClass('active')
    

    // Pass clicked link element to another function
    //myfunction($id, $nom,$numero)
})

function myfunction($id,  $nom,$numero) {
    $("#candidatetext").html($nom+" No:"+$numero);

    console.log($numero);  // Will output whatever is in data-alias=""
}

</script>

@endsection
