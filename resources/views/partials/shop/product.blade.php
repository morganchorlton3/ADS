<div class="col-lg-3 col-md-6 col-sm-12 d-flex justify-content-center p-2">
    <div class="card d-flex justify-content-center" style="width: 18rem;">
        <img class="card-img-top p-4" src="{{asset('ProductImages/' . $product->barcode . '/1.jpeg')}}" alt="Card image cap">
        <div class="card-body d-flex flex-column">
            <a href="{{ route('product.show', $product->id) }}"><h5 class="card-title">{{ $product->name}}</h5></a>
            <div class="card-bottom d-felx align-items-baseline mt-auto">
                <h6 class="card-price">{{ formatPrice($product->price) }}<span>/unit</span></h6>
                @if($product->productLocation->stock > 0)
                <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary btn-lg btn-block">Add</a>
                @else
                <a href="#" class="btn btn-primary btn-lg disabled" role="button" aria-disabled="true">Out Of Stock</a>
                @endif
            </div>
        </div>
    </div>
</div>