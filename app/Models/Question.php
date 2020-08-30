<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Question
 *
 * @property int $id
 * @property int $test_id
 * @property string $text
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Answer[] $answers
 * @property-read int|null $answers_count
 */
class Question extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }

    public function answersRandom()
    {
        return $this->answers()->inRandomOrder();
    }
}
