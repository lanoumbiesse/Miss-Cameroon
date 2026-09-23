@extends('front.layout2')
@section('head')
<style type="text/css">
    body {
    /*background: url('/images/cagnotte.jpg') repeat center center !important;*/
}
.btn_3{
    color:#e82294 !important;
}
</style>
@endsection
@section('main')

@include('comicash.carousel')

@include('comicash.top')




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
       <p class="btext titresection text-center">{{session('successfree')}}</p>


      </div>

    </div>
  </div>
</div>

<div class="modal fade right" id="sideModalfailed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-side modal-top-right" role="document">


    <div class="modal-content">
      <div class="modal-header" style="background-color:red !important;">
        <h4 class="modal-title w-100 white-text" id="myModalLabel">Statut</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"  class="white-text">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <p class="btext titresection text-center">{{session('failedpaid')}}</p>


      </div>

    </div>
  </div>
</div>

@endsection

@section('footer')

<script type="text/javascript">
	

</script>

@endsection
