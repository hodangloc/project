@extends('frontend.layouts.app')

@section('content')

<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Shopping Cart</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="image">Item</td>
						<td class="description">Name</td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@php
						$tong = 0;
					@endphp
						
					@foreach ($product as $key => $value)
						@php
							$getImage = json_decode($value['image'], true);
							$image = $getImage[0];
							$qty = $value['qty'];
							$price = explode("$", $value['price']);
							$price = $price[0];
						
							$total = $qty * $price;
							$tong = $tong + $total;
						@endphp
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ asset('uploads/product/'. $image) }}" width="150px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{ $value['name'] }}</a></h4>
								<p>{{ $value['id'] }}</p>
							</td>
							<td class="cart_price">
								<p>{{ $value['price'] }}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href=""> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{ $qty }}" autocomplete="off" size="2">
									<a class="cart_quantity_down" href=""> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{ $total }}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section> <!--/#cart_items-->

<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="chose_area">
					<ul class="user_option">
						<li>
							<input type="checkbox">
							<label>Use Coupon Code</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Use Gift Voucher</label>
						</li>
						<li>
							<input type="checkbox">
							<label>Estimate Shipping & Taxes</label>
						</li>
					</ul>
					<ul class="user_info">
						<li class="single_field">
							<label>Country:</label>
							<select>
								<option>United States</option>
								<option>Bangladesh</option>
								<option>UK</option>
								<option>India</option>
								<option>Pakistan</option>
								<option>Ucrane</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>
							
						</li>
						<li class="single_field">
							<label>Region / State:</label>
							<select>
								<option>Select</option>
								<option>Dhaka</option>
								<option>London</option>
								<option>Dillih</option>
								<option>Lahore</option>
								<option>Alaska</option>
								<option>Canada</option>
								<option>Dubai</option>
							</select>
						
						</li>
						<li class="single_field zip-field">
							<label>Zip Code:</label>
							<input type="text">
						</li>
					</ul>
					<a class="btn btn-default update" href="">Get Quotes</a>
					<a class="btn btn-default check_out" href="">Continue</a>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="total_area">
					<ul>
						<li>Cart Sub Total <span>$59</span></li>
						<li>Eco Tax <span>$2</span></li>
						<li>Shipping Cost <span>Free</span></li>
						<li>Total <span>{{ $tong }}</span></li>
					</ul>
						<a class="btn btn-default update" href="">Update</a>
						<a class="btn btn-default check_out" href="">Check Out</a>
				</div>
			</div>
		</div>
	</div>
</section><!--/#do_action-->
@endsection

@section('js')
<script>
	$(document).ready(function(){
		$.ajaxSetup({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

		$("a.cart_quantity_up").click(function(){
			$("a.cart_quantity_up").removeAttr("href");
			var addQty = $(this).closest(".cart_quantity").find("input").val();
				qty = parseInt(addQty) + 1;
				tt = $(this).closest("tr").find(".cart_price p").text().replace("$", "");
				id = $(this).closest("tr").find(".cart_description p").text();
				$(this).closest(".cart_quantity").find("input").val(qty);

				total = qty * tt;
				$(this).closest("tr").find(".cart_total p").text(total);

			$.ajax({
				method: "POST",
				url: '{{ url("/cart/add/ajax") }}',
				data: {
					id_product: id,
				},
				success: function(res){
					console.log(res);
				},
			})
		})

		$("a.cart_quantity_down").click(function(){
			$("a.cart_quantity_down").removeAttr("href");
			var delQty = $(this).closest(".cart_quantity").find("input").val();
				tt = $(this).closest("tr").find(".cart_quantity p").text().replace("$", "");
				id = $(this).closest("tr").find(".cart_description p").text();
				
			if (delQty > 1) {
				qty = parseInt(delQty) - 1;
				$(this).closest(".cart_quantity").find("input").val(qty);
				total = qty * tt;
				$(this).closest("tr").find(".cart_total p").text(total);

				$.ajax({
					method: "POST",
					url: '{{ url("/cart/delete/ajax") }}',
					data: {
						id_product: id,
					},
					success:function(res){
						console.log(res);
					},
				});
			}else{
				alert("Không được xoá sản phẩm cuối cùng");
			}
		});

		$("a.cart_quantity_delete").click(function(){
			$("a.cart_quantity_delete").removeAttr("href");
			$(this).closest("tr").remove();
			var id = $(this).closest("tr").find(".cart_description p").text();

			$.ajax({
				method: "POST",
				url: '{{ url("/cart/remove/ajax") }}',
				data: {
					id_product: id,
				},
				success:function(res){
					console.log(res);
				},
			})
		});
	});
</script>		
@endsection