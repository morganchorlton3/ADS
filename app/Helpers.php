<?php
use Carbon\Carbon;
use App\Category;
use App\Delivery;
use App\DeliverySchedule;
use App\User;
use App\Product;
use App\Job;
use App\Staff;
use App\Order;
use App\SlotBooking;
use App\DeliveryVehicle;
use GuzzleHttp\Psr7\Request;
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
//category
function getParentCategory($name){
    $cat = Category::where('name', $name)->get();
    $primary = Category::find($cat[0]->parent_id)->get();
    return $primary;

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
/*
function checkSlot($slot_id, $date){
    $vanCount = DeliveryVehicle::all()->count();
    $slot = SlotBooking::where('slot_id' , $slot_id)->where('date', $date)->first();
    $booked_slots = SlotBooking::where('date' , $date->format('Y:m:d'))->get();
    $bookingCount = 0;
    $userSlot = SlotBooking::where('slot_id', $slot_id)->where('date', $date->format('Y:m:d'))->where('user_id', Auth::id())->pluck('user_id');
    foreach($booked_slots as $slot){
        if($slot_id == $slot->slot_id){
            $bookingCount ++;
        }
    }
    $currentUserPost_codeArea = substr(auth()->user()->address->post_code, 0, 1);
    //dd($currentUserPost_code);
    $bookedSlot = SlotBooking::where('date' , $date->format('Y:m:d'))->where('slot_id', $slot_id)->get();

    if($bookedSlot->count() == 1){
        $bookedSlotPost_codeArea = substr($bookedSlot[0]['post_code'], 0, 1);
        if($currentUserPost_codeArea != $bookedSlotPost_codeArea){
            return 3;
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
}*/
function checkSlot($slot_id, $date){
    $vanCount = DeliveryVehicle::all()->count();
    $bookedSlots = Delivery::where('slot_id' , $slot_id)->where('date', $date->format('Y:m:d'))->get();
    $userSlot = Delivery::where('slot_id' , $slot_id)->where('user_id', Auth::id())->where('date', $date->format('Y:m:d'))->count();
    $currentUserPostCode = User::find(Auth::id())->address->post_code;
    if($userSlot == 1){
        return 2;
    }else if($bookedSlots->count() != 0){
        foreach($bookedSlots as $slot){
            //dd($slot);
            if($slot->post_code == $currentUserPostCode){
                return 1;
            }else{
                $distanceFromLast = getDistanceMiles($slot->post_code, $currentUserPostCode);
                
            }
        }
    }else if($date->isPast() | $date->isToday()){
        return 3;
    }elseif($bookedSlots->count() > 0){
        return 3;
    }else{
        return 1;
    }
}

function SlotDate($id){
    $date = Carbon::now();
    //$monday = $date->startOfWeek();
    if($id == 1){
        return $date;
    }else if($id == 2){
        return $date->addDays(1);
    }else if($id == 3){
        return $date->addDays(2);
    }else if($id == 4){
        return $date->addDays(3);
    }else if($id == 5){
        return $date->addDays(4);
    }else if($id == 6){
        return $date->addDays(5);
    }else if($id == 7){
        return $date->addDays(6);
    }
}

function getDayID($date){

    $day = Carbon::parse($date)->format('D');
    if($day == "Mon"){
        return 1;
    }else if($day == "Tue"){
        return 2;
    }else if($day == "Wed"){
        return 3;
    }else if($day == "Thu"){
        return 4;
    }else if($day == "Fri"){
        return 5;
    }else if($day == "Sat"){
        return 6;
    }else if($day == "Sun"){
        return 7;
    }
    
}
function getScheduleFromSlot($time, $day){
    $schedules = DeliverySchedule::all();
    foreach($schedules as $schedule){
        if ($time >= $schedule->start && $time <= $schedule->end && $schedule->day == getDayID($day)) {
            return $schedule->id;
        }
    }

}

//Deliveries
function getDistanceMiles($startPostCode, $endPostCode){
    $client = new \GuzzleHttp\Client();

    $start_request = $client->get('https://api.openrouteservice.org/geocode/search/structured?api_key=' . env('MapKey') . '&postalcode=' . $startPostCode);
    $end_request = $client->get('https://api.openrouteservice.org/geocode/search/structured?api_key=' . env('MapKey') . '&postalcode=' . $endPostCode);
        
    $start_response = json_decode($start_request->getBody(),true);
    $end_response = json_decode($end_request->getBody(),true);

    $start_long = $start_response['features'][0]['geometry']['coordinates'][0];
    $start_lat = $start_response['features'][0]['geometry']['coordinates'][1];

    $end_long = $end_response['features'][0]['geometry']['coordinates'][0];
    $end_lat = $end_response['features'][0]['geometry']['coordinates'][1];

    $route_request = $client->get('https://api.openrouteservice.org/v2/directions/driving-car?api_key=5b3ce3597851110001cf624864fbb490590e46bcbdcb34db2222f284&start='.$start_long.','.$start_lat.'&end='.$end_long.','.$end_lat);

    $route = json_decode($route_request->getBody(),true);

    $distance_km = $route['features'][0]['properties']['summary']['distance'] / 1000;

    return $distance_km * 0.621371;
}

function calculateRoute($postCodes){
    $client = new \GuzzleHttp\Client();

    $coordinatesString = null;
    $counter = 0;
    foreach($postCodes as $postCode){
        $coordinates = $client->get('https://api.openrouteservice.org/geocode/search/structured?api_key=' . env('MapKey') . '&postalcode=' . $postCode);
        $coordinatesResponse = json_decode($coordinates->getBody(),true);
        $long = $coordinatesResponse['features'][0]['geometry']['coordinates'][0];
        $lat = $coordinatesResponse['features'][0]['geometry']['coordinates'][1];
        if($counter == 0){
            $coordinatesString = $coordinatesString . '['. $long . ',' . $lat . ']';
        }else{
            $coordinatesString = $coordinatesString . ',['. $long . ',' . $lat . ']';
        }
        $counter++;
    }

    $headers = [
        'Accept' => 'application/json, application/geo+json, application/gpx+xml, img/png; charset=utf-8',
        'Authorization' => '5b3ce3597851110001cf6248180654af4b1a405b86bf89497fd9ac67',
        'Content-Type' => 'application/json; charset=utf-8'
    ];
    $body = '{"coordinates":[' . $coordinatesString . ']}';

    //dd($body);
    
    $request = new Request('POST', 'https://api.openrouteservice.org/v2/directions/driving-car/', $headers, $body);
    $response = $client->send($request, ['timeout' => 2]);

    dd(json_decode($response->getBody(),true));

}

function calculateRouteDistance($postCodes){
    $client = new \GuzzleHttp\Client();
    
    $coordinatesString = null;
    $counter = 0;
    foreach($postCodes as $postCode){
        $coordinates = $client->get('https://api.openrouteservice.org/geocode/search/structured?api_key=' . env('MapKey') . '&postalcode=' . $postCode);
        $coordinatesResponse = json_decode($coordinates->getBody(),true);
        $long = $coordinatesResponse['features'][0]['geometry']['coordinates'][0];
        $lat = $coordinatesResponse['features'][0]['geometry']['coordinates'][1];
        if($counter == 0){
            $coordinatesString = $coordinatesString . '['. $long . ',' . $lat . ']';
        }else{
            $coordinatesString = $coordinatesString . ',['. $long . ',' . $lat . ']';
        }
        $counter++;
    }

    $headers = [
        'Accept' => 'application/json, application/geo+json, application/gpx+xml, img/png; charset=utf-8',
        'Authorization' => '5b3ce3597851110001cf6248180654af4b1a405b86bf89497fd9ac67',
        'Content-Type' => 'application/json; charset=utf-8'
    ];
    $body = '{"coordinates":[' . $coordinatesString . ']}';

    //dd($body);
    
    $request = new Request('POST', 'https://api.openrouteservice.org/v2/directions/driving-car/', $headers, $body);
    $response = $client->send($request, ['timeout' => 2]);

    $result = json_decode($response->getBody(),true);

    //return $result;

    return round($result['routes'][0]['segments'][0]['distance'] * 0.000621371) . " Miles" . ' - ' . gmdate("H:i:s", ($result['routes'][0]['segments'][0]['duration']));
    ;
}
