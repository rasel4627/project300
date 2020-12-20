@extends('backend.admin_layout')
@section('admin_content')
@php
    $setting = DB::table('setting')->where('id',2)->first();
@endphp
<ul class="breadcrumb"> 
	<li>
		<i class="icon-home"></i>
		<a href="{{url('/dashboard')}}">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="">Settings</a>
	</li>
</ul>		
<div class="row-fluid sortable">
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>Settings</h2>
	</div>
	<div class="box-content">
		<form class="form-horizontal" action="{{ url('/store-setting/'.$setting->id) }}" method="post" enctype="multipart/form-data">
		  @csrf
		  <fieldset>
			<div class="control-group">
			  <label class="control-label" for="date01">Restaurant Name</label>
			  <div class="controls">
				<input type="text" class="input-xlarge" name="company_name" value="{{ $setting->company_name }}">
			  </div>
			</div>

			<div class="control-group">
			  <label class="control-label" for="date01">Website</label>
			  <div class="controls">
				<input type="text" class="input-xlarge" name="company_website" value="{{ $setting->company_website }}">
			  </div>
			</div>

			<div class="control-group">
			  <label class="control-label" for="date01">Email</label>
			  <div class="controls">
				<input type="email" class="input-xlarge" name="company_email" value="{{ $setting->company_email }}">
			  </div>
			</div>

			<div class="control-group">
			  <label class="control-label" for="date01">Phone</label>
			  <div class="controls">
				<input type="text" class="input-xlarge" name="company_phone" value="{{ $setting->company_phone }}">
			  </div>
			</div>

			<div class="control-group">
			  <label class="control-label" for="date01">Facebook Page</label>
			  <div class="controls">
				<input type="text" class="input-xlarge" name="company_fb" value="{{ $setting->company_fb }}">
			  </div>
			</div>

			<div class="control-group">
			  <label class="control-label" for="date01">Address</label>
			  <div class="controls">
				<input type="text" class="input-xlarge" name="company_address" value="{{ $setting->company_address }}">
			  </div>
			</div>

			<div class="control-group">
			  <label class="control-label" for="date01">City</label>
			  <div class="controls">
				<input type="text" class="input-xlarge" name="company_city" value="{{ $setting->company_city }}">
			  </div>
			</div>

			<div class="control-group">
			  <label class="control-label" for="fileInput">Logo</label>
			  <div class="controls">
				<input class="input-file uniform_on" name="logo" id="fileInput" type="file" onchange="readURL(this);" >
				<input type="hidden" name="old_one" value="{{ $setting->logo }}">
                 <img style="width: 125px;" src="{{ asset($setting->logo) }}" id="one" >
			  </div>
			</div> 

			<div class="form-actions">
			  <button type="submit" class="btn btn-primary">Save</button>
			  <button type="reset" class="btn">Cancel</button>
			</div>
		  </fieldset>
		</form>   
	</div>
</div>
</div>

<script src="{{asset('public/backend/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript">
function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#one')
              .attr('src', e.target.result)
              .width(100)
              .height(90);
      };
      reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endsection