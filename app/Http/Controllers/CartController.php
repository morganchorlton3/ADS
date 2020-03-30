<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Alert;
use UxWeb\SweetAlert\SweetAlert;

class CartController extends Controller
{
    public function addToCart($id){
        $product = Product::find($id);
        if($product->productLocation->stock >= 0){
            //Alert::alert('Item Out of stock', 'This item is now out of stock sorry for any inconvenience', 'error');

            SweetAlert::error('Item Out of stock', 'This item is now out of stock sorry for any inconvenience');
        }
 
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
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
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

    public function clearCart(){
        session()->forget('cart');
    }
    public function getTotal(){
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

    public function getFormatedTotal(){
        $cart = session()->get('cart');
        //dd($cart);
        if($cart == null){
            return "£0.00";
        }
        $total = 0;
        foreach($cart as $item){
            $itemPrice = $item['price'] * $item['quantity'];
            $total = $total + $itemPrice;
        }
        if($total < 1){
            return substr(number_format($total, 2) . "p", -3);
        }else{
            return "£" . number_format($total, 2);
        }
        return $total;
    }
}
