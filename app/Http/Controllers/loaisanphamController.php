<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theloai;
use App\loaisanpham;

class loaisanphamController extends Controller
{
    //thêm 1 loại sản phẩm vào danh sách
    public function getThem(){
    	$theloai = theloai::all();
    	return view('admin.loaisanpham.them', ['theloai'=>$theloai]);
    }
    public function postThem(Request $request){
    	$this->validate($request,
    		[
    			'txtTen'=>'required'
    		],
    		[
    			'txtTen.required'=>'Bạn cần nhập tên loại sản phẩm.'
    		]

    	 );
    	$loaisanpham = new loaisanpham;
    	$loaisanpham->tenloaisanpham = $request->txtTen;
    	$loaisanpham->id_theloai = $request->id_theloai;
    	$loaisanpham->save();
    	return redirect('admin/loaisanpham/them')->with('thongbao', 'Bạn đã thêm loại sản phẩm thành công.');
    }

    //danh sách các loại sản phẩm của cửa hàng
    public function danhsach(){
    	$loaisanpham = loaisanpham::all();
    	return view('admin.loaisanpham.danhsach', ['loaisanpham'=>$loaisanpham]);
    }
    public function getSua($id){
    	$loaisanpham = loaisanpham::find($id);
    	$theloai = theloai::all();
    	return view('admin.loaisanpham.sua', ['loaisanpham'=>$loaisanpham, 'theloai'=>$theloai]);
    }
    public function postSua(Request $request, $id)
    {
    	$this->validate($request, 
    		[
    			'txtTen'=>'required'
    		],
    		[
    			'txtTen.required'=>'Bạn cần điền tên loại sản phẩm.'
    		]
    	);
    	$loaisanpham = loaisanpham::find($id);
    	$loaisanpham->tenloaisanpham = $request->txtTen;
    	$loaisanpham->id_theloai = $request->id_theloai;
    	$loaisanpham->save();
    	return redirect('admin/loaisanpham/sua/'. $id)->with('thongbao', 'Bạn đã sửa loại sản phẩm thành công.');
    }
}
