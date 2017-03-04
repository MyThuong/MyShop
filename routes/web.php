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
use App\sanpham;
use App\loaisanpham;

Route::get('/', function () {
    return view('welcome');
});
Route::get('fc', 'usercontroller@getFile');

Route::get('testform', function () {
    return view('admin.user.test');
});
Route::get('test', 'sanphamcontroller@test');

Route::get('tenkhongdau/{ten}','sanphamcontroller@tenkhongdau');
Route::get('admin/login', 'usercontroller@getloginadmin');
Route::post('admin/login', 'usercontroller@postloginadmin');
Route::get('admin/logout', 'usercontroller@logout');
Route::group(['prefix'=>'admin', 'middleware'=>'adminlogin'], function(){

	Route::group(['prefix'=>'sanpham'], function(){
		Route::get('danhsach', 'sanphamcontroller@xuat');
		Route::get('them', 'sanphamcontroller@themsuaxoa');
		Route::post('postthemsuaxoa', 'sanphamcontroller@postthemsuaxoa');
		Route::post('changeavatar', 'sanphamcontroller@changeavatar');
		Route::get('checksanpham/{name}', 'sanphamcontroller@checksanpham');
		Route::get('checkmasanpham/{masp}', 'sanphamcontroller@checkmasanpham');
		Route::get('chitietsanpham/{id}', 'sanphamcontroller@chitietsanpham');
		Route::get('hinhanh/{id}', 'sanphamcontroller@viewHinh');
		Route::post('themhinh', 'sanphamcontroller@themhinh');
		Route::get('xoanhieumuc', 'sanphamcontroller@xoanhieumuc');
		Route::get('xoatatca', 'sanphamcontroller@xoatatca');
	});
		Route::group(['prefix'=>'loaisanpham'], function(){
		Route::get('danhsach', 'loaisanphamcontroller@xuat');
		Route::post('postthemsua', 'loaisanphamcontroller@postthemsua');
		Route::get('chitiet', 'loaisanphamcontroller@chitiet');
		
	});
		Route::group(['prefix'=>'donhang'], function(){
		Route::get('danhsach', 'donhangcontroller@xuat');
		Route::get('them', 'donhangcontroller@themsuaxoa');
		Route::post('postthemsuaxoa', 'donhangcontroller@postthemsuaxoa');
		Route::get('checkngay/{ngaybatdau}/{ngayketthuc}', 'donhangcontroller@checkngay');
		Route::get('chitietdonhang/{id}', 'donhangcontroller@chitietdonhang');
		Route::get('xoanhieumuc', 'donhangcontroller@xoanhieumuc');
		Route::get('xoatatca', 'donhangcontroller@xoatatca');
	});
		Route::group(['prefix'=>'ctdh'], function(){
		Route::get('danhsach', 'ctdhcontroller@xuat');
		Route::get('them', 'ctdhgcontroller@themsuaxoa');
		Route::post('postthemsuaxoa', 'ctdhcontroller@postthemsuaxoa');
		Route::get('chitietdonhang/{id}', 'ctdhcontroller@chitietdonhang');
		Route::get('xoanhieumuc', 'donhangcontroller@xoanhieumuc');
		Route::get('xoatatca', 'donhangcontroller@xoatatca');
	});
		Route::group(['prefix'=>'khachhang'], function(){
		Route::get('danhsach', 'khachhangcontroller@xuat');
		Route::get('them', 'khachhangcontroller@them');
		Route::get('xoa', 'khachhangcontroller@xoa');

	});
	Route::group(['prefix'=>'khuyenmai'], function(){
		Route::get('danhsach', 'khuyenmaicontroller@xuat');
		Route::get('them', 'khuyenmaicontroller@them');
		Route::get('xoa', 'khuyenmaicontroller@xoa');
	});
	Route::group(['prefix'=>'user'], function(){
		Route::get('danhsach', 'usercontroller@xuat');
		Route::get('them', 'usercontroller@them');
		Route::post('postthemsua', 'usercontroller@postthemsua');
		Route::get('chitiet', 'usercontroller@chitiet');
		Route::get('profile', 'usercontroller@profile');
		Route::post('changeavatar', 'usercontroller@changeavatar');
		Route::post('changepass', 'usercontroller@changepass');
		 Route::get('checkuser', 'usercontroller@checkuser');
		Route::get('checkuser/{name}', 'usercontroller@checkuser');
		Route::get('chitietuser/{id}', 'usercontroller@chitietuser');
		Route::post('editprofile', 'usercontroller@editprofile');

	
	});

});



