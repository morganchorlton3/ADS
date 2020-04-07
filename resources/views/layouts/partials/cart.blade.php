<div class="container mt-1 pl-0" style="height:100%;">
    <div class="cart-bar shadow p-3">
    <div class="cart-head pt-4">
        @if(session('cart'))
        <?php $total = 0 ?>
        

            <div class="row">
                {{--<div class="col-lg-8">
                    <h4 class="pull-left">Cart Total: </h4>
                </div>
                <div class="col-lg-4">
                    <h4>£{{ CartTotal()}}</h4>
                </div>--}}
                <div class="col-lg-12 mt-1 mb-4">
                    <a href="{{ route('checkout.book.slot') }}" style="width:100%;" class="btn btn-primary">Checkout</a>
                </div>
            </div>
    </div>

        @foreach(session('cart') as $id => $details)

            <?php $total += $details['price'] * $details['quantity'] ?>
                <div class="cart-item col-lg-12">
                    <div class="row mb-2">
                        <div class="col-lg-2 cart-controls d-flex flex-column">
                            <div class="row p-1 mb-0 d-flex align-items-start">
                                <a class="cart-control text-center" href="{{ route('cart.increase', $details['id']) }}" style="width:100%;"><i class="fas fa-plus"></i></a>
                            </div>
                            <div class="row cart-qty d-flex align-items-center justify-content-center">
                                {{ $details['quantity'] }}
                            </div>
                            <div class="row  p-1 mt-0 d-flex align-items-end">
                                <a class="cart-control text-center" href="{{ route('cart.decrease', $details['id']) }}" style="width:100%;"><i class="fas fa-minus"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-4 cart-img mt-2">
                            <a href="#"><img class="card-img-top" src="{{asset('ProductImages/' . $details['barcode'] . '/1.jpeg')}}" alt=""></a>
                        </div>
                        <div class="col-lg-4 cart-name d-flex align-items-center">
                            <a href="">{{ substr($details['name'],0, 18) }}</a>
                        </div>
                        <div class="col-lg-2 mt-2 d-flex align-item-strech">
                            <div class="row col-lg-12 d-flex align-items-start">
                                <a href="{{ route('cart.remove', $details['id']) }}" class="remove-from-cart" data-id="{{ $details['id'] }}"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="d-flex align-items-end cart-price">
                                {{ formatPrice($details['price']) }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

</div>