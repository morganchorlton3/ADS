<?php
use App\Category;
use App\User;
use App\Product;
use App\Jobs;
//Users
function getUserCount(){
    return User::all()->count();
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