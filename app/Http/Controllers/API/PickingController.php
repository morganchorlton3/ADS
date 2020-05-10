<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\PickingRun;
use App\VehicleRun;
use Illuminate\Http\Request;
use Cache;

class PickingController extends Controller
{
    public function getPicking(){
        $run = PickingRun::where('picker', null)->with('productPicking.products.productLocation')->first();
        $run->picker = request('id');
        $run->save();
        $pickingRun =$run->productPicking->sortByDesc('products.product_location.aisle');
        return response()->json($pickingRun);
    }
}
