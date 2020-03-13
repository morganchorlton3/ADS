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
use App\Address;
use App\RunHours;
Use Alert;

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
        $address = Address::where('user_id', Auth::id())->first();
        $parentCategories = Category::where('parent_id',NULL)->get();
        $slots = Slot::all();
        $userSlot = SlotBooking::latest()->where('user_id', Auth::id())->first();
        if($userSlot != null){
            if($userSlot->status == 3){
                Alert::alert('Slot Expired', 'Your slot has expired, please book another slot', 'error');
            }
        }
        return view('shop.checkout.slot')->with([
            'products' => $products,
            'slots' => $slots,
            'parentCategories' => $parentCategories,
            'address' => $address
        ]);
    }

    public function bookSlot($id, $date){
        $date = Carbon::parse($date);
        $slot = Slot::find($id);
        $run = 0;
        $userPostCode = User::find(Auth::id())->address->post_code;
        $vanCount = DeliveryVehicle::count();
        $userBooking = SlotBooking::where('user_id', Auth::id());
        if($userBooking->count() > 0){
            $userBooking->delete();
        }
        $booking = new SlotBooking();
        $booking->user_id = Auth::id();
        $booking->slot_id = $id;
        $booking->post_code = $userPostCode;
        $booking->date = $date;
        $booking->status = 1;
        $booking->expiration = Carbon::now()->addHours(2)->format('H:m:s');
        $booking->save();

        //$run = getRun($date, $slot->start, $slot->end);



        //$vehicleRuns = VehicleRuns::where('deliveryDate', $date->format('Y:m:d'))->where('run', $run)->get();


        //If there is no run for that day create a new run
        /*if($vehicleRuns->count() == 0){
            $vehicleRun = new VehicleRuns();
            $vehicleRun->run = $run;
            $vehicleRun->deliveryDate = $date;
            $vehicleRun->deliveryCount = 1;
            $vehicleRun->lastPostCode = $userPostCode;
            $vehicleRun->currentRunTime = Carbon::parse(getRunStartTime($date, $slot->start, $slot->end))->addSeconds(getRouteTime(Store::find(1)->postCode, $userPostCode)); 
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
                //Add delivery to vehicle profile
                if(getRouteTime($vehicleRun->lastPostCode, $userPostCode)/60 < 15){
                    $vehicleRun->lastPostCode = $userPostCode;
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
                    newRun($slot, $run, $date, $userPostCode);
                    $delivery = new Deliveries();
                    $delivery->userID = Auth::id();
                    $delivery->slotID = $id;
                    $delivery->deliveryDate = $date;
                    $delivery->vehicleRun = $vehicleRun->id;
                    $delivery->save();
                }
                //Creates first profile for specific date
            }elseif($vehicleRun->count() == 0){
                newRun($slot, $run, $date, $userPostCode);
            }
        }*/
        return back()->with('success', 'You Have booked the time slot');
    }
}
