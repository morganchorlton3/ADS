<?php

namespace App\Http\Controllers\Admin;

use App\Deliveries;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Run;
use App\VehicleRun;
use Illuminate\Support\Carbon;
use PDF;
use App\Delivery;
use App\Staff;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicleRuns = VehicleRun::where('deliveryDate', Carbon::now()->format('Y-m-d'))->with('driver')->get();
        $drivers = Staff::where('job_id', 1)->get();
        return view('admin.deliveries.view')->with([
            'vehicleRuns' => $vehicleRuns,
            'drivers' => $drivers
        ]);
    }
    public function updateDriver(Request $request){
        //dd($request);
        $vehicleRun = VehicleRun::find($request->id)->first();
        $vehicleRun->driverID = $request->driver;
        $vehicleRun->save();
        return back()->with('toast_success', 'Driver Assigned');
    }
}
