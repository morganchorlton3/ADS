<?php

namespace App\Http\Controllers;

use App\OrderProducts;
use Illuminate\Http\Request;
use Session;
use App\Order;
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
        $orders = Orders::with('address')->get();
        return view('admin.orders.index')->with('orders', $orders);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
