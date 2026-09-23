<?php

namespace App\Http\Controllers\Comicash;

use App\ {
    Http\Controllers\Controller,
    Http\Requests\SearchRequest,
    Repositories\PostRepository,
    Http\Requests\InscriptionsRequest,
    Models\Vote,
    Models\Candidate,
    Models\UserCagnotte,
    Models\Cote,
    Models\User,
    Models\Contact
};
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Mail;
use Response;
use Cookie;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Front\VisitorController;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Session;





class ComicashController extends Controller
{
   
   public $visitor;
   
   
   public function __construct()
    {
  
        $this->visitor=new VisitorController();
        

    }

   
    public function index(){
        //dd("ok");
        $ip=$this->visitor->getUserIP();
        
        $nbvisitors=$this->visitor->countvisitor();
        $cagnottes=\DB::table('cagnotte')->where('statut',1)->orderby('rang','asc')->get();
        //dd($cagnottes);
        
       return view('comicash.index',compact('nbvisitors','cagnottes'));
        
    }
    
    public function showcandidates($id,$region="Centre"){
        
        $nbvisitors=$this->visitor->countvisitor();
        
        $parametre=\DB::table('parametre')->where('is_active',1)->first();

        $cagnotte=\DB::table('cagnotte')->where('ref',$id)->first();
        
        $regions= Candidate::where('candidates.annee',$parametre->annee)
                            ->where('finaliste',1)
                            ->orderby('regioncomicash','ASC')
                            ->groupBy('regioncomicash')->pluck('regioncomicash')->toArray();
      
        
        $candidates= Candidate::where('candidates.annee',$parametre->annee)
               ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
               //->where('candidates.regionconcours',$region)
               //->where('vote.status',$parametre->status)
               //->where('vote.date','>','2019-11-29')
               ->where('candidates.finaliste',1)
               ->select('candidates.*', \DB::raw("SUM( ( CASE WHEN vote.status = 'final' THEN vote.nbre_vote ELSE 0 END ) ) AS nbvote"))
               ->groupBy('candidates.id')
               ->orderby('regioncomicash','ASC')
               ->orderby('numtel','ASC')
               ->get();
               
    
            
              $test=0;
              if(Auth::check()){
              $test=1;
              }
              
              if(!Auth::check()){
                  Session::put('comicash', "ok");
              }
              
        
        return view('comicash.candidate',compact('nbvisitors','cagnotte','candidates','test','regions','region'));
        
    }

    public function getcandidates(Request $request){
        
    $data=json_decode($request->getContent());
    //dd($data);

      $parametre=\DB::table('parametre')->where('is_active',1)->first();

      $candidates= Candidate::where('candidates.annee',$parametre->annee)
               ->LeftJoin('vote', 'candidates.id', '=', 'vote.id_candidate')
               //->where('candidates.regionconcours','Littoral')
               //->where('vote.status',$parametre->status)
               //->where('vote.date','>','2019-11-29')
               //->where('candidates.finaliste',1)
               ->select('candidates.*', \DB::raw("SUM( ( CASE WHEN vote.status = 'regional' THEN vote.nbre_vote ELSE 0 END ) ) AS nbvote"))
               ->groupBy('candidates.id')
               ->orderby('nbvote','desc')
               ->skip($data->skip)->take($data->take)->get();
               
               foreach($candidates as $candidate){
                   $candidate->pictures=$candidate->pictures()->get();
                   $candidate->cote=Cote::where('candidate_id',$candidate->id)->get();
               }

     //dd($candidates);
     return Response::json($candidates);

    }
    
