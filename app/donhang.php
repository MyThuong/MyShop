<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    protected $table = "DonHang";
    public function getkhachhang()
    {
    	return $this->belongsTo('App\khachhang', 'id_KhachHang', 'id');
    }
    public function gettinhtrang()
    {
    	return $this->belongsTo('App\tinhtrangdonhang', 'tinhtrangdonhang', 'id');
    }
      public function getCTDH()
    {
    	return $this->hasMany('App\ctdh', 'id_DonHang', 'id');
    }
}
