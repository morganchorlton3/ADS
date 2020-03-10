@extends('layouts.new')

@section('content')
<div class="col-lg-12 mt-4">
    <div class="row">
        @foreach($products as $product)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="d-flex justify-content-center">
                        <a href="#"><img class="text-center" width="150px" height="150px;" src="{{asset('ProductImages/' . $product->barcode . '/1.jpeg')}}" alt=""></a>
                    </div>
                    <div class="card-body">
                        <p class="card-title">
                            <a href="#">{{ $product->name }}</a>
                        </p>
                        <h5>{{ formatPrice($product->price)}}</h5>
                        <p class="card-text">{{ $product->shortDesc}}</p>
                        <a href="{{ route('cart.add', $product->id) }}" style="width:100%;" class="btn btn-primary">Add To Cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-12 mt-4 mb-4">
            <div class="d-flex justify-content-center">
                {{ $products->links() }} 
            </div>
        </div>
    </div>        
</div>

@endsection
@section('addedJS')

@endsection
