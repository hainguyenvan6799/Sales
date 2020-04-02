<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class emailController extends Controller
{
    //
    public function getxacthuc(){
    	return view('xacthuc');
    }
    public function postxacthuc(Request $request)
    {	
    	if($request->xacthucbutton == 1)
    	{
    		$user = new User;
	    	$user->name = session('ten');
	    	$user->email = session('email');
	    	//$user->quyen = session('quyen');
	    	$user->password = session('password');
	    	$user->save();
	    	session()->flush();
	    	return redirect('dangky')->with('thongbao','Đăng ký tài khoản thành công.');
    	}
    	else 
    	{
    		return redirect('dangky');
    	}
    }
}