    public function savetop(Request $request){
        $data=$request->all();
       //dd($data);
        
        $classement="";
        $user=Auth::user();
       //dd($user);
        $cagnotte=\DB::table('cagnotte')->where('id',$data['cagnotteid'])->first();
        
       /*for($j=1;$j<=$cagnotte->nombre_candidates;$j++){
           $find=Candidate::find($data['valeur_'.$j]);
           if(empty($find))
           return redirect('/comicash/top/'.$cagnotte->ref.'/'.$data["region1"])->with('successMsg','Vous devez choisir les candidates sur toutes les positions');
           
           if($j==$cagnotte->nombre_candidates)
           $classement=$classement."".Candidate::find($data['valeur_'.$j])->numero_candidate;
            else
           $classement=$classement."".Candidate::find($data['valeur_'.$j])->numero_candidate.",";
       }*/
       //dd($classement);
       //dd($data["choice"]);
        
     
         $cagnotte1=new UserCagnotte();
         $cagnotte1->cagnotte_id=$data['cagnotteid'];
         $cagnotte1->user_id=$user->id;
         $cagnotte1->montant_user=$cagnotte->montant_mise;
         $cagnotte1->classement=$data["choice"];
        $cagnotte1->region="final";
         $cagnotte1->save();
         
         $data = array(
                'amount' => $cagnotte->montant_mise,
                'currency_code' =>"XAF",
                'ccode' => 'cm',
                'lang' => 'en',
                'item_ref' => $cagnotte1->id,
                'item_name' => $cagnotte->name,
                'description' => 'Cagnotte',
                'email' => $user->email,
                'first_name' => $user->name,
                'last_name' => "",
                'public_key' => "PK_yGEQ4r7C9T1DacyBuVem",
                'logo' => "https://vote.misscameroun.org/images/logo1.png",
                'environement'=>'live'
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
    }
    
    
       public function historique()
    {
         $user=Auth::user();
         $nbvisitors=$this->visitor->countvisitor();
             
        $cagnottes=UserCagnotte::where('user_id',$user->id)
          ->where('paid',1)
         ->LeftJoin('users', 'users.id', '=', 'cagnotte_user.user_id')
         ->LeftJoin('cagnotte', 'cagnotte.id', '=', 'cagnotte_user.cagnotte_id')
         //->where('cagnotte_user.region',$data->region)
         ->select('cagnotte_user.*','cagnotte.*','users.name as nom','users.email')
         ->orderby('cagnotte_user.created_at','desc')
         ->get();
         //dd($cagnottes);
          return view('comicash.historique',compact('nbvisitors','cagnottes'));
             
        
    }
    
     public function getnbvotes(Request $request){
        
    $data=json_decode($request->getContent());

      $parametre=\DB::table('parametre')->where('is_active',1)->first();

      $nbvotes= Vote::where('vote.annee',$parametre->annee)
               ->where('vote.id_candidate',$data->id)
               ->select(\DB::raw("SUM( ( CASE WHEN vote.status = 'regional' THEN vote.nbre_vote ELSE 0 END ) ) AS nbvote"))
               ->first();

     //dd($candidates);
     return Response::json($nbvotes);

    }
    
    
    
    public function authenticate(Request $request)
    {
        //$credentials = $request->only('phone', 'password');
        $data=json_decode($request->getContent());
        $data=(array)$data;
        $credentials['phone']=$data['phone'];
        $credentials['password']=$data['password'];
        //dd($credentials);

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['status'=>'failed','message' => 'paramètres de connexion incorrect'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['status'=>'failed','message' => 'could_not_create_token'], 500);
        }

        return response()->json(['status'=>'success','message'=>compact('token'),'user'=>User::where('phone',$data['phone'])->first()]);
    }

