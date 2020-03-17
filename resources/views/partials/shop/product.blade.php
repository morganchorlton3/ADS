{{--<div class="col-lg-3 col-md-6 col-sm-12 d-flex p-2">
    @if(inCart($product->name) >= 1)
        <div class="card product-card p-1 item-in-cart">
    @else
        <div class="card product-card p-1">
    @endif
        <div class="d-flex justify-content-center">
            <a href="#"><img class="text-center" width="150px" height="150px;" src="{{asset('ProductImages/' . $product->barcode . '/1.jpeg')}}" alt=""></a>
        </div>
        <div class="card-body d-flex flex-column">
            <p class="card-title">
                <a href="#">{{ $product->name }}</a>
            </p>
            <div class="card-bottom d-felx align-items-baseline mt-auto">
                <div class="col-lg-12">
                    <div class="row">
                        <h4 class="text-center">{{ formatPrice($product->price)}}</h4>
                    </div>
                    <form action="{{ route('cart.add') }}" class="card-form row d-flex justify-content-center" method="POST">
                        @CSRF
                        <div class="form-group">
                            <input type="text" name="qty" placeholder="0" class="form-control">
                            <input type="text" hidden value="{{ $product->id }}" name="id">
                        </div>
                        <div class="form-group">
                            <button style="background-color:transparent" class="btn">Add</button>
                        </div>
                    </form>                        
                </div>
                @if(inCart($product->name) == 1)
                    <p class="text-center bottom-cart-text">Item In Cart</p>
                @endif
            </div>
        </div>
    </div>
</div>
--}}
<div class="col-lg-3 col-md-6 col-sm-12 d-flex justify-content-center p-2">
    <div class="card d-flex justify-content-center" style="width: 18rem;">
        <img class="card-img-top p-4" src="{{asset('ProductImages/' . $product->barcode . '/1.jpeg')}}" alt="Card image cap">
        <div class="card-body d-flex flex-column">
            <h5 class="card-title">{{ $product->name}}</h5>
            <div class="card-bottom d-felx align-items-baseline mt-auto">
                <h6 class="card-price">{{ formatPrice($product->price) }}<span>/unit</span></h6>
                <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary btn-lg btn-block">Add</a>
            </div>
        </div>
    </div>
</div>