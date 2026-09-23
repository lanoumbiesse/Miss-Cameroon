@extends('front.layout1')

@section('main')

@include('front.partials.carousel')

@include('front.partials.candidates')






@endsection

@section('footer')

<script type="text/javascript">
	
	function showamountpage(id){
		$("#modal-code-"+id).modal('show');
	}
	
	function disablebt(id){
  document.getElementById('#=vote_'+id).disabled = true;
}

	function selectdevise(val,id){
		if(val.value=="USD" || val.value=='EUR'){
			$('#bloc_xaf_'+id).hide();
			$('#bloc_eur_usd_'+id).show();
			document.getElementById("montant1_"+id).required = false;
			document.getElementById("montant2_"+id).required = true;
		}
		if(val.value=="XAF"){
			$('#bloc_xaf_'+id).show();
			$('#bloc_eur_usd_'+id).hide();
			document.getElementById("montant1_"+id).required = true;
			document.getElementById("montant2_"+id).required = false;
		}
	}

</script>

@endsection
