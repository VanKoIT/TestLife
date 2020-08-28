<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Like
 *
 * @property int $id
 * @property int $user_id
 * @property int $test_id
 */
class Like extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];
}
