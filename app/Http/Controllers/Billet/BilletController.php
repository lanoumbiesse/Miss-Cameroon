<?php

namespace App\Http\Controllers\Billet;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ {
    
   
    Repositories\PostRepository,
   Http\Requests\BilletInscriptionRequest
 
};

use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Cookie;
use Illuminate\Support\Facades\DB;

use Response;

class BilletController extends Controller
{
    //
    
    
    public function billetsubscription(){
            
           
        
        return view ('billet.inscription');
    }
    
      public function billetsubscriptionfanclub(){
        return view ('billet.inscription-fanclub');
      }
    
            public function submission (BilletInscriptionRequest $request)
    {
        
 
         $mytime = Carbon::now();
    	$parametre = DB::table('parametre')->where('is_active', 1)->first();
    	
      
         $id=DB::table('billets')->insertGetId(
            ['nom' => $request->input('nom'), 
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'telephone' => $request->input('numtel'),
            'num_cni' => $request->input('cni'),
            'nbre_billet' => $request->input('nbre_billet'),
            'regionconcours' => $request->input('regionconcours'),
            'region' => $request->input('Ro'),
             'annee' => $parametre->annee ,
             'categorie' => 'non-fan-club',
            'created_at' => $mytime
            ]
            
        );
        
        $amount=$request->input('nbre_billet')*$request->input('regionconcours');
        $currency='XAF';
        
        $data = array(
                'amount' => $amount,
                'currency_code' =>$currency,
                'ccode' => 'cm',
                'lang' => 'en',
                'item_ref' => $id,
                'item_name' => $request->input('nbre_billet').' Billets',
                'description' => 'Billets',
                'email' => $request->input('email'),
                'first_name' => $request->input('nom'),
                'last_name' => $request->input('prenom'),
                'public_key' => 'PK_p9pEf9cYs9nAKeh2LUr7',
                'logo' => "https://vote.misscameroun.org/images/logo1.png"
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
            else{

        return redirect('/')->with('failedpaid', 'Une erreur s\'est produite veuillez reéssayer');
      }


            


  

        return view ('billet.inscription-reussie');
    }
    
    public function billetcheckpayment(Request $request){
        
        
         
   $data = $request->all();


if($this->checkresponse('SK_huHemulAd8R9k0R7P2w3g7hyR7V6sAG2NAN8zaM9M7KYK4faW7G7x6mAr1P5',$data['sign_token'])){
  if($data['status']=="Success"){

    $transaction=DB::table('billets')
                    ->where('id',$data['item_ref'])
                    ->first();

    DB::table('billets')
    ->where('id', $data['item_ref'])
    ->update([
        'status' => 'success', 
        'phone' => $data['phone'],
        'transaction_id'=>$data['transaction_number'],
        'operateur'=>$data['operator']
        ]);
    
    
     $data1 = [
            'name' => $transaction->nom.' '.$transaction->prenom,
            'nb'=>$transaction->nbre_billet,
            'montant'=>$transaction->type_billet
                ];
                $username=$transaction->nom.' '.$transaction->prenom;
                $useremail=$transaction->email;
        
         Mail::send('emails.billet', $data1 ,  function ($message) use ($username,$useremail) {
        $message->from('infos@vote.misscameroun.org', 'COMICA');
        $message->to($useremail, $username)
                    ->replyTo('vote.misscameroun@gmail.com', 'COMICA')
                            ->subject("COMMANDE RECUE");
            });
    
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
    
    
     public function billetsuccess(){
        
        return view ('billet.inscription-reussie');
        
    }
    
    
                public function submissionfanclub (BilletInscriptionRequest $request)
    {
        
 
         $mytime = Carbon::now();
    	$parametre = DB::table('parametre')->where('is_active', 1)->first();
    	
      
         $id=DB::table('billets')->insertGetId(
            ['nom' => $request->input('nom'), 
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'telephone' => $request->input('numtel'),
            'num_cni' => $request->input('cni'),
            'nbre_billet' => $request->input('nbre_billet'),
            'type_billet' => '5000',
             'annee' => $parametre->annee ,
             'categorie' => 'fan-club',
            'created_at' => $mytime,
            'region' => $request->input('Ro'),
            
            ]
            
        );

        
        $amount=5000*$request->input('type_billet');
        $currency='XAF';
        
        $data = array(
                'amount' => $amount,
                'currency_code' =>$currency,
                'ccode' => 'cm',
                'lang' => 'en',
                'item_ref' => $id,
                'item_name' => $request->input('nbre_billet').' Billets',
                'description' => 'Billets',
                'email' => $request->input('email'),
                'first_name' => $request->input('nom'),
                'last_name' => $request->input('prenom'),
                'public_key' => 'PK_p9pEf9cYs9nAKeh2LUr7',
                'logo' => "https://vote.misscameroun.org/images/logo1.png"
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
            else{

        return redirect('/')->with('failedpaid', 'Une erreur s\'est produite veuillez reéssayer');
      }


  

        return view ('billet.inscription-reussie');
    }
}
