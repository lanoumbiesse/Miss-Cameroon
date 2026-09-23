<?php

namespace App\Http\Controllers\Front;

use App\ {
    Http\Controllers\Controller,
    Http\Requests\SearchRequest,
    Repositories\PostRepository,
    Http\Requests\InscriptionsRequest,
    Models\Vote,
    Models\Candidate,
    Models\Transaction
};
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Mail;
use Cookie;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Front\VisitorController;
use Response;
use Illuminate\Support\Facades\Input;

require 'functions.php';

class HomeController extends Controller
{
    /**
     * The PostRepository instance.
     *
     * @var \App\Repositories\PostRepository
     */
    protected $postRepository;

    /**
     * The pagination number.
     *
     * @var int
     */
    protected $nbrPages;
    public $enableSandbox = false;
    public $paypalConfig = [
	'email' => 'v.vantchac@gmail.com',
	'return_url' => 'https://vote.misscameroun.org/paidpaypal/success',
	'cancel_url' => 'https://vote.misscameroun.org/paid/fail',
	'notify_url' => 'https://vote.misscameroun.org/vote/checkpaymentpaypal'
];
public $paypalUrl;
public $visitor;

    /**
     * Create a new PostController instance.
     *
     * @param  \App\Repositories\PostRepository $postRepository
     * @return void
    */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
        $this->nbrPages = config('app.nbrPages.front.posts');
        $this->visitor=new VisitorController();

    }

    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */

    public function pagecandidate($ref){

      $nbvisitors=$this->visitor->countvisitor();
      //dd($nbvisitors);

      return view('front.candidate', compact('nbvisitors'));

    }

    public function index(Request $request)
    {
      
       //dd($request->ip());
       //Auth::logout();
       //Auth::loginUsingId(28);
      
    /*  $now = Carbon::now(); // utc 2014-09-10 08:24:50
      $now->tz('Africa/Douala'); 
      $end=new Carbon('2019-12-26 14:00:00');
       
      print_r($now);
      print_r($end);
      if($now>=$end)
      dd("End");
    else dd($now);*/
    $nbelt=8;
    $toskip=0;
    $region=Input::get('region','Littoral');
    $region_name='Est';

    switch ($region) {
    case 'Littoral':
      $region_name='Littoral';
        break;
        case 'Sud-ouest':
      $region_name='Sud Ouest';
        break;
    
        
}


   
    $page = Input::get('p', 1);
         if($page>=1)
         $toskip=($page-1)*$nbelt;
        else $toskip=0;

    if($this->isMobileDev()){
      $toskip=0;
      $nbelt=100;
    }

    $ip=$this->visitor->getUserIP();
    $nbvisitors=$this->visitor->countvisitor();
    $totalvsitors=$this->visitor->totalvisitor();

      $statut='null';
      $parametre=\DB::table('parametre')->where('is_active',1)->first();
      $endvote=$parametre->test;
      $affichage=$parametre->affichage;

      $totalC= Candidate::where('candidates.annee',$parametre->annee)
               ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
               ->where('candidates.finaliste',1)
               //->where('vote.status',$parametre->status)
               //->where('vote.date','>','2019-11-29')
                //->where('candidates.finaliste',1)
               ->select('candidates.*', \DB::raw("SUM( ( CASE WHEN vote.status = 'final' THEN vote.nbre_vote ELSE 0 END ) ) AS nbvote"))
               ->groupBy('candidates.id')
               ->orderby('nbvote','desc')
               ->get();
               $totalC=count($totalC);

   $candidates= Candidate::where('candidates.annee',$parametre->annee)
               ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
                //->where('candidates.regionconcours',$region)
               //->where('vote.status',$parametre->status)
               //->where('vote.date','>','2019-11-29')
               ->where('candidates.finaliste',1)
               //->whereNotIn('candidates.id',[307])
               ->select('candidates.*', \DB::raw("SUM( ( CASE WHEN vote.status = 'final' THEN vote.nbre_vote ELSE 0 END ) ) AS nbvote"))
               ->groupBy('candidates.id')
               ->orderby('nbvote','desc')
               ->skip($toskip)->take($nbelt)->get();
   
               $nb=$totalC/$nbelt;
                $y=intval($nb);
                if($y<$nb) $nb=$y+1;
                if($nb==0) $nb=1;

    $bestofday=Candidate::where('candidates.annee',$parametre->annee)
               ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
              //->where('candidates.regionconcours',$region)
               //->where('vote.status',$parametre->status)
               ->where('vote.date','=',date('Y-m-d'))
               ->where('candidates.finaliste',1)
               ->select('candidates.*', \DB::raw("SUM( ( CASE WHEN vote.status = 'final' THEN vote.nbre_vote ELSE 0 END ) ) AS nbvote"))
               ->groupBy('candidates.id')
               ->orderby('nbvote','desc')
               ->first();
               
                //dd($candidates);

            if(empty($bestofday))
            $bestofday=$candidates[0];
            
      //$candidates=[];     

//if($parametre->test==1)
//  $candidates=[];
   
   $candidates2=[];
   /*$candidates2= Candidate::where('candidates.annee',$parametre->annee)
                        ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
                        ->where('candidates.regionconcours','Adamoua')
                        //->where('vote.status',$parametre->status)
                        ->select('candidates.*', \DB::raw("SUM( ( CASE WHEN vote.status = 'regional' THEN vote.nbre_vote ELSE 0 END ) ) AS nbvote"))
                        ->groupBy('candidates.id')
                        ->orderby('nbvote','desc')
                        ->get();*/
                       // $candidates2=[];
                        
  $candidates3=[];
    /*$candidates3= Candidate::where('candidates.annee',$parametre->annee)
                        ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
                        ->where('candidates.regionconcours','Nord')
                        //->where('vote.status',$parametre->status)
                        ->select('candidates.*', \DB::raw("SUM( ( CASE WHEN vote.status = 'regional' THEN vote.nbre_vote ELSE 0 END ) ) AS nbvote"))
                        ->groupBy('candidates.id')
                        ->orderby('nbvote','desc')
                        ->get();*/


      if(Auth::check()){
      $statut=Vote::where('id_user',Auth::user()->id)
                  ->whereDate('date', '=', Carbon::today()->toDateString())
                  ->where('type','gratuit')
                  ->first();
          if(empty($statut)){
            $statut=Vote::whereDate('date', '=', Carbon::today()->toDateString())
                        ->where('ip',$ip)
                        ->where('type','gratuit')
                        ->first();
          }
        }
        
        $totalvote1=Candidate::where('candidates.annee',$parametre->annee)
               ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
               //->where('candidates.regionconcours','Littoral')
               ->where('vote.status',$parametre->status)
               //->where('vote.date','>','2019-11-29')
                ->where('candidates.finaliste',1)
               ->select('candidates.*', \DB::raw("SUM( ( CASE WHEN vote.status = 'final' THEN vote.nbre_vote ELSE 0 END ) ) AS nbvote"))
               ->groupBy('candidates.id')
               ->orderby('nbvote','desc')
               ->get()
               ->sum('nbvote');
               
               if($totalvote1==0)
                $totalvote1=1;
               
        $totalvote2= Candidate::where('candidates.annee',$parametre->annee)
                        ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
                        //->where('candidates.regionconcours','Sud-ouest')
                        ->where('vote.status',$parametre->status)
                         ->where('candidates.finaliste',1)
                        ->select('candidates.*', \DB::raw("SUM( ( CASE WHEN vote.status = 'final' THEN vote.nbre_vote ELSE 0 END ) ) AS nbvote"))
                        ->groupBy('candidates.id')
                        ->orderby('nbvote','desc')
                        ->get()
                        ->sum('nbvote');
        if($totalvote2==0)
                $totalvote2=1;
           
         
        
        return view('front.indexmiss', compact('candidates','candidates2','candidates3','parametre','statut','nbvisitors','endvote','totalvote1','totalvote2','affichage','page','nb','region_name','region','totalvsitors','bestofday'));
    }

    public function isMobileDev(){
    if(!empty($_SERVER['HTTP_USER_AGENT'])){
       $user_ag = $_SERVER['HTTP_USER_AGENT'];
       if(preg_match('/(Mobile|Android|Tablet|GoBrowser|[0-9]x[0-9]*|uZardWeb\/|Mini|Doris\/|Skyfire\/|iPhone|Fennec\/|Maemo|Iris\/|CLDC\-|Mobi\/)/uis',$user_ag)){
          return true;
       };
    };
    return false;
}

    public function ouest(Request $request)
    {


      for($i=1;$i<=2;$i++){
       
        $u=null;
        while(empty($u)){
          $t=rand(11000, 13500);
          $u=\App\Models\User::find($t);
        }
        
        if(!empty($u)){

        $parametre=\DB::table('parametre')->where('is_active',1)->first();
        $start_date = Carbon::now()->modify('-4 hour');
        $end_date = Carbon::now();

            $min = strtotime($start_date);
            $max = strtotime($end_date);

            // Generate random number using above bounds
            $val = rand($min, $max);

            // Convert back to desired date format
            $d = new Carbon(date('Y-m-d H:i:s', $val));
            //$start=$d;
            //print($d);
            //$start->subHour();
            //print($d);
            //dd($start);

        $id=18;
        $candidate=Candidate::find($id);
        $vote=new vote();
        $vote->id_user=$u->id;
        $vote->id_candidate=$id;
        $vote->date=$d;
        $vote->status=$parametre->status;
        $vote->nbre_vote=1;
        //$start->modify('-1 hour');
        $vote->updated_at= $d->subHour();
        $vote->created_at= $d->subHour();
        
        $vote->type='gratuit';
        $vote->montant=0;
        $vote->ip="".mt_rand(1,254).".".mt_rand(1,254).".".mt_rand(1,254).".".mt_rand(1,254);
        $vote->annee=$parametre->annee;
        $vote->save();

        }
      }
      dd("ok");
       //dd($request->ip());
       //Auth::logout();
       //Auth::loginUsingId(28);
     /* $statut='null';
      $parametre=\DB::table('parametre')->where('is_active',1)->first();

      $candidates= Candidate::where('candidates.annee',$parametre->annee)
               ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
               ->where('candidates.regionconcours','Ouest')
              // ->where('vote.status',$parametre->status)
               ->select('candidates.*',\DB::raw('SUM(vote.nbre_vote) as nbvote'))
               ->groupBy('candidates.id')
               ->orderby('nbvote','desc')
               ->get();

      if(Auth::check()){
      $statut=Vote::where('id_user',Auth::user()->id)
                  ->whereDate('date', '=', Carbon::today()->toDateString())
                  ->where('type','gratuit')
                  ->first();
          if(empty($statut)){
            $statut=Vote::whereDate('date', '=', Carbon::today()->toDateString())
                        ->where('ip',$request->ip())
                        ->where('type','gratuit')
                        ->first();
          }
        }


        return view('front.index', compact('candidates','parametre','statut'));*/
    }

    public function sudouest(Request $request)
    {
       //dd($request->ip());
       //Auth::logout();
       //Auth::loginUsingId(28);
      $statut='null';
      $parametre=\DB::table('parametre')->where('is_active',1)->first();

      $candidates= Candidate::where('candidates.annee',$parametre->annee)
               ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
               ->where('candidates.regionconcours','Sud-ouest')
              // ->where('vote.status',$parametre->status)
               ->select('candidates.*',\DB::raw('SUM(vote.nbre_vote) as nbvote'))
               ->groupBy('candidates.id')
               ->orderby('nbvote','desc')
               ->get();

      if(Auth::check()){
      $statut=Vote::where('id_user',Auth::user()->id)
                  ->whereDate('date', '=', Carbon::today()->toDateString())
                  ->where('type','gratuit')
                  ->first();
          if(empty($statut)){
            $statut=Vote::whereDate('date', '=', Carbon::today()->toDateString())
                        ->where('ip',$request->ip())
                        ->where('type','gratuit')
                        ->first();
          }
        }


        return view('front.index', compact('candidates','parametre','statut'));
    }

    public function littoral(Request $request)
    {
       //dd($request->ip());
       //Auth::logout();
       //Auth::loginUsingId(28);
      $statut='null';
      $parametre=\DB::table('parametre')->where('is_active',1)->first();

      $candidates= Candidate::where('candidates.annee',$parametre->annee)
               ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
               ->where('candidates.regionconcours','Littoral')
              // ->where('vote.status',$parametre->status)
               ->select('candidates.*',\DB::raw('SUM(vote.nbre_vote) as nbvote'))
               ->groupBy('candidates.id')
               ->orderby('nbvote','desc')
               ->get();

      if(Auth::check()){
      $statut=Vote::where('id_user',Auth::user()->id)
                  ->whereDate('date', '=', Carbon::today()->toDateString())
                  ->where('type','gratuit')
                  ->first();
          if(empty($statut)){
            $statut=Vote::whereDate('date', '=', Carbon::today()->toDateString())
                        ->where('ip',$request->ip())
                        ->where('type','gratuit')
                        ->first();
          }
        }


        return view('front.index', compact('candidates','parametre','statut'));
    }

    public function nordouest(Request $request)
    {
       //dd($request->ip());
       //Auth::logout();
       //Auth::loginUsingId(28);
      $statut='null';
      $parametre=\DB::table('parametre')->where('is_active',1)->first();

      $candidates= Candidate::where('candidates.annee',$parametre->annee)
               ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
               ->where('candidates.regionconcours','Nord-ouest')
               //->where('vote.status',$parametre->status)
               ->select('candidates.*',\DB::raw('SUM(vote.nbre_vote) as nbvote'))
               ->groupBy('candidates.id')
               ->orderby('nbvote','desc')
               ->get();

      if(Auth::check()){
      $statut=Vote::where('id_user',Auth::user()->id)
                  ->whereDate('date', '=', Carbon::today()->toDateString())
                  ->where('type','gratuit')
                  ->first();
          if(empty($statut)){
            $statut=Vote::whereDate('date', '=', Carbon::today()->toDateString())
                        ->where('ip',$request->ip())
                        ->where('type','gratuit')
                        ->first();
          }
        }


        return view('front.index', compact('candidates','parametre','statut'));
    }


        public function sud(Request $request)
        {
           //dd($request->ip());
           //Auth::logout();
           //Auth::loginUsingId(28);
          $statut='null';
          $parametre=\DB::table('parametre')->where('is_active',1)->first();

          $candidates= Candidate::where('candidates.annee',$parametre->annee)
                   ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
                   ->where('candidates.regionconcours','Sud')
                   //->where('vote.status',$parametre->status)
                   ->select('candidates.*',\DB::raw('SUM(vote.nbre_vote) as nbvote'))
                   ->groupBy('candidates.id')
                   ->orderby('nbvote','desc')
                   ->get();

          if(Auth::check()){
          $statut=Vote::where('id_user',Auth::user()->id)
                      ->whereDate('date', '=', Carbon::today()->toDateString())
                      ->where('type','gratuit')
                      ->first();
              if(empty($statut)){
                $statut=Vote::whereDate('date', '=', Carbon::today()->toDateString())
                            ->where('ip',$request->ip())
                            ->where('type','gratuit')
                            ->first();
              }
            }


            return view('front.index', compact('candidates','parametre','statut'));
        }

    public function votefree(Request $request,$id,$id1=null){

      if(Auth::check()){
           $ip=$this->visitor->getUserIP();
  

        $statut=Vote::where('id_user',Auth::user()->id)
                    ->whereDate('date', '=', Carbon::today()->toDateString())
                    ->where('type','gratuit')
                    ->first();
            if(empty($statut)){
              $statut=Vote::whereDate('date', '=', Carbon::today()->toDateString())
                          ->where('ip',$ip)
                          ->where('type','gratuit')
                          ->first();
            }
        if(empty($statut)){

       $parametre=\DB::table('parametre')->where('is_active',1)->first();

       $candidate=Candidate::find($id);
        $vote=new vote();
        $vote->id_user=Auth::user()->id;
        $vote->id_candidate=$id;
        $vote->date=Carbon::now();
        $vote->status=$parametre->status;
        $vote->nbre_vote=1;
        $vote->type='gratuit';
        $vote->montant=0;
        $vote->ip=$ip;
        $vote->annee=$parametre->annee;
        $vote->save();

        if(isset($id1)) return redirect('profile/'.$candidate->web_id)->with('successfree', 'Votre vote a été enregistré, continuez de voter en utilisant nos offres payantes.');

        return redirect('/')->with('successfree', 'Votre vote a été enregistré, continuez de voter en utilisant nos offres payantes.');

      } else   return redirect('/')->with('failedpaid', 'Votre vote a déja été enregistré, continuez de voter en utilisant nos offres payantes.');
    }
      return redirect('/');

    }


 public function profile(Request $request,$id){
      $statut='null';
      $nbvisitors=$this->visitor->countvisitor();
      $parametre=\DB::table('parametre')->where('is_active',1)->first();
      $endvote=$parametre->test;
      $affichage=$parametre->affichage;

      $candidate= Candidate::where('web_id',$id)
               ->where('candidates.annee',$parametre->annee)
               ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
              // ->where('vote.date','>','2019-11-29')
              ->select('candidates.*', \DB::raw("SUM( ( CASE WHEN vote.status = 'final' THEN vote.nbre_vote ELSE 0 END ) ) AS nbvote"))
               ->groupBy('candidates.id')
               ->orderby('nbvote','desc')
               ->first();

      
     
     $candidates= Candidate::where('candidates.annee',$parametre->annee)
               ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
              //->wherein('candidates.regionconcours',['Littoral','Sud-ouest'])
               //->where('vote.status',$parametre->status)
               //->where('vote.date','>','2019-11-29')
               ->where('candidates.finaliste',1)
               ->select('candidates.*', \DB::raw("SUM( ( CASE WHEN vote.status = 'final' THEN vote.nbre_vote ELSE 0 END ) ) AS nbvote"))
               ->groupBy('candidates.id')
               ->orderby('nbvote','desc')
               ->take(4)
               ->get();

               $bestofday=$candidate;

               $totalvsitors=$this->visitor->totalvisitor();

      if(Auth::check()){
      $statut=Vote::where('id_user',Auth::user()->id)
                  ->whereDate('date', '=', Carbon::today()->toDateString())
                  ->where('type','gratuit')
                  ->first();
          if(empty($statut)){
            $statut=Vote::whereDate('date', '=', Carbon::today()->toDateString())
                        ->where('ip',$request->ip())
                        ->where('type','gratuit')
                        ->first();
          }
    }
    
   
               
    $last=Vote::where('id_candidate',$candidate->id)
            ->where('status','final')
           // ->where('created_at','<','2025-07-11')
            ->orderby('created_at','desc')
            ->take(50)
            ->get();
            
     foreach($last as $l){
         
         $nb1=Vote::where('annee',$parametre->annee)
               ->where('status','final')
               ->where('id_candidate',$l->id_candidate)
               ->where('id','<=',$l->id)
               ->get()
               ->sum('nbre_vote');
               $l->nbap=$nb1;
               $l->nbav=$nb1-$l->nbre_vote;
               $dd=\Carbon\Carbon::parse($l->date);
               $l->date1=$dd->addHour();
               if(!empty($l->amount_paid))
               $l->montant=$l->amount_paid;
              /* $l->devises='fcfa';
               if($l->montant*2==$l->nbre_vote)
                $l->devises='CAD';
                if($l->montant*2==$l->nbre_vote)
                $l->devises='USD';
                if($l->montant*3==$l->nbre_vote)
                $l->devises='EUR';*/
               
               
     }
    
    $totalvote=Candidate::where('candidates.annee',$parametre->annee)
               ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
               //->where('candidates.regionconcours',$candidate->regionconcours)
               //->where('vote.status',$parametre->status)
               //->where('vote.date','>','2019-11-29')
               ->where('candidates.finaliste',1)
               ->select('candidates.*', \DB::raw("SUM( ( CASE WHEN vote.status = 'final' THEN vote.nbre_vote ELSE 0 END ) ) AS nbvote"))
               ->groupBy('candidates.id')
               ->orderby('nbvote','desc')
               ->get()
               ->sum('nbvote');
    if($totalvote==0)
                $totalvote=1;

      return view('front.profilemiss', compact('candidate','candidates','parametre','statut','nbvisitors','endvote','affichage','totalvote','totalvsitors','bestofday','last'));
}


