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


Auth::routes();




Route::get("/", "PostController@index")->name("posts.index");
Route::get("/posts/{post}", "PostController@show")->name("posts.show");

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->name("admin.")
    ->group(function () {

        Route::resource("/posts", "PostController");
        Route::get("/categories", "CategoryController@index")->name('categories.index');
    });


