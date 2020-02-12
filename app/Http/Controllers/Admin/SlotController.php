<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slot;
use App\SlotBooking;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slots = Slot::all();
        return view('admin.deliveries.slots')->with([
            'slots' => $slots,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'day' => ['required'],
            'start' => ['required'],
            'end' => ['required'],
        ]);

        $slot = new Slot;
        $slot->day = $request->day;
        $slot->start = $request->start;
        $slot->end = $request->end;
        $slot->save();

        return back()->with('success', 'Delivery slot created');
    }

    
}
