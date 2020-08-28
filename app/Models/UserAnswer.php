<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserAnswer
 *
 * @property int $id
 * @property int $attempt_id
 * @property int $answer_id
 */
class UserAnswer extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;
}
