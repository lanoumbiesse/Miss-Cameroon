
<div class="candidate-section" id="c-section">
    <div class="layer layer1">
        <img src="{{asset('misscam/images/Layer 3.svg')}}">
    </div>

    <!--<div class="choose-region">
        <span class="name">Selectionner la region</span>
         <select class="rg" name="choose-region" onchange="chooseregion(this.value)">
            <option value="Littoral" @if($region=="Littoral") selected @endif>Littoral</option>
            <option value="Sud-ouest" @if($region=="Sud-ouest") selected @endif>Sud Ouest</option>
        </select>

    </div>
    <h2 class="title">Candidates {{$region_name}}</h2>-->
    
    <h2 class="title">Candidates Finalistes</h2>

    <div class="wrapper candidate-container">

    @foreach($candidates as $key=> $candidate)
    @if(!empty($candidate->pictures()->first()))
       <div class="candidate-item">
           <p class="titre">@if(!empty($candidate->shortdesc)){{$candidate->shortdesc}}
	              		@endif</p>
        <a href="{{url('/profile/'.$candidate->web_id)}}" class="link">
        <div class="item-img" style="background: url({{$candidate->pictures()->where('type','44')->first()->chemin}}) lightgray 50% / cover no-repeat;">
        </div>
        <div class="info-item">
            <span class="name">
                {{$candidate->nom}} {{$candidate->prenom}}
            </span>
            <span class="titre12">@if(!empty($candidate->bust)){{$candidate->bust}}
	       @endif</span>
            <span class="vote">
               @if($affichage==1) {{round($candidate->nbvote*100/$totalvote1,3)}}% de @else {{$candidate->nbvote}} @endif votes
            </span>
        </div>
        @if($endvote!=1 && $candidate->vote_end==0)
        <a href="#"  onclick="showOverlay({{$candidate->id}});return false;" class="btn btvoterf btn-vote"><span>Vote pour elle</span></a>
        @endif
        <div class="item-number">
            @if(!empty($candidate->numero_candidate) && ($candidate->numero_candidate !=0))<span> No {{$candidate->numero_candidate}}</span>@endif
        </div>
        </a>
       </div> 

       @endif
       @endforeach
    

       
       

    </div>
    <div class="pagination">
        <?php for($i=1;$i<=$nb;$i++){?>
        @if($i==$page)
        <a href="{{url('/?region='.$region.'&p='.$i)}}#c-section" class="pi active"><span>{{$i}}</span></a>
        @else
        <a href="{{url('/?region='.$region.'&p='.$i)}}#c-section" class="pi"><span>{{$i}}</span></a>
        @endif
        <?php } ?>
       
    </div>

    <img src="{{asset('misscam/images/ball.svg')}}" class="ball">
    <img src="{{asset('misscam/images/ball.svg')}}" class="ball2">
</div>


@foreach($candidates as $candidate)
@if(!empty($candidate->pictures()->first()))
<div class="modal-cover" id="modal-code-{{$candidate->id}}">
    <div class="modal modal1-{{$candidate->id}}">
        <div class="modal-container">
            <div class="c-img">
                <div class="img" style="border-radius: 8px;
                background: url({{$candidate->pictures()->where('type','44')->first()->chemin}}) lightgray 50% / cover no-repeat;"></div>
                <span class="nbvotes">  @if($affichage==1) {{round($candidate->nbvote*100/$totalvote1,3)}}% de @else {{$candidate->nbvote}} @endif votes</span>
                <div class="item-number">
                    @if(!empty($candidate->numero_candidate) && ($candidate->numero_candidate !=0))<span> No {{$candidate->numero_candidate}}</span>@endif
                </div>
            </div>
        </div>
        <form action="{{url('/vote/paid/')}}" method="POST" id="formVote">
            <input type="hidden" name="candidat" value="{{$candidate->id}}" id="candidat">
        <div class="modal-infos">
           
            <div class="name">
                <span class="pr"> Voter Pour</span>
                <span class="name">{{$candidate->nom}} {{$candidate->prenom}}</span>
            </div>
            <div class="logos">
                <div class="l-img" style="background: url(/images/partenaires/vision4.jpeg) lightgray 50% / cover no-repeat;"></div>
                <div class="l-img" style="background: url(/misscam/images/89c11f383044adbc59807db06fc49878.png) lightgray 50% / cover no-repeat;"></div>
                <div class="l-img" style="background: url(/misscam/images/2108a92ff129289d499c1a3544d473cd.png) lightgray 50% / cover no-repeat;"></div>
               <div class="l-img" style="background: url(/images/partenaires/saga.jpeg) lightgray 50% / cover no-repeat;"></div>

            </div>
            <div class="choose-devise">
                <span class="name">Devise</span>
                <select class="rg" name="devise_{{$candidate->id}}" required style="margin-left: -4px;" onchange="selectdevise(this,{{$candidate->id}})">
                    <option value="">Selectionner la devise</option>
                    <option value="XAF">FCFA</option>
                    <option value="EUR">EURO</option>
                    <option value="USD">DOLLAR USD</option>
                    <option value="CAD">DOLLAR CAD</option>
                </select>

            </div>
            <div class="choose-devise" id="bloc_xaf_{{$candidate->id}}">
                <span class="name">Montant</span>
               <input type="number" class="rg" id="montant1_{{$candidate->id}}" name="montant1_{{$candidate->id}}" min="125" step="125" placeholder="Inserez le montant">

            </div>

            <div class="choose-devise" id="bloc_eur_usd_{{$candidate->id}}" style="display: none;">
                <span class="name">Montant</span>
               <input type="number" class="rg" id="montant2_{{$candidate->id}}" name="montant2_{{$candidate->id}}" min="1" step="1" placeholder="Inserez le montant">

            </div>
            <span class="conversion">1 Vote = 125 FCFA  |  3 Votes = 1 USD  |  4 Votes = 1 EUR</span>
            <button type="submit" id="btn_paid">Proceder au paiment</button>
       
        </div>
        </form>
        <div class="close">
            <a href="#" onclick="hideOverlay({{$candidate->id}});return false;"><img src="{{asset('misscam/images/close.png')}}"></a>
        </div>
    </div>
</div>
@endif
@endforeach

@section('footer')

<script>

    function chooseregion(rg){

        window.location.href ="?region="+rg+"#c-section";

    }

</script>

@endsection


