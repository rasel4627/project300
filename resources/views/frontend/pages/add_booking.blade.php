@extends('frontend.user_layout')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<section id="form">
<div class="container">
	<div class="row" style="margin-left: 180px;">
		<div class="col-sm-5">
			<div class="signup-form">
				<h2 style="color: red;font-weight: bold;font-size: 29px">Book a Table</h2>
				<form action="{{ url('/make-reservation') }}" method="post">
				  @csrf
					<input type="text" placeholder="Full Name" name="name" required=""/>
					<input type="email" placeholder="Your Email" name="email" required=""/>
					<input type="text" placeholder="Phone" name="phone" required=""/>
					<input type="date" placeholder="Date" name="date" required=""/>
					<input type="time" placeholder="Time" name="time" required=""/>
					<input type="number" placeholder="Person" name="person" required=""/><br>
					<button type="submit" class="btn btn-default">Make Reservation</button>
				</form>
			</div>
		</div>
	</div>
</div>
</section>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
      @if(Session::has('message'))
        var type = "{{Session::get('alert-type','info')}}";
        switch(type){
          case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
          case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
          case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
          case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
      }
      @endif
</script>
@endsection