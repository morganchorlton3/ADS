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
use App\Slot;
use App\Store;
use App\SlotBooking;
use App\DeliveryVehicle;
use GuzzleHttp\Psr7\Request;
use App\VehicleRuns;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

//Formats
function formatPrice($price){
    if($price < 1){
        return substr(number_format($price, 2) . "p", -3);
    }else{
        return "£" . number_format($price, 2);
    }
}
function formatAddress($address){
    if($address->address_line_3 == null){
        return $address->address_line_1 . ', ' . $address->address_line_2 .', ' . $address->post_code;
    }else{
        return $address->address_line_1 . ', ' . $address->address_line_2 .', ' . $address->address_line_3 . ', ' . $address->post_code;
    }
}




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
    //dd($cart);
    if($cart == null){
        return 0;
    }
    $total = 0;
    foreach($cart as $item){
        $itemPrice = $item['price'] * $item['quantity'];
        $total = $total + $itemPrice;
    }
    return $total;
}
function inCart($name){
    $cart = session()->get('cart');
    if($cart == null){
        return 0;
    }
    foreach($cart as $item){
        if($item['name'] == $name){
            return 1;
        }
    }
}
//slots
/*function checkSlot($id, $date){
    $slot = Slot::find($id);
    $run = getRun($date, $slot->start, $slot->end);
    $vehicleRun = VehicleRuns::where('deliveryDate', $date->format('Y:m:d'))->where('run', $run)->first();
    $userSlot = SlotBooking::where('slot_id', $slot->id)->where('date', $date->format('Y-m-d'))->where('user_id', Auth::id())->first();
    $vanCount = DeliveryVehicle::all()->count();
    if($userSlot != null){
        if($userSlot->status == 1){
            return 2;
        }else{
            return 1;
        }
    }elseif($date->isPast() | $date->isToday()){
        return 3;
    }elseif($vehicleRun != null){
        $timeToNewDelivery = getRouteTime($vehicleRun->last_postcode, User::find(Auth::id())->address->post_code);
        $runTime = Carbon::parse($vehicleRun->run_time)->addSeconds($timeToNewDelivery);
        //$currentRunTime = $vehicleRun
        if($runTime->isBefore(Carbon::parse($slot->end))){
           return 1; 
        }else if($timeToNewDelivery/60 > 10){
            return 3;
        }else if($vanCount > $vehicleRun->count()){
            return 1;
        }
        return 1;
    }else{
        return 1;
    }
}*/
function checkSlot($id, $date){
    $slot = Slot::find($id);
    $storePostCode = Store::first()->postCode;
    $userSlot = SlotBooking::where('slot_id', $slot->id)->where('date', $date->format('Y-m-d'))->where('user_id', Auth::id())->first();
    $bookedSlots = SlotBooking::where('date', $date->format('Y-m-d'))->where('slot_id', $slot->id)->get();
    if ($userSlot != null){
        //If user has a booked slot
        if($userSlot->status == 1){
            //return 2;
            return view('shop.checkout.slots.booked');
        }else{
           // return 1;
           return view('shop.checkout.slots.available')->with([
               'price'=> 1,
               'id' => $id,
               'day' => getDayID($date)
           ]);
        }
    }
    if($bookedSlots->count() == 4){
        //If to many deliveries per hour
        return view('shop.checkout.slots.unavailable');
    }else if($bookedSlots->count() > 1){
        $postCodes = array();
        foreach($bookedSlots as $bookedSlot){
            array_push($postCodes,$bookedSlot->post_code);
        }
        asort($postCodes);
        //dump($postCodes);
        $routeTime = getRouteTime(end($postCodes), User::find(Auth::id())->address->post_code) * 60;
        if($routeTime >= 10){
            return view('shop.checkout.slots.unavailable');
        }elseif ($routeTime >= 8 && $routeTime <= 10){
            return view('shop.checkout.slots.available')->with([
                'price'=> 8,
               'id' => $id,
               'day' => $date
            ]);
        }elseif ($routeTime >= 6 && $routeTime <= 8){
            return view('shop.checkout.slots.available')->with([
                'price'=> 6,
               'id' => $id,
               'day' => $date
            ]);
        }elseif ($routeTime >= 4 && $routeTime <= 6){
            return view('shop.checkout.slots.available')->with([
                'price'=> 4,
               'id' => $id,
               'day' => $date
            ]);
        }elseif ($routeTime >= 2 && $routeTime <= 4){
            return view('shop.checkout.slots.available')->with([
                'price'=> 2,
               'id' => $id,
               'day' => $date
            ]);
        }else{
            return view('shop.checkout.slots.available')->with([
                'price'=> 1,
               'id' => $id,
               'day' => $date
            ]);
        }
        //return 3;
    }else{
        //return 1;
        return view('shop.checkout.slots.available')->with([
            'price'=> 1,
               'id' => $id,
               'day' => $date
        ]);
    }
}

