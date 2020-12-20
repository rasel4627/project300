@extends('backend.admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{url('/dashboard')}}">Home</a> 
		<i class="icon-angle-right"></i>
	</li>
	<li><a href="">Booking List</a></li>
</ul>
<div class="row-fluid sortable">		
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2 style="font-weight: bold">Booking List</h2>		
	</div>
	<div class="box-content">
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
		  <thead>
			  <tr>
				  <th>ID</th>
				  <th>Name</th>
				  <th>Email</th>
				  <th>Phone</th>
				  <th>Date</th>
				  <th>Time</th>
				  <th>Person</th>
				  <th>Actions</th>
			  </tr>
		  </thead>  

	
		  <tbody>
		  @foreach($book as $row)
			<tr>
				<td>{{ $row->id }}</td>
				<td class="center">{{ $row->name }}</td>
			    <td class="center">{{ $row->email}}</td>
			    <td class="center">{{ $row->phone}}</td>
			    <td class="center">{{ $row->date}}</td>
			    <td class="center">{{ $row->time}}</td>
			    <td class="center">{{ $row->person}}</td>
				<td class="center">
					<a class="btn btn-danger" href="{{ url('/delete-booking/'.$row->id) }}" id="delete">
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