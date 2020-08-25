<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['passed_at'];

    const CREATED_AT = 'passed_at';
    const UPDATED_AT = null;

    public function test() {
        return $this->belongsTo('App\Models\Test');
    }

    public function answers() {
        return $this->belongsToMany('App\Models\Answer','user_answers');
    }

}
