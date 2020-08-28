<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Attempt
 *
 * @property int $id
 * @property int $user_id
 * @property int $test_id
 * @property \Illuminate\Support\Carbon $passed_at
 * @property int $questions_number
 * @property int $questions_success
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Answer[] $answers
 * @property-read int|null $answers_count
 * @property-read mixed $diff_passed_at
 * @property-read \App\Models\Test $test
 * @property-read \App\Models\User $user
 */
class Attempt extends Model
{
    protected $guarded = ['id'];
    protected $dates = ['passed_at'];

    const CREATED_AT = 'passed_at';
    const UPDATED_AT = null;

    public function test()
    {
        return $this->belongsTo('App\Models\Test');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function answers()
    {
        return $this->belongsToMany('App\Models\Answer', 'user_answers');
    }

    public function getDiffPassedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->attributes['passed_at'])->diffForHumans([
            'syntax' => CarbonInterface::DIFF_RELATIVE_TO_NOW,
            'options' => CarbonInterface::JUST_NOW | Carbon::ONE_DAY_WORDS,
        ]);
    }

    protected $appends = ['diff_passed_at'];
}