public function votepaid(Request $request){
//dd($request->all());
 $parametre=\DB::table('parametre')->where('is_active',1)->first();
 if($parametre->test==1)
 return redirect('/');
 

  $data=$request->all();
  $id=$data['candidat'];
  $candidate=Candidate::find($id);
  

  
  $url ='profile/'.$candidate->web_id;
  $ip=$this->visitor->getUserIP();
  
    if($candidate->vote_end==1)
  return redirect($url);

  //if(isset($data['web_id'])) 
  
$nbvote=0;
$amount=0;
$currency=$data['devise_'.$id];
if($data['devise_'.$id]=="XAF"){
$amount=$data['montant1_'.$id];
$nbvote=$amount/125;

}else if($data['devise_'.$id]=="EUR" || $data['devise_'.$id]=="USD" ||  $data['devise_'.$id]=="CAD") {
$amount=$data['montant2_'.$id];
$nbvote=$amount/125;
if($currency=='USD')
    $nbvote=$amount*3;
if($currency=='CAD')
    $nbvote=$amount*3;
if($currency=='EUR')
    $nbvote=$amount*4;
}

 

$email=null;
$username=null;
if(Auth::user()){
  $u=Auth::user();
  if(!empty($u->email))
    $email=$u->email;

    if(!empty($u->$username))
      $username=$u->username;
}

$transaction=new Transaction();
$transaction->id_candidate=$id;
$transaction->amount=$amount;
$transaction->url=$url;
$transaction->ip=$ip;
$transaction->nbvote=$nbvote;
if(Auth::user()) $transaction->id_user=Auth::user()->id;
$transaction->message="pending";
$transaction->save();


$key=\DB::table('keyss')->where('status',1)->first();
 $data = array(
                'amount' => $amount,
                'currency_code' =>$currency,
                'ccode' => 'cm',
                'lang' => 'en',
                'item_ref' => $transaction->id,
                'item_name' => $candidate->nom,
                'description' => 'achat vote',
                'email' => $email,
                'first_name' => $username,
                'last_name' => '',
                'public_key' => $key->pkey,
                'logo' => "https://vote.misscameroun.org/images/logo1.png",
                'project_return_url'=>"https://vote.misscameroun.org/".$url
               // 'environement'=>'test'
            );

            //dd($data);
          
            $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://paymooney.com/api/v1.0/payment_url',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $data,
        ));

        $response = curl_exec($curl);
        
        
        curl_close($curl);
        $rep=json_decode($response);
         if($rep->response=="success")
         return redirect($rep->payment_url);
            else{

        return redirect($url)->with('failedpaid', 'Une erreur s\'est produite veuillez reéssayer');
      }




}



