@extends('backend.admin_layout')
@section('admin_content')

 @php
   $category = DB::table('categories')->where('publication_status',1)->get();
 @endphp

<ul class="breadcrumb"> 
	<li>
		<i class="icon-home"></i>
		<a href="{{url('/dashboard')}}">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="">Update Food</a>
	</li>
</ul>		
<div class="row-fluid sortable">
<div class="box span12">
	<div class="box-header" data-original-title>
		<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Food</h2>
	</div>
	<div class="box-content">
		<form class="form-horizontal" action="{{url('/update-product/'.$editproduct->product_id)}}" method="post" enctype="multipart/form-data">
		  @csrf
		  <fieldset>
			<div class="control-group">
			  <label class="control-label" for="date01">Food Name</label>
			  <div class="controls">
				<input type="text" class="input-xlarge" name="product_name" value="{{ $editproduct->product_name }}">
			  </div>
			</div>

			<div class="control-group">
				<label class="control-label" for="selectError3">Food Category</label>
				<div class="controls">
				  <select id="selectError3" name="category_id">
				  	<option>Select Category</option>
                        @foreach($category as $row){?>
					       <option value="{{$row->category_id}}" <?php if($row->category_id == $editproduct->category_id){
                          echo "selected";
                      } ?> >{{$row->category_name}}</option>
					     @endforeach
				  </select>
				</div>
			</div>
        
			<div class="control-group hidden-phone">
			  <label class="control-label" for="textarea2">Food Short Description</label>
			  <div class="controls">
				<textarea id="editor" name="product_short_description" rows="3" >{{ $editproduct->product_short_description }}</textarea>
			  </div>
			</div>

			<div class="control-group">
			  <label class="control-label" for="date01">Food Price</label>
			  <div class="controls">
				<input type="text" class="input-xlarge" name="product_price" value="{{ $editproduct->product_price }}">
			  </div>
			</div>

			<div class="control-group">
			  <label class="control-label" for="fileInput">Image</label>
			  <div class="controls">
				<input class="input-file uniform_on" name="product_image" id="fileInput" type="file" onchange="readURL(this);">
				<input type="hidden" name="old_one" value="{{ $editproduct->product_image }}">
				<img style="width: 125px;" src="{{ asset($editproduct->product_image) }}" id="one" >
			  </div>
			</div> 

			<div class="form-actions">
			  <button type="submit" class="btn btn-primary">Update Food</button>
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
              .width(100)
              .height(90);
      };
      reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endsection