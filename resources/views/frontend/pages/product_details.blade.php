@extends('frontend.user_layout')
@section('content')
<div class="col-sm-12 padding-right">
<div class="product-details">
	<div class="col-sm-5">
		<div class="view-product" >
			<a  class="pic" href=""><img  src="{{ asset($details->product_image) }}" alt=""  /></a>					
		</div>
	</div>
	<div class="col-sm-7">
		<div class="product-information">
			<h2>{{ $details->product_name }}</h2>
			<span>
				<span>{{ $details->product_price }} TK</span>

				<form action="{{ url('/add-to-cart')}}" method="post">
					@csrf
					<label>Quantity:</label>
					<input name="qty" type="text" value="1" />
					<input name="product_id" type="hidden" value="{{ $details->product_id }}" />
					<button type="submit" class="btn btn-fefault cart">
						<i class="fa fa-shopping-cart"></i>
						Add to cart
					</button>
				</form>	
					
			</span>
			<p><b>Availability:</b> In Stock</p>
			<p><b>Condition:</b> New</p>
			<p><b>Category: </b>{{ $details->category_name }}</p>

		</div>
	</div>
</div>
<div class="category-tab shop-details-tab">
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#details" data-toggle="tab">Details</a></li>
			<li><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="details" style="margin-left: 30px" >
			<P>Food Materials : {!! $details->product_short_description !!}</P>
		</div>
		
		<div class="tab-pane fade" id="reviews" >
			<div class="col-sm-12">
				<ul>
					<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
					<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
					<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
				</ul>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				<p><b>Write Your Review</b></p>
				
				<form action="#">
					<span>
						<input type="text" placeholder="Your Name"/>
						<input type="email" placeholder="Email Address"/>
					</span>
					<textarea name="" ></textarea>
					<b>Rating: </b> <img src="{{ asset('public/frontend/images/product-details/rating.png')}}" alt="" />
					<button type="button" class="btn btn-default pull-right">
						Submit
					</button>
				</form>
			</div>
		</div>
		
	</div>
</div>
</div>
@endsection