<?php

namespace App\Providers;

use App\Http\Repositories\CompanyRepository;
use App\Http\Repositories\CompanyRepositoryInterface;
use App\Http\Repositories\JobRepository;
use App\Http\Repositories\JobRepositoryInterface;
use App\Http\Repositories\ProfileRepository;
use App\Http\Repositories\ProfileRepositoryInterface;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepositoryInterface::class, UserRepository::class);
        $this->app->singleton(ProfileRepositoryInterface::class, ProfileRepository::class);
        $this->app->singleton(JobRepositoryInterface::class, JobRepository::class);
        $this->app->singleton(CompanyRepositoryInterface::class, CompanyRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
