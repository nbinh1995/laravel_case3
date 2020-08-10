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


Auth::routes(['verify' => true]);
Route::get('/', 'HomeController@index')->name('home');
Route::get('/profiles/{profile}/edit', 'HomeController@candidates')->name('profiles.edit');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('/users', 'AdminController@users')->name('dashboard.users');
    Route::get('/jobs', 'AdminController@jobs')->name('dashboard.jobs');
    Route::get('/companies', 'AdminController@companies')->name('dashboard.companies');
});

Route::group(['prefix' => 'jobs'], function () {
    Route::get('/', 'HomeController@jobs')->name('jobs.list');
    Route::get('/{job}/show', 'WorkController@show')->name('jobs.show');
});

Route::group(['prefix' => 'companies'], function () {
    Route::get('/', 'HomeController@companies')->name('companies.list');
    Route::get('/{company}/show', 'HomeController@showCompany')->name('companies.show');
    Route::get('/{company}/edit', 'CompanyController@edit')->name('companies.edit');
    Route::put('/{company}/update', 'CompanyController@update')->name('companies.update');
    Route::get('/{company}/candidates', 'CompanyController@candidates')->name('companies.candidates');
});
