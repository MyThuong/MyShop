@extends('admin.layouts.hihi')
{{-- @section('script')
 alert(ahihi);
@endsection --}}
 @section('noidung')
 <div class="page-content-wrapper">
         
                <div class="page-content">
        <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light form-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-social-dribbble font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Chi tiết hình ảnh sản phẩm</span>
                                    </div>
                                  
                                </div>
                                <div class="portlet-body form">
        
          
             <!-- BEGIN FORM-->
                    @if(session('thongbao'))
                  <div class="alert alert-danger" id="fail">{{session('thongbao')}} <button class="close" data-close="alert"></button></div>
                @endif
                      @if (session('thanhcong'))
                        <div class="alert alert-success" id='success'>{{session('thanhcong')}}<button class="close" data-close="alert"></button></div>
                        @endif
                  <form action="admin/sanpham/themhinh" method= "post" id="form_sample_2" class="form-horizontal" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
                <input type="hidden" name="id_sanpham" value="{{$id_sanpham}}" />
                        <div class="form-body">
								<div class="form-group margin-top-20">
                            <div class="col-md-2 col-xs-3" style="text-align: center;">
                      		 		<label class="control-label uppercase"><b>sản phẩm:</b></label>
                              </div>
                             <a href ="admin/sanpham/hinhanh/2"> <select>
                               <a href ="admin/sanpham/hinhanh/2"> <option value="">hihi</option>
                                </a>
                              <option value="">kk</option>
                                
                              </select>
                              </a>
         					  		 <div class="col-md-5 col-xs-5">
         					  		
                       				 <select class="form-control select2" id="sanpham" name="sanpham" style="width:70%;">
                       				
	                                 @foreach($sanpham as $tl)
	                                  <option value="{{$tl->id}}">{{$tl->TenSanPham}}</a></option>
                                  	 @endforeach
                                  	 </select>
                                  	</div>
                                   <div class="col-md-3 col-xs-3">
                                    <button type = 'button' class="btn green-haze btn-outline sbold uppercase" id="chitiet">chi tiết</button>
                                   <button type = 'button' class="btn green-haze btn-outline sbold uppercase" id="themhinh">Thêm hình</button>
                            <a href="admin/sanpham/danhsach"  class="btn green-haze btn-outline sbold uppercase" id="">Quay lại</a>
                                  
                                         
                                     </div>
                                     </div>


                      <div class="form-group" id="addform" style="margin: 0 40%; display: none;">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width:200px;height:150px">
                                <img src="img/cat.jpg" id="img" alt="Chưa có hình" /> </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="width: 200px; height:150px;"> </div>
                            <div>
                                <span class="btn default btn-file">
                                    <span class="fileinput-new"> Select image </span>
                                    <span class="fileinput-exists" > Thay đổi </span>
                                    <input type="file" name="uphinh" id="uphinh"> </span>
                  
                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Xóa</a>
                                <input type="submit"  class="btn default  fileinput-exists" name="submit" id="submit" value="Thêm"> </span>
                            </div>
                        </div>
        </div>
         <div class="row"> 

	         @foreach($hinh as $value)
                  <div class="col-md-3" style= "margin-top:20px"><img class= "img-rounded" height="250px" src="img\sanpham\anh\{{$value->anh}}"> </div>
          @endforeach
              </div>
</div>
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
    $(document).ready(function(){
    $('#themhinh').click(function(){
       $('#addform').css('display', 'block');
    });

     $('#themhinh').dblclick(function(){
         $('#addform').css('display', 'none');
      });

    $('#sanpham').change(function(){
        var a = $(this).val();
        <?php header('Location: admin/sanpham/danhsach'); ?>
      
    });
  });
  </script>
{{-- ajax --}}
     <script>

  </script>
 @endsection

