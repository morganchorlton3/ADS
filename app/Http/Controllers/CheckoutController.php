<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Auth;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cart;
use Carbon\Carbon;
use App\Order;
use App\OrderProducts;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentCategories = Category::where('parent_id',NULL)->get();
        $user = Auth::user();
        return view('shop.checkout.payment')->with([
            'parentCategories' => $parentCategories,
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->userId = Auth::id();
        $order->placedDate = Carbon::now();
        $order->totalWeight = 22.2;
        $order->itemCount = Cart::count();
        $order->total = Cart::total();
        $order->status = 1;
        $cart = Cart::get();
        $order->save();
        foreach($cart as $item){
            $product = new OrderProducts();
            $product->orderID = $order->id;
            $product->productID = $item['id'];
            $product->quantity = $item['quantity'];
            $product->save();
        }
        try{
            $charge = Stripe::charges()->create([
                'amount' => formatPrice(CartTotal()),
                'currency' => 'GBP',
                'description' => 'Advanced Delivery System Order',
                'receipt_email' => Auth::user()->email,
                'source' => $request->stripeToken,
                'metadata'=> [

                ],
              ]);

            //Clear Cart
            Cart::clearCart();
            return redirect()->route('checkout.success')->with([
                'success_toast'=> "Thankyou for your order!",
            ]);

        }catch(Exception $e){
            $order->status = 0;
            $order->save();
            return redirect()->route('checkout.success')->with([
                'error_toast'=> "Sorry Your payment hasnt gone through please try again",
            ]);
        }
    }

    public function addOrderedProducts($orderID){
        $cart = Cart::get();
        foreach($cart as $item){
            $product = new OrderProducts();
            $product->orderID = $orderID;
            $product->productID = $item['id'];
            $product->quantity = $item['quantity'];
            $product->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
