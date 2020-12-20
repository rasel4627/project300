@extends('backend.admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{url('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="{{ url('/all-product') }}">Foods</a></li>
</ul>
<div class="row-fluid sortable">		
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2 style="font-weight: bold">Foods List</h2>		
	</div>
	<div class="box-content">
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
		  <thead>
			  <tr>
				  <th>ID</th>
				  <th>Food Name</th>
				  <th>Image</th>
				  <th>Price</th>
				  <th>Category Name</th>
				  <th>Status</th>
				  <th>Actions</th>
			  </tr>
		  </thead>  

	
		  <tbody>
		  @foreach($product as $row)
			<tr>
				<td>{{ $row->product_id }}</td>
				<td class="center">{{ $row->product_name }}</td>
				<td><img src="{{ $row->product_image }}" style="height: 80px; width: 80px"></td>
			    <td class="center">{{ $row->product_price}} Tk</td>
			    <td class="center">{{ $row->category_name}}</td>
				<td class="center">
					@if($row->publication_status == 1)
					   <span class="label label-success">Active</span>
					@else
 					   <span class="label label-danger">Inactive</span>
					@endif
				</td>
				<td class="center">
					@if($row->publication_status == 1)
					    <a class="btn btn-danger" href="{{ url('/inactive-product/'.$row->product_id) }}">
						<i class="halflings-icon white thumbs-down"></i> 
						</a>
					@else
						<a class="btn btn-success" href="{{ url('/active-product/'.$row->product_id) }}">
						<i class="halflings-icon white thumbs-up"></i>
						</a>
					@endif
	
					<a class="btn btn-info" href="{{ url('/edit-product/'.$row->product_id) }}">
						<i class="halflings-icon white edit"></i>  
					</a>
					<a class="btn btn-danger" href="{{ url('/delete-product/'.$row->product_id) }}" id="delete">
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