<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DeliveryVehicle;

class DeliveryVehicleController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vans = DeliveryVehicle::all();
        return view('admin.deliveries.vehicles')->with('vans', $vans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $vehicle = new DeliveryVehicle();
        $vehicle->registration = $request->registration;
        $vehicle->mileage = $request->mileage;
        $vehicle->capacity = $request->capacity;
        $vehicle->save();

        return back()->with('success', 'Van Created!');
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
     * @param  \App\DriverSchedule  $driverSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(DriverSchedule $driverSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DriverSchedule  $driverSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(DriverSchedule $driverSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DriverSchedule  $driverSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DriverSchedule $driverSchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DriverSchedule  $driverSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriverSchedule $driverSchedule)
    {
        //
    }
}
