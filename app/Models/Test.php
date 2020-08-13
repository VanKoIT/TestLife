<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Test extends Model
{
    public $guarded =['id'];
    public $timestamps = false;

    public function likes() {
        return $this->hasMany('App\Models\Like')->count();
    }

    public function is_like() {
        if(Auth::check()) {
            $isLike = $this->hasMany('App\Models\Like')
                        ->where('user_id',Auth::id())->first();
            return (bool)$isLike;
        }
        return 0;
    }
}
