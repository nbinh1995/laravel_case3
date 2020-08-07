<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/profiles/{id}', 'HomeController@candidates')->name('profiles.show');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('/users', 'AdminController@users')->name('dashboard.users');
    Route::get('/jobs', 'AdminController@jobs')->name('dashboard.jobs');
    Route::get('/companies', 'AdminController@companies')->name('dashboard.companies');
});

Route::group(['prefix' => 'jobs'], function () {
    Route::get('/', 'HomeController@jobs')->name('jobs.list');
    Route::get('/{id}/show', 'HomeController@jobs')->name('jobs.show');
});

Route::group(['prefix' => 'companies'], function () {
    Route::get('/', 'HomeController@companies')->name('companies.list');
    Route::get('/{id}/show', 'HomeController@jobs')->name('companies.show');
    Route::get('/{id}/candidates', 'HomeController@candidates')->name('companies.candidates');
});

