
 <section class="ftco-section ftco-no-pt align-items-center" style="margin: 80px 0px 60px 0px !important;
" id="topsection">
      
       <!-- <h1 class="row" style="color: white;
font-weight: bold;
    margin-right: 0px;
    margin-left: 0px;
font-size: 26px;
text-align: center;

display: block;
margin-left: auto;
margin-right: auto;">Veuillez choisir un top pour continuer </h1>-->
      <div class="forth  d-flex align-items-center" style="">
        <div class="text text-center" style="margin: 0 auto;">
            @foreach($cagnottes as $cagnotte)
            <div class="card text-white bg-primary mb-3" style="max-width: 20rem;background-color: mediumvioletred !important;
    color: white !important;border-color: mediumvioletred;">
              <div class="card-body">
                <h5 class="card-title" style="color:white;"><span style="background-color: white;
    padding: 5px 20px;
    color: #ea8194;
    border: 1px solid;
    border-radius: 5px;">{{$cagnotte->name}}</span></h5>
                <p class="card-text" style="color:white;">
                  {{$cagnotte->description}}
                </p>
                <a href="{{url('comicash/top/'.$cagnotte->ref)}}" class="btn_3" style="padding: 10px 30px; border-radius: 5px;">Je participe</a>
              </div>
            </div>
            @endforeach
         
             @if(Auth::check())
             <div class="col-md-12" style="padding: 10px 0px;">
                 <a href="{{url('/comicash/historique')}}" class="btn_3" style="padding: 10px 80px;
    background-color: white;
    color: #e82294 !IMPORTANT;
    border-radius: 10px;">Mon Historique</a>
             </div>
             @endif
        </div>
      </div>
  
</section>


