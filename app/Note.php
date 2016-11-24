<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function section(){

        return $this->belongsTo('App\Section');

    }
}
