@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9 mt-4">
            <div class="card">
                <div class="card-header">
                  Book Time slot
                </div>
                <div class="card-body">
                    <div class="row col-lg-12">
                        <div class="col-lg-6">
                            <div class="row mb-2">
                                <div class="col-lg-3 my-auto slot-row">
                                    
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="text-center">Mon</h4>
                                    <p class="text-center">{{ SlotDate(1)->format('d') }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="text-center">Tue</h4>
                                    <p class="text-center">{{ SlotDate(2)->format('d') }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="text-center">Wed</h4>
                                    <p class="text-center">{{ SlotDate(3)->format('d') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-3">
                                   <h4 class="text-center">Thu</h4>
                                   <p class="text-center">{{ SlotDate(4)->format('d') }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="text-center">Fri</h4>
                                    <p class="text-center">{{ SlotDate(5)->format('d') }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="text-center">Sat</h4>
                                    <p class="text-center">{{ SlotDate(6)->format('d') }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="text-center">Sun</h4>
                                    <p class="text-center">{{ SlotDate(7)->format('d') }}</p>
                                </div>
                            </div>
                        </div>
                    @foreach($slots as $slot)
                        <div class="row col-lg-12">
                            <div class="col-lg-6">
                                <div class="row mb-2">
                                    <div class="col-lg-3 my-auto">
                                        <p style="font-size:12px;">{{\Carbon\Carbon::parse($slot->start)->format('h:i')}}-{{\Carbon\Carbon::parse($slot->end)->format('h:i')}}</p>
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




                            {{--<div class="col-lg-2">
                                @if(checkSlot($slot->id) == 1)
                                <button type="button" class="btn btn-light">Light</button>
                                @else
                                <button type="button" class="btn btn-light disabled">Light</button>
                                @endif
                            </div>
                            <div class="col-lg-2">
                                @if(checkSlot($slot->id) == 1)
                                <button type="button" class="btn btn-light">Light</button>
                                @else
                                <button type="button" class="btn btn-light disabled">Light</button>
                                @endif
                            </div>
                            <div class="col-lg-2">
                                @if(checkSlot($slot->id) == 1)
                                <button type="button" class="btn btn-light">Light</button>
                                @else
                                <button type="button" class="btn btn-light disabled">Light</button>
                                @endif
                            </div>
                            <div class="col-lg-2">
                                @if(checkSlot($slot->id) == 1)
                                <button type="button" class="btn btn-light">Light</button>
                                @else
                                <button type="button" class="btn btn-light disabled">Light</button>
                                @endif
                            </div>
                            <div class="col-lg-2">
                                @if(checkSlot($slot->id) == 1)
                                <button type="button" class="btn btn-light">Light</button>
                                @else
                                <button type="button" class="btn btn-light disabled">Light</button>
                                @endif
                            </div>--}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{--@include('partials.shop.cart')--}}
    </div>
</div>
@endsection

@section('addedJS')

@endsection