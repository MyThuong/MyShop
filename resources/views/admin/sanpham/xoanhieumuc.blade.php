@extends('admin.layouts.hihi')
@section('noidung')
<div class="page-content-wrapper">
         
                <div class="page-content">
        <div class="row">
                        <div class="col-md-12">
                            <div class="portlet light form-fit bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-social-dribbble font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">Multiple Select</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    <form action="index.html" class="form-horizontal form-row-seperated">
                                        <div class="form-body">
                                  <div class="form-group">
                                  <div class= "col-md-3">
                                       <label class="control-label">Tìm theo Loại sản phẩm:

                                       </label>
                                       </div>
                            <div class="col-md-5">
                                        <select  id='loaisanpham' class="form-control select2">
                                                 @foreach($loaisanpham as $tt)
                                               <option value="{{$tt->id}}">{{$tt->TenLoai}}</option>
                                                   @endforeach
                                     
                                        </select>
                                    </div>
                                  </div>
                                   <div class="form-group ">
                                   <div class='col-md-3'>
                                       <label class="control-label ">Tìm theo sản phẩm:

                                       </label>
                                       </div>
                            <div class="col-md-5">
                                        <select  id='sanpham' class="form-control select2">
                                                 @foreach($sanpham as $sp)
                                               <option value="{{$sp->id}}">{{$sp->TenSanPham}}</option>
                                                   @endforeach
                                     
                                        </select>
                                    </div>
                                  </div>



                                            <div class="form-group">
                                            <div class='col-md-3'>
                                                <label class="control-label">Danh mục sản phẩm:</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <select multiple="multiple" class="multi-select" id="my_multi_select1" name="my_multi_select1[]">
                                                     @foreach($sanpham as $sp)
                                               <option value="{{$sp->id}}">{{$sp->TenSanPham}}</option>
                                                   @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green">
                                                        <i class="fa fa-check"></i> Submit</button>
                                                    <button type="button" class="btn grey-salsa btn-outline">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                            <!-- END PORTLET-->
                        </div>
                    </div>
</div>
</div>

@endsection
 @section('script')
   <script>
   	$(document).ready(function(){

    });

   </script>
  @endsection