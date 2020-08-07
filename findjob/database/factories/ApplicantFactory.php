<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Applicant;
use App\Job;
use App\Profile;
use Faker\Generator as Faker;

$factory->define(Applicant::class, function (Faker $faker) {
    return [
        // 'job_id' => Job::all()->random()->id,
        // 'profile_id' => Profile::all()->random()->id
    ];
});