public function votecheckpayment(Request $request){
 
   
   $data = $request->all();

  $parametre=\DB::table('parametre')->where('is_active',1)->first();
  
  
  $skey=\DB::table('keyss')->where('pkey',$data['public_key'])->first();
  

if($this->checkresponse($skey->skey,$data['sign_token'])){
    
  if($data['status']=="Success"){

    $transaction=Transaction::find($data['item_ref']);
    
    $find=Vote::where('transaction_id',$data['transaction_number'])->first();
    if(!empty($find))
    return;

    $vote=new Vote();
    
    
    if($data['description']=='Achat_vote'){
    $vote->id_candidate=explode('_',$data['item_ref'])[1];
    
    $nbvote=0;
    if($data['currency']=="XAF"){
    $nbvote=$data['amount_received']/125;
    
    }else if($data['currency']=="EUR") {
        $nbvote=$data['amount_received']*4;
    }else if($data['currency']=="USD") {
    
       $nbvote=$data['amount_received']*3;
    }else if($data['currency']=="CAD") {
    
       $nbvote=$data['amount_received']*3;
    }
    
    $vote->nbre_vote=$nbvote;
    
    }
    else{
      $vote->id_user=$transaction->id_user;  
      $vote->id_candidate=$transaction->id_candidate;
      $vote->ip=$transaction->ip;
      $vote->nbre_vote=$transaction->nbvote;
      
    } 
    

    $vote->phone=$data['phone'];
    $vote->operateur=$data['operator'];
    $vote->transaction_id=$data['transaction_number'];
    $vote->operator_trans_id=$data['ref_payment'];
    
    $vote->currency=$data['currency'];
    
    $vote->date=Carbon::now();
    $vote->status=$parametre->status;
    
    $vote->type='paid';
    $vote->montant=$data['amount'];
    $vote->amount_paid=$data['amount_received'];
    
    $vote->annee=$parametre->annee;

    $vote->save();

    $transaction->operator=$vote->operateur;
    $transaction->message="success";
    $transaction->paymentId=$vote->transaction_id;
    $transaction->save();
  }
  }
  
}


