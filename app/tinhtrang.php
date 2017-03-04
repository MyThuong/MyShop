<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tinhtrang extends Model
{
	protected $table = "tinhtrang";
    public function tinhtrangsp()
    {
    	return $this->hasMany('App\SanPham', 'id_TinhTrang', 'id');
    }

}
