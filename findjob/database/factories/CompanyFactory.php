<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'c_name' => $title = $faker->company,
        'slug' => Str::slug($title),
        'address' => $faker->address,
        'phone' => $faker->tollFreePhoneNumber,
        'website' => $faker->domainName,
        'logo' => '/storage/avatar/logo.svg',
        'cover_photo' => '/storage/cover/banner.jpg',
        'slogan' => 'No Pain, No Gain',
        'description' => $faker->paragraph(rand(4, 8))
    ];
});
