<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/newregister', function () {
    return view('register');
});
Route::get('/profile', function () {
    return view('profile');
});

Route::get('/register', 'App\Http\Controllers\RegistrationController@showRegistrationForm')->name('register');
// Route::post('/register', 'App\Http\Controllers\RegistrationController@register');
Route::post('/register','App\Http\Controllers\RegistrationController@register');


Route::post('/login', 'App\Http\Controllers\CustomLoginController@login');
Route::get('/login', 'App\Http\Controllers\CustomLoginController@showLoginForm')->name('login');
Route::get('/login', 'App\Http\Controllers\CustomLoginController@showLoginForm')->name('login');

Route::post('/logout', 'App\Http\Controllers\CustomLoginController@logout')->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');