<!-- load file layout chung -->
@extends("layouts.app")
@section("do-du-lieu")

<div class="col-md-12">  
	<input onclick="history.go(-1);" type="button" value="Quay lại" class="btn btn-primary" style="background-color: green; margin-bottom: 15px;">
    <div class="panel panel-primary" style="border-color: green;">
        <div class="panel-heading" style="background-color: gray;">Thêm - Chỉnh sửa thông tin</div>
        <div class="panel-body">
        <style> 
  .panel-heading{
  background-image: url("{{ asset('backend/layout1/img/background2.jpg') }}");}
   </style>
   @foreach ($record as $rows)
        <form method="POST" action="{{ route('account.update', ['id' => $rows->id]) }}">
        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
            @csrf  
            @method('PUT')
            <!-- rows -->
                 
                    <div class="row" style="margin-top:5px;">
                        <div class="col-md-2">Họ tên</div>
                        <div class="col-md-10">
                            <input type="text" value="{{ isset($rows->name) ? $rows->name:'' }}" name="name" class="form-control" required style="border-color: green;">
                        </div>
                    </div>
                    <!-- end rows -->
                    <!-- rows -->
                    <div class="row" style="margin-top:15px;">
                        <div class="col-md-2">Email</div>
                        <div class="col-md-10">
                            <input type="email" value="{{ isset($rows->email) ? $rows->email : '' }}" name="email" class="form-control" style="border-color: green;" @if(isset($record->email)) disabled @else required @endif>
                        </div>
                    </div>
                    <!-- end rows -->
                @endforeach
            <!-- rows -->
            <div class="row" style="margin-top:15px;">
                <div class="col-md-2">Mật khẩu</div>
                <div class="col-md-10">
                    <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu mới"  style="border-color: green;" @if(isset($record->email)) @else required @endif >
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:15px;">
                <div class="col-md-2">Nhập lại mật khẩu</div>
                <div class="col-md-10">
                    <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu"  style="border-color: green;" required>
                </div>
            </div>
            <!-- end rows -->
             <!-- rows -->
             <div class="row" style="margin-top:15px;">
                <div class="col-md-2">Vai trò</div>
                <div class="col-md-10">
                    <select name="role" style="padding: 5px 25px">
                        <option value="1">Quản trị viên</option>
                        <option value="2">Quản lý</option>
                        <option value="3">Nhân viên</option>
                    </select>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:20px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="submit" value="Xử lý" class="btn btn-primary" style="border-color: green; background-color: green;">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>
@endsection