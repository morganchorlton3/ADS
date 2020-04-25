<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slot;
use App\VehicleRun;
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
        $run = VehicleRun::where('run', 1)->where('deliveryDate', Carbon::now()->format('Y-m-d'))->with('deliveries.order.user')->first();
        $counter = 0;
        foreach($run->deliveries as $delivery){
            $order = Order::find($delivery->order);
            $user = User::with('address')->find($order->user->id);
            $geocode = getLongLat($user->address->post_code)['results'][0]['geometry']['location'];
            $orders[] = [
                'id' => $counter,
                'name' => $user->title . ' ' . $user->first_name . ' ' . $user->last_name,
                'postCode' => $user->address->post_code,
                'long' => $geocode['lng'],
                'lat' => $geocode['lat'],
                'addressLine1' => $user->address->address_line_1,
                'addressLine2' => $user->address->address_line_2,
                'amTray' => 3,
                'chTray' => 2,
                'fzTray' => 1,
            ];
            $counter++;
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
