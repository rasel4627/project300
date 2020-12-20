@extends('backend.admin_layout')
@section('admin_content')

<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="">Order Details</a></li>
</ul>

<p class="alert-success">
		<?php
		$message = Session::get('message');
		if ($message) {
			echo $message;
			Session::put('message',NULL);
		}
		?>	
</p>

<div class="row-fluid sortable">		
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon user"></i><span class="break"></span>Orders</h2>		
	</div>
	<div class="box-content">
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
		  <thead>
			  <tr>
				  <th>Order ID</th>
				  <th>Customer Name</th>
				  <th>Order Total</th>
				  <th>Status</th>
				  <th>Actions</th>
			  </tr>
		  </thead>  

	
		  <tbody>
		  @foreach($all_order_info as $row)
			<tr>
				<td>{{ $row->order_id }}</td>
				<td class="center">{{ $row->customer_name }}</td>
				<td class="center">{{ $row->order_total }}</td>
				<td class="center">{{ $row->order_status }}</td>
				<td class="center">
				@if($row->order_status == 'pending')
					<a class="btn btn-success" href="{{ url('/success-order/'.$row->order_id) }}">
					  <i class="halflings-icon white thumbs-up"></i> 
					</a>
				@else
					<a class="btn btn-danger" >
					<i class="halflings-icon white thumbs-down"></i>
					</a>
				@endif

					<a title="edit" class="btn btn-info" href="{{ url('/view-order/'.$row->order_id) }}">
						<i class="halflings-icon white edit"></i>  
					</a>
					<a title="delete" class="btn btn-danger" href="{{ url('/delete-order/'.$row->order_id) }}" id="delete">
						<i class="halflings-icon white trash"></i> 
					</a>
				</td>
			</tr>
			@endforeach
		  </tbody>
	
	  </table>            
	</div>
</div>
</div>
@endsection


