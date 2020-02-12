<?php
use Carbon\Carbon;
use App\Category;
use App\User;
use App\Product;
use App\Job;
use App\Staff;
use App\Order;
use App\SlotBooking;
use App\DeliveryVehicle;
//Users
function getUserCount(){
    return User::all()->count();
}
//Staff
function getStaffCount(){
    return Staff::all()->count();
}
//Orders
function getOrdersCount(){
    return Order::all()->count();
}
function presentStatus($status){
    if($status == 1){
        return "Order Placed";
    }else if($status == 2){
        return "Out For Delivery";
    }else if($status == 3){
        return "Payment Issue";
    }
}
//Deliveries
function getDay($id){
    if($id == 1){
        return "Monday";
    }else if($id == 2){
        return "Tuesday";
    }else if($id == 3){
        return "Wednesday";
    }else if($id == 4){
        return "Thursday";
    }else if($id == 5){
        return "Friday";
    }else if($id == 6){
        return "Saturday";
    }else if($id == 7){
        return "Sunday";
    }
}
//Product
function getProductCount(){
    return Product::all()->count();
}
function checkPrimaryCat($primary){
    if($primary == NULL){
        return "No Primary Selected";
    }else{
        return Category::find($primary)->name;
    }
}
function formatPrice($price){
    return "£" . number_format($price, 2);
}
//Jobs
function getJobRole($id){
    return Job::find($id)->title;
}
//Cart
function cartTotal(){
    $cart = session()->get('cart');
    $total = 0;
    foreach($cart as $item){
        $itemPrice = $item['price'] * $item['quantity'];
        $total = $total + $itemPrice;
    }
    return $total;
}
//slots
function checkSlot($slot_id, $date){
    $vanCount = DeliveryVehicle::all()->count();
    $slot = SlotBooking::where('slot_id' , $slot_id)->where('date', $date)->first();
    $booked_slots = SlotBooking::where('date' , $date)->get();
    $bookingCount = 0;
    $userSlot = SlotBooking::where('slot_id', $slot_id)->where('date', $date)->where('user_id', Auth::id())->pluck('user_id');
    foreach($booked_slots as $slot){
        if($slot_id == $slot->slot_id){
            $bookingCount ++;
        }
    }
    if($userSlot->count() == 1){
        return 2;
    }elseif($date->isPast() | $date->isToday()){
        return 3;
    }else if($bookingCount >= $vanCount){
        return 3;
    }else{
        return 1;
    }
}
function SlotDate($id){
    $date = Carbon::now();
    $monday = $date->startOfWeek();
    if($id == 1){
        return $monday;
    }else if($id == 2){
        return $monday->addDays(1);
    }else if($id == 3){
        return $monday->addDays(2);
    }else if($id == 4){
        return $monday->addDays(3);
    }else if($id == 5){
        return $monday->addDays(4);
    }else if($id == 6){
        return $monday->addDays(5);
    }else if($id == 7){
        return $monday->addDays(6);
    }
}

function getDirections($start_post_code, $end_post_code){
    $client = new \GuzzleHttp\Client();

    $start_request = $client->get('https://api.openrouteservice.org/geocode/search/structured?api_key=5b3ce3597851110001cf624864fbb490590e46bcbdcb34db2222f284&postalcode=' . $start_post_code);
    $end_request = $client->get('https://api.openrouteservice.org/geocode/search/structured?api_key=5b3ce3597851110001cf624864fbb490590e46bcbdcb34db2222f284&postalcode=' . $end_post_code);
        
    $start_response = json_decode($start_request->getBody(),true);
    $end_response = json_decode($end_request->getBody(),true);

    $start_long = $start_response['features'][0]['geometry']['coordinates'][0];
    $start_lat = $start_response['features'][0]['geometry']['coordinates'][1];

    $end_long = $end_response['features'][0]['geometry']['coordinates'][0];
    $end_lat = $end_response['features'][0]['geometry']['coordinates'][1];

    $route_request = $client->get('https://api.openrouteservice.org/v2/directions/driving-car?api_key=5b3ce3597851110001cf624864fbb490590e46bcbdcb34db2222f284&start='.$start_long.','.$start_lat.'&end='.$end_long.','.$end_lat);

    $route = json_decode($route_request->getBody(),true);

    $distance_km = $route['features'][0]['properties']['summary']['distance'] / 1000;

    dd($distance_km);
}