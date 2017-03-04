<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ctdh extends Model
{
 protected $table = "CTDH";
    public function getDonHang()
    {
    	return $this->belongsTo('App\donhang', 'id_DonHang', 'id');
    }
    public function getSanPham()
    {
    	return $this->belongsTo('App\sanpham', 'id_SanPham', 'id');
    }
   
}
