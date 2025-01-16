<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
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
				<?php 
					$product = json_decode($data['body'], true);
					$tong = 0;
					foreach ($product as $key => $value) {
						$getImage = json_decode($value['image'], true);
						$image = $getImage[0];
						$qty = $value['qty'];
						$price = explode("$", $value['price']);
						$price = $price[0];
					
						$total = $qty * $price;
						$tong = $tong + $total;
				?>
					<tr>
						<td class="cart_product">
							<a href=""><img src="{{ asset('uploads/product/'. $image) }}" width="150px" alt=""></a>
						</td>
						<td class="cart_description">
							<h4><a href=""></a>{{ $value['name'] }}</h4>
							<p></p>
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
				<?php
					}
				?>
				<tr>
					<td colspan="4">&nbsp;</td>
					<td colspan="2">
						<table class="table table-condensed total-result">
							<tr>
								<td>Cart Sub Total</td>
								<td>$59</td>
							</tr>
							<tr>
								<td>Exo Tax</td>
								<td>$2</td>
							</tr>
							<tr class="shipping-cost">
								<td>Shipping Cost</td>
								<td>Free</td>										
							</tr>
							<tr>
								<td>Total</td>
								<td><span>{{ $tong }}</span></td>
							</tr>
						</table>
					</td>
				</tr>	
			</tbody>
		</table>
	</div>
</body>
</html>