@extends('layouts.new')

@section('style')
<style>
    .card-product .img-wrap {
    border-radius: 3px 3px 0 0;
    overflow: hidden;
    position: relative;
    height: 220px;
    text-align: center;
}
.card-product .img-wrap img {
    max-height: 100%;
    max-width: 100%;
    object-fit: cover;
}
.card-product .info-wrap {
    overflow: hidden;
    padding: 15px;
    border-top: 1px solid #eee;
}
.card-product .bottom-wrap {
    padding: 15px;
    border-top: 1px solid #eee;
}

.label-rating { margin-right:10px;
    color: #333;
    display: inline-block;
    vertical-align: middle;
}

.card-product .price-old {
    color: #999;
}
</style>
@endsection

@section('content')
<div class="col-lg-12 mt-4">
    <div class="row">
        @foreach($products as $product)
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch p-2">
                <div class="card product-card item-in-cart">
                    <div class="d-flex justify-content-center ">
                        <a href="#"><img class="text-center" width="150px" height="150px;" src="{{asset('ProductImages/' . $product->barcode . '/1.jpeg')}}" alt=""></a>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <p class="card-title">
                            <a href="#">{{ $product->name }}</a>
                        </p>
                        <div class="card-bottom d-felx align-items-baseline mt-auto p-2">
                            <div class="row col-lg-12">
                                <h4 class="text-center">{{ formatPrice($product->price)}}</h4>
                            </div>

                            <div class="row col-lg-12">
                                <div class="col-lg-6">
                                    <input type="text" class="form-control qty-input" placeholder="0">
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{ route('cart.add', $product->id) }}" style="background-color:transparent" class="btn btn-cart mt-auto">Add</a>
                                </div>
                            </div>
                        </div>
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
