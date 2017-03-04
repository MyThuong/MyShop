@extends('admin.layouts.hihi')
 @section('noidung')
 <div class="card-content table-responsive">
 {{-- basic --}}
   <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="index.html">Trang chủ</a>
                          </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                    {{-- ds san pham --}}
                        <div class="col-md-5">
                
                            <div class="portlet light">
                           
                                     {{-- <div class="portlet light bordered" style = "padding-bottom: 0px;"> --}}
            <div class="portlet-title">

                <div class="caption">
                    <span class="caption-subject bold uppercase">thông tin sản phẩm </span>
                </div>

                <div class="inputs">
                    <div class="portlet-input input-inline input-small">
                        <div class="input-icon right">
                            <i class="icon-magnifier"></i>
                            <input type="text" class="form-control form-control-solid input-circle" onkeyup="Search(this)" placeholder="Tìm...">
                        </div>
                    </div>
                </div>
                <div class="inputs" style="margin-right:0px;">
                    <a href="/MCC/Merchant_Product/Create" target="newwindow" class="btn btn-default btn-circle btn-outline btn-sm">Tạo</a>
                </div>
            </div>
            {{--  </div> --}}
                    {{-- nội dung1 --}}

                     @foreach($sanpham as $value)  
                      <div class="portlet-body">
                               <div class="alert alert-block alert-info fade in">
                                            
                      <div class="todo-tasklist-item-title" style="padding-bottom:2px;">
                      <div class = 'row'>
                        <div class = 'col-md-3'>

                               @if($value->AnhDaiDien != "")
                                <img src="img/sanpham/anhdaidien/{{$value->AnhDaiDien}}" width="400px" class="img-responsive" alt=""> 
                                @else
                                  <img src="{{asset('img/rong.jpg')}}" width="400px" class="img-responsive" alt="">
                              @endif




                        </div>
                       <div class = 'col-md-8' style="padding: 0; margin:0;"> 
                      <div class="btn blue btn-outline btn-circle btn-sm pull-right ct" value='{{$value->id}}'>chi tiết <span class="fa fa-angle-right"></span></div>
                       <div class = 'key' style = "color: black">
                    
                              
                         <span style =" color: blue; font-size: 15px"><b>Tên sản phẩm: {{$value->TenSanPham}}</b></span> <br>
                      Mã Sản Phẩm:  {{$value->MaSanPham}} <br>
                      Loại sản phẩm:  <?php $ten_tinh_trang = App\loaisanpham::find($value->MaLoaiSP);
                      echo $ten_tinh_trang->TenLoai; ?> <br>
                      Ngày nhập:{{$value->NgayNhap}} <br>
                       Giá Bán: {{$value->GiaBan}}<br>
                       Giá Mua:{{$value->GiaVon}}<br>
                       Tình Trạng:<?php
                      $ten_tinh_trang = App\tinhtrang::find($value->id_TinhTrang);
                      echo $ten_tinh_trang->TenTT;
                    ?><br>
                     Số lượng hiện có: {{$value->SoLuongHienCo}}<br>
                         </div>
                         </div>
             
                         </div>
                    </div>
                                    </div>
                    
                            </div>
                    @endforeach
                    {{-- end nội dung 1 --}}


              {!! $sanpham-> links()!!}
                    
                        {{-- </div> --}}
                    </div>
            </div>
                   <div class="col-md-7">
                   <div class="portlet light bordered">
                           
            <div class="portlet-title">
               <div class="pull-right">
              <div class = "btn btn-circle btn-icon-only btn-default" onclick="removeform()">
              <i class = "glyphicon glyphicon-plus"></i></div>
                   <a id = 'hinh' class = "btn btn-circle btn-icon-only btn-default"><i class = "glyphicon glyphicon-picture"></i></a>
                   </div>
                <div class="caption">
                <i class = icon-pencil></i> <span class="caption-subject bold uppercase">Chỉnh sửa thông tin sản phẩm</span>

                </div>
                </div>
                      @include('admin.check.error')
                @if(session('thongbao'))
                  <div class="alert alert-danger" id="fail">{{session('thongbao')}}<button class="close" data-close="alert"></button></div>
                @endif
                      @if (session('thanhcong'))
                        <div class="alert alert-success" id='success'>{{session('thanhcong')}}<button class="close" data-close="alert"></button></div>
                        @endif
