<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function() {
    return view('dashboard');
});

Route::resource('/branch','BranchesController')->middleware('auth');
Route::resource('/course','CoursesController')->middleware('auth');
Route::resource('/city','CitiesController');
Route::resource('/registration','RegistrationsController')->middleware('auth');
Route::get('/registration-pdf','RegistrationsController@pdf');
Route::get('/registration-excel','RegistrationsController@excel');
Auth::routes();

Route::get('/home', function() {
    return redirect('dashboard');
}) ;
