@extends('layouts.app')



@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="card pt-0">
            <div class="row">
                <aside class="col-sm-5 ">
                    <img class="card-img-top mt-0 ml-4" src="{{asset('ProductImages/' . $product->barcode . '/1.jpeg')}}" alt="Card image cap">
                    <a href="#" class="btn btn-outline-primary btn-block ml-4 mb-4 mr-4"> <i class="fas fa-shopping-cart"></i> Add to cart </a>
                </aside>
                <aside class="col-sm-7">
                    <article class="card-body p-5 mt-1">
                            <h3 class="title mb-3">{{ $product->name }}</h3>
                            <p class="price-detail-wrap"> 
                                <span class="price h3 text-warning"> 
                                    <span class="currency"></span><span class="num">{{ formatPrice($product->price) }}</span>
                                </span> 
                                <span>/per kg</span> 
                            </p>
        
                        <dl class="item-property">
                        <dt>Description</dt>
                        <dd><p>{{ $product->detailedDesc }}</p></dd>
                        </dl>
                    </article>
                </aside>
            </div>
        </div>
    </div>
    <div class="col-lg-3 pr-0 d-none d-lg-block">
        @include('layouts.partials.cart')
    </div>
</div>   
@endsection