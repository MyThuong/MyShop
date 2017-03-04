<link rel="stylesheet" href="{{asset('css\mystyle.css')}}">

	 <div class="card-content table-responsive">
	                                <table class="table">
	                                    <thead class="text-primary">
	                                    	<th>id</th>
	                                    	<th>Tên sản phẩm</th>
	                                    	<th>Ngày nhập</th>
	                                    	<th>Mã loại sản phẩm</th>
	                                    	<th>Giá Bán</th>
	                                    	<th>Giá Bán</th>
	                                    	<th>Tình Trạng</th>
	                                    	<th>Số lượng hiện có</th>
	                                    </thead>
	   <tbody id="td">   
	   @foreach($sanpham as $value)
				<tr>
					<td>{{$value->id}}</td>
					<td>{{$value->TenSanPham}}</td>
					<td>{{$value->NgayNhap}}</td>
					<td>{{$value->MaLoaiSP}}</td>
					<td>{{$value->GiaVon}}</td>
					<td>{{$value->GiaBan}}</td>
					<td>{{$value->id_TinhTrang}}</td>
					<td>{{$value->SoLuongHienCo}}</td>
				</tr>
	@endforeach		
</tbody>
	                                </table>

	                            </div> 

{!! $sanpham-> links()!!}
hello