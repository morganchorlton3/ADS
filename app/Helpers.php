<?php
use App\Category;

function checkPrimaryCat($primary){
    if($primary == 0){
        return "No Primary Selected";
    }else{
        return Category::find($primary)->cat;
    }
}