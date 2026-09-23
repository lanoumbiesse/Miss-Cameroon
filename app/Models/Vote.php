<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Candidate;

class Vote extends Model
{
    //
    protected $table = 'vote';

    public function candidate() {
      return $this->belongsTo('App\Models\Candidate', 'id_candidate');
  }
}
