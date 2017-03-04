<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaisanpham extends Model
{ 
 protected $table = "LoaiSanPham";
    public $timestamps = false;
    public function sanpham()
    {
    	return $this->hasMany('App\SanPham', 'MaLoaiSP', 'id');
    }
    public function loaihang()
    {
    	return $this->belongsTo('App\LoaiHang', 'MaLoaiHang', 'id'); // loại sản phẩm thuộc loại hàng nào
    }
}
