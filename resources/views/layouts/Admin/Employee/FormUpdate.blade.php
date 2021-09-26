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
        <form method="POST" action="{{ route('employee.update', ['id' => $rows->id]) }}">
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
                        <div class="col-md-2">Số điện thoại</div>
                        <div class="col-md-10">
                            <input type="text" value="{{ isset($rows->phone) ? $rows->phone : '' }}" name="phone" class="form-control" style="border-color: green;" @if(isset($record->email)) disabled @else required @endif>
                        </div>
                    </div>
                    <!-- end rows -->
                    <!-- rows -->
                    <div class="row" style="margin-top:15px;">
                        <div class="col-md-2" style="color: black">Ngày sinh</div>
                        <div class="col-md-10">
                            <input type="date" value="{{ isset($rows->date_of_birth) ? $rows->date_of_birth : '' }}" name="date_of_birth" style="border-color: green; padding:3px 10px" required>
                        </div>
                    </div>
                    <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:15px;">
                <div class="col-md-2" style="color: black">Địa chỉ</div>
                <div class="col-md-10">
                    <input type="text" value="{{ isset($rows->address) ? $rows->address : '' }}" name="address" class="form-control"  style="border-color: green;" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:15px;">
                <div class="col-md-2" style="color: black">Hệ số lương</div>
                <div class="col-md-10">
                    <input type="number" value="{{ isset($rows->hsl) ? $rows->hsl : '' }}" name="hsl" class="form-control"  style="border-color: green;" required>
                </div>
            </div>
            <!-- end rows -->
                @endforeach

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