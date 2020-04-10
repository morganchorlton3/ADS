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
use App\Store;
use App\VehicleRuns;
use App\Address;
use App\RunHours;
Use Alert;
use App\SlotAvailability;
use Illuminate\Support\Carbon;

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
        $slotAvailability = collect(new SlotAvailability());
        //Loops through the days displayed (usually 5)
        for ($x = 0; $x < 5; $x++) {
            $date = Carbon::now()->addDays($x)->format('Y-m-d');
            foreach($slots as $slot){
                $bookedSlots = $slot->slotBooking->where('date', $date);
                $availability = new SlotAvailability();
                if($bookedSlots->where('user_id', Auth::id())->where('status', 1)->count() == 1){
                    $availability->slotID = $slot->id;
                    $availability->price = 5;
                    $availability->status = 2;
                }else if($bookedSlots->count() == 0){
                    $availability->slotID = $slot->id;
                    $availability->price = 5;
                    $availability->status = 1;
                }else if($bookedSlots->count() < 4 && $bookedSlots->count() > 0){
                    $routeTime = getRouteTime($bookedSlots->sortByDesc('post_code')->pluck('post_code')[0], User::find(Auth::id())->address->post_code) / 60;
                    if($routeTime < 10 && $routeTime > 6 ){
                        $availability->slotID = $slot->id;
                        $availability->price = 5;
                        $availability->status = 1;
                    }else if($routeTime < 6 && $routeTime > 5){
                        $availability->slotID = $slot->id;
                        $availability->price = 4;
                        $availability->status = 1;
                    }else if($routeTime < 4 && $routeTime > 2){
                        $availability->slotID = $slot->id;
                        $availability->price = 2.50;
                        $availability->status = 1;
                    }else if($routeTime < 2 && $routeTime > 1){
                        $availability->slotID = $slot->id;
                        $availability->price = 1;
                        $availability->status = 1;
                    }else{
                        $availability->slotID = $slot->id;
                        $availability->price = 1;
                        $availability->status = 1;
                    }
                }else{
                    $availability->slotID = $slot->id;
                    $availability->price = 5;
                    $availability->status = 1;
                }
                $availability->date = $date;
                $slotAvailability->add($availability);                
            }
        }
        return view('shop.checkout.slot')->with([
            'products' => $products,
            'slots' => $slots,
            'slotAvailability' => $slotAvailability,
            'slotBooking' => $userSlot,
            'parentCategories' => $parentCategories,
            'address' => $address
        ]);
    }

    public function bookSlot($id, $date){
        $date = Carbon::parse($date);
        $slot = Slot::find($id);
        $run = 0;
        $userPostCode = User::find(Auth::id())->address->post_code;
        $storePostCode = Store::first()->postCode;
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

        $run = getRun($date, $slot->start, $slot->end);
        //dd($run);
        /*$vehicleRuns = VehicleRuns::where('deliveryDate', $date->format('Y:m:d'))->where('run', $run)->get();
        //If no Runs Exist Create A New Run
        if($vehicleRuns->count() == 0){
            $runTime = Carbon::parse($slot->start)->addSecond(getRouteTime($storePostCode, $userPostCode));
            $vehicleRun = new VehicleRuns();
            $vehicleRun->run = $run;
            $vehicleRun->deliveryDate = $date;
            $vehicleRun->group = 1;
            $vehicleRun->last_postcode = $userPostCode;
            $vehicleRun->run_time = $runTime;
            $vehicleRun->save();
            $delivery = new Deliveries();
            $delivery->userID = Auth::id();
            $delivery->slotID = $slot->id;
            $delivery->deliveryDate = $date;
            $delivery->group = $vehicleRun->id;
            $delivery->postCode = $userPostCode;
            $delivery->save();
        }
        //Check Where To Place Run
        if($vehicleRuns->count() > 0 && $vehicleRuns->count() < $vanCount){
            //Checks which run has the shortes time to the current drop so the drop can be assigned to that run
            $timeFromLast = 0;
            $runToAssign = 0;
            foreach($vehicleRuns as $vehicleRun){
                //$curentRunTime = Carbon::parse($vehicleRun->run_time);
                $timeToNext = getRouteTime($vehicleRun->last_postcode, $userPostCode);
                if($timeFromLast == 0){
                    $timeFromLast = $timeToNext;
                    $runToAssign = $vehicleRun->id;
                }else if($timeFromLast > $timeToNext ) {
                    $timeFromLast = $timeToNext;  
                    $runToAssign = $vehicleRun->id;
                }
            }
            //Finds the run we need to assign the next delivery to
            $vehicleRun = VehicleRuns::find($runToAssign);
            //Adds the time to the next drop to the runs current time
            $vehicleRun->run_time = Carbon::parse($vehicleRun->run_time)->addSeconds(getRouteTime($vehicleRun->last_postcode, $userPostCode));
            $vehicleRun->save();
            //Create The Delivery
            $delivery = new Deliveries();
            $delivery->userID = Auth::id();
            $delivery->slotID = $slot->id;
            $delivery->deliveryDate = $date;
            $delivery->group = $vehicleRun->id;
            $delivery->postCode = $userPostCode;
            $delivery->save();

        }*/
        $booking->save();
        return back()->with('success', 'You Have booked the time slot');
    }
}
