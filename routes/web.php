<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('guest.home');
})->name('welcome');

Auth::routes();

Route::namespace("Admin")
  ->prefix("admin")
  ->name("admin.")
  ->middleware("auth")
  ->group(function () {
    Route::get('/', 'HomeController@index');

    Route::resource("users", "UserController");
    Route::resource("posts", "PostController");
  });




Route::get('{path}',function(){
    return view('guest.home');
})->where('path', '[A-z\d\-\/_.]+');