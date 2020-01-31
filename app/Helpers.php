<?php
use App\Category;
use App\User;

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