<?php

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

Route::get('/', 'IndexController@index')->name('index');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('tweets', 'TweetController');
    Route::get('/profile/{username}', 'ProfileController@show')->name('profile');
    Route::get('/follows/{username}', 'UserController@follows');
    Route::get('/unfollows/{username}', 'UserController@unfollows');
});