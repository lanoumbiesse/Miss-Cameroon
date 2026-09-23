<?php

namespace App\Http\Controllers\Front;

use App\ {
    Http\Controllers\Controller,
    Http\Requests\SearchRequest,
    Repositories\PostRepository
};
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

use Carbon\Carbon;
use Crypt;
use Redirect;
use Socialite;
use App\Services\SocialFacebookAccountService;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Session;


class FacebookController extends Controller
{
    //
    public function __construct()
   {
   /*$this->middleware('auth', ['except' => [
           'login',
           'prelogin',
           'logout'
       ]]);*/
   }

   public function prelogin()
    {
    
    return Socialite::driver('facebook')->stateless()->redirect();

    }
    
     public function signout()
    {
     
        Auth::logout();
        //Session::put('comicash', "");
        
      return redirect('/comicash');

    }

   public function login(SocialFacebookAccountService $service)
  {

     // dd("ok");
      $user = $service->createOrGetUser(Socialite::driver('facebook')->stateless()->user());
     //dd($user);
      $userModel=User::find($user->id);
     
      Auth::login($userModel,true);
      //auth()->login($userModel);
     // return redirect('/');
      //dd($user);
      //auth()->login($user);
      //Auth::loginUsingId($userModel->id);
      //return redirect()->to('/survey/list');
      $test=Session::get('comicash');
      if($test=="ok"){
          Session::put('comicash', "");
        return redirect('/comicash');
      }

      return Redirect::intended();

  }
  
  public function customlogin(Request $request){
      
      if(Auth::attempt(['phone' => $request->input('phone'), 'password' => $request->input('password')])) {
          
           $user = User::where('phone',$request->input('phone'))->first();
            //$request->session()->put('user_id', $user->id);
                Auth::loginUsingId($user->id,true);
            

            
            }
            //dd(Auth::user());
            return redirect('/comicash/top/'.$request->input('cagnotteref'));
      
  }
  
  
  public function customregister(Request $request){
      
      //dd($request->all());
      
      
            
            //$user = User::whereEmail($providerUser->getEmail())->first();
            
             $user = User::where('phone',$request->input('phone1'))->first();
             $email=NULL;
             
             if($request->input('email')!=""){
              $user = User::where('email',$request->input('email'))
                        ->where('phone',$request->input('phone1'))->first();
            
             $email=$request->input('email');
             }
               
              

            if (empty($user)) {
             
             $user=new User();
             $user->email=$email;
             $user->username=$request->input('nom');
             $user->name=$request->input('nom');
             $user->phone=$request->input('phone1');
             $user->password=bcrypt($request->input('password1'));
             $user->confirmed=1;
             $user->valid=1;
             $user->role='user';
             $user->save();
                
             /* $user = User::create([
                    'email' => $email,
                    'username' => $request->input('nom'),
                    'name' => $request->input('nom'),
                    'phone' => $request->input('phone1'),
                    'password' => bcrypt($request->input('password1')),
                    'confirmed'=>1,
                    'valid'=>1,
                    'role' => 'user'
                ]);*/
                
            // Auth::login($user,true);
            //dd($user);
            
            $request->session()->put('user_id', $user->id);
            //Auth::loginUsingId($user->id,true);
            
           
            

             return redirect('/comicash/top/'.$request->input('cagnotteref'))->with('message', 'Inscription réussie');
      

            }else{
                $user->password=bcrypt($request->input('password1'));
                $user->confirmed=1;
                $user->phone=$request->input('phone1');
                $user->save();
                Auth::loginUsingId($user->id,true);

               return redirect('/comicash/top/'.$request->input('cagnotteref'))->with('message', 'Inscription réussie');
                
                //dd($user);
            }
      
  }

}
