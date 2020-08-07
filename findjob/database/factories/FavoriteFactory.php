<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Favorite;
use App\Job;
use App\User;
use Faker\Generator as Faker;

$factory->define(Favorite::class, function (Faker $faker) {
    return [
        'job_id' => Job::all()->random()->id,
        'user_id' => User::all()->random()->id
    ];
});
