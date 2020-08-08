<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\Work;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Work::class, function (Faker $faker) {
    $type = ['FullTime', 'PartTime'];
    return [
        'company_id' => Company::all()->random()->id,
        'category_id' => rand(1, 2),
        'title' => $name = $faker->sentence,
        'slug' => Str::slug($name),
        'roles' => $faker->text,
        'description' => $faker->paragraph(rand(4, 8)),
        'position' => $faker->jobTitle,
        'address' => $faker->address,
        'status' => rand(0, 1),
        'type' => $type[rand(0, 1)],
        'last_date' => $faker->DateTime,
        'hot' => rand(0, 1)
    ];
});
