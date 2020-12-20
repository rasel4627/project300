@extends('backend.admin_layout')
@section('admin_content')
<style>
.ml2 {
  font-weight: 800;
  font-size: 3.7em;
  color: Black;
}

.ml2 .letter {
  display: inline-block;
  line-height: 1em;
}
</style>
<ul class="breadcrumb">
<li>
	<i class="icon-home"></i>
	<a href="{{ url('dashboard') }}">Home</a> 
	<i class="icon-angle-right"></i>
</li>
<li><a href="{{ url('dashboard') }}">Dashboard</a></li>
</ul>
	<div style="text-align: center;margin-top: 180px">
	  <h1 class="ml2">Admin Panel</h1>
	</div>
<div class="clearfix"></div>			
</div>   
@endsection