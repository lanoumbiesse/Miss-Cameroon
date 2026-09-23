<div class="footer">
    <div class="part1">
        <p class="title">A Propos</p>
        <span class="text">People's choice est un concept qui permet à toute personne de voter pour sa candidate préférée en ligne et à tout moment.</span>
        <div class="icones">
            <a href="#"><img src="{{asset('/misscam/images/Group (4).svg')}}"></a> 
            <a href="#"><img src="{{asset('/misscam/images/Group (2).svg')}}"></a> 
            <a href="#"><img src="{{asset('/misscam/images/Group (1).svg')}}"></a>   
        </div>
    </div>
    <div class="part2">
        <p class="title">Liens utiles</p>
        <a href="#"><span>A Propos</span></a>
        <a href="#"><span>Devenir partenaire</span></a>
        <a href="#"><span>Passer sa pub</span></a>
        <a href="#"><span>Termes et conditions</span></a>
        <a href="#"><span>FAQ</span></a>
    </div>
    <div class="part3">
        <p class="title">Contacts</p>
        <div class="item">
            <img src="{{asset('/misscam/images/Frame (2).svg')}}">
            <span>2e étage immeuble de la 
                pharmacie Mvog Ada</span>
        </div>
        <div class="item">
            <img src="{{asset('/misscam/images/Group (5).svg')}}">
            <span>+237 656372666</span>
        </div>
        <div class="item">
            <img src="{{asset('/misscam/images/Group (3).svg')}}">
            <span>misscameroun@misscameroun.org</span>
        </div> 
        <div class="item">
            <img src="{{asset('/misscam/images/Group (5).svg')}}">
            <span>Support technique: +237690222814</span>
        </div>
    </div>

    <div class="part4">
        <p class="title">Nombre de visiteurs</p>
        <table>
            <tr>
              <th>Aujourd'hui</th>
              <th>Total</th>
            </tr>
            <tr>
              <td>{{$nbvisitors}}</td>
              <td>{{$totalvsitors}}</td>
            </tr>
          </table>
    </div>
    

</div>