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
                 {{--     @foreach($row as $value => $key) --}}
                      <div class="portlet-body">
                               <div class="alert alert-block alert-info fade in">
                                            
                      <div class="todo-tasklist-item-title" style="padding-bottom:2px;">
                      <div class = 'row'>
                        <div class = 'col-md-3'>
                        <img src="{{asset('img/rong.jpg')}}" style = "display: inline;" class = "img-responsive" >
                        </div>
                       <div class = 'col-md-8' style="padding: 0; margin:0;"> 
                       <div class="btn blue btn-outline btn-circle btn-sm pull-right" >chi tiết <i class= "fa fa-angle-right"></i>
                     </div>
                       <div class = 'key' style = "color: black">
                    
                              
                         <span style =" color: blue; font-size: 15px"><b>Tên sản phẩm: {{$value->TenSanPham}}</b></span> <br>
                       Mã Sản Phẩm  {{$value->id}} <br>
                      Loại sản phẩm:    <?php
                      $ten_loai = App\loaisanpham::find($value->MaLoaiSP);
                      echo $ten_loai->TenLoai;
            
                    ?><br>
                      Ngày nhập:{{$value->NgayNhap}} <br>
                       Giá Bán: {{$value->GiaBan}}<br>
                       Giá Mua:{{$value->GiaVon}}<br>
                       Tình Trạng:{{$value->id_TinhTrang}}<br>
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
              <a href="#" class = "btn btn-circle btn-icon-only btn-default "><i class = "icon-cloud-upload"></i></a>
               <a href="#" class = "btn btn-circle btn-icon-only btn-default "><i class="icon-wrench"></i></a>
                   <a href="#" class = "btn btn-circle btn-icon-only btn-default"><i class = "icon-cloud-upload"></i></a>
                   </div>
                <div class="caption">
              
                   <i class = icon-pencil></i> <span class="caption-subject bold uppercase">Chỉnh sửa thông tin sản phẩm</span>

                </div>
                </div>
                    </div>
                   </div>

                   </div>     
                    </div> 
	                           
                              </div> 	


 @endsection

