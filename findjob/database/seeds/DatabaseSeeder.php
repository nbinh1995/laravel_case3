<?php

use App\Category;
use App\Company;
use App\Job;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Web Developer', 'Mobile Developer'];
        foreach ($categories as $item) {
            Category::create(['name' => $item]);
        }
        factory(User::class, 20)->create();
        factory(Company::class, 20)->create();
        factory(Job::class, 20)->create();
    }
}
