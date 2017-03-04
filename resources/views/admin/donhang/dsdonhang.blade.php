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
                    <span class="caption-subject bold uppercase">thông tin đơn hàng </span>
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

                     @foreach($donhang as $value)  
                      <div class="portlet-body">
                               <div class="alert alert-block alert-info fade in">
                                            
                      <div class="todo-tasklist-item-title" style="padding-bottom:2px;">
                      <div class = 'row'>
                       <div class = 'col-md-8' style="padding: 0; margin:0;"> 
                      <div class="btn blue btn-outline btn-circle btn-sm pull-right ct" value='{{$value->id}}'>chi tiết <span class="fa fa-angle-right"></span></div>
                       <div class = 'key' style = "color: black">
                    
                              
                         <span style =" color: blue; font-size: 15px"><b>Số đơn hàng: {{$value->id}}</b></span> <br>
                     <span style =" color: green; font-size: 17px"> Mã khách hàng:  {{$value->id_khachhang}} <br></span>
                      Tên khách hàng:  <?php $tenkhachhang = App\khachhang::find($value->id_khachhang);
                        echo $tenkhachhang->TenKH; ?> <br>
                      Ngày đặt:{{$value->ngaydathang}} <br>
                      Ngày giao:{{$value->ngaygiaohang}} <br>
                      Tổng giá trị : {{$value->tonggiatri}}<br>
                       Tình Trạng:<?php
                      $ten_tinh_trang = App\tinhtrangdonhang::find($value->tinhtrangdonhang);
                       echo $ten_tinh_trang->TenTinhTrang;
                    ?><br>
                         </div>
                         </div>
             
                         </div>
                    </div>
                                    </div>
                    
                            </div>
                    @endforeach
                    {{-- end nội dung 1 --}}


              {!! $donhang-> links()!!}
                    
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
                <i class = icon-pencil></i> <span class="caption-subject bold uppercase">Chi tiết đơn hàng</span>

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
                <form action="admin/donhang/postthemsuaxoa" method= "post" id="form_sample_2" class="form-horizontal" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>

                    <div class="form-body">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button> sai thông tin rồi! xem lại nào! </div>
                    
                            <div class="row">
                            {{-- thông tin --}}
                              <div class= "col-md-7">
                                
                        <div class="form-group margin-top-20">
                                       <label class="control-label col-md-4">Mã khách hàng
                              <span class="required"> * </span>
                                       </label>
                            <div class="col-md-8">
                                        <select class="form-control select2" id="id_khachhang" name="id_khachhang" style="width:70%;">
                                                 @foreach($khachhang as $kh)
                                               <option value="{{$kh->id}}">{{$kh->id}}</option>
                                                   @endforeach
                                     
                                        </select>
                                    </div>
                                  </div>
              
                       
                             <div class="form-group margin-top-20">
                                       <label class="control-label col-md-4">Tình trạng đơn hàng  <span class="required"> * </span>

                                       </label>
                            <div class="col-md-8">
                                        <select class="form-control select2" id="tinhtrang" name="tinhtrangdonhang" style="width:70%;">
                                                 @foreach($tinhtrangdonhang as $tl)
                                               <option value="{{$tl->id}}">{{$tl->TenTinhTrang}}</option>
                                                   @endforeach
                                     
                                        </select>
                                    </div>
                                  </div>
              
                         <div class="form-group">
                            <label class="control-label col-md-4">Tổng giá trị
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="tonggiatri" id="tonggiatri"/> </div>
                            </div>
                        </div>
                      
                           <div class="form-group">
                            <label class="control-label col-md-4">Ngày đặt hàng
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type='date' class='form-control'  name='ngaydathang' id='ngaydathang' value= '<?php echo date('Y-m-d'); ?>' />
                                    </div>
                              <span id="errdate1" style="color:red"></span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-4">Ngày giao hàng
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                     <input type='date' class='form-control'  name='ngaygiaohang' id='ngaygiaohang' value='<?php echo date('Y-m-d'); ?>' />
                                    </div>
                                     <span id="errdate" style="color:red"></span>
                            
                            </div>
                        </div>
                            
                       
     
         
   
                              </div>
                              {{-- end thông tin --}}
                              {{-- hình --}}

  <div class="col-md-5">
        Thông tin bổ sung abcd...
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
      $.get(('admin/donhang/chitietdonhang/'+ b), function(data)
      {
         var js = data;
         var js1 = JSON.parse(js);
            $('#id_khachhang').val(js1.id_khachhang);
              $('#tonggiatri').val(js1.tonggiatri);
                 $('#tinhtrangdonhang').val(js1.tinhtrangdonhang);
                  $('#ngaydathang').val(js1.ngaydathang);
                 $('#ngaygiaohang').val(js1.ngaygiaohang);
                  $('#id').val(js1.id)
          
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
      $('#ngaygiaohang').blur(function(){
          var ngaygiao = $(this).val();
          var ngaydat =  $('#ngaydathang').val();

          $.get(('admin/donhang/checkngay/'+ ngaydat + '/' + ngaygiao), function(data)
          {
            
            if(data != 1)
            {
              $('#errdate').html("");
              $('#errdate').html('Ngày giao hàng phải lớn hơn ngày đặt hàng');
            }
            else
               $('#errdate').html("");

          });

        });

       $('#ngaydathang').blur(function(){
          var ngaydat= $(this).val();
          var ngaygiao = $('#ngaygiaohang').val();
          $.get(('admin/donhang/checkngay/'+ ngaydat + '/' + ngaygiao), function(data)
          {
            
            if(data != 1)
            {
              $('#errdate1').html("");
              $('#errdate1').html('Ngày giao hàng phải lớn hơn ngày đặt hàng');
            }
            else
               $('#errdate1').html("");

          });

          });
  });

 </script>

  <script>
   function removeform()
   {
  
            $('#id_khachhang').val(null);
              $('#tonggiatri').val(null);
                 $('#tinhtrangdonhang').val(null);
                  $('#ngaydathang').val('<?php echo date('Y-m-d'); ?>');
                 $('#ngaygiaohang').val('<?php echo date('Y-m-d'); ?>');
                  $('#id').val(0);
          $('#errdate').html('');
           $('#errdate1').html('');
   }

 </script>

 {{-- validate form --}}

@endsection
