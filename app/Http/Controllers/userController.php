<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Session;
use URL;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class userController extends Controller
{
    //
    public function dangnhap(){
		Session::put('url.intended',URL::previous());
		return view('login');
	}

	public function postDangnhap(Request $request){
		$this->validate($request,
			[
				'txtEmail'=>'required',
				'txtPassword'=>'required'
			],
			[
				'txtEmail.required'=>'Vui lòng nhập email để thực hiện đăng nhập.',
				'txtPassword.required'=>'Vui lòng nhập password để thực hiện đăng nhập.'
			]
		);
		$email = $request->txtEmail;
		$password = $request->txtPassword;
		// khi dùng attempt để kiểm tra thì mật khẩu không cần dùng bcrypt nữa...
		if(Auth::attempt(['email'=>$email,'password'=>$password]))
		{
			 //return Redirect::to(Session::get('url.intended'));
			echo 'yes';
		}
		//return back();
		else
		{
			echo 'no';	
		}	
	}

	public function dangky(){
        return view('registration');
    }
    public function postDangky(Request $request){
        $this->validate($request, 
            [
                'txtName'=>'required',
                'txtEmail'=>'required|email|unique:users,email',
                'txtPassword'=>'required|regex: /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/',
                'txtPasswordAgain'=>'required|same:txtPassword',
            ],
            [
                'txtName.required'=>'Bạn phải nhập họ và tên.',
                
                'txtEmail.required'=>'Email không được để trống.',
                'txtEmail.email'=>'Bạn chưa nhập đúng định dạng email',
                'txtEmail.unique'=>'Email này đã tồn tại',

                'txtPassword.required'=>'Mật khẩu không được để trống.',
                'txtPassword.regex'=>'Mật khẩu phải có độ dài từ 8 ký tự, có ít nhất 1 chữ cái, 1 chữ số',

                'txtPasswordAgain.required'=>'Nhập lại mật khẩu không được để trống.',
                'txtPasswordAgain.same'=>'Nhập lại mật khẩu phải giống với mật khẩu.'
            ]
        );
        $data = array(
            'name'=> $request->txtTen,
            'message' => "Vui lòng nhấn vào đường link để xác thực thông tin."
        );
        Mail::to($request->txtEmail)->send(new sendMail($data));
        session()->put('ten', $request->txtName);
        session()->put('email', $request->txtEmail);
        session()->put('password', bcrypt($request->txtPassword));
        //session()->put('quyen', 1);
        return back()->with('success','Kiểm tra email để xác thực thông tin đăng ký.');
    }
}
