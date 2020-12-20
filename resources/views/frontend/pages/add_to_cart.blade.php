@extends('frontend.user_layout')
@section('content')
<section id="cart_items">
<div class="container col-sm-12">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="">Home</a></li>
		  <li class="active">Shopping Cart</li>
		</ol>
	</div>
	<div class="table-responsive cart_info">

		<?php
			 $contents = Cart::content();			
		?>
		
		<table class="table table-condensed">
			<thead>
				<tr class="cart_menu">
					<td class="image">Image</td>
					<td class="description">Name</td>
					<td class="price">Price</td>
					<td class="quantity">Quantity</td>
					<td class="total">Total</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>

				@foreach($contents as $row)
				<tr>
					<td class="cart_product">
						<a href=""><img src="{{ asset($row->options->image) }}" height="80px" width="80px"></a>
					</td>
					<td class="cart_description">
						<h4><a href="">{{ ($row->name) }}</a></h4>
					</td>
					<td class="cart_price">
						<p>{{ ($row->price) }}</p>
					</td>
					<td class="cart_quantity">
						<div class="cart_quantity_button">
						  <form action="{{ url('/update-cart') }}" method="post">
						  	@csrf
							<input class="cart_quantity_input" type="text" name="qty" value="{{ ($row->qty) }}" autocomplete="off" size="2">
							<input  type="hidden" name="rowId" value="{{ ($row->rowId) }}" >
							<input type="submit" name="submit" value="Update" class="btn btn-success">
						  </form>
						</div>
					</td>
					<td class="cart_total">
						<p class="cart_total_price">{{ ($row->total()) }}</p>
					</td>
					<td class="cart_delete">
						<a class="cart_quantity_delete" href="{{ url('/delete-cart/'.$row->rowId) }}"><i class="fa fa-times"></i></a>
					</td>
				</tr>
				@endforeach

			</tbody>
		</table>
	</div>
</div>
</section> 



<section id="do_action">
<div class="container">
	<div class="heading">
		<h3>What would you like to do next?</h3>
		<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
	</div>
	<div class="row">
		<div class="col-sm-8">
			<div class="total_area">
				<ul>
					<li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
					<li>Eco Tax <span>{{Cart::tax()}}</span></li>
					<li>Shipping Cost <span>0.00</span></li>
					<li>Total <span>{{ Cart::total()}}</span></li>
				</ul>

					<?php $customer_id = Session::get('customer_id'); ?>
					<?php if($customer_id != NULL) { ?>
                         <li><a href="{{ url('/checkout') }}"><i class="btn btn-default update">Checkout</i></a></li>
                    <?php } else{ ?>
                         <a class="btn btn-default update" href="{{ url('/login-check') }}">Check Out</a>
                    <?php } ?>
					
			</div>
		</div>
	</div>
</div>
</section>

@endsection
