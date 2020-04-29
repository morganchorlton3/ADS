<?php

namespace App\Http\Controllers\Admin\Picking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\PickingRun;
use App\PickingRunItem;
use App\ProductPicking;
use Illuminate\Support\Carbon;
use Cache;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkorder = PickingRun::all();
            if($checkorder->count() == 0){
            $todaysOrders = Order::where('deliveryDate', Carbon::now()->format('Y-m-d'))->with('orderProducts')->get();
            $counter = 0;
            foreach($todaysOrders as $todaysOrder){
                $orderID = $todaysOrder->id;
                $pickingRunID = 0;
                foreach($todaysOrder->orderProducts as $orderedProduct){
                    $counter++;
                    $productPicking = new ProductPicking();
                    $productPicking->productID = $orderedProduct->id;
                    $productPicking->orderID = $orderID;
                    $productPicking->quantity = $orderedProduct->quantity;
                    $productPicking->save();
                }
            }    
            $pickingRunCount = ProductPicking::count() / 40;
            for($i = $pickingRunCount; $i > 0; $i--){
                $pickingRun = new PickingRun();
                $pickingRun->save();
                $pickingItems = ProductPicking::where('runID', null)->take(40)->get();
                foreach($pickingItems as $pickingItem){
                    $pickingItem->runID = $pickingRun->id;
                    $pickingItem->save();
                }
            }     
        }
        $itemCount = ProductPicking::count();   
        $pickingRuns = PickingRun::all();
        return view('admin.picking.index')->with([
            'pickingCount' => $itemCount,
            'pickingRuns' => $pickingRuns
        ]);
    }

    public function oldIndex()
    {
        $result = Cache::get('picking.today');
        if($result == null){
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
            //Sort Picking List
            $pickingList->sortBy('productLocationID');
            //Save to Cache
            Cache::remember('picking.today', 86400, function () use ($pickingList) {
                return $pickingList;
            });
        }else{
            $pickingList = $result;
        }
        $pickingCount = $pickingList->count();
        return view('admin.picking.index')->with('pickingCount', $pickingCount);
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