public function checkresponse($secret,$sign_token){


   if (hash_equals($sign_token, crypt($secret, $sign_token))) {
      $ip = $_SERVER['REMOTE_ADDR']; 
      if($ip=="85.236.153.138")
        return true;
    }

    return false;

}

public function votecheckpaymentpaypal(Request $request){
    
$data = $request->getContent();

$parametre=\DB::table('parametre')->where('is_active',1)->first();


$liste_param_paypal = $this->recup_param_paypal($data);


$transaction=Transaction::find($liste_param_paypal['item_number']);

$request->session()->put('idtrans',$transaction->id);

$vote=Vote::where('transaction_id',$liste_param_paypal['txn_id'])
          ->where('operateur','Paypal')
          ->first();
          if(empty($vote)){
            $vote=new Vote();

            $vote->id_user=$transaction->id_user;
            $vote->transaction_id=$liste_param_paypal['txn_id'];
            $vote->operateur="Paypal";
            $vote->id_candidate=$transaction->id_candidate;
            $vote->date=Carbon::now();
            $vote->status=$parametre->status;
            $vote->nbre_vote=$transaction->nbvote;
            $vote->type='paid';
            $vote->montant=$transaction->amount;
            $vote->ip=$request->ip();
            $vote->annee=$parametre->annee;
            if(isset($liste_param_paypal['payer_email']))
            $vote->emailpaypal=$liste_param_paypal['payer_email'];

            $vote->save();

            $transaction->paymentId=$vote->transaction_id;
            $transaction->message="success";
            $transaction->save();

          }

}
public function paidsuccess(Request $request){
  //dd($request->session()->get('nbvote'));
  if(Auth::user()){
      $transaction=Transaction::where('id_user',Auth::user()->id)->orderby('created_at','desc')->first();
      if(!empty($transaction))
      return redirect($transaction->url)->with('successfree', 'Paiement de '.$transaction->nbvote.' votes bien effectué , continuez de voter en utilisant nos offres payantes.');
  }

  return redirect('/')->with('successfree', 'Paiement bien effectué , continuez de voter en utilisant nos offres payantes.');

}
public function paidfail(Request $request){

    if ($request->session()->has('return_url')){
        $t=$request->session()->get('return_url');
        $request->session()->forget('return_url');
        return redirect($t)->with('failedpaid', 'Votre paiement n\'a pas été éffectué');
    }else
    return redirect('/')->with('failedpaid', 'Votre paiement n\'a pas été éffectué');
}


