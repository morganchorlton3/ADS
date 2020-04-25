@extends('layouts.app')


@section('content')
<div class="col-lg-12 card shadow">
    <h5 class="title-span">Your Delivery Address</h5>
    <div class="container mt-2">
        <div class="row">
            <div>
                <p><span>Delivery Address:</span> {{ formatAddress($address)}}</p>
            </div>
            <div class="ml-auto pr-4">
                <a id="address"><i class="fas fa-arrow-circle-down" style="font-size:26px;"></i></a>
                <a id="address-hide" style="display:none;"><i class="fas fa-arrow-circle-up" style="font-size:26px;"></i></a>
            </div>
        </div>
        <form class="row col-lg-12 mb-4 updateAddress" action="{{ route('account.address.update') }}" method="POST" style="display:none;">
            @CSRF
            <div class="row col-lg-12" >
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
    <h5 class="title-span">Your Delivery Slot</h5>
    <!--  Slot Date Row -->
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-2 "></div>
    
            <div class="col-lg-2">
                <h4 class="text-center d-flex justify-content-center">{{ SlotDate(1)->format('D') }}</h4>
                <p class="text-center d-flex justify-content-center">{{ SlotDate(1)->format('d')  }}</p>
            </div>
            <div class="col-lg-2">
                <h4 class="text-center d-flex justify-content-center">{{ SlotDate(2)->format('D') }}</h4>
                <p class="text-center d-flex justify-content-center">{{ SlotDate(2)->format('d') }}</p>
            </div>
            <div class="col-lg-2">
                <h4 class="text-center d-flex justify-content-center">{{ SlotDate(3)->format('D') }}</h4>
                <p class="text-center d-flex justify-content-center">{{ SlotDate(3)->format('d') }}</p>
            </div>
            <div class="col-lg-2">
                <h4 class="text-center d-flex justify-content-center">{{ SlotDate(4)->format('D') }}</h4>
                <p class="text-center d-flex justify-content-center">{{ SlotDate(4)->format('d') }}</p>
            </div>
            <div class="col-lg-2">
                <h4 class="text-center d-flex justify-content-center">{{ SlotDate(5)->format('D') }}</h4>
                <p class="text-center d-flex justify-content-center">{{ SlotDate(5)->format('d') }}</p>
            </div>
        </div>
 
        <div class="row mb-2">
            @foreach($slots as $slot)
            <div class="col-lg-2 mb-1 mt-1">
                <p  class="text-center" style="font-size:14px;">{{\Carbon\Carbon::parse($slot->start)->format('H:i')}} - 
                    {{\Carbon\Carbon::parse($slot->end)->format('H:i')}}</p>
            </div>
                @foreach ($slotAvailability->where('slotID',  $slot->id) as $availability)
                <?php $date = Carbon\Carbon::now(); ?>
                    <div class="col-lg-2 mb-1 mt-1">
                        @if($availability->status == 1)
                        <a href="{{ route('checkout.book.time.slot' , [$id = $availability->slotID, $availability->date, $availability->price]) }}"  type="button" class="btn btn-slot">{{ formatPrice($availability->price) }}</a>
                        @elseif($availability->status == 2)
                        <a  class="btn btn-slot booked" >Booked</a>
                        @elseif($availability->status == 3)
                        <a  class="btn btn-slot unavailable disabled" >Unavailable</a>
                        @endif
                    </div>
                @endforeach
            @endforeach
            
           {{-- <div class="col-lg-2" >
                {{checkSlot($slot->id, SlotDate($counter))}}
               

            </div>--}}   
        </div>

    </div>
    {{--@include('livewire.slots')--}}
    <!-- Bottom Section -->
    @if($slotBooking)
        <div class="col-lg-12 d-flex justify-content-center mt-4 mb-4">
            <a href="{{ route('checkout.payment') }}" class="btn btn-primary">Checkout</a>
        </div>
    @endif
</div>
@endsection

@section('addedJS')
<script>
$(document).ready(function(){
    $("#address").click(function(){
        $(".updateAddress").fadeIn().show();
        $("#address").hide();
        $("#address-hide").show();
    }); 
    $("#address-hide").click(function(){
        $(".updateAddress").fadeOut().hide();
        $("#address-hide").hide();
        $("#address").show();
    }); 
});
</script>
@endsection