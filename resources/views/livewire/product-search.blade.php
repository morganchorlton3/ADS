<div class="col-lg-12 product-dropdown">
    <div class="input-group">
        <input id="search" type="text" class="form-control" list="cityname" wire:model="search" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
        </div>
    </div>
    @if(strlen($search) >= 2)
    <div class="dropdown-content">
      <ul class="list-group list-group-flush">
        @foreach($products as $product)
          <li class="list-group-item"><a href="#">{{ $product->name }}</a></li>
        @endforeach
      </ul>
    </div>
    @endif
</div>
