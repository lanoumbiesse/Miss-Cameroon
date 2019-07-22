
  <!--Carousel Wrapper-->
  <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">

    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-1z" data-slide-to="1"></li>
      <li data-target="#carousel-example-1z" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

      <!--First slide-->
      @foreach($candidate->pictures()->get() as $key=> $picture)
      @if($picture->type!="44")
      @if($key==1)
      <div class="carousel-item active">
        <div class="view" style="background-image: url(/{{$picture->chemin}}); background-repeat: no-repeat; background-size: cover;">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">

              <a href="#sectioncard">
                <i class="fa fa-arrow-down ml-2 bounce" style="color: white;font-size: 30px;"></i>
              </a>

            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>
      @else

      <div class="carousel-item">
        <div class="view" style="background-image: url(/{{$picture->chemin}}); background-repeat: no-repeat; background-size: cover;">

          <!-- Mask & flexbox options-->
          <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">

              <!--<h2 class="mb-4">
                <strong>{{$candidate->nom}} {{$candidate->prenom}}</strong>
              </h2>-->

              <!--<br><br>-->

              <a href="#sectioncard">
                <i class="fa fa-arrow-down ml-2 bounce" style="color: white;font-size: 30px;"></i>
              </a>
            </div>
            <!-- Content -->

          </div>
          <!-- Mask & flexbox options-->

        </div>
      </div>

      @endif
      @endif
      <!--/First slide-->
    @endforeach

    </div>
    <!--/.Slides-->

    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->

  </div>
