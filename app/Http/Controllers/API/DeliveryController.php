<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slot;
use App\VehicleRuns;
use App\DeliverySchedule;
use Carbon\Carbon;
use App\User;
use App\Order;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slots = Slot::all();
        $deliverySchedule = DeliverySchedule::find(1);
        $start = Carbon::parse($deliverySchedule->start);
        $end = Carbon::parse($deliverySchedule->end);
        $runs = collect(new VehicleRuns());
        $orders = [];
        for($i = 1; $i <= 4; $i++){
            $slot = $slots->find($i);
            if(Carbon::parse($slot->end)->isBetween($start, $end)){
                $vehicleRuns = VehicleRuns::where('deliveryDate', Carbon::now()->format('Y-m-d'))->where('slotID', $i)->where('run', 1)->with('Deliveries')->get();
                foreach($vehicleRuns as $run){
                    foreach($run->deliveries as $delivery){
                        $runs->add($delivery);
                        $order = Order::find($delivery->order);
                        $user = User::find($order->userID);
                        $geocode = getLongLat($user->address->post_code)['results'][0]['geometry']['location'];
                        $orders[] = [
                            'name' => $user->title . ' ' . $user->first_name . ' ' . $user->last_name,
                            'postCode' => $user->address->post_code,
                            'long' => $geocode['lng'],
                            'lat' => $geocode['lat'],
                            'addressLine1' => $user->address->address_line_1 . ', '. $user->address->address_line_2 . ', '. $user->address->address_line_3,
                            'deliverySlot' => $order->SlotBooking->Slot->start . ' - ' . $order->SlotBooking->Slot->end,
                            'ambientTrays' => '3',
                            'chilledTrays' => '2',
                            'frozenTrays' => '1',
                            'itemCount' => $order->itemCount,
                        ];
                    }
                }
            }
            
        }
        return response()->json($orders);
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
