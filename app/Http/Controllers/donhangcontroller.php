<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\donhang;
use App\tinhtrangdonhang;
use App\ctdh;
use App\khachhang;
use App\donhang_image;
use File;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\strotime;

class donhangcontroller extends Controller
{
	
    public function xuat()
    {
    	$donhang = donhang::paginate(4);
    	$tinhtrangdonhang = tinhtrangdonhang::all();
    	$khachhang = khachhang::all();
    	return view('admin.donhang.dsdonhang', ['khachhang' => $khachhang,'donhang' => $donhang, 'tinhtrangdonhang'=>$tinhtrangdonhang]);
    }

    public function postthemsuaxoa(Request $rs)
    {
      if($rs->has('submit'))
      {
        if($rs['submit'] == "them")
        {
         $this->validate($rs, [ 
          'id_khachhang' => 'numeric|required', 
 			'tonggiatri' => 'numeric',
 			'tinhtrangdonhang'=>'required'
        ],
        [
       	 'id_khachhang.required'=>'phải có khách hàng',
          'id_khachhang.numeric'=>'id khách hàng phải là một số',
           'id_khachhang.required'=>'phải có tình trạng đơn hàng',
          'tonggiatri.numeric'=>'tổng giá trị phải là một số',
        ]);
        $donhang= new donhang();

        $donhang->id_khachhang= $rs['id_khachhang'];
   		$donhang->tinhtrangdonhang= $rs['tinhtrangdonhang'];
       $donhang->ngaydathang = $rs['ngaydathang'];
       $donhang->ngaygiaohang = $rs['ngaygiaohang'];
        $donhang->tonggiatri = $rs['tonggiatri'];
       $donhang->save();
         return redirect('admin/donhang/danhsach?page='.$rs['page'])->with('thanhcong', 'Thêm thành công');
          
        }
      else if($rs['submit'] == "sua")
      {
      	echo "sua";
           $this->validate($rs, [ 
          'id_khachhang' => 'numeric', 
          'tonggiatri' => 'numeric',
           'soluong' => 'numeric',
        ],
        [
          'id_khachhang.numeric'=>'id khách hàng phải là một số',
          'soluong.numeric'=>'Số lượng phải là một số',
           'tonggiatri.numeric'=>'tổng giá trị phải là một số',
        ]);
           if($rs->has['id'])
           {
       $donhang= donhang::find($rs->id);
        $donhang->id_khachhang= $rs['id_khachhang'];
   		$donhang->tinhtrangdonhang= $rs['tinhtrangdonhang'];
       $donhang->ngaydathang = $rs['ngaydathang'];
       $donhang->ngaygiaohang = $rs['ngaygiaohang'];
        $donhang->tonggiatri = $rs['tonggiatri'];
       $donhang->save();
   
      return redirect('admin/donhang/danhsach?page='.$rs['page'])->with('thanhcong', 'Sửa thành công');
  }
  else {
  	    return redirect('admin/donhang/danhsach?page='.$rs['page'])->with('thongbao', 'chưa chọn đơn hàng');
  }
      }
       else if($rs['submit'] ==  "xoa")
       {
      		if($rs->has['id'])
           {
         $donhang= donhang::destroy($rs->id);
          return redirect('admin/donhang/danhsach?page='.$rs['page'])->with('thanhcong', 'Xóa thành công');
      }
            else {
  	    return redirect('admin/donhang/danhsach?page='.$rs['page'])->with('thongbao', 'chưa chọn đơn hàng');
       }
    }
  }
public function chitietdonhang($id)
    {
        $dh = donhang::find($id)->toJson();
        echo $dh;
       
}

 public function checkngay($ngaydathang, $ngaygiaohang)
    {
    	if( $ngaydathang < $ngaygiaohang)
    		echo 1; //ngày hợp lệ
    	else echo 0;
}
public function xoanhieumuc()
{
    $loaidonhang = loaidonhang::all();
    $donhang = donhang::all();
  return view('admin.donhang.xoanhieumuc',['loaidonhang'=>$loaidonhang, 'donhang'=>$donhang]);
}
public function xoatatca()
{
	 DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    $donhang = donhang::truncate();
   	DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    
}

public function test()
{
   $donhang = donhang::all();

   $id = $donhang->find('1');
   echo $id->Tendonhang;

}

}
