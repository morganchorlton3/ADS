@extends('layouts.app')

@section('content')
<div class="col-lg-12">
    <div class="col-lg-9">
        <div class="col-lg-3">
            {{ Carbon::now();}}
        </div>
        <div class="col-lg-3">
            
        </div>
        <div class="col-lg-3">
            
        </div>
    </div>
    @include('partials.shop.cart')
</div>
@endsection

@section('addedJS')

@endsection