<div class = "row">
                <form action="admin/sanpham/postthemsuaxoa" method= "post" id="form_sample_2" class="form-horizontal" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>

                    <div class="form-body">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button> sai thông tin rồi! xem lại nào! </div>
              
                            <div class="row">
                            {{-- thông tin --}}
                              <div class= "col-md-7">
                                
                          <div class="form-group  margin-top-20">
                            <label class="control-label col-md-4">Tên sản phẩm
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="tensanpham" id="tensanpham"/> 
                                    </div>
                                    <span id="errname" style="color:red"></span>
                            </div>
                        </div>
                               <div class="form-group  margin-top-20">
                            <label class="control-label col-md-4">Mã sản phẩm
                            
                            </label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="masanpham" id="masanpham"/> 
                                     <span id="errmasp" style="color:red"></span>
                                    </div>
                                   
                            </div>
                        </div>
                             <div class="form-group margin-top-20">
                                       <label class="control-label col-md-4">Loại sản phẩm

                                       </label>
                            <div class="col-md-8">
                                        <select class="form-control select2" id="single" name="loaisanpham" style="width:70%;">
                                                 @foreach($loaisanpham as $tl)
                                               <option value="{{$tl->id}}">{{$tl->TenLoai}}</option>
                                                   @endforeach
                                     
                                        </select>
                                    </div>
                                  </div>
              
                         <div class="form-group">
                            <label class="control-label col-md-4">Giá Vốn
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="giavon" id="giavon"/> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Giá Bán
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control"  name="giaban" id="giaban"/> </div>
                            </div>
                        </div>
                           <div class="form-group">
                            <label class="control-label col-md-4">Ngày nhập
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type='date' class='form-control'  name='ngaynhap' id='ngaynhap' value= '<?php echo date('Y-m-d'); ?>' />
                                    </div>
                            
                            </div>
                        </div>
                               <div class="form-group">
                            <label class="control-label col-md-4">Tình trạng
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-8">
                      
                                    <select class="form-control" name="tinhtrang" id="tinhtrang">
                                    @foreach($tinhtrang as $tt)
                                          <option value="{{$tt->id}}">{{$tt->TenTT}}</option>
                                    @endforeach
                                
                                 
                                    </select>
                            </div>
                        </div>
                               <div class="form-group">
                            <label class="control-label col-md-4">Số lượng hiện có
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control"  name="soluong" id="soluong"/> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Parent
                              
                            </label>
                            <div class="col-md-8">
                         
                                    <select class="form-control" name="parent" id="parent">
                                    <?php $i = 1;
                                    for($i= 1; $i < 4; $i ++)
                                          echo "<option>".$i."</option>";
                                     ?>
                                 
                                    </select>
                            </div>
                        </div>
     
         
   
                              </div>
                              {{-- end thông tin --}}
                              {{-- hình --}}

  <div class="col-md-5">
  <div class="form-group">
          <div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-new thumbnail" style="width:200px;height:150px">
                  <img src="img/cat.jpg" id="img" alt="Chưa có hình" /> </div>
              <div class="fileinput-preview fileinput-exists thumbnail" style="width: 200px; height:150px;"> </div>
              <div>
                  <span class="btn default btn-file">
                      <span class="fileinput-new"> Select image </span>
                      <span class="fileinput-exists" > Change </span>
                      <input type="file" name="uphinh" id="uphinh"> </span>
    
                  <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
              </div>
          </div>
        </div>
        </div>
                            </div>
                    
        </div>

                     <div class="form-actions">
          <div class="row">
              <div class="col-md-offset-3 col-md-9">
                   <button type="submit" id="sua" class="btn blue">Sửa</button>
                  <button type="submit" id="them" class="btn green">Lưu mới</button>
                  <button type="submit" class="btn red" id="xoa">Xóa</button>
                  <input type="hidden" name="submit" id="submit"/>
              </div>
          </div>
          </div>

<input type="hidden" name="id" id="id"/>
<?php 
  if(isset($_GET['page']))
    echo "<input type='hidden' name='page' value='".$_GET['page']."'/>";?>   
            
            </form>
          
                </div>






                    </div>
                   </div>

                   </div>     
                    </div> 
	                           
                              </div> 	

 
 @endsection
@section('script')
<script>
   // xem chi tiết:
