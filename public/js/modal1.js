
function showmodal(id){
  $('#voteview_'+id).modal('show');

}

function disablebt(id){
  document.getElementById('#vote_'+id).disabled = true;
}

function checkmobileval(field,id) {

            if(field.value!=""){
              document.getElementById("c2_"+id).required = false;
              document.getElementById("paypalpart_"+id).style = "display:none;";
            }else
            {
              document.getElementById("c2_"+id).required = true;
              document.getElementById("paypalpart_"+id).style = "display:block;";
            }


        }

function checkpaypalval(field,id) {
  if(field.value!=""){
    document.getElementById("mobilepart_"+id).style = "display:none;";
      document.getElementById("c1_"+id).required = false;
      document.getElementById("netapayer").innerHTML ="Montant net à payer: "+field.value*1.46+ "CAD(Dollar Canadien)";
  }
else {
  document.getElementById("c1_"+id).required = true;
  document.getElementById("mobilepart_"+id).style = "display:block;";
  document.getElementById("netapayer").innerHTML ="1 euro=1.46CAD";
}
}

