<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Test;
use App\Models\Like;
use Faker\Generator as Faker;
$factory->define(Like::class, function (Faker $faker) {
    $users=User::pluck('id');
    $tests=Test::pluck('id');
    return [
        'user_id'=>$faker->unique()->randomElement($users),
        'test_id'=>$faker->randomElement($tests)
    ];
});
