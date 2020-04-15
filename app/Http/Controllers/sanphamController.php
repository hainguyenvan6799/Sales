<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theloai;
use App\loaisanpham;
use App\sanpham;


class sanphamController extends Controller
{
    // thêm 1 sản phẩm vào danh sách
    public function getThem(){
    	$theloai = theloai::all();
    	$loaisanpham = loaisanpham::all();
    	return view('admin.sanpham.them', ['theloai'=>$theloai, 'loaisanpham'=>$loaisanpham]);
    }
    public function postThem(Request $request){
    	// $this->validate($request, 
    	// 	[
    	// 		'txtTen'=>'required',
    	// 		'txtGia'=>'required',

    	// 	],
    	// 	[

    	// 	]
    	// );
    	$sanpham = new sanpham;
    	$sanpham->tensanpham = $request->txtTen;
        $sanpham->tenkhongdau = $request->txtTenkhongdau;
    	$sanpham->gia = $request->txtGia;
    	$sanpham->mota = $request->txtMota;
    	$sanpham->id_loaisanpham = $request->txtloaisanpham;
    	if($request->hasFile('filehinh'))
    	{
    		$file = $request->file('filehinh');
    		$tenhinh = $file->getClientOriginalName();
    		$duoihinh = $file->getClientOriginalExtension();
    		if($duoihinh != 'jpg' && $duoihinh != 'png')
    		{
    			return redirect('admin/sanpham/them')->with('loi', 'Bạn chỉ được upload file .jpg và .png.');
    		}
    			$name = str_random(4) . '_' . $tenhinh;
    			while(file_exists('images/sanpham/' . $tenhinh))
    			{
    				$name = str_random(4) . '_' . $tenhinh;
    			}
    		$file->move('images/sanpham/', $name);
    		$sanpham->hinh = $name;
    	}
    	else
    	{
    		$sanpham->hinh = '';
    	}
    	if($sanpham->save())
    	{
    		return redirect('admin/sanpham/them')->with('thongbao', 'Bạn đã thêm sản phẩm thành công.');
    	}
    	
    }

    // danh sách các loại sản phẩm
    public function danhsach(){
    	$sanpham = sanpham::all();
    	return view('admin.sanpham.danhsach', ['sanpham'=>$sanpham]);
    }

    //Sửa 1 sản phẩm
    public function getSua($id)
    {
    	$sanpham = sanpham::find($id);
    	return view('admin.sanpham.sua', ['sanpham'=>$sanpham]);
    }
    public function postSua(Request $request, $id)
    {
    	$sanpham = sanpham::find($id);
    	$sanpham->tensanpham = $request->txtTen;
        $sanpham->tenkhongdau = $request->txtTenkhongdau;
    	$sanpham->gia = $request->txtGia;
    	$sanpham->mota = $request->txtMota;
    	if($request->hasFile('filehinh'))
    	{
    		$file = $request->file('filehinh');
    		$tenhinh = $file->getClientOriginalName();
    		$duoihinh = $file->getClientOriginalExtension();
    		if($duoihinh != 'jpg' && $duoihinh != 'png')
    		{
    			return redirect('admin/sanpham/sua/'. $id)->with('loi','Bạn chỉ được phép chọn file png và file jpg.');
    		}
    		$name = str_random(4) . '_' . $tenhinh;
    		while(file_exists('images/sanpham/'.$name))
    		{
    			$name = str_random(4) . '_' . $tenhinh;
    		}
    		$file->move('images/sanpham/',$name);
    		$sanpham->hinh = $name;
    	}
    	else
    	{
    		$sanpham->hinh = '';
    	}
    	$sanpham->save();
    	return redirect('admin/sanpham/sua/'. $id)->with('thongbao','Sửa sản phẩm thành công.');
    }

    public function detail_product($tenspkhongdau)
    {
        $detail_product = sanpham::where('tenkhongdau', $tenspkhongdau)->first();
                return view('pages.detail-product', ['sp'=>$detail_product]);
    }

}
