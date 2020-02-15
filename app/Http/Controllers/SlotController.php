<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\DeliverySchedule;
use App\Slot;
use App\SlotBooking;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\DeliveryVehicleProfile;
use App\DeliveryVehicleDeliveries;

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
        $checkBooking = SlotBooking::where('user_id', Auth::id())->first();
        $checkVanSlot = DeliveryVehicleDeliveries::where('slot_booking_id', SlotBooking::where('user_id', Auth::id())->pluck('id')[0])->first();
        if($checkVanSlot != null){
            $checkVanSlot->delete();
        }
        if($checkBooking != null){
            $checkBooking->delete();
        }
        $user = Auth::user();
        $booking = new SlotBooking;
        $booking->user_id = Auth::id();
        $booking->slot_id = $id;
        $booking->date = $date;
        $booking->post_code = $user->address->post_code;
        $booking->save();
        //Create Van Profile
        $van_slot = new DeliveryVehicleDeliveries;
        $van_slot->delivery_profile = 1;
        $van_slot->slot_booking_id = SlotBooking::where('user_id', Auth::id())->pluck('id')[0];
        $van_slot->save();
        return back()->with('success', 'You Have booked the time slot');
    }
}