public function paidsuccesspaypal(Request $request,$id){

$transaction=Transaction::find($id);
return redirect($transaction->url)->with('successfree', 'Paiement de '.$transaction->nbvote.' votes bien effectué , continuez de voter en utilisant nos offres payantes.');

}


public function setpayment(Request $request){
 
   
    $data = $request->all();
    
    $parametre=\DB::table('parametre')->where('is_active',1)->first();
    $transaction=Transaction::find($data['id']);
    
    $vote=Vote::where('type','simple')
                ->where('id_candidate',$transaction->id_candidate)
                ->first();
                
    if(empty($vote)){
       $vote=new Vote();
      $vote->nbre_vote=$data['nbvote'];
      $vote->id_candidate=$transaction->id_candidate;
    
    $vote->operateur=$data['operator'];

    $vote->status=$parametre->status;
    
    $vote->type='simple';
    $vote->montant=$data['amount'];
    
    $vote->annee=$parametre->annee;
     $vote->save();
        
    }else{
    $vote->nbre_vote=$vote->nbre_vote+$data['nbvote'];
     $vote->save();
    
    
    }
    
  
}


public function setpayment2(Request $request){
 
   
    $data =[];
    
    $parametre=\DB::table('parametre')->where('is_active',1)->first();
    
    
    $votes=Vote::where('type','simple')
                ->where('annee',$parametre->annee)
                ->where('nbre_vote','<',0)
                ->get();
    foreach($votes as $vote){
        $montant=-100*$vote->nbre_vote;
        $find=Vote::where('id_candidate',$vote->id_candidate)
                    ->where('montant',$montant)
                    ->wherein('operateur',['Mobile Money CM','Orange Money CM'])
                    ->orderby('date','asc')
                    ->first();
        
        if(!empty($find)){
            
            array_push($data,$find->transaction_id);
            $find->delete();
            $vote->nbre_vote=0;
            $vote->save();
            
            
        } 
    }
    
    return Response::json(["response"=>"success","data"=>$data]);
    
  
}


 private function recup_param_paypal($resultat_paypal)
 {
 $liste_parametres = explode("&",$resultat_paypal); // Crée un tableau de paramètres
 foreach($liste_parametres as $param_paypal) // Pour chaque paramètre
 {
   list($nom, $valeur) = explode("=", $param_paypal); // Sépare le nom et la valeur
   $liste_param_paypal[$nom]=urldecode($valeur); // Crée l'array final
 }
 return $liste_param_paypal; // Retourne l'array
 }


 private function verifyTransaction($data) {


 	$req = 'cmd=_notify-validate';
 	foreach ($data as $key => $value) {
 		$value = urlencode(stripslashes($value));
 		$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i', '${1}%0D%0A${3}', $value); // IPN fix
 		$req .= "&$key=$value";
 	}

 	$ch = curl_init($this->paypalUrl);
 	curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
 	curl_setopt($ch, CURLOPT_POST, 1);
 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 	curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
 	curl_setopt($ch, CURLOPT_SSLVERSION, 6);
 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
 	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
 	curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
 	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
 	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
 	$res = curl_exec($ch);

 	if (!$res) {
 		$errno = curl_errno($ch);
 		$errstr = curl_error($ch);
 		curl_close($ch);
 		//throw new Exception("cURL error: [$errno] $errstr");
 	}

 	$info = curl_getinfo($ch);

 	// Check the http response
 	$httpCode = $info['http_code'];
 	if ($httpCode != 200) {
 		//throw new Exception("PayPal responded with http code $httpCode");
 	}

 	curl_close($ch);

 	return $res === 'VERIFIED';
 }
 
 
 public function inscriptioncheckpayment(Request $request){
 
  
   $data = $request->all();
  //\DB::table('inscriptions')->where('id',$data['item_ref'])->update(['status'=>1]);
  //\DB::table('parametre')->where('annee','2019')->update(['test'=>0]);

  $parametre=\DB::table('parametre')->where('is_active',1)->first();

if($this->checkresponse('SK_7j4C4l3H1q8CYFEn6L9h7RAkAjAD2tED6z8ZYq6d8X5puWygys9F7k2z9w1f',$data['sign_token'])){
  if($data['status']=="Success"){
  \DB::table('inscriptions')->where('id',$data['item_ref'])->update(['status'=>1]);
  /*$find=\DB::table('inscriptions')->where('id',$data['item_ref'])->first();
  if(!empty($find)){
  session(['numtel' => $find->numtel]);

  }*/
    
  }
}
}
 
        public function subscription (Request $request)
    {
        
        //dd($request->all());
        
           $mytime = Carbon::now();
    	$parametre = DB::table('parametre')->where('is_active', 1)->first();
    	   $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        $first = $request->file('image');
        $extension = $first->guessExtension();
        $chemin= " ";
        if (!$first->isValid()) {
    throw new \Exception('Error on upload file: '.$first->getErrorMessage());
}
         do {
            $chemin = substr(str_shuffle($permitted_chars), 0, 10);
            $chemin = $chemin.'.'.$extension;

         }
         while (file_exists(public_path().'/images/inscriptions/2020/'.$chemin));

          $id=\DB::table('inscriptions')->insertGetId(
    ['nom' => $request->input('nom'), 
    'prenom' => $request->input('prenom'),
    'email' => $request->input('email'),
    'age' => $request->input('age'),
    'niveau' => $request->input('niveau'),
    'profession' => $request->input('profession'),
    'pays' =>  $request->input('pays'),
    'ville' => $request->input('ville'),
    'quartier' => $request->input('quartier'),
    'region_origine' => $request->input('Ro'),
    'regionconcours' => $request->input('Rc'),
    'lien_photo' =>'/images/inscriptions/2020/'.$chemin,
    'numtel' => $request->input('numtel'),
    'created_at' => $mytime,
    'updated_at' => $mytime,
    'annee' => $parametre->annee
    ]
);

   $first->move(public_path().'/images/inscriptions/2020/',$chemin); 
   
   
    $montant=10000;
    $devise='XAF'; //XAF
    if($request->input('Rc')=='Diaspora'){
       $montant=46; 
       $devise='EUR';
    }
    $data = array(
                'amount' => $montant,
                'currency_code' =>$devise,
                'ccode' => 'cm',
                'lang' => 'en',
                'item_ref' => $id,
                'item_name' =>'Frais inscription '.$request->input('nom').' '.$request->input('prenom'),
                'description' => 'Frais d inscription de '.$request->input('nom'),
                'email' => '',
                'first_name' => '',
                'last_name' => '',
                'public_key' => 'PK_ETyQ5N3MEtEjYSYj6D8n', //PK_eR5Q7H1R9D6R1FUXUp3F
                'logo' => "https://misscameroun.org/wp-content/uploads/2022/07/logo-bon.png",
                //'environement'=>'test'
            );

            //dd($data);
          
           $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://paymooney.com/api/v1.0/payment_url',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $data,
        ));

        $response = curl_exec($curl);
        
        
        curl_close($curl);
        $rep=json_decode($response);
         if($rep->response=="success")
         return redirect($rep->payment_url);
   
   

        return view ('front.inscription_reussie');
    }

