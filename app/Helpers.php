<?php
use App\Category;
use App\User;
use App\Product;
use App\Jobs;

function checkPrimaryCat($primary){
    if($primary == NULL){
        return "No Primary Selected";
    }else{
        return Category::find($primary)->name;
    }
}

function getUserCount(){
    return User::all()->count();
}

function getProductCount(){
    return Product::all()->count();
}

function getJobRole($id){
    return Jobs::find($id)->title;
}