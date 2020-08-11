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
        'description' => $faker->paragraph(rand(4, 8)),
        'require' =>  $faker->paragraph(rand(4, 8)),
        'benefit' =>  $faker->paragraph(rand(4, 8)),
        'contact_name' => $faker->name,
        'contact_phone' => $faker->tollFreePhoneNumber,
        'contact_email' => $faker->safeEmail,
        'position' => $faker->jobTitle,
        'type' => $type[rand(0, 1)],
        'last_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+30 days'),
        'hot' => rand(0, 1)
    ];
});
