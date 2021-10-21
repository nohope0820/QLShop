@extends("layouts.app")
@section("do-du-lieu")
<script src="{{ url('https://code.jquery.com/jquery-3.5.0.js') }}"></script>
<style>
    .show_form_size{display: none;}
    .show_form_image{display: none;}
</style>
<div class="col-md-12">

    <input onclick="history.go(-1);" type="button" value="Quay lại" class="btn btn-primary" style="background-color: green; margin-bottom: 15px;"><br>
   
   <button style="background:black; color:white; padding:3px 7px;margin-top:20px">Thêm size</button>
   <div class="show_form_size">
    <form method="POST" action="{{ route('product.size', ['id' => $id]) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table table-bordered table-hover" style="color: black;">
            <tr>
                <td><b style="color: black;">Nhập size  </b></td>
                <td><input type="text" name="size" style="width:30%" placeholder="Nhập size"></td>
            </tr>
            <tr>
                <td><b style="color: black;">Nhập số lượng có  </b></td>
                <td><input type="number" name="slco" min="0" style="width:30%" placeholder="Nhập số lượng có"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Thêm" style="background: black; color: white; padding:3px 7px"> </td>
            </tr>
        </table>
    </form>
    </div>
    <script>
        $( "button" ).click(function() {
          $( ".show_form_size" ).slideToggle();
        });
        </script>

<button style="background:black; color:white; padding:3px 7px;margin-top:20px">Thêm ảnh</button>
   <div class="show_form_image">
    <form enctype="multipart/form-data" method="POST" action="{{ route('product.image', ['id' => $id]) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table table-bordered table-hover" style="color: black;">
            <tr>
                <td><b style="color: black;">Chọn ảnh  </b></td>
                <td><input type="file" name="image"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Thêm" style="background: black; color: white; padding:3px 7px"> </td>
            </tr>
        </table>
    </form>
    </div>
    <script>
        $( "button" ).click(function() {
          $( ".show_form_image" ).slideToggle();
        });
        </script>



    <div class="panel panel-primary" style="border-color: green; margin-top:25px">
        <div class="panel-heading" style="text-decoration: underline;font-size:16px;font-family: times new roman;">Chi tiết</div>
        <style>
            .panel-heading{
            background-image: url("{{ asset('backend/layout1/img/background2.jpg') }}");}
        </style>
        
        <div class="panel-body">
            <table class="table table-bordered table-hover" style="color: black; border: 2px solid green; margin-top: 10px; " >
                <tr>
                    <td colspan="5" style="text-align: center; font-size:15px;font-weight: bold;">Sản phẩm</td>
                </tr>
                <tr style="border: 2px solid green;">
                    <td>Ảnh sản phẩm</td>
                    <td>Tên sản phẩm</td>
                    <td>Giá trước KM</td>
                    <td>Khuyễn mãi(%)</td>
                    <td>Giá mới</td>
                </tr>
                @if (isset($recordProduct)) 
                    @foreach($recordProduct as $rows)
                    <tr style="font-weight: bold;border: 2px solid green;">
                        <td style="text-align: center; width:120px;">
                            @if($rows->image != "" && file_exists("images/product/".$rows->image))
                            <img src="{{ asset('images/product/'.$rows->image) }}" style="width:100px;">
                            @endif
                        </td>
                        <td style="width:150px">{{ $rows->ProductName }}</td>
                        <td style="width:150px">{{ number_format($rows->price) }}đ</td>
                        <td style="width:150px">{{ $rows->discount }}(%)</td>
                        <td style="width:150px">{{ number_format(($rows->price)-(($rows->price)*($rows->discount)/100)) }}đ</td>
                    </tr>
                    @endforeach
                
                @endif              
            </table>
            <table class="table table-bordered" style="color: black; border: 2px solid green; margin-top: 10px; width:470px " >
                <tr style="font-weight: bold;border: 2px solid green;">
                    <th style="width:200px">Size</th>
                    <th style="width:200px">Số lượng có</th>
                    <th style="width:70px"></th>
                </tr>
                @if (isset($recordProductSize)) 
                    @foreach($recordProductSize as $rows)
                    <tr>
                        <td>{{ $rows->size }}</td>
                        <td>{{ $rows->slco }}</td>
                        <td>
                            <button style="background: black; border-radius:10px; padding:5px"><a href="{{ url('admin/product/xoa-size/'.$rows->product_id.'/'.$rows->id) }}" style="color:white">Xóa</a></button>
                        </td>
                    </tr>
                    @endforeach      
                @endif
            </table>
            <table class="table table-bordered" style="color: black; border: 2px solid green; margin-top: 10px; width:270px " >
                <tr style="font-weight: bold;">
                    <td>Ảnh sản phẩm</td>
                    <th style="width:70px"></th>
                </tr>
                @if (isset($recordProductImage)) 
                    @foreach($recordProductImage as $rows)
                    <tr style="border: 2px solid green;">
                        <td>
                            @if($rows->image != "" && file_exists("images/product/".$rows->image))
                            <img src="{{ asset('images/product/'.$rows->image) }}" style="width:120px;">
                            @endif
                        </td>
                        <td>
                            <button style="background:white; border-radius:10px; padding:5px"><a href="{{ url('admin/product/xoa-anh/'.$rows->product_id.'/'.$rows->id) }}" style="color:black">Xóa</a></button>
                        </td>
                    </tr>
                    @endforeach
                @endif              
            </table>

        </div>
    </div>
    
</div>  
@endsection