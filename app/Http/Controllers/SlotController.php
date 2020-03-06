<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Deliveries;
use App\DeliverySchedule;
use App\DeliveryVehicle;
use App\User;
use App\Slot;
use App\SlotBooking;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Store;
use App\VehicleRuns;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $parentCategories = Category::where('parent_id',NULL)->get();
        $slots = Slot::all();
        return view('shop.checkout.slot')->with([
            'products' => $products,
            'slots' => $slots,
            'parentCategories' => $parentCategories
        ]);
    }

    public function bookSlot($id, $date){
        $date = Carbon::parse($date);
        $slot = Slot::find($id);
        $run = 0;
        $vanCount = DeliveryVehicle::count();
        $userBooking = SlotBooking::where('user_id', Auth::id());
        if($userBooking->count() > 0){
            $userBooking->delete();
        }
        $booking = new SlotBooking();
        $booking->user_id = Auth::id();
        $booking->slot_id = $id;
        $booking->post_code = User::find(Auth::id())->address->post_code;
        $booking->date = $date;
        $booking->save();

        $schedules = DeliverySchedule::where('day', getDayID($date))->get();
        $timeToAdd = carbon::parse($slot->end)->diffInSeconds(carbon::parse($slot->start)) / 2;
        $halfWaySlot = carbon::parse($slot->start)->addSeconds($timeToAdd);

        foreach($schedules as $schedule){
            if($halfWaySlot->between(Carbon::parse($schedule->start), Carbon::parse($schedule->end), true)){
                $run = $schedule->run;
            }else{
                break;
            }
        }
        $vehicleRuns = VehicleRuns::where('deliveryDate', $date->format('Y:m:d'))->where('run', $run)->get();
        if($vehicleRuns->count() == 0){
            $vehicleRun = new VehicleRuns();
            $vehicleRun->run = $run;
            $vehicleRun->deliveryDate = $date;
            $vehicleRun->deliveryCount = 1;
            $vehicleRun->lastPostCode = User::find(Auth::id())->address->post_code;
            $vehicleRun->save();
            $delivery = new Deliveries();
            $delivery->userID = Auth::id();
            $delivery->slotID = $id;
            $delivery->deliveryDate = $date;
            $delivery->vehicleRun = $vehicleRun->id;
            $delivery->save();
        }
        foreach($vehicleRuns as $vehicleRun){
            if($vanCount >= $vehicleRun->count()){
                if($vehicleRun->count() > 0){
                    //Add delivery to vehicle profile
                    if(getDistanceMiles($vehicleRun->lastPostCode,User::find(Auth::id())->address->post_code ) < 5){
                        $vehicleRun->lastPostCode = User::find(Auth::id())->address->post_code;
                        //Create Delivery
                        $delivery = new Deliveries();
                        $delivery->userID = Auth::id();
                        $delivery->slotID = $id;
                        $delivery->deliveryDate = $date;
                        $delivery->vehicleRun = $vehicleRun->id;
                        $delivery->save();
                        
                        $vehicleRun->deliveryCount = Deliveries::where('vehicleRun', $vehicleRun->id)->count();
                        $vehicleRun->save();
                    //Creates a new vehicle profile because next drop is to far awway
                    }else{
                        newRun($run, $date);
                        $delivery = new Deliveries();
                        $delivery->userID = Auth::id();
                        $delivery->slotID = $id;
                        $delivery->deliveryDate = $date;
                        $delivery->vehicleRun = $vehicleRun->id;
                        $delivery->save();
                    }
                    //Creates first profile for specific date
                }elseif($vehicleRun->count() == 0){
                    newRun($run, $date);
                }
            }
        }
        return back()->with('success', 'You Have booked the time slot');
    }
}
