@extends('admin/layouts/hihi')
@section('noidung')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
<!-- BEGIN CONTENT BODY -->
<div class="page-content">
<div class="row">
{{-- info --}}
{{-- <div class="col-md-4" style="padding-right: 0px; margin-right : 0px;">
 --}}
              <div class="profile-sidebar">
                                <!-- PORTLET MAIN -->
                                <div class="portlet light profile-sidebar-portlet bordered">
                                    <!-- SIDEBAR USERPIC -->
                                    
                                    <div class="profile-userpic">
                                         @if(Auth::user()->anh != "")
                                            <img alt="" class="img-responsive" src="img/profile/{{Auth::user()->anh}}" />
                                 @else  <img alt="" class="img-responsive" src="img/profile/noimg.jpg" />
                                         @endif
                                 
                                         </div>
                    
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name"> {{Auth::user()->name}} </div>
                                        <div class="profile-usertitle-job"> {{Auth::user()->fullname}} </div>
                                    </div>
      
                                </div>
                        
                            </div>


<div class="profile-content">
        <div class="row">
          <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title tabbable-line">
                        <div class="caption caption-md">
                            <i class="icon-globe theme-font hide"></i>
                            <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                        </div>
                        <ul class="nav nav-tabs">
                            <li  id="tab1" class="active" >
                                <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                            </li >
                            <li id="tab2" >
                                <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                            </li>
                            <li id="tab3">
                                <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                            </li>
                        
                        </ul>
                    </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <!-- PERSONAL INFO TAB -->
                            @include('admin.check.error')
                             @if(session('thongbao3'))
                             <div class="alert alert-danger" id="fail">{{session('thongbao3')}}<button class="close" data-close="alert"></button></div>
                             @endif
                              @if (session('thanhcong3'))
                        <div class="alert alert-success" id='success'>{{session('thanhcong')}} <button class="close" data-close="alert"></button></div>

                        @endif
                            <div class="tab-pane active " id="tab_1_1">
                                <form role="form" action="admin/user/editprofile" method="POST">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                    <div class="form-group">
                                        <label class="control-label">Full Name</label>
                                        <input type="text" placeholder="Hồ Thị Mỹ Thương" name="fullname" class="form-control" /> </div>
                                    <div class="form-group">
                                        <label class="control-label">Số điện thoại</label>
                                        <input type="text" name='sdt' placeholder="016xxx" class="form-control" /></div>
                                    <div class="form-group">
                                        <label class="control-label">Chức vụ </label>
                                        <input type="text" name='chucvu' placeholder="Design, Web etc." class="form-control" /></div>
                                    <div class="form-group">
                                        <label class="control-label">Chi tiết</label>
                                        <textarea class="form-control" rows="3" name='chitiet' placeholder="sở thích, mô tả..."></textarea>
                                    </div>
                              
                                    <div class="margiv-top-10">
                                        <input type = 'submit' class="btn green" value='Thay đổi' />
                                       
                                    </div>
                                </form>
                            </div>
                            <!-- END PERSONAL INFO TAB -->
                            <!-- CHANGE AVATAR TAB -->
                            <div class="tab-pane" id="tab_1_2">
                            @if(isset($errfile))
                                 <div class="alert alert-danger"> <button class="close" data-close="alert"></button>
                                 <ul>
                                  @foreach($errfile as $error)
                                        hihi
                                        <li>{!!$error!!}  </li>
                                  @endforeach
                                  </ul>
                                  <div class="alert alert-danger"> <button class="close" data-close="alert"></button></div>
                              </div>
                           @endif
                                @if(session('thongbao'))
                             <div class="alert alert-danger" id="fail">{{session('thongbao')}}<button class="close" data-close="alert"></button></div>
                              
                                 @endif
                              @if (session('thanhcong'))
                        <div class="alert alert-success" id='success'>{{session('thanhcong')}} <button class="close" data-close="alert"></button></div>

                        @endif
                                     
                                <form action="admin/user/changeavatar" role="form" enctype="multipart/form-data" method='post'>
                                 <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" id="avt"/> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new"> Select image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="avatar" > </span>
                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="margin-top-10">
                                      <input class="btn green" type="submit" name="submitavatar" id="submitavatar" value="submit">
                                    </div>
                                </form>
                            </div>
                            <!-- END CHANGE AVATAR TAB -->
                            <!-- CHANGE PASSWORD TAB -->
                            @if(session('thongbao1'))
                             <div class="alert alert-danger" id="fail">{{session('thongbao1')}}<button class="close" data-close="alert"></button></div>
                              
                                 @endif
                                  @if(session('thongbao2'))
                             <div class="alert alert-danger" id="fail">{{session('thongbao2')}}<button class="close" data-close="alert"></button></div>
                              
                                 @endif
                              @if (session('thanhcong1'))
                        <div class="alert alert-success" id='success'>{{session('thanhcong1')}} <button class="close" data-close="alert"></button></div>

                        @endif
                            <div class="tab-pane" id="tab_1_3">
                                <form action="admin/user/changepass" method="post">
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                                    <div class="form-group">
                                        <label class="control-label">Current Password</label>
                                        <input type="password" name="oldpass" class="form-control" /> </div>
                                    <div class="form-group">
                                        <label class="control-label">New Password</label>
                                        <input type="password" name="newpass" class="form-control" /> </div>
                                    <div class="form-group">
                                        <label class="control-label">Re-type New Password</label>
                                        <input type="password"  name="acceptpass" class="form-control" /> </div>
                                    <div class="margin-top-10">
                                    <input type= 'submit' id ='submitpass' class="btn green"> Change Password
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
     
    </div>

</div> 
</div>
</div>

</div>
    </div>

   


<!-- END PAGE BASE CONTENT -->

@endsection
@section('script')
<script >
   $(document).ready(function(){

   }); 

</script>
@endsection
