@extends('backend.admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{url('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="#">Slider</a></li>
</ul>

<div class="row-fluid sortable">		
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon user"></i><span class="break"></span>Slider</h2>		
	</div>
	<div class="box-content">
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
		  <thead>
			  <tr>
				  <th>Slider ID</th>				  
				  <th>Slider Image</th>			 
				  <th>Status</th>
				  <th>Actions</th>
			  </tr>
		  </thead>  

	
		  <tbody>
		  @foreach($slider as $row)
			<tr>
				<td>{{ $row->slider_id }}</td>
				<td><img src="{{ url($row->slider_image) }}" style="height: 80px; width: 120px"></td>
				<td class="center">
					@if($row->publication_status == 1)
					   <span class="label label-success">Active</span>
					@else
 					   <span class="label label-danger">Inactive</span>
					@endif
				</td>
				<td class="center">
					@if($row->publication_status == 1)
					    <a class="btn btn-danger" href="{{ url('/inactive-slider/'.$row->slider_id) }}">
						<i class="halflings-icon white thumbs-down"></i> 
						</a>
					@else
						<a class="btn btn-success" href="{{ url('/active-slider/'.$row->slider_id) }}">
						<i class="halflings-icon white thumbs-up"></i>
						</a>
					@endif
	
					
					<a class="btn btn-danger" href="{{ url('/delete-slider/'.$row->slider_id) }}" id="delete">
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