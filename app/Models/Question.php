<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;

    public function answers() {
        return $this->hasMany('App\Models\Answer')->select(['id','question_id','text']);
    }
}
