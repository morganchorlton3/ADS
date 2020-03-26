<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller; 
use App\Product;

class ProductController extends Controller
{
    function getPrice(){
        $product = Product::where('barcode',request('barcode'))->first();
        if($product == null){
            return response()->json([
                'name' => 'error'
            ]);
        }
        return $product;  
    }   

    function descStock(){
        $product = Product::where('barcode',request('barcode'))->first();
        if($product->productLocation->stock != 0){
            $product->productLocation->stock = $product->productLocation->stock - 1;
        }
        $product->productLocation->save();
        return $product->productLocation->stock;
    }
}
