<?php

namespace App\Http\Controllers\Admin;

use App\DeliverySchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeliveryScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shifts = DeliverySchedule::all();
        return view('admin.deliveries.DeliverySchedule')->with([
            'shifts' => $shifts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'day' => ['required'],
            'start' => ['required'],
            'end' => ['required'],
        ]);

        $schedule = new DeliverySchedule;
        $schedule->day = $request->day;
        $schedule->start = $request->start;
        $schedule->end = $request->end;
        $schedule->save();

        return back()->with('success', 'Delivery schedule saved');
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
    public function delete(Request $request)
    {
        dd("hnbfeijhf");
    }
}
