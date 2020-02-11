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
                                    <p class="text-center">{{ SlotDate(1) }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="text-center">Tue</h4>
                                    <p class="text-center">{{ SlotDate(2) }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="text-center">Wed</h4>
                                    <p class="text-center">{{ SlotDate(3) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-3">
                                   <h4 class="text-center">Thu</h4>
                                   <p class="text-center">{{ SlotDate(4) }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="text-center">Fri</h4>
                                    <p class="text-center">{{ SlotDate(5) }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="text-center">Sat</h4>
                                    <p class="text-center">{{ SlotDate(6) }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="text-center">Sun</h4>
                                    <p class="text-center">{{ SlotDate(7) }}</p>
                                </div>
                            </div>
                        </div>
                    @foreach($slots as $slot)
                        <div class="row col-lg-12">
                            <div class="col-lg-6 my-auto">
                                <div class="row mb-2">
                                    <div class="col-lg-3 my-auto">
                                        <p style="font-size:12px;">{{\Carbon\Carbon::parse($slot->start)->format('h:i')}}-{{\Carbon\Carbon::parse($slot->end)->format('h:i')}}</p>
                                    </div>
                                    <div class="col-lg-3 my-auto">
                                        @if(checkSlot( 1))
                                            <button type="button" class="btn btn-primary" style="padding:2px;">Available</button>
                                            @else
                                            <button type="button" class="btn btn-light disabled" style="padding:2px;">Booked</button>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 my-auto">
                                        @if(checkSlot( 2))
                                            <button type="button" class="btn btn-primary" style="padding:2px;">Available</button>
                                            @else
                                            <button type="button" class="btn btn-light disabled" style="padding:2px;">Booked</button>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 my-auto">
                                        @if(checkSlot(3))
                                            <button type="button" class="btn btn-primary" style="padding:2px;">Available</button>
                                            @else
                                            <button type="button" class="btn btn-light disabled" style="padding:2px;">Booked</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 my-auto">
                                <div class="row">
                                    <div class="col-lg-3 my-auto">
                                        @if(checkSlot( 4))
                                            <button type="button" class="btn btn-primary" style="padding:2px;">Available</button>
                                            @else
                                            <button type="button" class="btn btn-light disabled" style="padding:2px;">Booked</button>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 my-auto">
                                        @if(checkSlot( 5))
                                            <button type="button" class="btn btn-primary" style="padding:2px;">Available</button>
                                            @else
                                            <button type="button" class="btn btn-light disabled" style="padding:2px;">Booked</button>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 my-auto" >
                                        @if(checkSlot( 6))
                                            <button type="button" class="btn btn-primary" style="padding:2px;">Available</button>
                                            @else
                                            <button type="button" class="btn btn-light disabled" style="padding:2px;">Booked</button>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 my-auto">
                                        @if(checkSlot( 7))
                                            <button type="button" class="btn btn-light" style="padding:2px;">Available</button>
                                            @else
                                            <button type="button" class="btn btn-light disabled" style="padding:2px;">Booked</button>
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
        @include('partials.shop.cart')
    </div>
</div>
@endsection

@section('addedJS')

@endsection