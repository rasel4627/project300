@extends('frontend.user_layout')
@section('content')

<section id="cart_items">
<div class="container col-sm-12">
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="#">Home</a></li>
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
						<a href=""><img src="{{ $row->options->image }}" height="80px" width="80px"></a>
					</td>
					<td class="cart_description">
						<h4><a href="">{{ ($row->name) }}</a></h4>
						
					</td>
					<td class="cart_price">
						<p>{{ ($row->price) }}</p>
					</td>
					<td class="cart_quantity">
						<div class="cart_quantity_button">
						  <form action="{{ url('/update-cart')}}" method="post">
						  @csrf
							<input class="cart_quantity_input" type="text" name="qty" value="{{ ($row->qty) }}" autocomplete="off" size="2">
							<input  type="hidden" name="rowId" value="{{ ($row->rowId) }}" >
							<input type="submit" name="submit" value="Update" class="btn btn-default">
						  </form>
						</div>
					</td>
					<td class="cart_total">
						<p class="cart_total_price">{{ ($row->total) }}</p>
					</td>
					<td class="cart_delete">
						<a class="cart_quantity_delete" href="{{ url('/delete-to-cart/'.$row->rowId) }}"><i class="fa fa-times"></i></a>
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
<div class="paymentCont col-sm-8">
<div class="headingWrap">
		<h3 class="headingTop text-center">Select Your Payment Method</h3>	
		<p class="text-center">Created with bootsrap button and using radio button</p>
</div>
			
  <form method="post" action="{{url('/order-place')}}">
	@csrf			            
       <input type="radio" name="payment_method" value="handcash" required=""> Hand Cash<br>
       <input type="radio" name="payment_method" value="cart" required=""> Debit Card<br>
       <input type="radio" name="payment_method" value="paypal" required=""> Paypal<br>    
       <input type="submit" class="btn btn-success" value="Submit"> 
   </form>				         			
			
</div>
</div>
</section>

@endsection
