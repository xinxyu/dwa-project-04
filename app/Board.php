<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public function boards(){

        return $this->hasMany('App\Section');

    }
}