    public function register(Request $request)
    {
         $email=NULL;
        $data=json_decode($request->getContent());
        $data=(array)$data;
        if($data['email']!=""){
       $user=User::where('email',$data['email'])->first();
       if(!empty($user)){
           $user->password=Hash::make($data['password']);
           $user->phone=$data['phone'];
           $user->save();
           //dd($user);
           $token = JWTAuth::fromUser($user);

        return response()->json(['status'=>'success', 'message'=>compact('user','token')],201);
       }
        }
        
       
        
        $validator = Validator::make($data, [
            'name' => 'string|max:255',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:4',
        ]);
        if($data['email']!=""){
            $validator = Validator::make($data, [
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:4',
        ]);
        
        $email=$data['email'];
        }
       

        if($validator->fails()){
                return response()->json(['status'=>'failed', 'message'=>$validator->errors()->toJson()], 400);
        }
        
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $email,
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'role' => 'user'
        ]);
        //dd($user);

        $token = JWTAuth::fromUser($user);

        return response()->json(['status'=>'success', 'message'=>compact('user','token')],201);
    }

    public function getAuthenticatedUser()
        {
                try {

                        if (! $user = JWTAuth::parseToken()->authenticate()) {
                                return response()->json(['status'=>'failed','message'=>'user_not_found'], 404);
                        }

                } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

                        return response()->json(['status'=>'failed','message'=>'token_expired'], $e->getStatusCode());

                } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

                        return response()->json(['status'=>'failed','message'=>'token_invalid'], $e->getStatusCode());

                } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

                        return response()->json(['status'=>'failed','message'=>'token_absent'], $e->getStatusCode());

                }

            
                return response()->json(['status'=>'success','user'=>compact('user')]);
        }
        
    public function getuser(Request $request)
    {
         $data=json_decode($request->getContent());
        $user=User::where('phone',$data->phone)->first();
        if(empty($user))
           return response()->json(['status'=>'failed','message'=>'Marchand introuvable !!']);
        return response()->json(['status'=>'success','user'=>$user]);
        
    }
    
    public function cagnotte()
    {
         $cagnotte=\DB::table('cagnotte')->orderby('rang','asc')->get();
        return response()->json($cagnotte);
        
    }
    
    public function savecagnotte(Request $request)
    {
         $data=json_decode($request->getContent());
         $cagnotte=new UserCagnotte();
         $cagnotte->cagnotte_id=$data->cagnotte_id;
         $cagnotte->user_id=$data->user_id;
         $cagnotte->montant_user=$data->montant_user;
         $cagnotte->classement=$data->classement;
         $cagnotte->region=$data->region;
         $cagnotte->save();
         
        return response()->json(['status'=>'success','cagnotte'=>$cagnotte]);
        
    }
    
     public function getlistcagnotte(Request $request)
    {
         $data=json_decode($request->getContent());
         if($data->region=="tous"){
         $cagnotte=UserCagnotte::where('user_id',$data->user_id)
         ->where('paid',1)
         ->LeftJoin('users', 'users.id', '=', 'cagnotte_user.user_id')
         ->LeftJoin('cagnotte', 'cagnotte.id', '=', 'cagnotte_user.cagnotte_id')
         ->select('cagnotte_user.*','cagnotte.*','users.name','users.email')
         ->orderby('cagnotte_user.created_at','desc')
         ->get();
             
         }
         else{
             
        $cagnotte=UserCagnotte::where('user_id',$data->user_id)
          ->where('paid',1)
         ->LeftJoin('users', 'users.id', '=', 'cagnotte_user.user_id')
         ->LeftJoin('cagnotte', 'cagnotte.id', '=', 'cagnotte_user.cagnotte_id')
         ->where('cagnotte_user.region',$data->region)
         ->select('cagnotte_user.*','cagnotte.*','users.name','users.email')
         ->orderby('cagnotte_user.created_at','desc')
         ->get();
             
         }
         

         
        return response()->json(['status'=>'success','cagnotte'=>$cagnotte]);
        
    }
    
    
    
    public function savecontact(Request $request)
    {
         $data=json_decode($request->getContent());
         $contact=new Contact();
         $contact->name=$data->name;
         $contact->email=$data->email;
         $contact->phone=$data->phone;
         $contact->message=$data->message;
         $contact->save();
         
        return response()->json(['status'=>'success']);
        
    }
    
     public function sponsors()
    {
         $sponsors=\DB::table('sponsors')->get();
         
        return response()->json($sponsors);
        
    }
    
    public function checkpayment(Request $request){
 
   
   $data = $request->all();


if($this->checkresponse('SK_yM9z0Q8H2X1t2b4H3SUl7XERuC6wAjAKUp8VUs3fYceX1x1paL8S8x9c2Zub',$data['sign_token'])){
  if($data['status']=="Success"){

    $cagnotte=UserCagnotte::find($data['item_ref']);

    $cagnotte->phone=$data['phone'];
    $cagnotte->operateur=$data['operator'];
    $cagnotte->transaction_id=$data['transaction_number'];
    $cagnotte->paid=1;
    $cagnotte->save();
  }
  }
  
}

public function checkresponse($secret,$sign_token){


   if (hash_equals($sign_token, crypt($secret, $sign_token))) {
      $ip = $_SERVER['REMOTE_ADDR']; 
      if($ip=="199.59.247.243" || $ip=="199.59.247.250" )
        return true;
    }

    return false;

}
    
    





}
