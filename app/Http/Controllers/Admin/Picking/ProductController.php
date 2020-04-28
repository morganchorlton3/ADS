<?php

namespace App\Http\Controllers\Admin\Picking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\ProductPicking;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todaysOrders = Order::where('deliveryDate', Carbon::now()->format('Y-m-d'))->with('orderProducts')->get();
        $pickingList = collect(new ProductPicking());
        foreach($todaysOrders as $todaysOrder){
            $orderID = $todaysOrder->id;
            foreach($todaysOrder->orderProducts as $orderedProduct){
                for($i = $orderedProduct->quantity; $i > 0; $i--){
                    $pick = new ProductPicking();
                    $pick->productID = $orderedProduct->id;
                    $pick->orderID = $orderID;
                    $pick->productLocationID  = $orderedProduct->product->ProductLocation->id;
                    $pickingList->add($pick);
                }
            }
        }
        dd($pickingList->take(10));
        return view('admin.picking.index');
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
