<!-- load file layout chung -->
@extends("layouts.app")
@section("do-du-lieu")

<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="{{ url('admin/product/create') }}" class="btn btn-primary"
         style="border-color: green; background-color: green;">Thêm sản phẩm</a>
    </div>
    <div class="panel panel-primary" style="border-color: green;">
        <div class="panel-heading" style="background-color: gray;">Danh sách sản phẩm</div>
        <style>
       .panel-heading{
  background-image: url("{{ asset('backend/layout1/img/background2.jpg') }}");}
        </style>
        <div class="panel-body">
            <table class="table table-bordered table-hover" style="color: black; border: 2px solid green; margin-top: 10px; ">
                <tr style="border: 2px solid green;">
                     <th style="width: 120px;">Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá trước KM</th>
                    <th>Khuyến mãi(%)</th>
                    <th>Giá mới</th>
                    <th>Danh mục</th>
                    <th style="width:12%">Thêm</th>
                    <th>Chỉnh sửa</th>
                </tr>
                @foreach($data as $rows)
                <tr>
                    <td style="text-align: center;">
                        @if($rows->image != "" && file_exists("images/product/".$rows->image))
						<img src="{{ asset('images/product/'.$rows->image) }}" style="width:100px;">
						@endif
                    </td>
                    <td style="color: red; font-weight: bold;">{{ $rows->ProductName }}</td>
                    <td style="color: red; font-weight: bold;">{{ number_format($rows->price) }}đ</td>
                    <td style="color: red; font-weight: bold;">{{ $rows->discount }}%</td>
                    <td style="color: red; font-weight: bold;">{{ number_format(($rows->price)-(($rows->price)*($rows->discount)/100)) }}đ</td>
                    <td style="color: red; font-weight: bold;">{{ $rows->name }}</td>
                    <td>
                        <button style="background:black; border-radius:10px; padding:5px"><a href="{{ url('admin/product/editDetail/'.$rows->id) }}" style="color: white">Ảnh</a></button> &nbsp; 
                        <button style="background:white; border-radius:10px; padding:5px"><a href="{{ url('admin/product/editDetail/'.$rows->id) }}" style="color:black">Size</a></button>
                    </td>
                    <td>
                        <button style="background:black; border-radius:10px; padding:5px"><a href="{{ url('admin/product/edit/'.$rows->id) }}" style="color: white">Sửa</a></button> &nbsp; 
                        <button style="background:white; border-radius:10px; padding:5px"><a href="{{ route('product.destroy', ['id' => $rows->id]) }}" style="color: black">Xóa</a></button>
                    </td>
                </tr>
                    
            	@endforeach
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
                    <li>{{ $data->render() }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection