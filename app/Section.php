<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    public function board(){
        return $this->belongsTo('App\Board');
    }

    public function sections(){

        return $this->hasMany('App\Note');

    }
}
