<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
      public function LoginCheck()
      {
      	  return view('frontend.pages.login');
      }
      public function Registration(Request $request)
      {
           $validatedData = $request->validate([
              'customer_email' => 'required|email|unique:customers|max:55',
            ]);

      	   $data = array();
  	   	   $data['customer_name'] = $request->customer_name;
  	   	   $data['customer_email'] = $request->customer_email;
  	   	   $data['password'] = md5($request->password);
  	   	   $data['mobile'] = $request->mobile;
     	   
  	   	   $customer_id = DB::table('customers')->insertGetId($data);

  	   	   Session::put('customer_id',$customer_id);
  	   	   Session::put('customer_name',$request->customer_name);
  	   	   
  	   	   return Redirect::to('/checkout');
      }
      public function Checkout()
      {
      	   return view('frontend.pages.checkout');
      }
      public function StoreShippingDetails(Request $request)
      {
            $data = array();
            $data['shipping_email'] = $request->shipping_email;
            $data['shipping_first_name'] = $request->shipping_first_name;
            $data['shipping_last_name'] = $request->shipping_last_name;
            $data['shipping_address'] = $request->shipping_address;
            $data['shipping_mobile_number'] = $request->shipping_mobile_number;
            $data['shipping_city'] = $request->shipping_city;


            $shipping_id = DB::table('shipping')->insertGetId($data);
            Session::put('shipping_id',$shipping_id);
            return Redirect::to('/payment');
      }
      public function CustomerLogin(Request $request)
      {
            $customer_email = $request->customer_email;
            $password = md5($request->password);
            $result = DB::table('customers')
                    ->where('customer_email',$customer_email)
                    ->where('password',$password)
                    ->first();

            if($result){
                  Session::put('customer_id',$result->customer_id);
                  return Redirect::to('/checkout');
            }else{
                  return Redirect::to('/login-check');
            }
      }
      public function CustomerLogout()
      {
            Session::flush();
            return Redirect::to('/');
      }
      public function Payment()
      {
            $payment = DB::table('categories')
                      ->where('publication_status',1)
                      ->get();

            return view('frontend.pages.payment',compact('payment'));  
      }
      public function OrderPlace(Request $request)
      {
            $payment_gateway = $request->payment_method;
            
            $pdata = array();
            $pdata['payment_method'] = $payment_gateway;
            $pdata['payment_status'] = 'pending';

            $payment_id = DB::table('payment')
                        ->insertGetId($pdata);

             $odata = array();
             $odata['customer_id']  = Session::get('customer_id');
             $odata['shipping_id']  = Session::get('shipping_id');
             $odata['payment_id']   = $payment_id;
             $odata['order_total']  = Cart::total();
             $odata['order_status'] = 'pending';

             $order_id = DB::table('order')
              ->insertGetId($odata);


             $contents = Cart::content();
             $oddata = array();

             foreach ($contents as $row) {
                  $oddata['order_id'] = $order_id;
                  $oddata['product_id'] = $row->id;
                  $oddata['product_name'] = $row->name;
                  $oddata['product_price'] = $row->price;
                  $oddata['product_sales_quantity'] = $row->qty;

                  DB::table('order_details')
                      ->insert($oddata);
             }

             if ($payment_gateway == 'handcash') {
                 Cart::destroy();
                 return view('frontend.pages.handcash');
                  // echo "Successfully done by handcash";
             }else if ($payment_gateway == 'cart') {
                 echo "Successfully done by cart";
             }else if ($payment_gateway == 'paypal') {
                 echo "Successfully done by paypal";
             }else if($payment_gateway == '0'){
                 echo "Not selected";
             }
      }
      public function ManageOrder()
      {
            $all_order_info = DB::table('order')
                            ->join('customers','order.customer_id','customers.customer_id')
                            ->select('order.*','customers.customer_name')
                            ->get();

            return view('backend.pages.manage_order',compact('all_order_info'));
      }
      public function ViewOrder($order_id)
      {
            $order_by_id = DB::table('order')
                         ->join('customers','order.customer_id','customers.customer_id')
                         ->join('order_details','order.order_id','order_details.order_id')
                         ->join('shipping','order.shipping_id','shipping.shipping_id')
                         ->where('order.order_id',$order_id)
                         ->select('order.*','order_details.*','shipping.*','customers.*')
                         ->get();

            return view('backend.pages.view_order',compact('order_by_id'));
      }
     public function SuccessOrder($order_id)
     {
          DB::table('order')
             ->where('order_id',$order_id)
             ->update(['order_status' => 'success']);
             Session::put('message','Order Successfull !!');
             return Redirect::to('/manage-order');
      }
     public function DeleteOrder($order_id)
      {
          DB::table('order')
                        ->where('order_id',$order_id)
                        ->delete();
           return Redirect::to('/manage-order');
      }
}
