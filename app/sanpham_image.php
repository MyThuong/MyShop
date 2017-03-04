<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham_image extends Model
{
    	protected $table = "sanpham_img";
        public function sanphamhinh()
    {
    	return $this->belongsTo('App\SanPham', 'id_sanpham', 'id');
    } 
}
