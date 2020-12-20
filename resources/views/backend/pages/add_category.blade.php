@extends('backend.admin_layout')
@section('admin_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="{{url('/dashboard')}}">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="{{ url('/add-category') }}">Add Food Category</a>
	</li>
</ul>			
<div class="row-fluid sortable">
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Food Category</h2>
	</div>
	<div class="box-content">
	<form class="form-horizontal" action="{{ url('store-category') }}" method="post">
		@csrf
		  <fieldset>
			<div class="control-group">
			  <label class="control-label" for="date01">Food Category Name</label>
			  <div class="controls">
				<input type="text" class="input-xlarge" name="category_name" required="">
			  </div>
			</div>
        
			<div class="control-group hidden-phone">
			  <label class="control-label" for="textarea2">Food Category Description</label>
			  <div class="controls">
				<textarea id="editor" name="category_description" rows="3"></textarea>
			  </div>
			</div>

			<div class="control-group">
			  <label class="control-label" for="textarea2">Publication Status</label>
			  <div class="controls">
			  	<label class="checkbox inline">
				<input type="checkbox" name="publication_status" value="1">
				</label>
			  </div>
			</div>

			<div class="form-actions">
			  <button type="submit" class="btn btn-primary">Add Food Category</button>
			  <button type="reset" class="btn">Cancel</button>
			</div>
		  </fieldset>
	</form>   
	</div>
</div>
</div>
@endsection