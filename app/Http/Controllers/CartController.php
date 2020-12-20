<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
     public function AddToCart(Request $request)
     {
     	   $qty = $request->qty;
	        $product_id = $request->product_id;
	        $product = DB::table('products')
              	     ->where('product_id',$product_id)
              	     ->first();

	        $data['qty'] = $qty;
	        $data['id'] = $product->product_id;
	        $data['name'] = $product->product_name;
	        $data['price'] = $product->product_price;
	        $data['weight'] = $product->product_price;
	        $data['options']['image'] = $product->product_image; 

	        Cart::add($data);
	        return Redirect::to('/show-cart');
     }
     public function ShowCart()
     {
     	 $category = DB::table('categories')
		  		   ->where('publication_status',1)
		  		   ->get();
		 return view('frontend.pages.add_to_cart',compact('category'));
     }
     public function DeleteCart($rowId)
     {
     	Cart::update($rowId,0);
          return Redirect::to('/show-cart');
     }
     public function UpdateCart(Request $request)
     {
     	$qty = $request->qty;
          $rowId = $request->rowId;
          Cart::update($rowId,$qty);
          return Redirect::to('/show-cart');
     }
}
