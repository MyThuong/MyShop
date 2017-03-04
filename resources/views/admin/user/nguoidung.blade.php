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
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                    {{-- ds san pham --}}
                 <div class="col-md-5">
                
                            <div class="portlet light">
                           
                                     {{-- <div class="portlet light bordered" style = "padding-bottom: 0px;"> --}}
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase">thông tin admin</span>
                </div>

                <div class="inputs">
                    <div class="portlet-input input-inline input-small">
                        <div class="input-icon right">
                            <i class="icon-magnifier"></i>
                            <input type="text" class="form-control form-control-solid input-circle" onkeyup="Search(this)" placeholder="Tìm...">
                        </div>
                    </div>
                </div>
      
            </div>
            {{--  </div> --}}
              {{-- nội dung1 --}}

                     @foreach($user as $value)
    
                      <div class="portlet-body">
                          <div class="alert alert-block alert-info fade in">
             
                      <div class="todo-tasklist-item-title" style="padding-bottom:2px;">
                      <div class = 'row'>
                        <div class = 'col-md-2 col-sm-2'>
                      
                              @if($value->anh != "")
                                <img src="img\profile\{{$value->anh}}" width="400px" class="img-responsive" alt=""> </div>
                                @else
                                  <img src="{{asset('img/rong.jpg')}}" width="400px" class="img-responsive" alt=""> </div>
                              @endif
                         
                
                       <div class = 'col-md-10 col-sm-9' style="padding: 0; margin:0;"> 
                    <div class="btn blue btn-outline btn-circle btn-sm pull-right ct" value='{{$value->id}}'>chi tiết <span class="fa fa-angle-right"></span></div>
                       <div class = 'key' style = "color: black">
                              
                         <span style =" color: blue; font-size: 15px"><b>Tên người dùng:{{$value->name}}</b></span> <br>
                        Tên đầy đủ: {{$value->fullname}} <br>      
                       email: {{$value->email}} <br>      
                      Cấp độ:{{$value->capdo}} <br>
                       Năm sinh:{{$value->namsinh}} <br>
                       Giới tính: {{$value->gioitinh}}<br>
                         </div>
                         </div>
             
                         </div>
                    </div>
                                    </div>
                    
                            </div>
                    @endforeach
                     
                    {{-- end nội dung 1 --}}
              {!! $user-> links()!!}
                    
                        {{-- </div> --}}
                    </div>
            </div>
      








            <!-- thêm chỉnh sửa thông tin -->

                   <div class="col-md-7">
                   <div class="portlet light bordered">
                           
            <div class="portlet-title">
            <div class="pull-right">
              <div class = "btn btn-circle btn-icon-only btn-default" onclick="removeform()">
              <i class = "glyphicon glyphicon-plus"></i></div>
                   <a href="admin/user/xoa?id=" class = "btn btn-circle btn-icon-only btn-default"><i class = "glyphicon glyphicon-remove"></i></a>
                   </div>
                <div class="caption">
                <span class="caption-subject bold uppercase">Thêm, Chỉnh sửa thông tin người dùng</span>
              
                </div>

                </div>
                <!--  -->
                @include('admin.check.error')
                @if(session('thongbao'))
                  <div class="alert alert-danger" id="fail">{{session('thongbao')}}</div>
                @endif
                      @if (session('thanhcong'))
                        <div class="alert alert-success" id='success'>{{session('thanhcong')}}</div>
                        @endif
      
                <!-- begin update -->
                <!-- chia cột -->
                <div class = "row">
                <form action="admin/user/postthemsua" method= "post" id="form_sample_2" class="form-horizontal" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                    <div class="form-body">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button> sai thông tin rồi! xem lại nào! </div>
    
                            <div class="row">
                            {{-- thông tin --}}
                              <div class= "col-md-7">
                                
                          <div class="form-group  margin-top-20">
                            <label class="control-label col-md-4">UserName
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="name" id="name"/> 
                                    </div>
                                    <span id="errname" style="color:red"></span>
                            </div>
                        </div>
                               <div class="form-group  margin-top-20">
                            <label class="control-label col-md-4">FullName
                            
                            </label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="fullname" id="fullname"/> 
                                    </div>
                                   
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-4">Password
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="password" class="form-control" name="password" id="password"/> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Email
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-8">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control"  name="email" id="email"/> </div>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label class="control-label col-md-4">Năm sinh
                              
                            </label>
                            <div class="col-md-8">
                         
                                    <select class="form-control" name="namsinh" id="namsinh">
                                    <option> </option>
                                    <?php $i = 0;
                                    for($i= 1960; $i < 2020; $i ++)
                                          echo "<option>".$i."</option>";
                                     ?>
                                 
                                    </select>
                            </div>
                        </div>
             <div class="form-group">
            <label class="control-label col-md-3">Cấp độ
            </label>
            <div class="col-md-5">
                  <select name="capdo" id="capdo">
                    <?php $j = 1;
                    for($j= 1; $j < 6; $j ++)
                          echo "<option>".$j."</option>";
                     ?>
                    </select></div></div>
         
   
                              </div>
                              {{-- end thông tin --}}
                              {{-- hình --}}

  <div class="col-md-5">
  <div class="form-group">
          <div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-new thumbnail" style="width:200px;height:150px">
                  <img src="img/profile/noimg.jpg" id="img" alt="Chưa có hình" /> </div>
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
            {{-- end hình --}}
                            </div>
                    
        </div>
   <div class="form-group">
            <label class="control-label col-md-3">Giới tính
            </label>
            <div class="md-radio-inline">
                <div class="md-radio">
                    <input type="radio" id="nam" name="gioitinh" id="gioitinh" value="Nam" class="md-radiobtn">
                    <label for="nam">
                        <span></span>
                        <span class="check"></span>
                        <span class="box"></span>Nam </label>
                </div>
                <div class="md-radio">
                    <input type="radio" id="nu" name="gioitinh" value="Nữ" id="gioitinh" class="md-radiobtn">
                    <label for="nu">
                        <span></span>
                        <span class="check"></span>
                        <span class="box"></span> Nữ </label>
                </div>
                <div class="md-radio">
                    <input type="radio" id="chuabiet" name="gioitinh" id="gioitinh" value ="Chưabiết" class="md-radiobtn" checked="yes">
                    <label for="chuabiet">
                        <span></span>
                        <span class="check"></span>
                        <span class="box"></span> Chưa biết</label>
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
</div>
  @endsection
 <!-- javascript -->
 @section('script')
   <script>
   // xem chi tiết:
