<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SanPham', function (Blueprint $table)
        {
         $table->increments('id');
        $table->string('TenSanPham', 200)->unique();
        $table->Date('NgayNhap');
        $table->integer('MaLoaiSP', 11)->unsigned;
        $table->double('GiaVon');
        $table->double('GiaBan');
        $table->string('TinhTrang', 100);
        $table->integer('SoLuongHienCo');
     
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
