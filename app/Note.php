<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    public function sections(){

        return $this->belongsTo('App\Section');

    }
}
