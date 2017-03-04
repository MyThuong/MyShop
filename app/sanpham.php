<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    protected $table = "sanpham";
    public $timestamps = false;
    public function loaisp()
    {
    	return $this->belongsTo('App\LoaiSanPham', 'MaLoaiSP', 'id');
    }
 
     public function hinh()
    {
    	return $this->hasMany('App\SanPham_img', 'id_sanpham', 'id');
    }
}