function getRun($date, $startTime){
    $schedules = DeliverySchedule::where('day', getDayID($date))->get();
    //$timeToAdd = carbon::parse($endTime)->diffInSeconds(carbon::parse($startTime)) / 2;
    //$halfWaySlot = carbon::parse($startTime)->addSeconds($timeToAdd); 
    foreach($schedules as $schedule){
        if(Carbon::parse($startTime)->between(Carbon::parse($schedule->start), Carbon::parse($schedule->end), true)){
            return $schedule->run;
        }
    }
}
function getRunStartTime($date, $startTime, $endTime){
    $schedules = DeliverySchedule::where('day', getDayID($date))->get();
    $timeToAdd = carbon::parse($endTime)->diffInSeconds(carbon::parse($startTime)) / 2;
    $halfWaySlot = carbon::parse($startTime)->addSeconds($timeToAdd);
        
    foreach($schedules as $schedule){
        if($halfWaySlot->between(Carbon::parse($schedule->start), Carbon::parse($schedule->end), true)){
            return $schedule->start;
        }
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

function newRun($slot, $run, $date, $userPostCode){
    $vehicleRun = new VehicleRuns();
    $vehicleRun->run = $run;
    $vehicleRun->deliveryDate = $date;
    $vehicleRun->deliveryCount = 1;
    $vehicleRun->lastPostCode = User::find(Auth::id())->address->post_code;
    $vehicleRun->currentRunTime = Carbon::parse(getRunStartTime($date, $slot->start, $slot->end))->addSeconds(getRouteTime(Store::find(1)->postCode, $userPostCode)); 
    $vehicleRun->save();
}

//Deliveries
function getDistanceMiles($startPostCode, $endPostCode){

    if($startPostCode == $endPostCode){
        return 0;
    }

    $client = new \GuzzleHttp\Client();

    $start_request = $client->get('https://api.openrouteservice.org/geocode/search/structured?api_key=' . env('MapKey') . '&postalcode=' . $startPostCode);
    $end_request = $client->get('https://api.openrouteservice.org/geocode/search/structured?api_key=' . env('MapKey') . '&postalcode=' . $endPostCode);
        
    $start_response = json_decode($start_request->getBody(),true);
    $end_response = json_decode($end_request->getBody(),true);

    $start_long = $start_response['bbox'][1];
    //dd($start_long);
    $start_lat = $start_response['features'][0]['geometry']['coordinates'][1];

    $end_long = $end_response['features'][0]['geometry']['coordinates'][0];
    $end_lat = $end_response['features'][0]['geometry']['coordinates'][1];

    $route_request = $client->get('https://api.openrouteservice.org/v2/directions/driving-car?api_key=5b3ce3597851110001cf624864fbb490590e46bcbdcb34db2222f284&start='.$start_long.','.$start_lat.'&end='.$end_long.','.$end_lat);

    //dd('https://api.openrouteservice.org/v2/directions/driving-car?api_key=5b3ce3597851110001cf624864fbb490590e46bcbdcb34db2222f284&start='.$start_long.','.$start_lat.'&end='.$end_long.','.$end_lat);

    $route = json_decode($route_request->getBody(),true);

    $distance_km = $route['features'][0]['properties']['summary']['distance'] / 1000;

    return $distance_km * 0.621371;
}
/* OpenRouteService */
function OldgetRouteTime($startPostCode, $endPostCode){

    if($startPostCode == $endPostCode){
        return 0;
    }

    $client = new \GuzzleHttp\Client();


    $start_request = $client->get('https://api.openrouteservice.org/geocode/search/structured?api_key=' . config('services.map.key') . '&postalcode=' . $startPostCode);
    $end_request = $client->get('https://api.openrouteservice.org/geocode/search/structured?api_key=' . config('services.map.key') . '&postalcode=' . $endPostCode);


    $start_response = json_decode($start_request->getBody(),true);
    $end_response = json_decode($end_request->getBody(),true);



    $start_long = $start_response['features'][0]['geometry']['coordinates'][0];
    $start_lat = $start_response['features'][0]['geometry']['coordinates'][1];

    $end_long = $end_response['features'][0]['geometry']['coordinates'][0];
    $end_lat = $end_response['features'][0]['geometry']['coordinates'][1];

    $route_request = $client->get('https://api.openrouteservice.org/v2/directions/driving-car?api_key=5b3ce3597851110001cf624864fbb490590e46bcbdcb34db2222f284&start='.$start_long.','.$start_lat.'&end='.$end_long.','.$end_lat);

    //dump($startPostCode . "  ---  ", $endPostCode);
    //dump($start_long.','.$start_lat.'   '.$end_long.','.$end_lat);

    $route = json_decode($route_request->getBody(),true);

    //dd($route);

    $timeSeconds = $route['features'][0]['properties']['summary']['duration'];

    return $timeSeconds;
}

function calculateRoute($postCodes){
    $client = new \GuzzleHttp\Client();

    $coordinatesString = null;
    $counter = 0;
    foreach($postCodes as $postCode){
        $coordinates = $client->get('https://api.openrouteservice.org/geocode/search/structured?api_key=' . config('services.map.key') . '&postalcode=' . $postCode);
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
        $coordinates = $client->get('https://api.openrouteservice.org/geocode/search/structured?api_key=' . config('services.map.key') . '&postalcode=' . $postCode);
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

    dd($coordinatesString);
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

    return $result;

    //return round($result['routes'][0]['segments'][0]['distance'] * 0.000621371) . " Miles" . ' - ' . gmdate("H:i:s", ($result['routes'][0]['segments'][0]['duration']));
    ;
    
}
// GCP 
function getRouteTime($startPostCode, $endPostCode){

    if($startPostCode == $endPostCode){
        return 0;
    }

    if(Cache::get($startPostCode.'-'.$endPostCode) == null){

        $route_request = Http::get('https://maps.googleapis.com/maps/api/directions/json?origin=' . $startPostCode .'&destination=' . $endPostCode . '&key='. config('services.GCP.key'));

        //dd('https://maps.googleapis.com/maps/api/directions/json?origin=' . $startPostCode .'&destination=' . $endPostCode . '&key='. config('services.GCP.key'));

        $route = json_decode($route_request->getBody(),true);

        Cache::forever($startPostCode.'-'.$endPostCode, $route);

        $timeSeconds = $route['routes'][0]['legs'][0]['duration']['value'];

    }else{
        $route = Cache::get($startPostCode.'-'.$endPostCode);
        //dd($route);
        $timeSeconds = $route['routes'][0]['legs'][0]['duration']['value'];
        //dump("Cached Response!");
    }
    return $timeSeconds;
}

function addToDelivery($orderID){
    $order = Order::find($orderID)->with('slotBooking')->first();
    $vehicleRuns = VehicleRuns::where('run', getRun($order->slotBooking->date,$order->slotBooking->slot->start))->where('deliveryDate', $order->slotBooking->date)->get();
    $postCodes = [];
    foreach($vehicleRuns as $run){
        array_push($postCodes, $run->last_postcode);
    }
    arsort($postCodes);
    $vehicleRun = $vehicleRuns->where('last_postcode', $postCodes[0])->first();
    $runTime = Carbon::parse($vehicleRun->run_time)->addSecond(getRouteTime($vehicleRun->last_postcode, $order->slotBooking->post_code));
    if($runTime->isBefore(carbon::parse($order->slotBooking->slot->end))){
        $vehicleRun->last_postcode = $order->slotBooking->post_code;
        $vehicleRun->run_time = $runTime;
        $vehicleRun->save();
    }
    

}