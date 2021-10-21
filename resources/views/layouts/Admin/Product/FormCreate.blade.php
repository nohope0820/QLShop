<!-- load file layout chung -->
@extends("layouts.app")
@section("do-du-lieu")
<div class="col-md-12">  
<input onclick="history.go(-1);" type="button" value="Quay lại" class="btn btn-primary" style="background-color: green; margin-bottom: 15px;">	
    <div class="panel panel-primary" style="border-color: green;">
        <div class="panel-heading" style="background-color: gray;">Thêm - Sửa sản phẩm</div>
        <div class="panel-body">
            <style>
                .panel-heading{
           background-image: url("{{ asset('backend/layout1/img/background2.jpg') }}");}
                 </style>
        <form method="post" enctype="multipart/form-data" action="{{ route('product.store') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2" style="color: black;">Tên sản phẩm</div>
                <div class="col-md-10">
                    <input type="text" value="{{ isset($record->ProductName) ? $record->ProductName:'' }}" name="ProductName" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:15px;">
                <div class="col-md-2" style="color: black;">Giá</div>
                <div class="col-md-10">
                    <input type="number" style="border-color: green;" value="<?php echo isset($record->price) ? $record->price:''; ?>" min="0" step="0.01" name="price" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:15px;">
                <div class="col-md-2" style="color: black;">% Khuyến mãi</div>
                <div class="col-md-10">
                    <input type="number" style="border-color: green;" value="<?php echo isset($record->discount) ? $record->discount:''; ?>" name="discount" class="form-control" min="0" max="100" required>
                </div>
            </div>
            <!-- end rows -->
             <!-- rows -->
            <div class="row" style="margin-top:15px;">
                <div class="col-md-2">Thuộc danh mục</div>
                <div class="col-md-10">     
                    <select name="category_id" style="padding: 5px 25px">
                        @foreach ($data as $rows) 
                        <option value="{{ $rows->id }}">{{ $rows->name }}</option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
            <!-- end rows -->
             <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2" style="color: black;">Mô tả</div>
                <div class="col-md-10">
                    <textarea name="description">{{ isset($record->description) ? $record->description:'' }}</textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace("description");
                    </script>
                </div>
            </div>
            <!-- end rows -->  
                    
           
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2" style="color: black;">Ảnh</div>
                <div class="col-md-10">
                    <input type="file" name="image">
                </div>
            </div>
            <!-- end rows -->
           
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    @if(isset($record->image) && $record->image != "" && file_exists("images/product".$record->image))
                        <img src="{{ asset('images/product'.$record->image) }}" style="width:100px;">
                    @endif
                </div>
            </div>
            <!-- end rows -->  
             <!-- rows -->
            <div class="row" style="margin-top:5px;">
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