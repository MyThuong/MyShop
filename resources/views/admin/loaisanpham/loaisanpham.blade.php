  @extends('admin.layouts.hihi')
 @section('noidung')
 <div class="card-content table-responsive">
 {{-- basic --}}
   <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->

                <div class="page-content">
                    <!-- BEGIN PAGE BREADCRUMB -->
                 
                
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row">
                    {{-- ds san pham --}}
                        <div class="col-md-5">
                
                           
                      <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <span class="caption-subject sbold uppercase">cây phân cấp</span>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body ">
                                    <div class="dd" id="nestable_list_1">
                                        <ol class="dd-list">
                                                 @foreach ($catest as $cateone)
                                            <li class="dd-item">
                                                <div class="dd-handle ct" style="color:red; font-weight: bold" title="{{$cateone->id}}">{{$cateone->TenLoai}}</div>
                                                <ol class="dd-list">

                                                     @foreach($catend as $catetwo)
                                                      @if($catetwo->id_Parent == $cateone->id)
                                                    <li class="dd-item">
                                                        <div class="dd-handle ct" style="color:green;" title="{{$catetwo->id}}">{{$catetwo->TenLoai}}</div>
                                                        <ol class="dd-list">

                                                              @foreach ($caterd as $catethree)
                                                                @if($catethree->id_Parent == $catetwo->id)
                                                            <li class="dd-item">
                                                                <div class="dd-handle ct" title="{{$catethree->id}}">{{$catethree->TenLoai}}</div>
                                                            </li>
                                                            @endif
                                                           @endforeach
                                                        </ol>
                                                    </li> 
                                                      @endif
                                                    @endforeach     
                                                </ol>
                                            </li>
                                           
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>
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
                <span class="caption-subject bold uppercase">Thêm, Chỉnh sửa loại sản phẩm</span>
              
                </div>

                </div>
                <!--  -->
                        @if(session('thongbao'))
                         <div class="alert alert-danger" id="fail">{{session('thongbao')}}</div>
                       @endif
                       @if (session('thanhcong'))
                        <div class="alert alert-success" id='success'>{{session('thanhcong')}}</div>
                        @endif
      
                <!-- begin update -->
                <!-- chia cột -->
                <div class = "row">
                <div class= "col-md-12">
             
                <form action="admin/loaisanpham/postthemsua" method= "post" id="form_sample_2" class="form-horizontal">
               <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                    <div class="form-body">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button> Sai thông tin!</div>
                      
                        <div class="form-group  margin-top-20">
                            <label class="control-label col-md-3">Tên Thể Loại
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-9">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <input type="text" class="form-control" name="name" id="tenloai"/> 
                                    </div>
                            </div>
                        </div>

                            <div class="form-group">
                                         <label class="control-label col-md-3">Cha hiện tại

                                       </label>
                            <div class="col-md-9">
                                       <input type="text" class="form-control" id="capcha" disabled="disabled" />
                                    </div>
                                  </div>
                         <div class="form-group">
                                         <label class="control-label col-md-3">Chọn cha mới

                                       </label>
                            <div class="col-md-9">
                                        <select id="single" class="form-control select2" style="width:70%;">
                                        <option value="-1">------------Không chọn-----------</option>
                                            <option value="0">KHÔNG CÓ</option>
                                          
                                                 @foreach ($catest as $cateone)
                                                 <option  value="{{$cateone->id}}"> {{$cateone->TenLoai}}</option>
                        

                                                     @foreach($catend as $catetwo)
                                                        @if($catetwo->id_Parent == $cateone->id)
                                                      <option value="{{$catetwo->id}}">--------{{$catetwo->TenLoai}}</option>
                                                        @endif
                                                    @endforeach          
                                                   @endforeach
                                     
                                        </select>
                                    </div>
                                  </div>
                         <div class="form-group  margin-top-20">
                            <label class="control-label col-md-3">Mô tả chung

                            </label>
                            <div class="col-md-9">
                                <div class="input-icon right">
                                    <i class="fa"></i>
                                    <textarea class="form-control" name="des" id="des" rows="6"></textarea> 
                                    </div>
                            </div>
                        </div>

     
        </div>
        </div>


        <div class="form-actions">
          <div class="row">
              <div class="col-md-offset-3 col-md-9">
                   <button type="submit" id="sua" class="btn blue">Sửa</button>
                  <button type="submit" id="them" class="btn green">Lưu & mới</button>
                  <button type="submit" class="btn red" id="xoa">Xóa</button>
                  <input type="hidden" name="submit" id="submit"/>
              </div>
          </div>

</div>
                                  
          
          <input type="hidden" name="id" id="id"/>
           <input type="hidden" name="capdo" id="capdo"/>
          <input type="hidden" name="id_Parent" id="id_Parent"/>
           <input type="hidden"  value="-1" name="id_Parent_new" id="id_Parent_new"/>
    </div>
                    
            </form>
                </div>
                </div>
 </div>
 </div>
</div>
  </div>
  @endsection
 <!-- javascript -->
 @section('script')

 {{-- bắt sự kiện thêm và sửa --}}
          <script>
   // xem chi tiết:
$(document).ready(function() {
   // alert("hihi");
      $('.ct').click(function()
      {
        var a = $(this).attr("title");
    
      
      // alert(a);

        $.get(('admin/loaisanpham/chitiet'),{id:a},function(data){
              var js = data;
               var js1 = JSON.parse(js)
      
        $('#tenloai').val(js1.TenLoai);
        $('#des').val(js1.MoTa);
        $('#id').val(js1.id);
        $('#capcha').val(js1.TenCha);
        $('#capdo').val(js1.CapDo)
        $('#id_Parent').val(js1.id_Parent);
        $("html, body").animate({
            scrollTop: 0,
           }, 600);
          return false;

       

    });
    });

      $('#single').change(function(){
      var id= $(this).val();
      $('#id_Parent_new').val(id);
         
      });

      // $('.chamoi').click(function(){

      //   alert($(this).attr("title"));

      // });
      

    });

 </script>

 <script>
   $(document).ready(function() {
      $('#them').mouseenter(function() {
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
  
        $('#tenloai').val(null);
         $('#des').val(null);
          $('#id').val(null);
          $('#id_Parent').val(null);
          $('#capcha').val(null);
   }

 </script>

 <script>
   // $(document).ready(function() {
   //    $('#success').slideUp(3000);
   //    $('#fail').slideUp(10000);
   // });

 </script>

 @endsection

