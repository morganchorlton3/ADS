<?php

use Carbon\Carbon;
use App\User;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Hash;
use App\Staff;
use App\Slot;
use App\VehicleRuns;
//cart
Route::get('add-to-cart/{id}', 'CartController@addToCart')->name('cart.add');
Route::get('cart/increase/{id}', 'CartController@increaseQuantity')->name('cart.increase');
Route::get('cart/decrease/{id}', 'CartController@decreaseQuantity')->name('cart.decrease');
Route::get('cart/remove/{id}', 'CartController@remove')->name('cart.remove');
Route::get('/', 'HomeController@index')->name('home');
//shop
Route::get('shop/{slug}', 'Admin\\CategoryController@categoryView')->name('category');

Auth::routes(['verify' => true]);

Route::middleware('verified')->group(function () {
    Route::get('/account', 'AccountController@index')->name('account.manage');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    //checkout
    Route::name('checkout.')->group(function(){
        Route::get('checkout/book-slot', 'SlotController@index')->name('book.slot');
        Route::get('/book-slot/{day}/{id}', 'SlotController@bookSlot')->name('book.time.slot');
        Route::get('/order/process', 'OrderController@newOrder')->name('order');
    });
    Route::name('account.')->group(function(){
        Route::post('/address/update', 'AddressController@edit')->name('address.update');
    });
});
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::get('home', 'DashboardController@index')->name('index');

    Route::resource('users', 'UserController', ['except' => ['show', 'create', 'store']]);
    Route::resource('products', 'ProductController', ['except' => ['show', 'store']]);
    Route::post('product.upload', 'ProductController@newProduct')->name('product.new');
    Route::get('/products/download','BarcodeController@downloadPDF')->name('products.download');
    //Categories
    Route::get('categories', 'CategoryController@index')->name('category.index');
    Route::get('categories/create', 'CategoryController@new')->name('category.create');
    Route::post('categories/create', 'CategoryController@create')->name('category.create');
    Route::post('categories/update', 'CategoryController@update')->name('category.update');
    Route::delete('/categories', 'CategoryController@destroy')->name('category.destroy');
    //jobs
    Route::get('jobs', 'JobsController@index')->name('jobs.index');
    Route::post('jobs', 'JobsController@create')->name('jobs.create');
    //staff
    Route::get('staff', 'StaffController@index')->name('staff.index');
    Route::get('staff.create', 'StaffController@new')->name('staff.new');
    Route::post('staff', 'StaffController@create')->name('staff.create');
    //deliveries
    Route::get('delivery/schedule', 'DeliveryScheduleController@index')->name('delivery.index');
    Route::post('delivery/schedule', 'DeliveryScheduleController@create')->name('delivery.create');
    Route::delete('delivery/schedule', 'DeliveryScheduleController@delete')->name('delivery.destroy');
    //slots
    Route::get('delivery/slots', 'SlotController@index')->name('slot.index');
    Route::post('delivery/slots', 'SlotController@create')->name('slot.create');
    Route::delete('delivery/slots', 'SlotController@delete')->name('slot.destroy');
    //vehicles
    Route::get('delivery/vehicles', 'DeliveryVehicleController@index')->name('vehicle.index');
    Route::post('delivery/vehicles', 'DeliveryVehicleController@create')->name('vehicle.create');
    //Stores
    Route::get('stores/locations', 'StoreController@index')->name('store.index');
    Route::post('stores/locations', 'StoreController@create')->name('store.create');
    //Orders
    //Route::get('/orders', 'OrderController@index')->name('orders.index');
    //Route::get('/order/{$id}', 'OrderController@view')->name('orders.view');
    Route::resource('orders', 'OrderController', ['except' => ['show', 'create', 'store']]);
});



//Testing Routes
Route::get('organise', 'DeliveryController@index');

Route::get('test', function () {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.openrouteservice.org/v2/directions/driving-car/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    
    curl_setopt($ch, CURLOPT_POST, TRUE);
    
    //curl_setopt($ch, CURLOPT_POSTFIELDS, '{"coordinates":[[-2.019521,53.451183],[-2.091962,53.49183],[-2.034677,53.497569],[-1.984228,53.446114],[-2.019521,53.451183]]}');
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{"coordinates":[[-2.091962,53.49183],[-1.984228,53.446114]]}');
    

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      "Accept: application/json, application/geo+json, application/gpx+xml, img/png; charset=utf-8",
      "Authorization: 5b3ce3597851110001cf6248180654af4b1a405b86bf89497fd9ac67",
      "Content-Type: application/json; charset=utf-8"
    ));
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    $test = json_decode($response,true);
    dd($test);
    //dd($test['features'][0]['properties']['summary']['distance'] / 1000);
});

Route::get('calculate', function () {
    $postCodes = ['SK14 6QA', 'sk14 3dg', 'sk14 3jr', 'sk15 2qz', 'sk16 5nh', 'm34 3ta', 'm34 5ah', 'ol7 0dz', 'm34 5ga', 'm34 5uq', 'ol7 0lw', 'ol7 9el','m34 7qq'];
    dd(calculateRouteDistance($postCodes));
});

Route::get('testing', function(){
    $slot = Slot::find(1);
    $vehicleRun = VehicleRuns::find(1);
    $timeToNewDelivery = getRouteTime($vehicleRun->last_postcode, User::find(Auth::id())->address->post_code);
    $runTime = Carbon::parse($vehicleRun->run_time)->addSeconds($timeToNewDelivery);
    //dd(Carbon::parse($vehicleRun->run_time));
    //dd($runTime);
    //$currentRunTime = $vehicleRun
    dd($runTime->isBefore(Carbon::parse($slot->end)));
            
});