<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theloai;

class theloaiController extends Controller
{
    //Thêm vào danh sách thể loại
    public function getThem(){
    	return view('admin.theloai.them');
    }
    public function postThem(Request $request){
    	$this->validate($request, 
    	[
    		'txtTen'=>'required'
    	],
    	[
    		'txtTen.required'=>'Bạn cần điền tên thể loại.'
    	]
    );
    	$theloai = new theloai;
    	$theloai->tentheloai = $request->txtTen;
        //nếu mà có hình upload lên
        if($request->hasFile('filehinh'))
        {
            $filehinh = $request->file('filehinh');
            $tenhinh = $filehinh->getClientOriginalName();
            $duoihinh = $filehinh->getClientOriginalExtension();
            if($duoihinh != 'jpg' && $duoihinh != 'png')
            {
                return redirect('admin/theloai/them')->with('loi', 'Bạn chỉ được upload file jpg và png.');
            }
            $name = str_random(4) . '_' . $tenhinh;
            while(file_exists('images/theloai/' . $name))
            {
                $name = str_random(4) . '_' . $tenhinh;
            }
            $filehinh->move('images/theloai/', $name);
            $theloai->hinhdaidien = $name;
        }
        else//nếu không có hình được chọn để upload
        {
            $theloai->hinhdaidien = '';
        }
    	$theloai->save();
    	return redirect('admin/theloai/them')->with('thongbao', 'Đã thêm thành công thể loại.');
    }

    //Hiển thị danh sách thể loại
    public function danhsach(){
    	$theloai = theloai::all();
    	return view('admin.theloai.danhsach', ['theloai'=>$theloai]);
    }

    //Sửa 1 thể loại 
    public function getSua($id)
    {
    	$theloai = theloai::find($id);
    	return view('admin.theloai.sua', ['theloai'=>$theloai]);
    }
    public function postSua(Request $request, $id)
    {
    	$theloai = theloai::find($id);
    	$this->validate($request,
    		[
    			'txtTen'=>'required'
    		],
    		[
    			'txtTen.required'=>'Bạn cần nhập tên thể loại.'
    		]
    	);
    	$theloai->tentheloai = $request->txtTen;
        if($request->hasFile('filehinh'))
        {
            $filehinh = $request->file('filehinh');
            $tenhinh = $filehinh->getClientOriginalName();
            $duoihinh = $filehinh->getClientOriginalExtension();
            if($duoihinh != 'jpg' && $duoihinh != 'png')
            {
                return redirect('admin/theloai/them')->with('loi', 'Bạn chỉ được upload file jpg và png.');
            }
            $name = str_random(4) . '_' . $tenhinh;
            while(file_exists('images/theloai/' . $name))
            {
                $name = str_random(4) . '_' . $tenhinh;
            }
            $filehinh->move('images/theloai/', $name);
            $theloai->hinhdaidien = $name;
        }
        else//nếu không có hình được chọn để upload
        {
            $theloai->hinhdaidien = '';
        }
    	$theloai->save();
    	return redirect('admin/theloai/sua/' . $id)->with('thongbao','Bạn đã sửa thể loại thành công.');
    }

    //Xóa 1 thể loại
    public function xoa($id)
    {
    	$theloai = theloai::find($id);
    	$theloai->delete();
    	return redirect('admin/theloai/danhsach')->with('thongbao', 'Bạn đã xóa thể loại ' . $theloai->tentheloai);
    }
}
