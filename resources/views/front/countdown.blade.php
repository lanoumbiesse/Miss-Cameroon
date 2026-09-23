<style type="text/css">
#mycountdown{
	text-align: center;
}
#mycountdown h1{ 
  color: white; 
  font-weight: 100; 
  font-size: 40px; 
  margin: 40px 0px 20px; 
  font-family: initial;
} 
 #mycountdown #clockdiv{ 
    font-family: sans-serif; 
    color: #fff; 
    display: inline-block; 
    font-weight: 100; 
    text-align: center; 
} 
#mycountdown #clockdiv > div{ 
    padding: 10px; 
    border-radius: 3px; 
    background: #e1306c; 
    display: inline-block; 
} 
#mycountdown #clockdiv div > span{ 
    padding: 15px; 
    border-radius: 3px; 
    background: #c31d55; 
    display: inline-block; 
} 
#mycountdown .smalltext{ 
    padding-top: 5px; 
    font-size: 16px; 
} 
#demo{
   color: white;
    font-family: initial;
    font-size: 20px;
}
</style>

<div id="mycountdown">
<h1>Arrêt des votes dans:</h1> 
<div id="clockdiv"> 
  <div> 
    <span class="days" id="day"></span> 
    <div class="smalltext">Jours</div> 
  </div> 
  <div> 
    <span class="hours" id="hour"></span> 
    <div class="smalltext">heures</div> 
  </div> 
  <div> 
    <span class="minutes" id="minute"></span> 
    <div class="smalltext">Minutes</div> 
  </div> 
  <div> 
    <span class="seconds" id="second"></span> 
    <div class="smalltext">Secondes</div> 
  </div> 
</div> 
  
<p id="demo"></p> 
</div>


<script> 
  
var deadline = new Date("dec 26, 2019 16:00:00 GMT+0100").getTime(); 
  
var x = setInterval(function() { 
  
var now = new Date().getTime(); 
var t = deadline - now; 
var days = Math.floor(t / (1000 * 60 * 60 * 24)); 
var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
var seconds = Math.floor((t % (1000 * 60)) / 1000); 
document.getElementById("day").innerHTML =days ; 
document.getElementById("hour").innerHTML =hours; 
document.getElementById("minute").innerHTML = minutes;  
document.getElementById("second").innerHTML =seconds;  
if (t < 0) { 
        $('.btn-secondary').hide();
        clearInterval(x); 
        document.getElementById("demo").innerHTML = "FIN DES VOTES"; 
        document.getElementById("day").innerHTML ='0'; 
        document.getElementById("hour").innerHTML ='0'; 
        document.getElementById("minute").innerHTML ='0' ;  
        document.getElementById("second").innerHTML = '0'; } 
}, 1000); 
</script> 