public function formsubscription1(){
   // $t = Input::get('s', '');
   // if($t=='success')
      return view ('front.inscription_reussie');
      
        //return view ('front.inscription11')->with(["t"=>$t]);
      //  return redirect('/inscriptions');
    }
    
public function formsubscription(){
        /*$myParam = session('numtel');
        if(empty($myParam ))
         return redirect('/inscriptions');*/
         $t = Input::get('s', '');
         if($t=='success')
      return view ('front.inscription_reussie');
      
        return view ('front.inscription')->with(
    	       [
    	            't' => $t,
            ]
            ); 
    }
    
    
  public function subscription11 (Request $request)
    {
        
 
           $mytime = Carbon::now();
    	$parametre = DB::table('parametre')->where('is_active', 1)->first();
    	
    	$find=\DB::table('inscriptions')
    	->where('numtel',$request->input('numtel'))
    	->where('status',1)
    	->where('annee',$parametre->annee)
    	->first();
    	if(!empty($find)){
    	   return redirect('/inscriptions_step2')->with('numtel', $request->input('numtel'));
    	}
    	  

         $id=\DB::table('inscriptions')->insertGetId(
    [
    'numtel' => $request->input('numtel'),
    'created_at' => $mytime,
    'updated_at' => $mytime,
    'annee' => $parametre->annee
    ]
);
   
   
    $data = array(
                'amount' => '10000',
                'currency_code' =>'XAF',
                'ccode' => 'cm',
                'lang' => 'en',
                'item_ref' => $id,
                'item_name' =>$request->input('numtel'),
                'description' => 'Frais inscription',
                'email' => '',
                'first_name' => '',
                'last_name' => '',
                'public_key' => 'PK_Q3GEW3C9BaR6N5zaHuX6',
                'logo' => "https://misscameroun.org/wp-content/uploads/2022/07/logo-bon.png",
                //'environement'=>'test'
            );

            //dd($data);
          
            $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://paymooney.com/api/v1.0/payment_url',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $data,
        ));

        $response = curl_exec($curl);
        
        
        curl_close($curl);
        $rep=json_decode($response);
         if($rep->response=="success")
         return redirect($rep->payment_url);
   
   

        //return view ('front.inscription_reussie');
    }




}
