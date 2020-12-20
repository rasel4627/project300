<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Sultans Dine</title>
<link href="{{ asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{ asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{ asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
<link href="{{ asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
<link href="{{ asset('public/frontend/css/animate.css')}}" rel="stylesheet">
<link href="{{ asset('public/frontend/css/main.css')}}" rel="stylesheet">
<link href="{{ asset('public/frontend/css/responsive.css')}}" rel="stylesheet">      
<link rel="shortcut icon" href="{{ asset('public/frontend/images/ico/favicon.ico')}}">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('public/frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('public/frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('public/frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" href="{{ asset('public/frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head>

<body>
<header id="header">
<div class="header_top" >
<div class="container" style="width: 100%">
    <div class="row">
        <div class="col-sm-6">
            <div class="contactinfo">
                <ul class="nav nav-pills">
                    @php
                        $admin = DB::table('setting')->first();
                    @endphp
                    <li><a href="" style="font-size: 17px;margin-left: 20px"><i class="fa fa-phone"></i> {{ $admin->company_phone }}</a></li>
                    <li><a href="" style="font-size: 17px"><i class="fa fa-envelope"></i> {{ $admin->company_email }}</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="social-icons pull-right">
                <ul class="nav navbar-nav">
                    <li><a href="{{ $admin->company_fb }}" style="font-size: 21px"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="" style="font-size: 21px"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="" style="font-size: 21px"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="" style="font-size: 21px"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<div class="header-middle">
<div class="container" style="width: 96%">
    <div class="row">
    <div class="col-sm-4">
        <div class="logo pull-left" >
            <a href="{{ url('/') }}"><img style="height: 100px;width: 120px" src="{{ asset($admin->logo) }}" alt="" /></a>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="shop-menu pull-right">
            <ul class="nav navbar-nav" style="margin-right: 38px">
                <?php 
                      $customer_id = Session::get('customer_id'); 
                      $shipping_id = Session::get('shipping_id');
                ?>
                 <li><a href="{{ url('/') }}" style="font-size: 17px"><i class="fa fa-"></i>Home</a></li>
                  <li><a href="{{ url('/booking') }}" style="font-size: 17px"><i class="fa fa-"></i> Book a Table</a></li>
                <?php if($customer_id != NULL && $shipping_id == NULL) { ?>
                        <li><a href="{{ url('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                <?php }  if($customer_id != NULL  && $shipping_id != NULL) { ?>
                        <li><a href="{{ url('/payment') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                <?php } else{ ?>
                        <li><a href="{{ url('/login-check') }}" style="font-size: 17px"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                <?php } ?>
                        


                <li><a href="{{ url('/show-cart') }}" style="font-size: 17px"><i class="fa fa-shopping-cart"></i> Cart</a></li>

                <?php   if($customer_id != NULL) { ?>
                        <li><a href="{{ url('/customer-logout')}}"><i class="fa fa-lock"></i> Log Out</a></li>
                <?php } else{ ?>
                        <li><a href="{{ url('/login-check')}}"><i class="fa fa-lock"></i> Login/Signup</a></li>
                <?php } ?> 

            </ul>
        </div>
    </div>
    </div>
</div>
</div>
<div class="header-bottom">
<div class="container">
   
</div>
</div>
</header>

<section>
<div class="container" style="width: 93%">
<div class="row">
    <div class="col-sm-3">
        <div class="left-sidebar">
            <h2>Food Category</h2>
              @php
                 $allcategory = DB::table('categories')->where('publication_status',1)->get();
              @endphp           
                <div class="panel-group category-products" id="accordian">
                   <div class="panel panel-default">
                        @foreach($allcategory as $row)
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                 <h4 class="panel-title"><a href="{{ url('/product_by_category/'.$row->category_id) }}">{{$row->category_name}}</a></h4>
                              </div>
                            </div>
                        @endforeach   
                   </div>
                </div><br>
            <div class=" text-center">
                <img style="width: 270px;height: 290px" src="{{ asset('public/image/Bucket.png')}}" alt="" />
            </div><br><br>
            <div class=" text-center">
                <img style="width: 270px;height: 290px" src="{{ asset('public/image/food-15.jpg')}}" alt="" />
            </div><br><br>
            <div class=" text-center">
                <img style="width: 270px;height: 290px"  src="{{ asset('public/image/thai.jpg')}}" alt="" />
            </div><br><br>
            <div class=" text-center">
                <img style="width: 270px;height: 290px"  src="{{ asset('public/image/week.jpg')}}" alt="" />
            </div><br>
            <div class=" text-center">
                <img style="width: 270px;height: 290px"  src="{{ asset('public/image/food-01.jpg')}}" alt="" />
            </div>
        </div>
    </div>
    <div class="col-sm-9 padding-right">
        <div class="features_items">
           
          @yield('content')

        </div>
    </div>
</div>
</section>

<footer id="footer">
<div class="footer-widget">
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <div class="single-widget">
                <h2>Service</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="">Online Help</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
            </div>
        </div>


        <div class="col-sm-2">
            <div class="single-widget">
                <h2>Quick Buy</h2>
                <ul class="nav nav-pills nav-stacked">
                 @foreach($allcategory as $row)
                    <li><a href="{{ url('/product_by_category/'.$row->category_id) }}">{{$row->category_name}}</a></li>
                 @endforeach
                </ul>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="single-widget">
                <h2>Contact Us</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li> Address :<a href=""> {{ $admin->company_address }},{{ $admin->company_city }}</a></li>
                    <li>Phone : <a href="">{{ $admin->company_phone }}</a></li>
                    <li>Email : <a href="">{{ $admin->company_email }}</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-3 col-sm-offset-1">
            <div class="single-widget">
                <h2>Newsletter</h2>
                <form action="#" class="searchform">
                    <input type="text" placeholder="Your email address" />
                    <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                    <p>Get the most recent updates from <br />our site and be updated your self...</p>
                </form>
            </div>
        </div>
        
    </div>
</div>
</div>
<div class="footer-bottom">
<div class="container">
    <div class="row">
        <p class="pull-left">Copyright © 2020 E-SHOPPER Inc. All rights reserved.</p>
        <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
    </div>
</div>
</div>
</footer>
<script src="{{ asset('public/frontend/js/jquery.js')}}"></script>
<script src="{{ asset('public/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{ asset('public/frontend/js/price-range.js')}}"></script>
<script src="{{ asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{ asset('public/frontend/js/main.js')}}"></script>
</body>
</html>