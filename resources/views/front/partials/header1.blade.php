   <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" style="top: 0px;background-color: #e82294 !important; z-index:900;">
      <div class="container">
        <a class="navbar-brand" href="{{url('comicash')}}">COMI<span>CASH</span></a>
        <button class="navbar-toggler" style="color: white !important;" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation" onclick="hideshownav()">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="{{url('comicash')}}" class="nav-link">Acceuil</a></li>
            @if(Auth::check())
            <li class="nav-item"><a href="{{url('comicash/historique')}}" class="nav-link">Historique</a></li>
            @endif
            <li class="nav-item"><a href="#" onclick="$('#modal-partenaire').modal('show');" class="nav-link">Contact</a></li>
           
            <!-- Menu Toggle Button -->
            @if(Auth::user())
          
           
           
              <!-- The user image in the menu -->
             
              <li class="nav-item"><a href="{{url('comicash/historique')}}" class="nav-link">{{substr(Auth::user()->name, 0, 15) . '...'}}</a></li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right" style="margin-top: -10px;">
                  <a id="logout" href="{{url('/signout')}}" class="btn mynextbt1">Se déconnecter</a>
                </div>
              </li>
            
             @endif
          
          </ul>
        </div>
      </div>
    </nav>

    <script type="text/javascript">
      function hideshownav() {
       if(document.getElementById('ftco-nav').classList.contains('show1')){
        document.getElementById('ftco-nav').classList.remove('show1');
       }else{
        document.getElementById('ftco-nav').classList.add('show1');
       }
      }
    </script>

     <!-- Top Social Begin -->
    <!--<div class="top-social">
        <div class="top-social-links">
            <ul>
                
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                
            </ul>
        </div>
    </div>-->
    <!-- Top Social End -->


    <div id="modal-partenaire" class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal_miss">
           
            <div class="modal-header head-table">
               <h3 class="white-text">Contact</h3>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <h4 style="color: white;">
                Envoyer un mail à l'adresse suivante pour les modalités:
                <i style="font-weight: bold; color: #65024b;">giresseayef@gmail.com</i>
              </h4> 
              <br>
              <h4 style="color: white;">
                Ou contacter ce numéro:
                <i style="font-weight: bold;color: #65024b;">237656372666</i>
              </h4> 

            </div>

        </div>
    </div>
</div>