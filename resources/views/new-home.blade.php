@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="row pl-2 pr-2">
        @foreach($products as $product)
            @include('partials.shop.product')
        @endforeach
        </div>
        <div class="col-lg-12 mt-4 mb-4">
            <div class="d-flex justify-content-center">
                {{ $products->links() }} 
            </div>
        </div>  
    </div>
    <div class="col-lg-3 pr-0 d-none d-lg-block">
        @include('layouts.partials.cart')
    </div>
</div>     
@endsection

@section('addedJS')

@endsection
