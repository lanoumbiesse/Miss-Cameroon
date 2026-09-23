<?php

namespace App\Services;
use App\Models\SocialFacebookAccount;
use App\Models\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        //dd($providerUser);
        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();
           

        if ($account) {
            return $account->user;

        } else {

            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user=null;
           

            if($providerUser->getEmail() && !empty($providerUser->getEmail()))
            $user = User::whereEmail($providerUser->getEmail())->first();
            else $user = User::where('username',$providerUser->getName())->first();

            if (!$user) {
                /*  $user=new User();
                  $user->email= $providerUser->getEmail() == '' ? '' : $providerUser->getEmail();
                  $user->username= $providerUser->getName();
                  $user->name=$providerUser->getName();
                  $user->password=bcrypt('giresseayefson');
                  $user->facebook_id=$providerUser->getId();
                  $user->picturepath=$providerUser->getAvatar();
                  $user->confirmed=1;
                  $user->valid=1;
                  $user->role='user';
                  $user->save();*/
                  //dd( $providerUser->getName());

              $user = User::create([
                    'email' => $providerUser->getEmail() == '' ? NULL : $providerUser->getEmail(),
                    'username' => $providerUser->getName(),
                    'name' => $providerUser->getName(),
                    'password' => bcrypt('giresseayefson'),
                    'facebook_id' => $providerUser->getId(),
                    'picturepath' => $providerUser->getAvatar(),
                    'confirmed'=>1,
                    'valid'=>1,
                    'role' => 'user'
                ]);

            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
