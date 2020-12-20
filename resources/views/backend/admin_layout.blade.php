<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin Dashboard</title>
	<meta name="description" content="Metro Admin Template.">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link id="bootstrap-style" href="{{asset('public/backend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('public/backend/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link id="base-style" href="{{asset('public/backend/css/style.css')}}" rel="stylesheet">
	<link id="base-style-responsive" href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="{{asset('public/backend/img/favicon.ico')}}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
	<script src="{{asset('public/backend/js/ckeditor.js')}}"></script>
</head>

<body>
<div class="navbar">
<div class="navbar-inner">
	<div class="container-fluid">
		<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<a class="brand" href="{{url('/dashboard')}}"><span style="font-weight: bold">TechBD</span></a>
		<div class="nav-no-collapse header-nav">
			<ul class="nav pull-right">
				
				<li class="dropdown">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="halflings-icon white user"></i> {{ Session::get('admin_name') }}
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li class="dropdown-menu-title">
								<span>Account Settings</span>
						</li>
						<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
						<li><a href="{{url('/admin-logout')}}"><i class="halflings-icon off"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
</div>
<div class="container-fluid-full">
<div class="row-fluid">
	<div id="sidebar-left" class="span2">
		<div class="nav-collapse sidebar-nav">
			<ul class="nav nav-tabs nav-stacked main-menu">
				<li><a href="{{url('/dashboard')}}"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
				<li>
					<a class="dropmenu" href="#"><i class="icon-tasks"></i><span class="hidden-tablet">Food Category</span></a>
					<ul>
						<li><a class="submenu" href="{{url('/add-category')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Food Category</span></a></li>

						<li><a class="submenu" href="{{url('/all-category')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Food Category</span></a></li>
					</ul>	
				</li>
				<li>
					<a class="dropmenu" href="#"><i class="icon-folder-close-alt"></i><span class="hidden-tablet"> Foods</span></a>
					<ul>
						<li><a class="submenu" href="{{url('/add-product')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Food</span></a></li>

						<li><a class="submenu" href="{{url('/all-product')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Foods</span></a></li>
					</ul>	
				</li>
				<li><a href="{{url('/booking-list')}}"><i class="icon-list-alt"></i><span class="hidden-tablet">Booking</span></a></li>
				<li>
					<a class="dropmenu" href="#"><i class="icon-picture"></i><span class="hidden-tablet"> Slider</span></a>
					<ul>
						<li><a class="submenu" href="{{url('/add-slider')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> Add Slider</span></a></li>

						<li><a class="submenu" href="{{url('/all-slider')}}"><i class="icon-file-alt"></i><span class="hidden-tablet"> All Slider</span></a></li>
					</ul>	
				</li>
				<li><a href="{{url('/manage-order')}}"><i class="icon-align-justify"></i><span class="hidden-tablet"> Manage Order</span></a></li>
				
				<li><a href="{{url('/settings')}}"><i class="icon-dashboard"></i><span class="hidden-tablet">Settings</span></a></li>

				
			</ul>
		</div>
	</div>
<noscript>
	<div class="alert alert-block span10">
		<h4 class="alert-heading">Warning!</h4>
		<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
	</div>
</noscript>

		<div id="content" class="span10">
		     @yield('admin_content')
		</div>

</div>
</div>

<div class="modal hide fade" id="myModal">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">×</button>
	<h3>Settings</h3>
</div>
<div class="modal-body">
	<p>Here settings can be configured...</p>
</div>
<div class="modal-footer">
	<a href="#" class="btn" data-dismiss="modal">Close</a>
	<a href="#" class="btn btn-primary">Save changes</a>
</div>
</div>
<div class="clearfix"></div>
<footer>
  <p>
	<span style="text-align:left;float:left">&copy; 2020 <a href="http://bootstrapmaster.com/" alt="Bootstrap Themes">creativeLabs</a></span>
	<span class="hidden-phone" style="text-align:right;float:right">Powered by: <a href="http://admintemplates.co/" alt="Bootstrap Admin Templates">Metro</a></span>
  </p>
</footer>

<script src="{{asset('public/backend/js/jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery-migrate-1.0.0.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery-ui-1.10.0.custom.min.js')}}"></script>	
<script src="{{asset('public/backend/js/jquery.ui.touch-punch.js')}}"></script>	
<script src="{{asset('public/backend/js/modernizr.js')}}"></script>	
<script src="{{asset('public/backend/js/bootstrap.min.js')}}"></script>	
<script src="{{asset('public/backend/js/jquery.cookie.js')}}"></script>	
<script src="{{asset('public/backend/js/fullcalendar.min.js')}}"></script>	
<script src="{{asset('public/backend/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/backend/js/excanvas.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.flot.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.flot.pie.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.flot.stack.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.flot.resize.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.chosen.min.js')}}"></script>	
<script src="{{asset('public/backend/js/jquery.uniform.min.js')}}"></script>		
<script src="{{asset('public/backend/js/jquery.cleditor.min.js')}}"></script>	
<script src="{{asset('public/backend/js/jquery.noty.js')}}"></script>	
<script src="{{asset('public/backend/js/jquery.elfinder.min.js')}}"></script>	
<script src="{{asset('public/backend/js/jquery.raty.min.js')}}"></script>	
<script src="{{asset('public/backend/js/jquery.iphone.toggle.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.uploadify-3.1.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.gritter.min.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.imagesloaded.js')}}"></script>	
<script src="{{asset('public/backend/js/jquery.masonry.min.js')}}"></script>	
<script src="{{asset('public/backend/js/jquery.knob.modified.js')}}"></script>	
<script src="{{asset('public/backend/js/jquery.sparkline.min.js')}}"></script>	
<script src="{{asset('public/backend/js/counter.js')}}"></script>	
<script src="{{asset('public/backend/js/retina.js')}}"></script>
<script src="{{asset('public/backend/js/custom.js')}}"></script>
<!-- <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js')}}"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('public/backend/js/sweetalert.min.js')}}"></script>
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
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor2' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
      $(document).on("click", '#delete', function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
          title: "Are you want to delete?",
          text: "Once delete, this  will  be permanently delete!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) { 
              window.location.href = link;
          } else {
            swal("Safe Data");
          }
        });
      });
</script>
</body>
</html>
