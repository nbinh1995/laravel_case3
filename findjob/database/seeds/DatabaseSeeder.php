<?php

use App\Applicant;
use App\Category;
use App\Company;
use App\Favorite;
use App\Profile;
use App\User;
use App\Work;
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
        // $categories = ['Web Developer', 'Mobile Developer'];
        // foreach ($categories as $item) {
        //     Category::create(['name' => $item]);
        // }
        // factory(User::class, 20)->create();

        // User::where('role', 1)->each(function ($user, $key) {
        //     factory(Company::class, 1)->create([
        //         'user_id' => $user->id
        //     ]);
        // });
        // User::where('role', 0)->each(function ($user, $key) {
        //     factory(Profile::class, 1)->create([
        //         'user_id' => $user->id
        //     ]);
        // });
        // factory(Work::class, 20)->create();
        // factory(Favorite::class, 20)->create();

        // factory(Applicant::class, 20)->create();
    }
}
