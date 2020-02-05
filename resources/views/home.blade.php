@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9" style="margin-top:7vh;">
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="{{asset('ProductImages/' . $product->barcode . '/1.jpeg')}}" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">{{ $product->name }}</a>
                            </h4>
                            <h5>{{$product->price}}</h5>
                            <p class="card-text">{{ $product->shortDesc}}</p>
                            <a href="{{ route('cart.add', $product->id) }}" style="width:100%;" class="btn btn-primary">Add To Cart</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-lg-3 cart-bar">
            <div class="cart-head">
                <h1 class="my-4">Cart</h1>
                @if(session('cart'))
                <?php $total = 0 ?>
                

                    <div class="row">
                        <div class="col-lg-8">
                            <h4 class="pull-left">Cart Total: </h4>
                        </div>
                        <div class="col-lg-4">
                            <h4>£{{ CartTotal()}}</h4>
                        </div>
                        <div class="col-lg-12 mt-1">
                            <a href="" style="width:100%;" class="btn btn-primary">Checkout</a>
                        </div>
                    </div>
            </div>

                @foreach(session('cart') as $id => $details)
        
                    <?php $total += $details['price'] * $details['quantity'] ?>
                        <div class="cart-item col-lg-12">
                            <div class="row">
                            <div class="col-lg-2">
                                <div class="row">
                                    <a href="{{ route('cart.increase', $details['product_id']) }}" style="width:100%;"><i class="fas fa-plus"></i></a>
                                </div>
                                <div class="row">
                                    <p>{{ $details['quantity'] }}</p>
                                </div>
                                <div class="row">
                                    <a href="{{ route('cart.decrease', $details['product_id']) }}" style="width:100%;"><i class="fas fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <a href="#"><img class="card-img-top" src="{{asset('ProductImages/' . $details['barcode'] . '/1.jpeg')}}" alt=""></a>
                            </div>
                            <div class="col-lg-3">
                                <a href="">{{ substr($details['name'],0, 20) }}</a>
                            </div>
                            <div class="col-lg-2">

                                <a href="{{ route('cart.remove', $details['product_id']) }}" class="remove-from-cart" data-id="{{ $details['product_id'] }}"><i class="fas fa-times"></i></a>
                            </div>
                            </div>
                        </div>
                    @endforeach
                @endif
         
        
        </div>
    </div>
</div>

@endsection
@section('addedJS')

@endsection