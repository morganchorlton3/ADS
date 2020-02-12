<?php

namespace App\Http\Controllers;

use App\OrdersProducts;
use Illuminate\Http\Request;
use Session;
use App\Orders;
use Auth;
use App\SlotBooking;
use DB;
use App\Address;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Session::get('cart');
        $item_count = 0;
        $total = 0;
        foreach ($cart as $item) {
            $item_count = $item_count  + 1 * $item['quantity'];
            $total = $total + ($item['price'] * $item['quantity']);
        }
        $order = new Orders();
        $order->user_id = Auth::user()->id;
        $order->slot_id = SlotBooking::where('user_id', Auth::id())->pluck('slot_id')[0];
        $order->address_id = Address::where('user_id', Auth::id())->pluck('id')[0];
        $order->note = "This is a note test";
        $order->total_weight = 22.5;
        $order->item_count = $item_count;
        $order->total = $total;
        $order->status = 1;
        $order->save();

        $order_id = DB::getPdo()->lastInsertId();

        foreach ($cart as $item) {
            $total_price = $item['price'] * $item['quantity'];
            $qty = $item['quantity'];
            $OrderPro = new OrdersProducts;
            $OrderPro->order_id = $order_id;
            $OrderPro->product_id = $item['product_id'];
            $OrderPro->product_name = $item['name'];
            $OrderPro->product_price = $item['price'];
            $OrderPro->product_quantity = $item['quantity'];
            $OrderPro->product_barcode = $item['barcode'];
            $OrderPro->save();
        }

        Session::forget('cart');

    }

    public function NewOrder()
    {
        $cart = Session::get('cart');
        $item_count = 0;
        $total = 0;
        foreach ($cart as $item) {
            $item_count = 1 * $item['quantity'];
            $total = $total + $item['price'];
        }
        dd($total . ' / ' . $item_count);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrdersProducts  $ordersProducts
     * @return \Illuminate\Http\Response
     */
    public function show(OrdersProducts $ordersProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrdersProducts  $ordersProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(OrdersProducts $ordersProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrdersProducts  $ordersProducts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdersProducts $ordersProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrdersProducts  $ordersProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrdersProducts $ordersProducts)
    {
        //
    }
}
