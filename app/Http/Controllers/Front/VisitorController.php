<?php

namespace App\Http\Controllers\Front;

use App\ {
    Http\Controllers\Controller,
    Models\Visitor
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class VisitorController extends Controller
{

public function savevisitor(){

    $visitor=new Visitor();
    $visitor->ip=$this->getUserIP();
    $visitor->date=date('Y-m-d');
    $visitor->time= date('H:i:s');
    $visitor->save();
   /* if(isset($visitor->ip) && $visitor->ip!="127.0.0.1" && $visitor->ip!="UNKNOWN"){
       
    try {
  $clientDetails = json_decode(file_get_contents("http://ipinfo.io/$visitor->ip/json"));
  if($clientDetails){
   $visitor->country=$clientDetails->country;
    $visitor->city=$clientDetails->city;
    $visitor->region=$clientDetails->region;
    $visitor->loc=$clientDetails->loc;
    $visitor->timezone=$clientDetails->timezone;
    $visitor->org=$clientDetails->org;
    $visitor->save();
  }
}
catch(Exception $e){
   exit();
}

   
        }*/

}

public function countvisitor(){
    $this->savevisitor();
    $visitor=(Visitor::where('date',date('Y-m-d')))->distinct('ip')->count('ip');
    return $visitor;
}

public function totalvisitor(){
    $parametre=\DB::table('parametre')->where('is_active',1)->first();
    $visitor=(Visitor::whereYear('date',$parametre->annee))->distinct('ip')->count('ip');
    return $visitor;
}


   public function getUserIP() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

public function getipinfo($ip){

    $clientDetails = json_decode(file_get_contents("http://ipinfo.io/$ip/json"));
    
    return $clientDetails;

    //echo "You're logged in from: <b>" . $clientDetails->country . "</b>";

}

}
