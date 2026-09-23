@extends('front.layoutmiss')

@section('head')
<meta property="og:title" content="Miss Cameroun - People choice" />
<meta property="og:description" content="{{$candidate->nom}} {{$candidate->prenom}}" />
<meta property="og:type" content="siteweb" />
<meta property="og:image" content="https://vote.misscameroun.org{{$candidate->pictures()->where('type','44')->first()->chemin}}" />
<meta property="og:url" content="https://vote.misscameroun.org/profile/{{$candidate->web_id}}" />
<title>Peole'Choice - {{$candidate->nom}}</title>

<style>
    .title123{
font-size: 16px;
font-weight: 700;
line-height: normal;
background: var(--main-bg-color);
background-clip: text;
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
text-align: center;
  }
  .transaction{
    color:white;
    font-size: 10px;
    text-align: center;
    margin-top: -30px;
}
.transaction tbody td{
    color:white;
    font-size: 10px;
    text-align: center;   
}
.transaction td, .transaction th{
    padding: 5px;
}

.profile .content .infos .about .value {

    gap: 17px !important;
    text-align: left;
}
.profile .content .infos .about .value span{
    font-size:14px !important;
}

@media (max-width: 820px) {
    
    .profile .content .infos .about .value {
        
        margin-top: -50px !important;
        
    }

}
</style>
@endsection

@section('main')

 
<div class="presentation">
    <div class="profile">
        <div class="content">
            <div class="p-img" style="background: url({{$candidate->pictures()->where('type','44')->first()->chemin}}) lightgray 50% / cover no-repeat;"></div>
            <div class="infos">
                <div class="name-vote">
                <span class="name"> {{$candidate->nom}} {{$candidate->prenom}}</span>
                <span class="nbvotes"> @if($affichage==1) {{round($candidate->nbvote*100/$totalvote1,3)}}% de @else {{$candidate->nbvote}} @endif votes</span>
                </div>
                <div class="about">
                    <div class="title">
                        <span>Numéro</span>
                        <span>Age</span>
                        <span>Titre</span>
                        <span>Profession</span>
                        <span>Hobbies</span>
                    </div>
                    <div class="value">
                        @if(!empty($candidate->numero_candidate) && ($candidate->numero_candidate !=0))<span> {{$candidate->numero_candidate}}</span>@endif
                        <span><!--{{$candidate->age!=0?$candidate->age:''}}--></span>
                        <span>@if(!empty($candidate->waist)){{$candidate->waist}}
	              		@endif</span>
	              		<span>@if(!empty($candidate->bust)){{$candidate->bust}}
	              		@endif</span>
	              		<span>@if(!empty($candidate->hips)){{$candidate->hips}}
	              		@endif</span>
                    </div>
                </div>
                @if($endvote!=1 && $candidate->vote_end==0)
                <a href="#"  onclick="showOverlay({{$candidate->id}});return false;"  class="vtf"><span>Voter pour elle</span></a>
                @endif
                <div class="social">
                <a href="#"><img src="{{asset('misscam/images/Group (4).svg')}}"></a> 
                <a href="#"><img src="{{asset('misscam/images/Group (2).svg')}}"></a> 
                <a href="#"><img src="{{asset('misscam/images/Group (1).svg')}}"></a>  
                </div>
               
                @if(isset($last))
               
                <p class="title123">50 dernières transactions</p>
                        <table class="transaction" border="1">
                            <tr style="font-weight:bold;">
                            <th>Date</th>
                            <th>Montant</th>
                            <th>Numéro</th>
                            <th>Nb votes </th>
                            <th>Nb votes avant paiement </th>
                            <th>Nb votes après paiement</th>
                            <tr>
                            <tbody>
                                 @foreach($last as $key=> $l)
                                <tr>
                                <td>{{$l->date1}}</td>
                                <td>{{$l->montant}} {{$l->currency}}</td>
                                <td>@if(!empty($l->phone))
                                
                                {{substr($l->phone, 0, 4) . "****" . substr($l->phone, 7, 4)}}
                                @endif</td>
                                <td>{{$l->nbre_vote}}</td>
                                <td>{{$l->nbav}}</td>
                                <td>{{$l->nbap}}</td>
                                </tr>
                            </tbody>
                            @endforeach

                        </table>
                       
                @endif
                

            </div>
            <img src="{{asset('misscam/images/Vector (5).svg')}}" class="p-ball">
        </div>
    </div>
</div>

<div class="best-candidate-section">
<div class="best-candidate">
    <img src="{{asset('misscam/images/ball.svg')}}" class="pr-ball-1">
    <img src="{{asset('misscam/images/ball.svg')}}" class="pr-ball-2">
    <div class="title">Meilleurs votes</div>
    <div class="content">
        @foreach($candidates as $key=> $candidate1)
        <div class="candidate-it">
        <a href="{{url('/profile/'.$candidate1->web_id)}}">
        <div class="img-it" style="background: url({{$candidate1->pictures()->where('type','44')->first()->chemin}}) lightgray 50% / cover no-repeat;"></div>
        <div class="name"><span>{{$candidate1->nom}} {{$candidate1->prenom}}</span></div>
        <span class="vote">
            {{$candidate1->nbvote}} votes
        </span>
        </a>
        </div>

        @endforeach

    </div>
</div>

</div>




@endsection

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

@section('footer')
<script>
const d = document.querySelector('.wrapper2');
d.classList.add('d-none');

const d1 = document.querySelector('.hero-section');
d1.classList.add('c-profile');

document.querySelector('.layer2').classList.add('d-none');
document.querySelector('.layerp').classList.remove('d-none');
document.querySelector('.layer21').classList.add('d-none');

document.querySelector('.partenaires .ball').classList.add('d-none');
document.querySelector('.partenaires .p-ball-2').classList.remove('d-none');

</script>


@endsection
