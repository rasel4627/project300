@extends('frontend.user_layout')
@section('content')
@include('frontend.slider')
<h2 class="title text-center">Foods Items</h2>

@foreach($products as $row)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <a href="{{ url('/view-product/'.$row->product_id) }}"><img src="{{ asset($row->product_image) }}" alt="" style="height:190px;width:200px;"/></a>
                        <h2>{{ $row->product_price }} TK</h2>
                        <a href="{{ url('/view-product/'.$row->product_id) }}"><p>{{ $row->product_name }}</p></a>
                        <a href="{{ url('/view-product/'.$row->product_id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div> 
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="{{ url('/view-product/'.$row->product_id) }}"><i class="fa fa-plus-square"></i>View Food</a></li>
                </ul>
            </div>
        </div>
    </div>
@endforeach

</div>
<div class="category-tab">
<div class="col-sm-12">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tshirt" data-toggle="tab">Breakfast</a></li>
        <li><a href="#blazers" data-toggle="tab">Lunch</a></li>
        <li><a href="#sunglass" data-toggle="tab">Dinner</a></li>
        <li><a href="#poloshirt" data-toggle="tab">Drinks</a></li>
    </ul>
</div>

@php
     $breakfast = DB::table('products')
             ->join('categories','products.category_id','categories.category_id')
             ->select('products.*','categories.category_name')
             ->where('categories.category_id',15)
             ->where('products.publication_status',1)
             ->limit(12)
             ->get();

     $lunch = DB::table('products')
             ->join('categories','products.category_id','categories.category_id')
             ->select('products.*','categories.category_name')
             ->where('categories.category_id',16)
             ->where('products.publication_status',1)
             ->limit(12)
             ->get();

    $dinner = DB::table('products')
             ->join('categories','products.category_id','categories.category_id')
             ->select('products.*','categories.category_name')
             ->where('categories.category_id',17)
             ->where('products.publication_status',1)
             ->limit(12)
             ->get();

    $drinks = DB::table('products')
             ->join('categories','products.category_id','categories.category_id')
             ->select('products.*','categories.category_name')
             ->where('categories.category_id',18)
             ->where('products.publication_status',1)
             ->limit(12)
             ->get();
@endphp

<div class="tab-content">
    <div class="tab-pane fade active in" id="tshirt" >
        @foreach($breakfast as $row)
        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ asset($row->product_image) }}" alt="" style="height:190px;width:200px;"/>
                        <h2>{{ $row->product_price }} TK</h2>
                        <a href="{{ url('/view-product/'.$row->product_id) }}"><p>{{ $row->product_name }}</p></a>
                        <a href="{{ url('/view-product/'.$row->product_id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
       
    </div>
    <div class="tab-pane fade" id="blazers" >

        @foreach($lunch as $row)
        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ asset($row->product_image) }}" alt="" style="height:190px;width:200px;"/>
                        <h2>{{ $row->product_price }} TK</h2>
                        <a href="{{ url('/view-product/'.$row->product_id) }}"><p>{{ $row->product_name }}</p></a>
                        <a href="{{ url('/view-product/'.$row->product_id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
       
    </div>

    <div class="tab-pane fade" id="sunglass" >
       
        @foreach($dinner as $row)
        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ asset($row->product_image) }}" alt="" style="height:190px;width:200px;"/>
                        <h2>{{ $row->product_price }} TK</h2>
                        <a href="{{ url('/view-product/'.$row->product_id) }}"><p>{{ $row->product_name }}</p></a>
                        <a href="{{ url('/view-product/'.$row->product_id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <div class="tab-pane fade" id="poloshirt" >
       
        @foreach($drinks as $row)
        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ asset($row->product_image) }}" alt="" style="height:190px;width:200px;"/>
                        <h2>{{ $row->product_price }} TK</h2>
                        <a href="{{ url('/view-product/'.$row->product_id) }}"><p>{{ $row->product_name }}</p></a>
                        <a href="{{ url('/view-product/'.$row->product_id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    
</div>
</div>

@endsection