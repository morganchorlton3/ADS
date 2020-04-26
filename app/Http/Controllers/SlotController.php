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
    public function index2()
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
            //dd($date);
            foreach($slots as $slot){
                //dd($slot);
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
            //dd($date);
            foreach($slots as $slot){
                //dd($slot);
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

    public function bookSlot($id, $date, $price){
        $date = Carbon::parse($date);
        $userPostCode = User::find(Auth::id())->address->post_code;
        $userBooking = SlotBooking::where('user_id', Auth::id());
        if($userBooking->count() > 0){
            $userBooking->delete();
        }
        $booking = new SlotBooking();
        $booking->user_id = Auth::id();
        $booking->slot_id = $id;
        $booking->post_code = $userPostCode;
        $booking->date = $date;
        $booking->price = $price;
        $booking->status = 1;
        $booking->expiration = Carbon::now()->addHours(2)->format('H:m:s');
        $booking->save();
        return back()->with('success', 'You Have booked the time slot');
    }
}
