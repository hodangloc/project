@extends('frontend.layouts.app')

@section('content')

<section>
	<div class="container">
		<div class="col-sm-9">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="id">Id</td>
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>	
							<td class="total">Action</td>
							
						</tr>
					</thead>
					<tbody>
						@foreach ($product as $value)
							@php
								$getImage = json_decode($value['image'], true);
								$image = $getImage[0];
							@endphp
							<tr>
								<td class="cart_price">
									<p>{{ $value['id'] }}</p>
								</td>
								<td class="cart_product">
									<a href=""><img src="{{ asset('uploads/product/'. $image) }}" alt="" width="100px"></a>
								</td>
								<td class="cart_description">
									<h4><a href="">{{ $value['name'] }}</a></h4>
								</td>
								<td class="cart_price">
									<p>{{ $value['price'] }}</p>
								</td>
								<td class="cart_total">
									<a href="{{ url('/account/edit-product/'.$value['id']) }}">Edit</a>
									<a href="{{ url('/account/delete-product/'. $value['id']) }}">Delete</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
@endsection