$(document).ready(function() {
   // alert("hihi");
      $('.ct').click(function()
      {
        var b = $(this).attr('value');
        // var b = parseInt(a.substring(8));
      $.get(('admin/user/chitietuser/'+ b), function(data)
      {
         var js = data;
         var js1 = JSON.parse(js);
          $('#name').val(js1.name);
            $('#email').val(js1.email);
              $('#namsinh').val(js1.namsinh);
                $('#capdo').val(js1.capdo);
                 $('#password').val(js1.password);
                  $('#fullname').val(js1.fullname);
                $('#gioitinh').val(js1.gioitinh);
                if(js1.anh != null)
                   $('#img').attr('src', 'img/profile/'+js1.anh);
            if(js1.anh == null || js1.anh == "")
                   $('#img').attr('src', 'img/profile/noimg.jpg');
          $('#id').val(js1.id)
          if(js1.gioitinh == 'Nữ'){
              $('#nu').attr('checked', 'yes');
          }
          else if(js1.gioitinh == 'Nam'){
              $('#nam').attr('checked', 'yes');
          }
          else
          {
              $('#chuabiet').attr('checked', 'yes');
          }

          // chạy về đầu trang:
          
      });
      $("html, body").animate({
            scrollTop: 0,
           }, 600);
          return false;

      });
   
 });
 </script>
 {{-- bắt sự kiện thêm và sửa --}}
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
 {{-- load form --}}
  <script>
      
   function removeform()
   {
  
        $('#name').val(null);
            $('#email').val(null);
              $('#namsinh').val(null);
                $('#capdo').val(null);
                $('#password').val(null);
                 $('#fullname').val(null);
                $('#gioitinh').val("Chưabiết");
                 $('#img').attr('src', 'img/profile/noimg.jpg');
          $('#id').val(null);
           $('#errname').html("");
   }

 </script>

 <script>
   $(document).ready(function() {
      $('#success').slideUp(2000);
      $('#fail').slideDown(2000);
   });

 </script>
 <script>
  //kiểm tra tên
   $(document).ready(function() {
      $('#name').blur(function(){
          var name = $(this).val();
          $.get(('admin/ajax/checkuser/'+ name), function(data)
          {
            
            if(data != "")
            {
              $('#errname').html("");
              $('#errname').html('Tên người dùng đã được sử dụng!')
            }
            else
               $('#errname').html("");

          });
 });
   });

 </script>
 @endsection

