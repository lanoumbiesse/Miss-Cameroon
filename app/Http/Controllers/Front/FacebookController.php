<?php

namespace App\Http\Controllers;

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
   $this->middleware('auth', ['except' => [
           'login',
           'prelogin'
       ]]);
   }

   public function prelogin()
    {

    return Socialite::driver('facebook')->stateless()->redirect();

    }

   public function login(SocialFacebookAccountService $service)
  {

     //dd("ok");
      $user = $service->createOrGetUser(Socialite::driver('facebook')->stateless()->user());
      $userModel=User::find($user->id);
      Auth::login($userModel);
      //dd($user);
      //auth()->login($user);
      //Auth::loginUsingId($user->id);
      //return redirect()->to('/survey/list');

      return Redirect::intended();

  }

}
