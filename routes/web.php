<?php

use Carbon\Carbon;
use App\User;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Hash;
use App\Staff;
use App\Slot;
use App\VehicleRun;
use App\SlotBooking;
use App\Address;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\DeliverySchedule;
use App\DeliveryVehicle;
use App\Deliveries;
use App\Mail\OrderCompleteMail;
use App\Mail\OrderDelivered;
use App\ProductPicking;
use App\Run;
use App\pickingOrder;
use App\PickingRun;

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
    Route::post('delivery/assign/driver', 'DeliveryController@updateDriver')->name('delivery.assignDriver');
    //Stores
    Route::get('stores/locations', 'StoreController@index')->name('store.index');
    Route::post('stores/locations', 'StoreController@create')->name('store.create');
    //Orders
    //Route::get('/orders', 'OrderController@index')->name('orders.index');
    //Route::get('/order/{$id}', 'OrderController@view')->name('orders.view');
    Route::resource('orders', 'OrderController', ['except' => ['show', 'create', 'store']]);
    //Deliveries
    

    //Picking
    Route::get('picking', 'Picking\\ProductController@index')->name('picking.index');

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
    $run = VehicleRun::where('run', 1)->where('deliveryDate', Carbon::now()->format('Y-m-d'))->with('deliveries.order.user')->first();
    foreach($run->deliveries as $delivery){
        $order = Order::find($delivery->order);
        $user = User::with('address')->find($order->user->id);
        $geocode = getLongLat($user->address->post_code)['results'][0]['geometry']['location'];
        $orders[] = [
            'name' => $user->title . ' ' . $user->first_name . ' ' . $user->last_name,
            'postCode' => $user->address->post_code,
            'long' => $geocode['lng'],
            'lat' => $geocode['lat'],
            'addressLine1' => $user->address->address_line_1,
            'addressLine2' => $user->address->address_line_2,
        ];
    }
    dump($orders);
});

Route::get('/cart-t', function(){
   Cache::forget('picking.today');
});

Route::get('/email', function(){
    $user = Auth::user();
    return (new OrderDelivered($user))->render();
});


Route::get('/picking', function(){
    $run = PickingRun::where('picker', null)->with('productPicking.products')->first();
    return response()->json($run->productPicking);
});

