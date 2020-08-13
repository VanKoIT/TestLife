<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;

    public function scopeTest($query, $testId)
    {
        return $query->where('test_id', $testId);
    }

    public function answers() {
        return $this->hasMany('App\Models\Answer');
    }
}
