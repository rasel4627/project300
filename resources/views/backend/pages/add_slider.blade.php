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
		<a href="">Add Slider</a>
	</li>
</ul>
			
<div class="row-fluid sortable">
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Slider</h2>
	</div>

	<div class="box-content">
		<form class="form-horizontal" action="{{ url('/store-slider') }}" method="post" enctype="multipart/form-data">
		@csrf
		  <fieldset>
	
			<div class="control-group">
			  <label class="control-label" for="fileInput">Slider Image</label>
			  <div class="controls">
				<input class="input-file uniform_on" name="slider_image" id="fileInput" type="file" required="" onchange="readURL(this);">
				<img src="" id="one" >
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
			  <button type="submit" class="btn btn-primary">Add Slider</button>
			  <button type="reset" class="btn">Cancel</button>
			</div>
		  </fieldset>
		</form>   
	</div>
</div>
</div>

<script type="text/javascript">
function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#one')
              .attr('src', e.target.result)
              .width(80)
              .height(80);
      };
      reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endsection