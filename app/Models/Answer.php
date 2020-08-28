<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Answer
 *
 * @property int $id
 * @property int $question_id
 * @property string $text
 * @property int $is_correct
 * @property-read \App\Models\Question $question
 */
class Answer extends Model
{
    public $timestamps = false;

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }

}
