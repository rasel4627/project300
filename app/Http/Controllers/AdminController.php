<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function login()
    {
    	return view('backend.admin_login');
    }
    public function index()
    {
        $this->AdminAuthCheck();
    	return view('backend.dashboard');
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

    public function AdminDashboard(Request $request)
    {
    	$admin_email = $request -> admin_email;
    	$admin_password = md5($request -> admin_password);
    	$result = DB::table('admin')
				->where('admin_email',$admin_email)	
				->where('admin_password',$admin_password)
				->first();
                
		if($result){
			Session::put('admin_name',$result->admin_name);
			Session::put('admin_id',$result->admin_id);
			return Redirect::to('/dashboard');
		}else{
			Session::put('message','Email or Password Invalid');
			return redirect::to('/admin');
		}
    }
    public function AdminLogout()
    {
    	Session::flush();
    	return Redirect::to('/admin');
    }

}
