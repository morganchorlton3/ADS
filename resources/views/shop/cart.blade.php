<div class="col-lg-3 cart-bar" style="height: 100%;">

    <h1 class="my-4">Cart</h1>
    <div class="list-group"> 
        @if(session('cart'))
        <?php $total = 0 ?>
        
        <div class="row col-lg-12">
            <div class="col-lg-8">
                <h4 class="pull-left">Cart Total: </h4>
            </div>
            <div class="col-lg-4">
                <h4>£{{ CartTotal()}}</h4>
            </div>
        </div>
        @foreach(session('cart') as $id => $details)
 
            <?php $total += $details['price'] * $details['quantity'] ?>
                <div class="row col-lg-12 mb-2">
                    <div class="col-lg-2">
                        <div class="row">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="row">
                            <p>{{ $details['quantity'] }}</p>
                        </div>
                        <div class="row">
                            <i class="fas fa-minus"></i>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <a href="#"><img class="card-img-top" src="{{asset('ProductImages/' . $details['barcode'] . '/1.jpeg')}}" alt=""></a>
                    </div>
                    <div class="col-lg-4">
                        <a href="">{{ substr($details['name'],0, 20) }}</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

</div>