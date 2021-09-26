<!-- load file layout chung -->
@extends("layouts.app")
@section("do-du-lieu")
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="{{ url('admin/category/create') }}" class="btn btn-primary"
         style="border-color: green; background-color: green;">Thêm danh mục</a>
    </div>
    <div class="panel panel-primary" style="border-color: green;">
        <div class="panel-heading" style="background-color: gray;">Danh sách danh mục</div>
        <style>
       .panel-heading{
  background-image: url("{{ asset('backend/layout1/img/background2.jpg') }}");}
        </style>
        <div class="panel-body">
            <table class="table table-bordered table-hover" style="color: black; border: 2px solid green; margin-top: 10px; ">
                <tr style="border: 2px solid green;">
                     <th style="width: 120px;">Ảnh</th>
                    <th>Tên danh mục</th>
                    <th style="width:45%;">Mô tả</th>
                    <th style="width:15%;">Chỉnh sửa</th>
                </tr>
                @foreach($data as $rows)
                <tr>
                    <td style="text-align: center;">
                        @if($rows->image != "" && file_exists("images/".$rows->image))
						<img src="{{ asset('images/'.$rows->image) }}" style="width:100px;">
						@endif
                    </td>
                    <td style="color: red; font-weight: bold;">{{ $rows->name }}</td>
                    <td>{{ $rows->description }}</td>
                    <td style="text-align:center; ">
                        <button style="border-color: green;"><a href="{{ url('admin/category/edit/'.$rows->slug_category) }}">Sửa</a></button> &nbsp; 
                        <button style="border-color: gray;"><a href="{{ route('category.destroy', ['id' => $rows->id]) }}" onclick="return window.confirm('Bạn có chắc chắn muốn xóa không?');">Xóa</a></button>
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