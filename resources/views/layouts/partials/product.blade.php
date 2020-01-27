<div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="{{asset('ProductImages/' . $product->barcode . '/1.jpeg')}}" alt=""></a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="#">{{ $product->name }}</a>
        </h4>
        <h5>{{$product->price}}</h5>
        <p class="card-text">{{ $product->shortDesc}}</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
      </div>
    </div>
</div>