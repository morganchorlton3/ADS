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
        if($checkBooking != null){
            $checkBooking->delete();
        }
        $booking = new SlotBooking;
        $booking->user_id = Auth::id();
        $booking->slot_id = $id;
        $booking->date = $date;
        $booking->save();
        return back()->with('success', 'You Have booked the time slot');
    }
}
