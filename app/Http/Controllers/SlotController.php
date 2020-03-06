<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Delivery;
use App\DeliverySchedule;
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
        $delivery = VehicleRuns::where('delivery_date', $date->format('Y:m:d'))->where('run', $run)->get();

        if($delivery->count() == 0){
            $newDelivery = new VehicleRuns();
            $newDelivery->run = $run;
            $newDelivery->delivery_date = $date;
            $newDelivery->save();
        }
        return back()->with('success', 'You Have booked the time slot');
    }
}
