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
        $run = PickingRun::where('picker', null)->with('productPicking.products.Productlocation')->first();
        $run->picker = request('id');
        $run->save();
        return response()->json($run->productPicking);
    }
}
