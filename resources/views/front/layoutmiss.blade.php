<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="{{ config('app.locale') }}"> <!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   
    @yield('head')
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/misscam/newstyle.css')}}">
<style>
    .candidate-item .titre{
    color: #F5E9A9;
    position: relative;
    transform: rotate(-90deg);
    top: 50%;
    left: -60%;
    margin-bottom: -15px;
    margin-top: 0px;
    min-width: 250px;
    text-align:center;
}
</style>
    
</head>

<body>
  
    @include('front.partials.headerm1')

    <main class="hero-section">
        <div class="layer layer2">
            <img src="{{asset('/misscam/images/Layer 2.png')}}">
        </div>
        <div class="layer layerp d-none">
            <img src="{{asset('/misscam/images/Layerp.svg')}}">
        </div>
        <div class="left-vector">
            <img src="{{asset('/misscam/images/left-vector.svg')}}" alt="" />
        </div>
        <div class="wrapper2">
            <div class="spbanner">
                <div class="fr1"><span>Sponsorise</span></div>
                <span class="rect"></span>

            </div>
            <div class="canditatesp">
                <span class="img" style="border-radius: 45px;
                background: url({{$bestofday->pictures()->where('type','44')->first()->chemin}}) lightgray 50% / cover no-repeat;"> </span>
              <div class="details">
                <div class="name-region">
                    <span class="region">
                        <img src="{{asset('misscam/images/frame.svg')}}">
                        <span class="rg-text">{{$bestofday->regionconcours}}</span>
                    </span>
                    <span class="name">{{$bestofday->nom}} {{$bestofday->prenom}}</span>
                </div>
                <!--<a href="#" onclick="showOverlay({{$bestofday->id}});return false;" class="btn btvoterf" style="width: 120px;"><span>Voter pour elle</span></a>-->
              </div>
            
                
            </div>
            
        </div>
        <div class="right-vector">
            <img src="{{asset('/misscam/images/right-vector.svg')}}" class="i1" alt="" />
            <img src="{{asset('/misscam/images/vector.png')}}" class="i2" alt="" />
        </div>

         @yield('main')

         @include('front.partials.partenairesm')

        @include('front.partials.footerm')

    </main>

    @yield('modal-cover')
    
    
     <script src="{{asset('misscam/mainnew.js')}}"></script>
     <script src="{{ asset('topmodel/js/jquery.min.js')}}"></script>

     <script type="text/javascript">
	
        function showamountpage(id){
            $("#modal-code-"+id).modal('show');
        }
        
        function disablebt(id){
      document.getElementById('#=vote_'+id).disabled = true;
    }
    
        function selectdevise(val,id){
            if(val.value=="USD" || val.value=="EUR" || val.value=="CAD"){
                $('#bloc_xaf_'+id).hide();
                $('#bloc_xaf_'+id+' input').hide();
                $('#bloc_eur_usd_'+id).show();
                $('#bloc_eur_usd_'+id+' input').show();
                $('#bloc_xaf_'+id+' input').val('');
                document.getElementById("montant1_"+id).required = false;
                document.getElementById("montant2_"+id).required = true;
            }
            if(val.value=="XAF"){
                $('#bloc_xaf_'+id).show();
                $('#bloc_xaf_'+id+' input').show();
                $('#bloc_eur_usd_'+id).hide();
                $('#bloc_eur_usd_'+id+' input').hide();
                $('#bloc_eur_usd_'+id+' input').val('');
                document.getElementById("montant1_"+id).required = true;
                document.getElementById("montant2_"+id).required = false;
            }
        }
    
    </script>

     @yield('footer')


</body>

</html>