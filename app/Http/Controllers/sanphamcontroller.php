<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sanpham;
use App\tinhtrang;
use App\loaisanpham;
use App\sanpham_image;
use File;
class sanphamcontroller extends Controller
{
	public function tenkhongdau($str)
	{
		echo changeTitle($str,$strSymbol='-',$case=MB_CASE_LOWER);
					
	}
    public function xuat()
    {
    	$sanpham = sanpham::paginate(4);
    	$tinhtrang = tinhtrang::all();
    	$loaisanpham = loaisanpham::all();
    	return view('admin.sanpham.dssanpham', ['sanpham' => $sanpham, 'tinhtrang'=>$tinhtrang, 'loaisanpham'=>$loaisanpham]);
    }

    public function postthemsuaxoa(Request $rs)
    {
      if($rs->has('submit'))
      {
        if($rs['submit'] == "them")
        {
         $this->validate($rs, [
        'tensanpham' => 'unique:sanpham|max:100|min:3', 
         'masanpham' => 'unique:sanpham|max:100|min:3', 
          'giavon' => 'numeric', 
           'giaban' => 'numeric',
           'soluonghienco' => 'numeric',
        ],
        [
        'tensanpham.unique'=>'Tên sản phẩm đã sử dụng',
          'tensanpham.max'=>'Tên sản phẩm từ 3->100 kí tự',
            'tensanpham.min'=>'Tên sản phẩm từ 3->100 kí tự',
            'masanpham.unique'=>'Mã sản phẩm đã sử dụng',
          'masanpham.max'=>'Mã sản phẩm từ 3->100 kí tự',
          'giaban.numeric'=>'Giá bán phải là một số',
          'giavon.numeric'=>'Giá mua phải là một số',
          'soluonghienco.numeric'=>'Số lượng phải là một số',
        ]);
        $sanpham= new sanpham();
       $sanpham->TenSanPham = $rs['tensanpham'];
       $sanpham->TenKhongDau = changeTitle($rs['tensanpham'],$strSymbol='-',$case=MB_CASE_LOWER);
       $sanpham->MaSanPham = $rs['masanpham'];
        $sanpham->MaLoaiSP= $rs['loaisanpham'];
   		$sanpham->id_TinhTrang= $rs['tinhtrang'];
       $sanpham->GiaVon = $rs['giavon'];
       $sanpham->GiaBan = $rs['giaban'];
       $sanpham->NgayNhap = $rs->ngaynhap;
       $sanpham->SoLuongHienCo= $rs->soluong;
         if($rs->hasFile('uphinh'))
         {
           $err=array();
           $file = $rs->file('uphinh');
          if($file->getMimeType()!= 'image/jpeg' && $file->getMimeType()!='image/png' && $file->getMimeType()!="image/jpg"&& $file->getMimeType()!="image/gif")
                 $err[] = "loidinhdang";
           
              if( $file->getSize() > 8000000)
                   $err[] = "loisize";
              if(empty($err))
                {
                $filename =  $filename =$sanpham->TenKhongDau.'.'.$file->getClientOriginalExtension('uphinh');
                $file->move('img/sanpham/anhdaidien/', $filename);
                 $sanpham->AnhDaiDien = $filename;
                 }
       }
       $sanpham->save();
         if(empty($err))
            return redirect('admin/sanpham/danhsach?page='.$rs['page'])->with('thanhcong', 'Thêm thành công');
          else
            return redirect('admin/sanpham/danhsach?page='.$rs['page'])->with('thanhcong', 'Thêm thông tin thành công nhưng Hình ảnh không hợp lệ');
        }
      else if($rs['submit'] == "sua")
      {
      	  if($rs->has['id'])
           {
           $this->validate($rs, [
 
         'masanpham' => 'unique:sanpham|max:100|min:3', 
          'giavon' => 'numeric', 
           'giaban' => 'numeric',
           'soluonghienco' => 'numeric',
        ],
        [
            'masanpham.unique'=>'Tên sản phẩm đã sử dụng',
          'masanpham.max'=>'Mã sản phẩm từ 3->100 kí tự',
          'giaban.numeric'=>'Giá bán phải là một số',
          'giavon.numeric'=>'Giá mua phải là một số',
          'soluonghienco.numeric'=>'Số lượng phải là một số',
        ]);
       $sanpham= sanpham::find($rs->id);
     
      $sanpham->TenKhongDau = changeTitle($rs['tensanpham'],$strSymbol='-',$case=MB_CASE_LOWER);
       $sanpham->MaSanPham = $rs['masanpham'];
       $sanpham->MaLoaiSP= $rs['loaisanpham'];
        $sanpham->id_TinhTrang= $rs['tinhtrang'];
       $sanpham->GiaVon = $rs['giavon'];
       $sanpham->GiaBan = $rs['giaban'];
       $sanpham->NgayNhap = $rs->ngaynhap;
       $sanpham->SoLuongHienCo= $rs->soluong;
        if($rs->hasFile('uphinh'))
         {
          $err=array();
           $file = $rs->file('uphinh');
         if($file->getMimeType()!= 'image/jpeg' && $file->getMimeType()!='image/png' && $file->getMimeType()!="image/jpg"&& $file->getMimeType()!="image/gif")
                 $err[] = "loidinhdang";
           
              if( $file->getSize() > 8000000)
                   $err[] = "loisize";
              if(empty($err))
              { 
                  $filename =$sanpham->TenKhongDau.'.'.$file->getClientOriginalExtension('uphinh');
                   if(file_exists('img/sanpham/anhdaidien'.$filename))
                {
                  File::delete('img/sanpham/anhdaidien'.$filename);
                }
                 
                $sanpham->AnhDaiDien = $filename;
                $file->move('img/sanpham/anhdaidien', $filename);
                      }

      }
        
       $sanpham->save();
        if(empty($err))
            return redirect('admin/sanpham/danhsach?page='.$rs['page'])->with('thanhcong', 'Sửa thành công');
          else
            return redirect('admin/sanpham/danhsach?page='.$rs['page'])->with('thanhcong', 'Sửa thông tin thành công nhưng Hình ảnh không hợp lệ');
}
else  return redirect('admin/sanpham/danhsach?page='.$rs['page'])->with('thongbao', 'Chưa chọn sản phẩm');
 

      }
       else if($rs['submit'] ==  "xoa")
       {
           if($rs->has['id'])
           {
         $sanpham= sanpham::destroy($rs->id);
          return redirect('admin/sanpham/danhsach?page='.$rs['page'])->with('thanhcong', 'Xóa thành công');
       }
     }
     else 
       return redirect('admin/sanpham/danhsach?page='.$rs['page'])->with('thongbao', 'Chưa chọn sản phẩm');
 
    }
  }
public function chitietsanpham($id)
    {
       
        $sanpham = sanpham::find($id)->toJson();
        echo $sanpham;
       
}
 public function checksanpham($name)
    {

  $sanpham = sanpham::where('TenSanPham', $name)->value('TenSanPham');
  echo $sanpham;

}
 public function checkmasanpham($masp)
    {

  $masanpham = sanpham::where('MaSanPham', $masp)->value('MaSanPham');
  echo $masanpham;

}
public function xoanhieumuc()
{
    $loaisanpham = loaisanpham::all();
    $sanpham = sanpham::all();
  return view('admin.sanpham.xoanhieumuc',['loaisanpham'=>$loaisanpham, 'sanpham'=>$sanpham]);
}
public function viewHinh($id)
{
   $sanpham = sanpham::all();
   $tensanpham = sanpham::where('id', $id)->get();
   $hinh = sanpham_image::where('id_sanpham', $id)->get();
  return view('admin.sanpham.hinhanh', ['sanpham'=>$sanpham,'tensanpham'=>$tensanpham,'id_sanpham'=>$id, 'hinh'=>$hinh]);
}
public function themhinh(Request $rs)
{
        
          $err=array();
           $file = $rs->file('uphinh');
            $filename = $file->getClientOriginalName('uphinh');
         if($file->getMimeType()!= 'image/jpeg' && $file->getMimeType()!='image/png' && $file->getMimeType()!="image/jpg"&& $file->getMimeType()!="image/gif")
                 $err[] = "loidinhdang";
              if( $file->getSize() > 8000000)
              $err[] = "loisize";
         if(file_exists('img/sanpham/anh/'.$filename))
              $err[] = "trunghinh";
      if(empty($err))
        {
           
          $file->move('img/sanpham/anh/', $filename);
          $sanpham_img = new sanpham_image();
         $sanpham_img->anh = $filename;
          $sanpham_img->id_sanpham = $rs['id_sanpham'];
          echo $rs['id_sanpham'];
          $sanpham_img->save();
           return redirect('admin/sanpham/hinhanh/'. $rs->id_sanpham)->with('thanhcong', 'Sửa thành công');
       } 
          else
            return redirect('admin/sanpham/hinhanh/'. $rs->id_sanpham)->with('thongbao', 'Hình ảnh không hợp lệ');
       
  
}
public function test()
{
   $sanpham = sanpham::all();

   $id = $sanpham->find('1');
   echo $id->TenSanPham;

}

}
