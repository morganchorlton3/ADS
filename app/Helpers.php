<?php
use Carbon\Carbon;
use App\Category;
use App\User;
use App\Product;
use App\Jobs;
use App\Staff;
use App\Orders;
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
    return Orders::all()->count();
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
    return Jobs::find($id)->title;
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
    //dd($vanCount);
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
    }else if($bookingCount >= 2){
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