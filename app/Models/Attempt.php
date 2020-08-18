<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attempt extends Model
{
    protected $guarded = ['id'];

    const CREATED_AT = 'passed_at';
    const UPDATED_AT = null;

    public function answers() {
        return $this->hasMany('App\Models\UserAnswer');
    }
}
