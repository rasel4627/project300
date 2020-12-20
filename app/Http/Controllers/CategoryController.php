<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryController extends Controller
{
    public function AddCategory()
    {
        $this->AdminAuthCheck();
    	  return view('backend.pages.add_category');
    }

    public function StoreCategory(Request $request)
    {
        $validatedData = $request->validate([
        'category_name' => 'required|unique:categories|max:55',
        ]);

        $data = array();
   	    $data['category_id'] = $request->category_id;
   	    $data['category_name'] = $request->category_name;
   	    $data['category_description'] = $request->category_description;
   	    $data['publication_status'] = $request->publication_status;

   	    $category = DB::table('categories')->insert($data);

        if($category){
            $notification = array(
              'message' => 'Successfully Category Inserted',
              'alert-type' => 'success'
              );
            return Redirect::to('/all-category')->with($notification);
        }
    }

    public function AllCategory()
    {
       $this->AdminAuthCheck();
       $category = DB::table('categories')->get();
       return view('backend.pages.all_category',compact('category'));
    }

    public function InactiveCategory($category_id)
    {
        $inactive = DB::table('categories')
                  ->where('category_id',$category_id)
                  ->update(['publication_status' => 0]);

        if($inactive){
              $notification = array(
                  'message' => 'Category Successfully inactivated !!',
                  'alert-type' => 'success'
                  );
              return Redirect()->back()->with($notification);
        }
    }

    public function ActiveCategory($category_id)
    {
        $active = DB::table('categories')
                ->where('category_id',$category_id)
                ->update(['publication_status' => 1]);

        if($active){
              $notification = array(
                  'message' => 'Category Successfully activated !!',
                  'alert-type' => 'success'
                  );
              return Redirect()->back()->with($notification);
        }
    }

    public function EditCategory($category_id)
    {
        $this->AdminAuthCheck();
        $editcategory = DB::table('categories')
                      ->where('category_id',$category_id)
                      ->first();

        return view('backend.pages.edit_category',compact('editcategory'));  
    }

    public function UpdateCategory(Request $request , $category_id)
    {
        $this->AdminAuthCheck();
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;

        $updatecategory = DB::table('categories')
                        ->where('category_id',$category_id)
                        ->update($data);

        if($updatecategory){
              $notification = array(
                  'message' => 'Category Successfully Updated !!',
                  'alert-type' => 'success'
                  );
              return Redirect::to('/all-category')->with($notification);
        }else{
            $notification=array(
                 'message'=>'Nothing to update',
                 'alert-type'=>'error'
                       );
            return Redirect::to('/all-category')->with($notification);
        }
    }

    public function DeleteCategory($category_id)
    {
        $this->AdminAuthCheck();
        $deletecategory = DB::table('categories')
                       ->where('category_id',$category_id)
                       ->delete();

        if($deletecategory){
              $notification = array(
                  'message' => 'Category Successfully Deleted !!',
                  'alert-type' => 'error'
                  );
              return Redirect::to('/all-category')->with($notification);
        }
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
