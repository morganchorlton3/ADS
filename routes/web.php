<?php


Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('verified')->group(function () {
    Route::get('/profile', 'ProfileController@index');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});
