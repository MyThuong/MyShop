<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tinhtrangdonhang extends Model
{
    protected $table = "tinhtrangdonhang";
    public function tinhtrangdh()
    {
    	return $this->hasMany('App\DonHang', 'tinhtrangdonhang', 'id');
    }
 
}
