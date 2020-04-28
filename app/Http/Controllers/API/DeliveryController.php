<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slot;
use App\VehicleRun;
use App\DeliverySchedule;
use App\Mail\OrderDelivered;
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
        $run = VehicleRun::where('driverID', request('id') )->where('status', 1)->where('deliveryDate', Carbon::now()->format('Y-m-d'))->with('deliveries.order.user')->first();
        if($run == null){
            return response()->json([
                'message' => 'No Trip Assigned',
            ]);
        }
        $counter = 0;
        foreach($run->deliveries as $delivery){
            $order = Order::find($delivery->order);
            $user = User::with('address')->find($order->user->id);
            $geocode = getLongLat($user->address->post_code)['results'][0]['geometry']['location'];
            $orders[] = [
                'orderCounter' => $counter,
                'orderid' => $order->id,
                'runID' => $run->id,
                'userID' => $user->id,
                'name' => $user->title . ' ' . $user->first_name . ' ' . $user->last_name,
                'phoneNumber' => $user->phone_number,
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

    public function save(Request $request)
    {
        $user = null;
        foreach($request->json()->all() as $order){
            $updateOrder =  Order::find($order['id']);
            $updateOrder->status = 2;
            $updateOrder->save();
            $user = $order->id; 
        }
        $run = VehicleRun::where('deliverySchedule', $request->id)->first();
        $run->status = 2;
        $run->save();
        Mail::to($user->email)->send(new OrderDelivered($user));
        return response('Trip Saved', 200)
        ->header('Content-Type', 'text/plain');
    }
}
