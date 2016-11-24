<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    public function board(){
        return $this->belongsTo('App\Board');
    }

    public function notes(){

        return $this->hasMany('App\Note');

    }

    public static function boot()
    {
        parent::boot();

        // Attach event handler, on deleting of the section
        Section::deleting(function($sections)
        {
            // Delete all notes that belong to this section
            foreach ($sections->notes as $note) {
                $note->delete();
            }
        });
    }
}
