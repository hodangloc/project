<?php
	foreach ($product as $key => $value) {
		$getImage = json_decode($value['image'], true);
		$image = $getImage[0];
?>

<div class="col-sm-4">
	<div class="product-image-wrapper">
		<div class="single-products">
			<div class="productinfo text-center">
				<img src="{{ asset('uploads/product/'. $image) }}" alt="" />
				<h2>{{ $value->price }}</h2>
				<p>{{ $value->name }}</p>
				<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
			</div>
			<div class="product-overlay">
				<div class="overlay-content">
					<h2>{{ $value->price }}</h2>
					<p>{{ $value->name }}</p>
					<button type="submit" name="add" id="{{ $value->id }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>		
				</div>
			</div>
		</div>
		<div class="choose">
			<ul class="nav nav-pills nav-justified">
				<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
				<li><a href="{{ url('/product-detail/'. $value->id) }}"><i class="fa fa-plus-square"></i>Add to compare</a></li>
			</ul>
		</div>
	</div>
</div>

<?php 
	}
?>