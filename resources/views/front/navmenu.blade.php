<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">

    <!-- Brand -->
    <a class="navbar-brand" href="/">
    <img src="{{asset('/images/logo2.png')}}" width="80">
    </a>

    <!-- Collapse -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Links -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <!-- Left -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Accueil
            <span class="sr-only">(current)</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#" target="_blank">Centre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" target="_blank">Littoral</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" target="_blank">Ouest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" target="_blank">Nord</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" target="_blank">Sud</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" target="_blank">Est</a>
        </li>
      </ul>

      <!-- Right -->
      <ul class="navbar-nav nav-flex-icons">
        @if(Auth::check())
      <li class="nav-item" style="color:white;">
        Bienvenue {{Auth::user()->name}}
      </li>
        @else
        <li class="nav-item">
          <a href="https://www.facebook.com/mdbootstrap" class="nav-link" target="_blank">
            <i class="fab fa-facebook-f"></i>
          </a>
        </li>
        <li class="nav-item">
          <a href="https://twitter.com/MDBootstrap" class="nav-link" target="_blank">
            <i class="fab fa-twitter"></i>
          </a>
        </li>
        @endif
      </ul>

    </div>

  </div>
</nav>
<!-- Navbar -->
