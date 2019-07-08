@extends('front.layout')
@section('css')
	<link href="css/card.css" rel="stylesheet">
@endsection
@section('main')

<!--Main layout-->
<main>
  <div class="container">

    <!--Section: Main info-->
    <section class="mt-5 wow fadeIn">

      <!--Grid row-->
      <div class="row">
        <section class="cards">
  <article class="card card--1">
    <div class="card__info-hover">
      <svg class="card__like"  viewBox="0 0 24 24">
      <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
  </svg>
        <div class="card__clock-info">
          <svg class="card__clock"  viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z" />
          </svg><span class="card__time">15 min</span>
        </div>

    </div>
    <div class="card__img"></div>
    <a href="#" class="card_link">
       <div class="card__img--hover" style="background-image: url('https://images.pexels.com/photos/45202/brownie-dessert-cake-sweet-45202.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260');"></div>
     </a>
    <div class="card__info">
      <span class="card__category"> Recipe</span>
      <h3 class="card__title">Crisp Spanish tortilla Matzo brei</h3>
      <span class="card__by">by <a href="#" class="card__author" title="author">Celeste Mills</a></span>
    </div>
  </article>


  <article class="card card--2">
    <div class="card__info-hover">
      <svg class="card__like"  viewBox="0 0 24 24">
      <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
  </svg>
        <div class="card__clock-info">
          <svg class="card__clock"  viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z" />
          </svg><span class="card__time">5 min</span>
        </div>

    </div>
    <div class="card__img"></div>
    <a href="#" class="card_link">
       <div class="card__img--hover" style="background-image: url('https://images.pexels.com/photos/307008/pexels-photo-307008.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260');"></div>
     </a>
    <div class="card__info">
      <span class="card__category"> Travel</span>
      <h3 class="card__title">Discover the sea</h3>
      <span class="card__by">by <a href="#" class="card__author" title="author">John Doe</a></span>
    </div>
  </article>



    </section>

      </div>
      <!--Grid row-->

    </section>
    <!--Section: Main info-->

    <hr class="my-5">

    <!--Section: Main features & Quick Start-->
    <section>

      <h3 class="h3 text-center mb-5">About MDB</h3>

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-lg-6 col-md-12 px-4">

          <!--First row-->
          <div class="row">
            <div class="col-1 mr-3">
              <i class="fas fa-code fa-2x indigo-text"></i>
            </div>
            <div class="col-10">
              <h5 class="feature-title">Bootstrap 4</h5>
              <p class="grey-text">Thanks to MDB you can take advantage of all feature of newest Bootstrap 4.</p>
            </div>
          </div>
          <!--/First row-->

          <div style="height:30px"></div>

          <!--Second row-->
          <div class="row">
            <div class="col-1 mr-3">
              <i class="fas fa-book fa-2x blue-text"></i>
            </div>
            <div class="col-10">
              <h5 class="feature-title">Detailed documentation</h5>
              <p class="grey-text">We give you detailed user-friendly documentation at your disposal. It will help you to implement your ideas
                easily.
              </p>
            </div>
          </div>
          <!--/Second row-->

          <div style="height:30px"></div>

          <!--Third row-->
          <div class="row">
            <div class="col-1 mr-3">
              <i class="fas fa-graduation-cap fa-2x cyan-text"></i>
            </div>
            <div class="col-10">
              <h5 class="feature-title">Lots of tutorials</h5>
              <p class="grey-text">We care about the development of our users. We have prepared numerous tutorials, which allow you to learn
                how to use MDB as well as other technologies.</p>
            </div>
          </div>
          <!--/Third row-->

        </div>
        <!--/Grid column-->

        <!--Grid column-->
        <div class="col-lg-6 col-md-12">

          <p class="h5 text-center mb-4">Watch our "5 min Quick Start" tutorial</p>
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/cXTThxoywNQ" allowfullscreen></iframe>
          </div>
        </div>
        <!--/Grid column-->

      </div>
      <!--/Grid row-->

    </section>
    <!--Section: Main features & Quick Start-->

    <hr class="my-5">

    <!--Section: Not enough-->
    <section>

      <h2 class="my-5 h3 text-center">Not enough?</h2>

      <!--First row-->
      <div class="row features-small mb-5 mt-3 wow fadeIn">

        <!--First column-->
        <div class="col-md-4">
          <!--First row-->
          <div class="row">
            <div class="col-2">
              <i class="fas fa-check-circle fa-2x indigo-text"></i>
            </div>
            <div class="col-10">
              <h6 class="feature-title">Free for personal and commercial use</h6>
              <p class="grey-text">Our license is user-friendly. Feel free to use MDB for both private as well as commercial projects.
              </p>
              <div style="height:15px"></div>
            </div>
          </div>
          <!--/First row-->

          <!--Second row-->
          <div class="row">
            <div class="col-2">
              <i class="fas fa-check-circle fa-2x indigo-text"></i>
            </div>
            <div class="col-10">
              <h6 class="feature-title">400+ UI elements</h6>
              <p class="grey-text">An impressive collection of flexible components allows you to develop any project.
              </p>
              <div style="height:15px"></div>
            </div>
          </div>
          <!--/Second row-->

          <!--Third row-->
          <div class="row">
            <div class="col-2">
              <i class="fas fa-check-circle fa-2x indigo-text"></i>
            </div>
            <div class="col-10">
              <h6 class="feature-title">600+ icons</h6>
              <p class="grey-text">Hundreds of useful, scalable, vector icons at your disposal.</p>
              <div style="height:15px"></div>
            </div>
          </div>
          <!--/Third row-->

          <!--Fourth row-->
          <div class="row">
            <div class="col-2">
              <i class="fas fa-check-circle fa-2x indigo-text"></i>
            </div>
            <div class="col-10">
              <h6 class="feature-title">Fully responsive</h6>
              <p class="grey-text">It doesn't matter whether your project will be displayed on desktop, laptop, tablet or mobile phone. MDB
                looks great on each screen.</p>
              <div style="height:15px"></div>
            </div>
          </div>
          <!--/Fourth row-->
        </div>
        <!--/First column-->

        <!--Second column-->
        <div class="col-md-4 flex-center">
          <img src="https://mdbootstrap.com/img/Others/screens.png" alt="MDB Magazine Template displayed on iPhone" class="z-depth-0 img-fluid">
        </div>
        <!--/Second column-->

        <!--Third column-->
        <div class="col-md-4 mt-2">
          <!--First row-->
          <div class="row">
            <div class="col-2">
              <i class="fas fa-check-circle fa-2x indigo-text"></i>
            </div>
            <div class="col-10">
              <h6 class="feature-title">70+ CSS animations</h6>
              <p class="grey-text">Neat and easy to use animations, which will increase the interactivity of your project and delight your visitors.
              </p>
              <div style="height:15px"></div>
            </div>
          </div>
          <!--/First row-->

          <!--Second row-->
          <div class="row">
            <div class="col-2">
              <i class="fas fa-check-circle fa-2x indigo-text"></i>
            </div>
            <div class="col-10">
              <h6 class="feature-title">Plenty of useful templates</h6>
              <p class="grey-text">Need inspiration? Use one of our predefined templates for free.</p>
              <div style="height:15px"></div>
            </div>
          </div>
          <!--/Second row-->

          <!--Third row-->
          <div class="row">
            <div class="col-2">
              <i class="fas fa-check-circle fa-2x indigo-text"></i>
            </div>
            <div class="col-10">
              <h6 class="feature-title">Easy installation</h6>
              <p class="grey-text">5 minutes, a few clicks and... done. You will be surprised at how easy it is.
              </p>
              <div style="height:15px"></div>
            </div>
          </div>
          <!--/Third row-->

          <!--Fourth row-->
          <div class="row">
            <div class="col-2">
              <i class="fas fa-check-circle fa-2x indigo-text"></i>
            </div>
            <div class="col-10">
              <h6 class="feature-title">Easy to use and customize</h6>
              <p class="grey-text">Using MDB is straightforward and pleasant. Components flexibility allows you deep customization. You will
                easily adjust each component to suit your needs.</p>
              <div style="height:15px"></div>
            </div>
          </div>
          <!--/Fourth row-->
        </div>
        <!--/Third column-->

      </div>
      <!--/First row-->

    </section>
    <!--Section: Not enough-->

    <hr class="mb-5">

    <!--Section: More-->
    <section>

      <h2 class="my-5 h3 text-center">...and even more</h2>

      <!--First row-->
      <div class="row features-small mt-5 wow fadeIn">

        <!--Grid column-->
        <div class="col-xl-3 col-lg-6">
          <!--Grid row-->
          <div class="row">
            <div class="col-2">
              <i class="fab fa-firefox fa-2x mb-1 indigo-text" aria-hidden="true"></i>
            </div>
            <div class="col-10 mb-2 pl-3">
              <h5 class="feature-title font-bold mb-1">Cross-browser compatibility</h5>
              <p class="grey-text mt-2">Chrome, Firefox, IE, Safari, Opera, Microsoft Edge - MDB loves all browsers; all browsers love MDB.
              </p>
            </div>
          </div>
          <!--/Grid row-->
        </div>
        <!--/Grid column-->

        <!--Grid column-->
        <div class="col-xl-3 col-lg-6">
          <!--Grid row-->
          <div class="row">
            <div class="col-2">
              <i class="fas fa-level-up-alt fa-2x mb-1 indigo-text" aria-hidden="true"></i>
            </div>
            <div class="col-10 mb-2">
              <h5 class="feature-title font-bold mb-1">Frequent updates</h5>
              <p class="grey-text mt-2">MDB becomes better every month. We love the project and enhance as much as possible.
              </p>
            </div>
          </div>
          <!--/Grid row-->
        </div>
        <!--/Grid column-->

        <!--Grid column-->
        <div class="col-xl-3 col-lg-6">
          <!--Grid row-->
          <div class="row">
            <div class="col-2">
              <i class="fas fa-comments fa-2x mb-1 indigo-text" aria-hidden="true"></i>
            </div>
            <div class="col-10 mb-2">
              <h5 class="feature-title font-bold mb-1">Active community</h5>
              <p class="grey-text mt-2">Our society grows day by day. Visit our forum and check how it is to be a part of our family.
              </p>
            </div>
          </div>
          <!--/Grid row-->
        </div>
        <!--/Grid column-->

        <!--Grid column-->
        <div class="col-xl-3 col-lg-6">
          <!--Grid row-->
          <div class="row">
            <div class="col-2">
              <i class="fas fa-code fa-2x mb-1 indigo-text" aria-hidden="true"></i>
            </div>
            <div class="col-10 mb-2">
              <h5 class="feature-title font-bold mb-1">jQuery 3.x</h5>
              <p class="grey-text mt-2">MDB is integrated with newest jQuery. Therefore you can use all the latest features which come along with
                it.
              </p>
            </div>
          </div>
          <!--/Grid row-->
        </div>
        <!--/Grid column-->

      </div>
      <!--/First row-->

      <!--Second row-->
      <div class="row features-small mt-4 wow fadeIn">

        <!--Grid column-->
        <div class="col-xl-3 col-lg-6">
          <!--Grid row-->
          <div class="row">
            <div class="col-2">
              <i class="fas fa-cubes fa-2x mb-1 indigo-text" aria-hidden="true"></i>
            </div>
            <div class="col-10 mb-2">
              <h5 class="feature-title font-bold mb-1">Modularity</h5>
              <p class="grey-text mt-2">Material Design for Bootstrap comes with both, compiled, ready to use libraries including all features as
                well as modules for CSS (SASS files) and JS.</p>
            </div>
          </div>
          <!--/Grid row-->
        </div>
        <!--/Grid column-->

        <!--Grid column-->
        <div class="col-xl-3 col-lg-6">
          <!--Grid row-->
          <div class="row">
            <div class="col-2">
              <i class="fas fa-question fa-2x mb-1 indigo-text" aria-hidden="true"></i>
            </div>
            <div class="col-10 mb-2">
              <h5 class="feature-title font-bold mb-1">Technical support</h5>
              <p class="grey-text mt-2">We care about reliability. If you have any questions - do not hesitate to contact us.
              </p>
            </div>
          </div>
          <!--/Grid row-->
        </div>
        <!--/Grid column-->

        <!--Grid column-->
        <div class="col-xl-3 col-lg-6">
          <!--Grid row-->
          <div class="row">
            <div class="col-2">
              <i class="fas fa-th fa-2x mb-1 indigo-text" aria-hidden="true"></i>
            </div>
            <div class="col-10 mb-2">
              <h5 class="feature-title font-bold mb-1">Flexbox</h5>
              <p class="grey-text mt-2">MDB fully supports Flex Box. You can forget about alignment issues.</p>
            </div>
          </div>
          <!--/Grid row-->
        </div>
        <!--/Grid column-->

        <!--Grid column-->
        <div class="col-xl-3 col-lg-6">
          <!--Grid row-->
          <div class="row">
            <div class="col-2">
              <i class="far fa-file-code fa-2x mb-1 indigo-text" aria-hidden="true"></i>
            </div>
            <div class="col-10 mb-2">
              <h5 class="feature-title font-bold mb-1">SASS files</h5>
              <p class="grey-text mt-2">Arranged and well documented .scss files can't wait until you compile them.</p>
            </div>
          </div>
          <!--/Grid row-->
        </div>
        <!--/Grid column-->

      </div>
      <!--/Second row-->

    </section>
    <!--Section: More-->

  </div>
</main>

@section('scrpits')

@endsection

@endsection
