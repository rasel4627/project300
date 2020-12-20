<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class HomeController extends Controller
{
    public function index()
    {
    	    $products = DB::table('products')
                   ->join('categories','products.category_id','categories.category_id')
                   ->select('products.*','categories.category_name')
                   ->where('products.publication_status',1)
                   ->limit(30)
                   ->get();
      
    	 return view('frontend.home_content',compact('products'));
    }
    public function view_product($product_id)
    {
           $details = DB::table('products')
                    ->join('categories','products.category_id','categories.category_id')
                    ->select('products.*','categories.category_name')
                    ->where('products.product_id',$product_id)
                    ->where('products.publication_status',1)                       
                    ->first();

            return view('frontend.pages.product_details',compact('details'));
    }

    public function show_product_by_category($category_id)
    {
          $product_by_category = DB::table('products')
                               ->join('categories','products.category_id','categories.category_id')
                               ->select('products.*','categories.category_name')
                               ->where('categories.category_id',$category_id)
                               ->where('products.publication_status',1)
                               ->limit(18)
                               ->get();

          return view('frontend.pages.product_by_category',compact('product_by_category'));
    }
   
    
}
