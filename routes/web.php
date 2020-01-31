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
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::get('home', 'DashboardController@index')->name('index');

    Route::resource('users', 'UserController', ['except' => ['show', 'create', 'store']]);
    Route::resource('products', 'ProductController', ['except' => ['show', 'store']]);
    Route::post('product.upload', 'ProductController@newProduct')->name('product.new');
    //Categories
    Route::get('categories', 'CategoryController@index')->name('category.index');
    Route::get('categories/create', 'CategoryController@new')->name('category.create');
    Route::post('categories/create', 'CategoryController@create')->name('category.create');
    Route::post('categories/update', 'CategoryController@update')->name('category.update');
    Route::delete('/categories', 'CategoryController@destroy')->name('category.destroy');
});