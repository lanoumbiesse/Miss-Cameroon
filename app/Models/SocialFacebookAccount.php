<?php

// SocialFacebookAccount.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialFacebookAccount extends Model
{
  protected $fillable = ['user_id', 'provider_user_id', 'provider'];

  public function user()
  {
      return $this->belongsTo(User::class);
  }

  /*"facebook/php-sdk-v4" : "~5.0",
   "sammyk/laravel-facebook-sdk": "~3.5.0",
   "guzzlehttp/guzzle": "~4.1.2.0",*/
}