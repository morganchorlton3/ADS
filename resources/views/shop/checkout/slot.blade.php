@extends('layouts.app')

@section('content')
<div class="col-lg-12 card shadow">
    <h5 class="title-span">Your Delivery Address</h5>
    <div class="container">
        <p><span>Delivery Address:</span> {{ formatAddress($address)}}</p>
    </div>
    <h5 class="title-span">Your Delivery Slot</h5>
    <!--  Slot Date Row -->
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-3 ">
                        <p class="text-center" style="font-size:14px;">{{\Carbon\Carbon::parse("08:00")->format('h:i')}} - 
                            {{\Carbon\Carbon::parse("08:00")->format('h:i')}}</p>
                    </div>
                    <div class="col-lg-3">
                        <h4 class="text-center">{{ SlotDate(1)->format('D') }}</h4>
                        <p class="text-center">{{ SlotDate(1)->format('d')  }}</p>
                    </div>
                    <div class="col-lg-3">
                        <h4 class="text-center">{{ SlotDate(2)->format('D') }}</h4>
                        <p class="text-center">{{ SlotDate(2)->format('d') }}</p>
                    </div>
                    <div class="col-lg-3">
                        <h4 class="text-center">{{ SlotDate(3)->format('D') }}</h4>
                        <p class="text-center">{{ SlotDate(3)->format('d') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-3">
                    <h4 class="text-center">{{ SlotDate(4)->format('D') }}</h4>
                    <p class="text-center">{{ SlotDate(4)->format('d') }}</p>
                    </div>
                    <div class="col-lg-3">
                        <h4 class="text-center">{{ SlotDate(5)->format('D') }}</h4>
                        <p class="text-center">{{ SlotDate(5)->format('d') }}</p>
                    </div>
                    <div class="col-lg-3">
                        <h4 class="text-center">{{ SlotDate(6)->format('D') }}</h4>
                        <p class="text-center">{{ SlotDate(6)->format('d') }}</p>
                    </div>
                        <div class="col-lg-3">
                        <h4 class="text-center">{{ SlotDate(7)->format('D') }}</h4>
                        <p class="text-center">{{ SlotDate(7)->format('d') }}</p>
                    </div>
                </div>
            </div>
        </div>

    @foreach($slots as $slot)
        <div class="row mt-3 mb-3">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-3">
                        <p class="text-center" style="font-size:14px;">{{\Carbon\Carbon::parse($slot->start)->format('h:i')}} - 
                        {{\Carbon\Carbon::parse($slot->end)->format('h:i')}}</p>
                    </div>
                    <div class="col-lg-3 col">
                        @if(checkSlot($slot->id, SlotDate(1)) == 1)
                            <a href="{{ route('checkout.book.time.slot' , [$id = $slot->id, $day = SlotDate(1)]) }}" type="button" class="btn btn-slot">{{ formatPrice($slot->price) }}</a>
                        @elseif(checkSlot($slot->id, SlotDate(1)) == 2)
                            <a class="btn btn-slot booked" >Booked</a>
                        @elseif(checkSlot($slot->id, SlotDate(1)) == 3)
                            <a  class="btn btn-slot unavailable disabled" >Unavailable</a>
                        @endif
                    </div>
                    <div class="col-lg-3">
                        @if(checkSlot($slot->id, SlotDate(2)) == 1)
                            <a href="{{ route('checkout.book.time.slot' , [$id = $slot->id, $day = SlotDate(2)]) }}"type="button" class="btn btn-slot">{{ formatPrice($slot->price) }}</a>
                        @elseif(checkSlot($slot->id, SlotDate(2)) == 2)
                            <a aria-disabled="true"  class="btn btn-slot booked" >Booked</a>
                        @elseif(checkSlot($slot->id, SlotDate(2)) == 3)
                            <a  class="btn btn-slot unavailable disabled" >Unavailable</a>
                        @endif
                    </div>
                    <div class="col-lg-3">
                        @if(checkSlot($slot->id, SlotDate(3)) == 1)
                            <a href="{{ route('checkout.book.time.slot' , [$id = $slot->id, $day = SlotDate(3)]) }}" type="button" class="btn btn-slot">{{ formatPrice($slot->price) }}</a>
                        @elseif(checkSlot($slot->id, SlotDate(3)) == 2)
                            <a aria-disabled="true" class="btn btn-slot booked" >Booked</a>
                            @elseif(checkSlot($slot->id, SlotDate(3)) == 3)
                            <a  class="btn btn-slot unavailable disabled" >Unavailable</a>
                        @endif
                    </div>
                </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-3">
                            @if(checkSlot($slot->id, SlotDate(4)) == 1)
                                <a href="{{ route('checkout.book.time.slot' , [$id = $slot->id, $day = SlotDate(4)]) }}" type="button" class="btn btn-slot">{{ formatPrice($slot->price) }}</a>
                            @elseif(checkSlot($slot->id, SlotDate(4)) == 2)
                                <a class="btn btn-slot booked" >Booked</a>
                            @elseif(checkSlot($slot->id, SlotDate(4)) == 3)
                                <a  class="btn btn-slot unavailable disabled" >Unavailable</a>
                            @endif
                        </div>
                        <div class="col-lg-3">
                            @if(checkSlot($slot->id, SlotDate(5)) == 1)
                                <a href="{{ route('checkout.book.time.slot' , [$id = $slot->id, $day = SlotDate(5)]) }}" type="button" class="btn btn-slot">{{ formatPrice($slot->price) }}</a>
                            @elseif(checkSlot($slot->id, SlotDate(5)) == 2)
                                <a class="btn btn-slot booked" >Booked</a>
                                @elseif(checkSlot($slot->id, SlotDate(5)) == 3)
                                <a  class="btn btn-slot unavailable disabled" >Unavailable</a>
                            @endif
                        </div>
                        <div class="col-lg-3" >
                            @if(checkSlot($slot->id, SlotDate(6)) == 1)
                                <a href="{{ route('checkout.book.time.slot' , [$id = $slot->id, $day = SlotDate(6)]) }}" type="button" class="btn btn-slot">{{ formatPrice($slot->price) }}</a>
                            @elseif(checkSlot($slot->id, SlotDate(6)) == 2)
                                <a class="btn btn-slot booked" >Booked</a>
                                @elseif(checkSlot($slot->id, SlotDate(6)) == 3)
                                <a class="btn btn-slot unavailable disabled" >Unavailable</a>
                            @endif
                        </div>
                        <div class="col-lg-3" >
                            @if(checkSlot($slot->id, SlotDate(7)) == 1)
                                <a href="{{ route('checkout.book.time.slot' , [$id = $slot->id, $day = SlotDate(7)]) }}" type="button" class="btn btn-slot">{{ formatPrice($slot->price) }}</a>
                            @elseif(checkSlot($slot->id, SlotDate(7)) == 2)
                                <a class="btn btn-slot booked" >Booked</a>
                            @elseif(checkSlot($slot->id, SlotDate(7)) == 3)
                                <a class="btn btn-slot unavailable disabled">Unavailable</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
    </div>
</div>
@endsection

@section('addedJS')

@endsection