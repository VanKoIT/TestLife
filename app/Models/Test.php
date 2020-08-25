<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Test extends Model
{
    public $guarded =['id'];
    public $timestamps = false;

    public function author() {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function questions() {
        return $this->hasMany('App\Models\Question');
    }

    public function questionsRandom() {
        return $this->questions()->inRandomOrder();
    }

    public function likes() {
        return $this->hasMany('App\Models\Like');
    }

    public function is_like() {
        if(Auth::check()) {
            $isLike = $this->hasMany('App\Models\Like')
                        ->where('user_id',Auth::id())->count();
            return $isLike;
        }
        return 0;
    }
}
