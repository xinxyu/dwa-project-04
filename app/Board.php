<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function sections(){

        return $this->hasMany('App\Section');

    }

    public static function boot()
    {
        parent::boot();

        // Attach event handler, on deleting of the board
        Board::deleting(function($board)
        {
            // Delete all sections that belong to this board
            foreach ($board->sections as $section) {
                $section->delete();
            }
        });
    }
}
