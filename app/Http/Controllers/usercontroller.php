<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\users;
use Input;
use File;
class usercontroller extends Controller
{
    public function getloginadmin()
    {
    	return view('admin.login');
    }
    public function postloginadmin(Request $rs)
    {

     if( Auth::attempt(['name'=> $rs['username'], 'password' => $rs['password']]))
            return redirect('admin/user/danhsach')->with('id', $rs['username']);
        else 
            return redirect('admin/login')->with('thongbao', 'Username or Password not correct!!!');
      }
         
    public function changepass(Request $rs)
    {
         $oldpass = $rs['oldpass'];
        $new = $rs['newpass'];
        $ac = $rs['acceptpass'];
         echo "pass".$oldpass.$new.$ac;
        if(Auth::attempt(['password'=> $oldpass, 'id'=>Auth::user()->id]))
        {
          if($new != $ac)
              return redirect('admin/user/profile')->with('thongbao2', 'Mật khẩu không khớp nhau!!!');
          else
          {
            $user = users::where('id', Auth::user()->id)->update(['password' => bcrypt($rs['newpass'])]);
             return redirect('admin/user/profile')->with('thanhcong1', 'Success change password');
          }
        }
        else
        {
          return redirect('admin/user/profile')->with('thongbao1', 'Mật khẩu không đúng!!!');
        }
    }
    public function xuat()
    {
         $user= users::paginate(4);
       
        return view('admin.user.nguoidung', ['user' => $user]);
    }
     public function them()
    {
          $user= users::paginate(4);
       
        return view('admin.user.nguoidung', ['user' => $user]);
    }
       
    //sửa, xóa

public function postthemsua(Request $rs)
    {
      if($rs->has('submit'))
      {
        if($rs['submit'] == "them")
        {
         $this->validate($rs, [
        'name' => 'unique:users|max:100|min:3', 'password'=>'required|max:100|min:6', 'namsinh'=>'required',
        ],
        [
        'name.unique'=>'Tên này đã được sử dụng',
        'password.required'=>'Bạn phải điền mật khẩu',
        'namsinh.required'=>'Bạn phải chọn năm sinh',
        ]);
        $user= new users();
       $user->name = $rs['name'];
       $user->email = $rs['email'];
        $user->fullname = $rs['fullname'];
       $user->password = bcrypt($rs['password']);
       $user->namsinh = $rs['namsinh'];
       $user->capdo = $rs->capdo;
       $user->gioitinh = $rs->gioitinh;
         if($rs->hasFile('uphinh'))
         {
          
          $file = $rs->file('uphinh');
        $filename = $rs['name'].'.'.$file->getClientOriginalExtension('uphinh');
        $file->move('img/profile', $filename);
         $user->anh = $filename;
         }
       $user->save();
       return redirect('admin/user/danhsach?page='.$rs['page'])->with('thanhcong', 'Thêm thành công');

        }
      else if($rs['submit'] == "sua")
      {
         $this->validate($rs, [
          'namsinh'=>'required',
        ],
        [
        'namsinh.required'=>'Bạn phải chọn năm sinh',
        ]);
       if($rs->has['id'])
           {
       $user= users::find($rs->id);
        $user->email = $rs['email'];
        $user->fullname = $rs['fullname'];
       $user->namsinh = $rs['namsinh'];
       $user->capdo = $rs->capdo;
       $user->gioitinh = $rs->gioitinh;
        if($rs->hasFile('uphinh'))
         {
          
           $file = $rs->file('uphinh');
        $filename = $rs['name'].'.'.$file->getClientOriginalExtension('uphinh');
        $result = glob( 'img/profile/*');
        foreach ($result as $name) {
          echo $result->getFilename();
        }

           if(file_exists('img/profile/'.$filename))
        {
          File::delete('img/profile/'.$filename);
        }
        $user->anh = $filename;
        $file->move('img/profile', $filename);
      }
        
       $user->save();
       return redirect('admin/user/danhsach?page='.$rs['page'])->with('thanhcong', 'Sửa thành công');
}
    else
     return redirect('admin/user/danhsach?page='.$rs['page'])->with('thongbao', 'chưa chọn user');
      }
       else if($rs['submit'] ==  "xoa")
       { 
        if($rs->has['id'])
          {
         $user= users::destroy($rs->id);
          return redirect('admin/user/danhsach?page='.$rs['page'])->with('thanhcong', 'Xóa thành công');
        }
        else
           return redirect('admin/user/danhsach?page='.$rs['page'])->with('thongbao', 'Chưa chọn user');
       }
    }
  }

  public function logout()
  {
      Auth::logout();
     return redirect('admin/login');
  }
  public function profile()
  {
    return view('admin/user/profile');
  }
  public function changeavatar(Request $rs)
  {
     
     // kiểm tra loại file
      if($rs->hasFile('avatar'))
       {  
          $err=array();
          $file=$rs->file('avatar');
        if($file->getMimeType()!= 'image/jpeg' && $file->getMimeType()!='image/png' && $file->getMimeType()!="image/jpg"&& $file->getMimeType()!="image/gif")
                 $err[] = "loidinhdang";
           
              if( $file->getSize() > 8000000)
                   $err[] = "loisize";
              if(empty($err))
              { 
                    $filename = Auth::user()->name.'.'.$file->getClientOriginalExtension('avatar');
                    
                     if(File::exists('img/profile/'.$filename))
                    { 
                      File::delete('img/profile/'.$filename);
                    }
                  
                      $user = users::find(Auth::user()->id);
                      $user->anh = $filename;
                      $user->save();
                    $file->move('img/profile', $filename);
                    return redirect('admin/user/profile')->with('thanhcong','đổi hình thành công!');
              }
               else 
                     return view('admin.user.profile', ['errfile'=> $err]);
                 }
      else 
        return redirect('admin/user/profile')->with('thongbao','chưa chọn hình');
}

    public function chitietuser($id)
    {
       
        $user = users::find($id)->toJson();
        echo $user;
       
}

    public function checkuser($name)
    {

  $user = users::where('name', $name)->value('name');
  echo $user;

}
public function editprofile(Request $rs)
{
      $this->validate($rs, [
        'fullname' => 'max:100|min:6', 
        'sodienthoai'=>'numeric',
         'chucvu'=>'max:100|min:3',
        ],
        [
        'fullname.max'=>'Tên từ 6-100 kí tự',
        'fullname.min'=>'Tên từ 6-100 kí tự',
        'sodienthoai.numeric'=>'Số điện thoại phải là số',
        'chucvu.max'=>'Chức vụ từ 3-100 kí tự',
        'chucvu.min'=>'Chức vụ từ 3-100 kí tự',
        ]);
        $user = Auth::user();
        $user->sodienthoai = $rs['sdt'];
        $user->fullname = $rs['fullname'];
       $user->chucvu = $rs['chucvu'];
       $user->chitiet = $rs['chitiet'];
       $user->save();
       return redirect('admin/user/profile')->with('thanhcong3', 'sửa thông tin thành công');
}
}
