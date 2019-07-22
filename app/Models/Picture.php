<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    //
      protected $table = 'pictures-path';
      public $timestamps = false;

      public function candidate() {
        return $this->belongsTo('App\Models\Candidate', 'id-candidate');
    }
}
