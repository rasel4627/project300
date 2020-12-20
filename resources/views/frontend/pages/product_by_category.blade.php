@extends('frontend.user_layout')
@section('content')

@foreach($product_by_category->slice(0, 1) as $row)
<h2 class="title text-center"><span style="margin-right: 10px"></span> {{ $row->category_name }} - Category</h2>
@endforeach


@foreach($product_by_category as $row)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <a href="{{ url('/view-product/'.$row->product_id) }}"><img src="{{ url($row->product_image) }}" style="height:190px;width: 200px" alt="" /></a>
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
@endsection