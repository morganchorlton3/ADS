<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{
    public function addToCart($id){
        $product = Product::find($id);
 
        if(!$product) {
 
            abort(404);
 
        }
 
        $cart = session()->get('cart');
 
        // if cart is empty then this the first product
        if(!$cart) {
 
            $cart = [
                    $id => [
                        "product_id" => $id,
                        "name" => $product->name,
                        "quantity" => 1,
                        "barcode" => $product->barcode,
                        "price" => $product->price,
                    ]
            ];
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('toast_success', 'Product added to cart successfully!');
        }
 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
 
            $cart[$id]['quantity']++;
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('toast_success', 'Product added to cart successfully!');
 
        }
 
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "product_id" => $id,
            "name" => $product->name,
            "quantity" => 1,
            "barcode" => $product->barcode,
            "price" => $product->price,
        ];
 
        session()->put('cart', $cart);
 
        return redirect()->back()->with('toast_success', 'Product added to cart successfully!');
    }

    public function increaseQuantity($id)
    {
        $cart = session()->get('cart');

        $cart[$id]['quantity']++;
 
        session()->put('cart', $cart);
 
        return redirect()->back()->with('toast_success', 'Product quantity updated!');
    }

    public function decreaseQuantity($id)
    {
        $cart = session()->get('cart');

        if($cart[$id]['quantity'] == 1){
            unset($cart[$id]);
        }else{
            $cart[$id]['quantity']--;
        }
 
        session()->put('cart', $cart);
 
        return redirect()->back()->with('toast_success', 'Product quantity updated!');
    }

    public function remove($id)
    {
 
        $cart = session()->get('cart');
 
        if(isset($cart[$id])) {
 
            unset($cart[$id]);
 
            session()->put('cart', $cart);
        }
 
        return redirect()->back()->with('toast_success', 'Product removed from cart');
    }

}
