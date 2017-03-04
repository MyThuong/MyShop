<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
       protected $table = "KhachHang";
    public function getDonHang()
    {
    	return $this->hasMany('App\donhang', 'id_KhachHang', 'id');
    }
}
