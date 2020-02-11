<?php
use Carbon\Carbon;
use App\Category;
use App\User;
use App\Product;
use App\Jobs;
use App\Staff;
use App\Orders;

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
function checkSlot($day){
    if($day == 7){
        return false;
    }else{
        return true;
    }
}
function SlotDate($id){
    $date = Carbon::now();
    $monday = $date->startOfWeek();
    if($id == 1){
        return $monday->format('d');
    }else if($id == 2){
        return $monday->addDays(1)->format('d');
    }else if($id == 3){
        return $monday->addDays(2)->format('d');
    }else if($id == 4){
        return $monday->addDays(3)->format('d');
    }else if($id == 5){
        return $monday->addDays(4)->format('d');
    }else if($id == 6){
        return $monday->addDays(5)->format('d');
    }else if($id == 7){
        return $monday->addDays(6)->format('d');
    }
}