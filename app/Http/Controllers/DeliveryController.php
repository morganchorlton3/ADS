<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\DeliverySchedule;
use Illuminate\Http\Request;

use App\SlotBooking;
use Carbon\Carbon;
use App\DeliveryVehicleDeliveries;
use App\Slot;
use App\VehicleRun;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$deliveries = SlotBooking::where('date', Carbon::now()->addDays(2)->format('y-m-d'))->where('slot_id', 5)->get();

        $vehicleRuns = VehicleRun::where('deliveryDate', Carbon::now()->format('Y-m-d'))->get();

        return view('admin.deliveries.deliveries')->with([
            'vehicleRuns' => $vehicleRuns
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

    public static function arrangeDelivery(){
        $schedule = DeliverySchedule::first();
        $todaysSlots = SlotBooking::where('date', Carbon::now()->format('Y-m-d'))->with('slot')->get();
        $slots = collect(new Slot());
        foreach($todaysSlots as $todaysSlot){
            $scheduleStart = Carbon::parse($schedule->start);
            $scheduleEnd = Carbon::parse($schedule->end);
            $slotBookingTime = Carbon::parse($todaysSlot->slot->start);
            if($slotBookingTime->isBefore($scheduleEnd)){
               $slots->add($todaysSlot);
            }
        }
        //Soprting By ID
        $sortedByID = $slots->sortBy('post_code')->sortBy('slot_id');

        
        $sorted = $sortedByID->where('slot_id', );

        dd($sorted);

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
