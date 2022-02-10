<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware("auth")->get('/user', function () {
  return response()->json(Auth::user());
});

Route::get("/posts", "Api\PostController@index");
Route::get("/posts/{slug}", "Api\PostController@show");

Route::get("/categories", "Api\CategoryController@index");
Route::get("/categories/{category}", "Api\CategoryController@show");
Route::post("/contacts", "Api\ContactController@store");
Route::get("/visits", "Api\VisitController@visit");
