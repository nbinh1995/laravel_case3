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
Route::get('/jobs', 'HomeController@jobs')->name('listJobs');
Route::get('/companies', 'HomeController@companies')->name('listCompanies');
Route::get('/candidates', 'HomeController@candidates')->name('listCandidate');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::get('/users', 'AdminController@users')->name('dashboard.users');
    Route::get('/jobs', 'AdminController@jobs')->name('dashboard.jobs');
    Route::get('/companies', 'AdminController@companies')->name('dashboard.companies');
});
