@extends("layouts.app")
@section("do-du-lieu")
<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="{{ url('admin/account/create') }}" class="btn btn-primary" style="border-color: green; background-color: green;">Thêm quản trị viên</a>
    </div>
    <div class="panel panel-primary" style="border-color: green;">
        <div class="panel-heading" style="text-decoration: underline;font-size:16px;font-family: times new roman;">Danh sách quản trị viên</div>
        <style>
       
  .panel-heading{
  background-image: url("{{ asset('backend/layout1/img/background2.jpg') }}");}
        
         
        </style>
        <div class="panel-body">
            <table class="table table-bordered table-hover" style="color: black; border: 2px solid green; margin-top: 10px; " >
                <tr style="font-weight: bold;border: 2px solid green;">
                    <th style="width:30%">Họ tên</th>
                    <th style="width:30%">Email</th>
                    <th style="width:20%">Vai trò</th>

                    <th>Chỉnh sửa</th>
                </tr>
                @foreach($data as $rows)
                <tr>
                    <td style="height: 55px;">{{ $rows->name }}</td>
                    <td>{{ $rows->email }}</td>
                    <td>{{ $rows->role_name }}</td>

                    <td style="text-align:center;">
                        <button style="border-color: green;"><a href="{{ url('admin/account/edit/'.$rows->id) }}">Sửa</a></button> &nbsp; 
                        <button style="border-color: gray;"><a href="{{ route('account.destroy', ['id' => $rows->id]) }}" onclick="return window.confirm('Bạn có chắc chắn muốn xóa không?');">Xóa</a></button>
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