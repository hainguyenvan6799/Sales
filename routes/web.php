<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\theloai;
use App\sanpham;
$theloai = theloai::all();
$sanpham = sanpham::all();

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::view('trangchu','pages.trangchu', ['theloai'=>$theloai]);


//đăng ký, đăng nhập
Route::get('dangnhap', 'userController@dangnhap');
Route::post('dangnhap', 'userController@postDangnhap');

Route::get('dangky', 'userController@dangky');
Route::post('dangky', 'userController@postDangky');
Route::get('xacthuc', 'emailController@getXacthuc');
Route::post('xacthuc', 'emailController@postXacthuc');

//các chức năng admin
Route::group(['prefix'=>'admin'], function(){
	Route::group(['prefix'=>'theloai'], function(){
		//thêm vào danh sách thể loại
		Route::get('them', 'theloaiController@getThem');
		Route::post('them', 'theloaiController@postThem');

		//Hiển thị danh sách thể loại
		Route::get('danhsach', 'theloaiController@danhsach');

		//Sửa 1 thể loại
		Route::get('sua/{id}','theloaiController@getSua');
		Route::post('sua/{id}','theloaiController@postSua');

		//Xóa 1 thể loại
		Route::get('xoa/{id}', 'theloaiController@xoa');

	});
	Route::group(['prefix'=>'loaisanpham'], function(){
		//thêm vào danh sách loại sản phẩm
		Route::get('them', 'loaisanphamController@getThem');
		Route::post('them', 'loaisanphamController@postThem');

		//danh sách các loại sản phẩm của cửa hàng
		Route::get('danhsach', 'loaisanphamController@danhsach');

		//sửa 1 loại sản phẩm
		Route::get('sua/{id}', 'loaisanphamController@getSua');
		Route::post('sua/{id}', 'loaisanphamController@postSua');

	});

	Route::group(['prefix'=>'sanpham'], function(){
		// thêm vào danh sách sản phẩm
		Route::get('them', 'sanphamController@getThem');
		Route::post('them', 'sanphamController@postThem');

		//danh sách các loại sản phẩm
		Route::get('danhsach', 'sanphamController@danhsach');

		//sửa 1 sản phẩm
		Route::get('sua/{id}', 'sanphamController@getSua');
		Route::post('sua/{id}', 'sanphamController@postSua');
	});

	Route::group(['prefix'=>'ajax'], function(){
		Route::get('loaisanpham/{idtheloai}', 'ajaxController@getLoaisanpham');
	});
});

Route::view('them', 'admin.theloai.them');

Route::view('aothun', 'pages.tops', ['sanpham'=>$sanpham]);

Route::get('tops/{a}', 'ajaxController@sort');

Route::get('test', 'ajaxController@test');

Route::get('tops', 'ajaxController@filter_data');
