@extends('layouts.new')

@section('content')
<div class="row">
    <div class="col-lg-9">
        <div class="row pl-2 pr-2">
			@foreach($products as $product)
			<div class="col-lg-3 col-md-6 col-sm-12 d-flex p-2">
				<div id="product-card">
					<div id="product-front">
						<div class="shadow"></div>
						<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/245657/t-shirt.png" alt="" />
						<div class="image_overlay"></div>
						<div id="view_details">View details</div>
						<div class="stats">        	
							<div class="stats-container">
								<span class="product_price">$39</span>
								<span class="product_name">Adidas Originals</span>    
								<p>Men's running shirt</p>                                            
								
								<div class="product-options">
								<strong>SIZES</strong>
								<span>XS, S, M, L, XL, XXL</span>
								<strong>COLORS</strong>
								<div class="colors">
									<div class="c-blue"><span></span></div>
									<div class="c-red"><span></span></div>
									<div class="c-white"><span></span></div>
									<div class="c-green"><span></span></div>
								</div>
							</div>                       
							</div>                         
						</div>
					</div>
				</div>	
			</div>
			@endforeach
		</div>
        <div class="col-lg-12 mt-4 mb-4">
            <div class="d-flex justify-content-center">
                {{ $products->links() }} 
            </div>
        </div>  
    </div>
    <div class="col-lg-3 pr-0 d-none d-lg-block">
        @include('layouts.partials.cart')
    </div>
</div>   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    
    <script>
        $(document).ready(function(){
	
	// Lift card and show stats on Mouseover
	$('#product-card').hover(function(){
			$(this).addClass('animate');
			$('div.carouselNext, div.carouselPrev').addClass('visible');			
		 }, function(){
			$(this).removeClass('animate');			
			$('div.carouselNext, div.carouselPrev').removeClass('visible');
	});			
});
	</script>
	@endsection