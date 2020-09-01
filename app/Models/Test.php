<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * App\Models\Test
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string $title
 * @property string|null $description
 * @property string|null $photo_link
 * @property int $is_complete
 * @property-read \App\Models\User $author
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Like[] $likes
 * @property-read int|null $likes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Question[] $questions
 * @property-read int|null $questions_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Test personal($complete)
 */
class Test extends Model
{
    public $guarded = ['id'];
    public $timestamps = false;

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function questionsRandom()
    {
        return $this->questions()->inRandomOrder();
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function is_like()
    {
        if (Auth::check()) {
            $isLike = $this->hasMany('App\Models\Like')->where('user_id', Auth::id())->count();
            return $isLike;
        }
        return 0;
    }

    public function scopePersonal($query,$complete)
    {
        return $query->where('user_id', Auth::id())
                     ->where('is_complete',$complete)
                     ->orderBy('id','desc')
                     ->withCount('likes')->get();
    }
}
