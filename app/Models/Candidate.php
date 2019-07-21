<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Picture;

class Candidate extends Model
{
    //
    protected $table = 'candidates';
    public $timestamps = false;

    public  function pictures() {
        return $this->hasMany('App\Models\Picture', 'id_candidate');
    }

    public  function votes() {
        return $this->hasMany('App\Models\Vote', 'id_candidate');
    }
}
