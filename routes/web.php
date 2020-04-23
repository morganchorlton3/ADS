<?php

use Carbon\Carbon;
use App\User;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Hash;
use App\Staff;
use App\Slot;
use App\VehicleRuns;
use App\SlotBooking;
use App\Address;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\DeliverySchedule;
use App\DeliveryVehicle;
use App\Deliveries;
use App\Mail\OrderCompleteMail;
use App\Run;


//cart
Route::get('add-to-cart/{id}', 'CartController@addToCart')->name('cart.add');
Route::get('products/{id}','HomeController@show')->name('product.show');
Route::get('cart/increase/{id}', 'CartController@increaseQuantity')->name('cart.increase');
Route::get('cart/decrease/{id}', 'CartController@decreaseQuantity')->name('cart.decrease');
Route::get('cart/remove/{id}', 'CartController@remove')->name('cart.remove');
Route::get('/', 'HomeController@index')->name('home');
//shop
Route::get('shop/{slug}', 'Admin\\CategoryController@categoryView')->name('category');

Auth::routes(['verify' => true]);

Route::middleware('verified')->group(function () {

    Route::namespace('Auth')->prefix('account')->name('account.')->group(function(){
        Route::get('orders', 'OrderController@index')->name('orders.index');
        Route::get('order/{id}/download', 'OrderController@download')->name('orders.download');
        Route::get('order/{id}', 'OrderController@show')->name('orders.show');
        Route::get('home', 'AccountController@index')->name('manage');
        Route::post('/address/update', 'AddressController@edit')->name('address.update');
    });

    
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    //checkout
    Route::name('checkout.')->prefix('checkout')->group(function(){
        Route::get('book-slot', 'SlotController@index')->name('book.slot');
        Route::get('/book-slot/{day}/{id}/{price}', 'SlotController@bookSlot')->name('book.time.slot');
        Route::get('/order/process', 'OrderController@newOrder')->name('order');
        Route::get('payment', 'CheckoutController@index')->name('payment');
        Route::post('payment', 'CheckoutController@store')->name('payment.store');
        Route::get('/checkout/success', 'ConfirmationController@index')->name('success');

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
    Route::post('categories/create', 'CategoryController@create')->name('category.create.post');
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
    Route::get('deliveries/view', 'DeliveryController@index')->name('deliveries.view');
    //slots
    Route::get('delivery/slots', 'SlotController@index')->name('slot.index');
    Route::post('delivery/slots', 'SlotController@create')->name('slot.create');
    Route::delete('delivery/slots', 'SlotController@delete')->name('slot.destroy');
    //vehicles
    Route::get('delivery/vehicles', 'DeliveryVehicleController@index')->name('vehicle.index');
    Route::post('delivery/vehicles', 'DeliveryVehicleController@create')->name('vehicle.create');
    Route::get('deliveries', 'DeliveryController@index')->name('deliveries.index');
    //Stores
    Route::get('stores/locations', 'StoreController@index')->name('store.index');
    Route::post('stores/locations', 'StoreController@create')->name('store.create');
    //Orders
    //Route::get('/orders', 'OrderController@index')->name('orders.index');
    //Route::get('/order/{$id}', 'OrderController@view')->name('orders.view');
    Route::resource('orders', 'OrderController', ['except' => ['show', 'create', 'store']]);

    //Picking
    Route::get('picking', 'ProductLocationController@index')->name('picking.index');

});

Route::get('/route', function(){
    $run = Run::where('date', Carbon::now()->format('Y-m-d'))->with('deliveries.Order.User')->first();
        //dd($runs);
        /*return view('admin.deliveries.deliveries')->with([
            'runs' => $runs,
        ]);*/
        $pdf = PDF::loadView('admin.export.run', $run);
        return $pdf->download('invoice.pdf');
});

Route::get('/orders-test', function(){
    $slots = Slot::all();
    $deliverySchedule = DeliverySchedule::find(1);
    $start = Carbon::parse($deliverySchedule->start);
    $end = Carbon::parse($deliverySchedule->end);
    $runs = collect(new VehicleRuns());
    for($i = 1; $i <= 4; $i++){
        $slot = $slots->find($i);
        if(Carbon::parse($slot->end)->isBetween($start, $end)){
            $vehicleRuns = VehicleRuns::where('deliveryDate', Carbon::now()->format('Y-m-d'))->where('slotID', $i)->where('run', 1)->with('Deliveries.order')->get();
            foreach($vehicleRuns as $run){
                foreach($run->deliveries as $delivery){
                    $runs->add($delivery);
                }
            }
        }
        
    }
    dump($runs);
});

Route::get('/cart-t', function(){
    dd(App\Product::find(1)->price);
});

Route::get('/email', function(){
    $order = App\Order::with('orderProducts.product','user.address', 'SlotBooking.slot')->find(1);
    //return new OrderCompleteMail($order);
    Mail::to("morganchorlton3@gmail.com")->send(new OrderCompleteMail($order));
});