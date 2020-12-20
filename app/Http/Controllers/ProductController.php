<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Image;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
     public function AddProduct()
     {
        $this->AdminAuthCheck();
     	  return view('backend.pages.add_product');
     }

     public function StoreProduct(Request $request)
     {
     	   $data = array();
   	   	 $data['product_name'] = $request->product_name;
   	   	 $data['category_id'] = $request->category_id;
   	   	 $data['product_short_description'] = $request->product_short_description;
   	   	 $data['product_price'] = $request->product_price;
   	   	 $data['publication_status'] = $request->publication_status;
         $product_image = $request->product_image;

           if ($product_image) {
                    $image_one_name= hexdec(uniqid()).'.'.$product_image->getClientOriginalExtension();
                    Image::make($product_image)->resize(1000,780)->save('public/image/'.$image_one_name);
                    $data['product_image']='public/image/'.$image_one_name;

                    DB::table('products')->insert($data);
                    $notification=array(
                     'messege'=>'Successfully Food Inserted With Image ',
                     'alert-type'=>'success'
                    );
                   return Redirect()->back()->with($notification);  
         }
   	  
     }

     public function AllProduct()
     {
        $this->AdminAuthCheck();
     	  $product = DB::table('products')
	            	->join('categories','products.category_id','categories.category_id')
	            	->select('products.*','categories.category_name')
	            	->get();
    	  return view('backend.pages.all_product',compact('product'));
     }

     public function InactiveProduct($product_id)
     {
     	   $inactive = DB::table('products')
                       ->where('product_id',$product_id)
                       ->update(['publication_status' => 0]);

            if($inactive){
                $notification = array(
                  'message' => 'Product Successfully Inactivated !!',
                  'alert-type' => 'success'
                  );
            return Redirect()->back()->with($notification);
        }
     }

     public function ActiveProduct($product_id)
     {
     	  $active = DB::table('products')
                       ->where('product_id',$product_id)
                       ->update(['publication_status' => 1]);

            if($active){
                $notification = array(
                  'message' => 'Product Successfully Activated !!',
                  'alert-type' => 'success'
                  );
            return Redirect()->back()->with($notification);
        }
     }

     public function EditProduct($product_id)
     {  
        $this->AdminAuthCheck();
     	  $editproduct = DB::table('products')
                      ->where('product_id',$product_id)
                      ->first();
                      
         return view('backend.pages.edit_product',compact('editproduct')); 
     }

     public function UpdateProduct(Request $request , $product_id)
     {
          $old_one = $request->old_one;
          $product_image=$request->product_image;
          $data = array();
          $data['product_name'] = $request->product_name;
          $data['category_id'] = $request->category_id;
          $data['product_short_description'] = $request->product_short_description;
          $data['product_price'] = $request->product_price;

      if($request->has('product_image'))
        {
            unlink($old_one);
            $image_one_name= hexdec(uniqid()).'.'.$product_image->getClientOriginalExtension();
            Image::make($product_image)->resize(1000,780)->save('public/image/'.$image_one_name);
            $data['product_image']='public/image/'.$image_one_name;

            DB::table('products')
                        ->where('product_id',$product_id)
                        ->update($data);

            $notification = array(
                  'message' => 'Product Successfully Updated With Image !!',
                  'alert-type' => 'success'
                  );
              return Redirect::to('/all-product')->with($notification);
       }else{
            DB::table('products')
                ->where('product_id',$product_id)
                ->update($data); 
            $notification = array(
                  'message' => 'Product Successfully Updated Without Image!!',
                  'alert-type' => 'success'
                  );
            return Redirect::to('/all-product')->with($notification);
       }
   }

     public function DeleteProduct($product_id)
     {
          $product = DB::table('products')->where('product_id',$product_id)->first();
          $image = $product->product_image;
          unlink($image);
          DB::table('products')->where('product_id',$product_id)->delete();
          $notification = array(
                  'message' => 'Product Successfully Deleted !!',
                  'alert-type' => 'error'
                  );
          return Redirect::to('/all-product')->with($notification);
     }

     public function AdminAuthCheck()
     {
        $admin_id = Session::get('admin_id');
        
        if ($admin_id) {
            return;
        }else{
            return Redirect::to('/admin')->send();
        }   
     }
}
