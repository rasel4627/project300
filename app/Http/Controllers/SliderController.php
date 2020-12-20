<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use DB;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;

class SliderController extends Controller
{
    public function AddSlider()
    {
      $this->AdminAuthCheck();
    	return view('backend.pages.add_slider');
    }
    public function StoreSlider(Request $request)
    {
    	   $data = array();
         $data['publication_status'] = $request->publication_status;
         $slider_image = $request->slider_image;

   	   	 if ($slider_image) {
                $image_one_name= hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
                Image::make($slider_image)->resize(1200,700)->save('public/image/'.$image_one_name);
                $data['slider_image']='public/image/'.$image_one_name;

                $store = DB::table('slider')->insert($data);
                if($store){
                	$notification=array(
	                 'messege'=>'Successfully Slider Inserted ',
	                 'alert-type'=>'success'
	                );
	               return Redirect()->back()->with($notification); 	
                }
   	   	 } 
    }
    public function AllSlider()
    {
         $this->AdminAuthCheck();
    	   $slider = DB::table('slider')->get();
   	     return view('backend.pages.all_slider',compact('slider'));
    }
    public function InactiveSlider($slider_id)
    {   
        $this->AdminAuthCheck();
	    	$inactive = DB::table('slider')
	                  ->where('slider_id',$slider_id)
	                  ->update(['publication_status' => 0]);

	        if($inactive){
	              $notification = array(
	                  'message' => 'Slider Successfully inactivated !!',
	                  'alert-type' => 'success'
	                  );
	              return Redirect()->back()->with($notification);
	        }  
    }
    public function ActiveSlider($slider_id)
    {
         $active = DB::table('slider')
	                  ->where('slider_id',$slider_id)
	                  ->update(['publication_status' => 1]);

	        if($active){
	              $notification = array(
	                  'message' => 'Slider Successfully Activated !!',
	                  'alert-type' => 'success'
	                  );
	              return Redirect()->back()->with($notification);
	        }  
    }
    public function DeleteSlider($slider_id)
    {
          $findimg = DB::table('slider')->where('slider_id',$slider_id)->first();
          $image = $findimg->slider_image;
          unlink($image);
          $delete = DB::table('slider')->where('slider_id',$slider_id)->delete();
          if($delete){
              $notification = array(
                  'message' => 'Slider Successfully Deleted !!',
                  'alert-type' => 'error'
                  );
              return Redirect()->back()->with($notification);
        } 
    }

    // Setting Function.................
    public function Setting()
    {
        $this->AdminAuthCheck();
        return view('backend.pages.setting');
    }
    public function StoreSetting(Request $request,$id)
    {
        $data = array();
        $data['company_name'] = $request->company_name;
        $data['company_website'] = $request->company_website;
        $data['company_email'] = $request->company_email;
        $data['company_phone'] = $request->company_phone;
        $data['company_fb'] = $request->company_fb;
        $data['company_address'] = $request->company_address;
        $data['company_city'] = $request->company_city;
        $website_logo = $request->logo;

         if ($website_logo){
                $image_one_name= hexdec(uniqid()).'.'.$website_logo->getClientOriginalExtension();
                Image::make($website_logo)->resize(90,90)->save('public/image/'.$image_one_name);
                $data['logo']='public/image/'.$image_one_name;

                $findimg = DB::table('setting')->where('id',$id)->first();
                $image = $findimg->logo;
                unlink($image);
                
                $store = DB::table('setting')->where('id',$id)->update($data);
                if($store){
                  $notification=array(
                   'messege'=>'Successfully Updated',
                   'alert-type'=>'success'
                  );
                 return Redirect::to('/settings')->with($notification);  
                }
        }else{
          DB::table('setting')->where('id',$id)->update($data);
          $notification = array(
            'message' => 'Successfully Updated',
            'alert-type' => 'success'
            );
          return Redirect::to('/settings')->with($notification);
        }
    }



    // Booking Function.......

    public function Booking()
    {
        return view('frontend.pages.add_booking');
    }
    public function MakeReservation(Request $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['date'] = $request->date;
        $data['time'] = $request->time;
        $data['person'] = $request->person;

        $booking = DB::table('booking')->insert($data);

        if($booking){
            $notification = array(
              'message' => 'Successfully booked',
              'alert-type' => 'success'
              );
            return Redirect()->back()->with($notification);
        }
    }
    public function AllBook()
    {
         $this->AdminAuthCheck();
         $book = DB::table('booking')->get();
         return view('backend.pages.all_booking',compact('book'));
    }


    public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        
        if($admin_id) {
            return;
        }else{
            return Redirect::to('/admin')->send();
        }   
    }
}