$(document).ready(function() {
   // alert("hihi");
      $('.ct').click(function()
      {
        var b = $(this).attr('value');
      $.get(('admin/sanpham/chitietsanpham/'+ b), function(data)
      {
         var js = data;
         var js1 = JSON.parse(js);
          $('#tensanpham').val(js1.TenSanPham);
            $('#masanpham').val(js1.MaSanPham);
              $('#giavon').val(js1.GiaVon);
                $('#giaban').val(js1.GiaBan);

                $('#single').val(js1.MaLoaiSP);
                 $('#tinhtrang').val(js1.id_TinhTrang);
                  $('#ngaynhap').val(js1.NgayNhap);
                $('#soluong').val(js1.SoLuongHienCo);
                if(js1.AnhDaiDien != null)
                   $('#img').attr('src', 'img/sanpham/anhdaidien/'+js1.AnhDaiDien);
            if(js1.AnhDaiDien== null || js1.AnhDaiDien == "")
                   $('#img').attr('src', 'img/cat.jpg');
          $('#id').val(js1.id)
          $('#hinh').attr('href', 'admin/sanpham/hinhanh/'+js1.id);
          
          // chạy về đầu trang:
      });
      $("html, body").animate({
            scrollTop: 0,
           }, 600);
          return false;

      });
   
 });
 </script>

{{-- thêm sửa xóa --}}
 <script>
   $(document).ready(function() {
      $('#them').click(function() {
        $('#submit').attr({"value":"them"}) ;
      });
      $('#sua').click(function() {
        $('#submit').attr({"value":"sua"});
      });
      $('#xoa').click(function() {
        $('#submit').attr({"value":"xoa"});

      });

   });

 </script>

  <script>
  //kiểm tra tên
   $(document).ready(function() {
      $('#tensanpham').blur(function(){
          var name = $(this).val();
          $.get(('admin/sanpham/checksanpham/'+ name), function(data)
          {
            
            if(data != "")
            {
              $('#errname').html("");
              $('#errname').html('Tên sản phẩm đã tồn tại! Chỉ có thể chỉnh sửa!')
            }
            else
               $('#errname').html("");

          });

 });
      $('#masanpham').blur(function(){
          var name = $(this).val();
          $.get(('admin/sanpham/checkmasanpham/'+ name), function(data)
          {
            
            if(data != "")
            {
              $('#errmasp').html("");
              $('#errmasp').html('Mã sản phẩm đã tồn tại!Chỉ có thể chỉnh sửa!')
            }
            else
               $('#errmasp').html("");

          });
   });
        });

 </script>

  <script>
   function removeform()
   {
  
        $('#tensanpham').val(null);
            $('#masanpham').val(null);
              $('#single').val(null);
                $('#giavon').val(null);
                $('#giaban').val(null);
                 $('#tinhtrang').val(null);
                $('#ngaynhap').val('<?php echo date('Y-m-d');?>');
                 $('#img').attr('src', 'img/profile/noimg.jpg');
          $('#id').val(null);
          $('#errname').html('');
          $('#errmasp').html('');
   }

 </script>

 {{-- validate form --}}
 <script>
    $("#form_sample_2").validate({
      rules: {
      "tensanpham":{
       minlength: 4, maxlength: 512, required: !0 
      },
      "masanpham": {
        required: true,
        maxlength: 20,
        minlength: 4
      },
      giavon: {
        customnumeric: true, required: !0 
      },
      giaban:{
       customnumeric: true, required: !0 
      }
      soluong:{
       minCost: true, maxCost: true, required: !0
      }
      ngaynhap:{
      
        required: true,
      }
      tinhtrang:{
      
        required: true,
      }
      },
      messages: {
        tensanpham:{
          required: "thông tin bắt buộc",
          maxlength: "tên sản phẩm nhiều nhất 100 kí tự",
          minlength: "tên sản phẩm ít nhất 3 kí tự"
        },
         masanpham:{
          required: "thông tin bắt buộc",
          maxlength: "mã sản phẩm nhiều nhất 20 kí tự",
          minlength: "mã sản phẩm ít nhất 4 kí tự"
        },
         soluong:{
          required: "thông tin bắt buộc",
          number: "Kiểu dữ liệu số"

        },
        giaban:{
          required: "thông tin bắt buộc",
          customnumeric: "giá bán lớn hơn 0"
        },
        giamua:{
          required: "thông tin bắt buộc",
          customnumeric: "giá mua lớn hơn 0"
        },
         tinhtrang:{
          required: "thông tin bắt buộc",
     
        },
            ngaynhap:{
          required: "thông tin bắt buộc",
     
        }

      }
    });
  </script>
@endsection
