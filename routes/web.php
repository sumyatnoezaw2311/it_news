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

Route::get("/","BlogController@index")->name('index');
Route::get("/detail/{id}","BlogController@detail")->name('detail');
Route::get("/BaseOnCategory/{id}","BlogController@BaseOnCategory")->name('baseOnCategory');
Route::get("/BaseOnUser/{id}","BlogController@BaseOnUser")->name('baseOnUser');
Route::get("/BaseOnDateTime/{dateTime}","BlogController@BaseOnDateTime")->name('baseOnDateTime');
//Route::get("/PreviousPost/{id}","BlogController@PreviousPost")->name('previous');
//Route::get("/NextPost/{dateTime}","BlogController@NextPost")->name('next');

Route::view('/about','blog.about')->name('about');

Auth::routes();

Route::prefix('dashboard')->middleware('auth')->group(function (){

    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('category','CategoryController');
    Route::resource('article','ArticleController');


    Route::prefix("profile")->group(function (){

        Route::get('profile/edit','ProfileController@edit')->name('profile.edit');
        Route::post('profile/change-photo','ProfileController@changePhoto')->name('profile.change-photo');
        Route::get('profile/change-password','ProfileController@change')->name('profile.change');
        Route::post('profile/change-password','ProfileController@changePassword')->name('profile.change-password');
    });
});
