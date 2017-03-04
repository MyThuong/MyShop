<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaisanpham;

class loaisanphamcontroller extends Controller
{
    public function xuat()
    {
      $catest = loaisanpham::where('CapDo','1')->get();
      $catend = loaisanpham::where('CapDo','2')->get();
      $caterd = loaisanpham::where('CapDo','3')->get();
      return view('admin.loaisanpham.loaisanpham', ['catest'=>$catest, 'catend'=>$catend,'caterd'=>$caterd]);
    }
    public function chitiet(Request $request)
    {
      $id = $request->id;
      $lsp = Loaisanpham::find($id);
 		if($lsp->CapDo == 1)
 		{
        $lsp->toJson();
        $json = json_decode($lsp,true);
        $json['TenCha'] = 'Không có';
        $lsp = json_encode($json);
         echo $lsp;
         }
         else
         {
		$lsp->toJson();
  		$tencha = Loaisanpham::where('id',$lsp->id_Parent)->get()->toArray();       
         $json = json_decode($lsp,true);
         $json['TenCha'] = $tencha[0]['TenLoai'];
         $lsp = json_encode($json);
         echo $lsp;

         }
        

    }
    public function postthemsua(Request $rs)
    {



      if($rs->has('submit'))
      {
      			if($rs->id_Parent_new > 0)
      			{
      		   $sp = Loaisanpham::where('id',$rs->id_Parent_new)->get()->toArray(); //Lấy dòng từ id cha để tìm cấp độ, +1 dể có cấp độ mới.
      		   $capdo = $sp[0]['CapDo'] + 1;
      			}
      			elseif($rs->id_Parent_new == -1)
      			{
      				$capdo = -1;
      			}

      			else  $capdo = 1;

       if($rs['submit'] == "them")
       {		if($capdo == -1)
       			return redirect('admin/loaisanpham/danhsach')->with('thongbao', 'Bạn phải nhập loại sản phẩm cha');
			   $loaisanpham= new Loaisanpham();
			   $loaisanpham->TenLoai = $rs['name'];
			   $loaisanpham->Alias = "chua-thuc-hien";
			   $loaisanpham->CapDo = $capdo;
			   $loaisanpham->MoTa = $rs['des'];
			   $loaisanpham->id_Parent = $rs->id_Parent_new;
			   $loaisanpham->save();
       		return redirect('admin/loaisanpham/danhsach')->with('thanhcong', 'Thêm thành công!');
       }
       elseif($rs['submit'] ==  "xoa")
       {

       		$array = Loaisanpham::where('id_Parent',$rs->id)->get()->toArray(); 
      		if(count($array) == 0)
      		{
        		 $lsp = Loaisanpham::destroy($rs->id);
          		return redirect('admin/loaisanpham/danhsach')->with('thanhcong', 'Xóa thành công!');
          	}
          	else
          		return redirect('admin/loaisanpham/danhsach')->with('thongbao', 'Không được xóa mục này, bạn phải xóa mục con trước!');
       }

      else if($rs['submit'] == "sua")
      {			
      			// Nếu không chọn sp cha mới thì sửa thông tin để yên ID cha.
      			if($rs->id_Parent_new == -1)
      			{

       	       $loaisanpham = Loaisanpham::find($rs->id);
    	       $loaisanpham->TenLoai = $rs['name'];
			   $loaisanpham->Alias = "chua-thuc-hien";
			   $loaisanpham->MoTa = $rs['des'];
			   $loaisanpham->CapDo = $rs->capdo;
			   $loaisanpham->save();
			   }
			   	//Nếu sản phẩm cha là KHÔNG CÓ (tức là sẽ set cấp độ = 1 và ID cha =0)
			   	elseif($rs->id_Parent_new == 0)
      			{

       	       $loaisanpham = Loaisanpham::find($rs->id);
    	       $loaisanpham->TenLoai = $rs['name'];
			   $loaisanpham->Alias = "chua-thuc-hien";
			   $loaisanpham->MoTa = $rs['des'];
			   $loaisanpham->CapDo = 1;
			   $loaisanpham->id_Parent = 0;
			   $loaisanpham->save();
			   }
      		// Nếu có chọn sản phẩm cha mới
      			else
      			{
      			  $cha = Loaisanpham::find($rs->id_Parent_new);
      			
      			   if($rs->capdo == 1)
      			   {
			      		   $loaisanpham = Loaisanpham::find($rs->id);
			    	       $loaisanpham->TenLoai = $rs['name'];
						   $loaisanpham->Alias = "chua-thuc-hien";
						   $loaisanpham->MoTa = $rs['des'];
						   $loaisanpham->save();
      			   }
      			   elseif($rs->capdo == 2)
      			   {

      			   		if($cha->CapDo == 1)
      			   		{

      			   			   $loaisanpham = Loaisanpham::find($rs->id);
				    	       $loaisanpham->TenLoai = $rs['name'];
							   $loaisanpham->Alias = "chua-thuc-hien";
							   $loaisanpham->MoTa = $rs['des'];
							   $loaisanpham->id_Parent = $rs->id_Parent_new;
							   $loaisanpham->save();
      			   		}
      			   			
      			   		else 
      			   		{
      			   			return redirect('admin/loaisanpham/danhsach')->with('thongbao', 'Bạn không thể sửa loại sản phẩm này với sản phẩm cha cấp 2 hoặc cấp 3');
      			   			  
      			  		 }
      			   }
      			   else
      			   {
      			   			   $loaisanpham = Loaisanpham::find($rs->id);
				    	       $loaisanpham->TenLoai = $rs['name'];
							   $loaisanpham->Alias = "chua-thuc-hien";
							   $loaisanpham->MoTa = $rs['des'];
							   $loaisanpham->CapDo = $cha->CapDo+1;
							   $loaisanpham->id_Parent = $rs->id_Parent_new;
							   $loaisanpham->save();
      			   }
      			}

      		
       		return redirect('admin/loaisanpham/danhsach')->with('thanhcong', 'Sửa thành công!');
    
        }

  	 }
	}
}