@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-4 p-0">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row col-lg-12 d-flex justify-content-center">
                        <div class="row mb-4">
                            <h1 class="text-center">Address</h1>
                        </div>
                        <form class="row col-lg-12 mb-4" action="{{ route('account.address.update') }}" method="POST">
                            @CSRF
                            <div class="row col-lg-12">
                                <div class="form-group col-lg-6">
                                    <label for="postCode">Name</label>
                                    <input type="text" class="form-control @error('postCode') is-invalid @enderror" id="postCode" value="{{ $address->post_code }}" name="postCode">
                                    @error('postCode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="addressLine1">Address Line 1</label>
                                    <input type="text" class="form-control @error('addressLine1') is-invalid @enderror" id="addressLine1" value="{{ $address->address_line_1 }}" name="addressLine1">
                                    @error('addressLine1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row col-lg-12">
                                <div class="form-group col-lg-6">
                                    <label for="addressLinew">Address Line 2</label>
                                    <input type="text" class="form-control @error('addressLine2') is-invalid @enderror" id="addressLine2" value="{{ $address->address_line_2 }}" name="addressLine2">
                                    @error('addressLine2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="addressLine3">Address Line 3</label>
                                    <input type="text" class="form-control @error('addressLine3') is-invalid @enderror" id="addressLine3" value="{{ $address->address_line_3 }}" name="addressLine3">
                                    @error('addressLine3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary form-control">Update Address</button>
                        </form>
                    </div>
                    <div class="row col-lg-12">
                        <div class="col-lg-6">
                            <div class="row mb-2">
                                <div class="col-lg-3 my-auto slot-row">
                                    
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