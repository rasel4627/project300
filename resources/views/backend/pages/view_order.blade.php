@extends('backend.admin_layout')
@section('admin_content')
	<div class="row-fluid sortable">
		<div class="box span6">
			<div class="box-header">
				<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
			</div>
			<div class="box-content">
				<table class="table">
					<thead>
						<tr>
							<th>Customer Name</th>
							<th>Mobile</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							@foreach($order_by_id as $row)
							@endforeach
							<td>{{$row->customer_name}}</td>
							<td>{{$row->mobile}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="box span6">
			<div class="box-header">
				<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
			</div>
			<div class="box-content">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Username</th>
							<th>Address</th>
							<th>Mobile</th>
							<th>Email</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							@foreach($order_by_id as $row)
							@endforeach
							<td>{{$row->shipping_first_name}}</td>
							<td>{{$row->shipping_address}}</td>
							<td>{{$row->shipping_mobile_number}}</td>
							<td>{{$row->shipping_email}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
    </div>
    <div class="row-fluid sortable">
		<div class="box span12">
			<div class="box-header">
				<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
			</div>
			<div class="box-content">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Order Id</th>
							<th>Product Name</th>
							<th>Product Price</th>
							<th>Product Sales Quantity</th>
							<th>Product Sub Total</th>
						</tr>
					</thead>
					<tbody>
						@foreach($order_by_id as $row)
						<tr>
							<td>{{$row->order_id}}</td>
							<td>{{$row->product_name}}</td>
							<td>{{$row->product_price}}</td>
							<td>{{$row->product_sales_quantity}}</td>
							<td>{{$row->product_price*$row->product_sales_quantity}}</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td colspan="4">Total With Vat: </td>
							<td><strong>= {{$row->order_total}}  TK</strong></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>	
@endsection