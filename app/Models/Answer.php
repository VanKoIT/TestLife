<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $timestamps = false;

    public function question() {
        return $this->belongsTo('App\Models\Question');
    }

}
