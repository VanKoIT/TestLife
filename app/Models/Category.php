<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Test[] $tests
 * @property-read int|null $tests_count
 */
class Category extends Model
{
    public $timestamps = false;

    public function tests()
    {
        return $this->hasMany('App\Models\Test')->withCount('likes')->orderBy('likes_count', 'desc');
    }
}
