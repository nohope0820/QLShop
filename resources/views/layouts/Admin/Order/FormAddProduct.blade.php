@extends("layouts.Admin.Order.Main")
@section("do-du-lieu-order")
<style>
    .show_form_add_product_in_order{display: none;}
</style>
<div class="col-md-12">
   <button style="background:black; color:white; padding:3px 7px;margin-top:20px">Thêm sản phẩm vào đơn</button>
   <div class="show_form_add_product_in_order">
    <form method="POST" action="{{ route('order.storeProduct', ['id' => $orderId]) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table table-bordered table-hover" style="color: black;">
            <tr>
                <td colspan="2"><b style="color: black;">Thông tin sản phẩm</b></td>   
            </tr>
            <tr>
                <td><b style="color: black;">Mã sản phẩm</b></td>
                <td><input type="text" id="masp" name="product_id" style="width:40%" placeholder="Nhập mã sản phẩm"></td>
            </tr>
            <tr>
                <td><b style="color: black;">Tên sản phẩm</b></td>
                <td><input type="text" id="tensp" name="tensp" style="width:40%"></td>
            </tr>
            <tr>
                <td><b style="color: black;">Chọn size</b></td>
                <td>   
                    <select name="size" id="size" style="padding: 5px 25px">
                    </select>
                </td>
            </tr>
            <tr>
                <td><b style="color: black;">Giá sản phẩm</b></td>
                <td><input type="number" id="price" name="price" style="width:40%" value=""></td>
            </tr>
            <tr>
                <td><b style="color: black;">Chọn số lượng</b></td>
                <td><input type="number" name="quantity" style="width:40%" placeholder="Nhập số lượng"></td>
            </tr>
            <tr>
                <td><p id="values"></p></td>
                <td><input type="submit" value="Thêm" style="background: black; color: white; padding:3px 7px"> </td>
            </tr>

    </table>
    </form>
    </div>
    <script>
        $( "button" ).click(function() {
          $( ".show_form_add_product_in_order" ).slideToggle();
        });

        const input = document.querySelector('#masp');

        input.addEventListener('input', updateValue);

        function updateValue(e) {
            
            $.ajax({
                url: 'info/' + e.target.value,
                type: 'get',
                data: {},
                success: function(data) { 
                    $('#tensp').val(data.info[0].ProductName);
                    $('#price').val((data.info[0].price - ((data.info[0].price * data.info[0].discount)/100)));
                    // console.log(data);
                    let result = data.info.map(a => a.size);
                    // console.log(result);
                    for (var i = 0; i < result.length; i++){
                        $('#size').append($('<option>',
                            {
                                value: result[i],
                                text :  result[i] 
                            }));
                    }
                },
            });
        }
        </script>
<div class="panel panel-primary" style="border-color: green; margin-top:25px">
    <div class="panel-heading" style="text-decoration: underline;font-size:16px;font-family: times new roman;">Chi tiết đơn hàng</div>
    <style>
        .panel-heading{
        background-image: url("{{ asset('backend/layout1/img/background2.jpg') }}");}
    </style>
    
    <div class="panel-body">
        <table class="table table-bordered table-hover" style="color: black; border: 2px solid green; margin-top: 10px; " >
            <tr>
                <td colspan="5" style="text-align: center; font-size:15px;font-weight: bold;">Thông tin hóa đơn</td>
            </tr>
            <tr style="font-weight:bold; border: 2px solid green;">
                <td>Tên khách hàng</td>
                <td>Số điện thoại</td>
                <td>Người lập phiếu</td>
                <td>Thời gian lập</td>
            </tr>
           
                @foreach($informationOrder as $rows)
                <tr>
                    <td style="width:150px">{{ $rows->fullname }}</td>
                    <td style="width:150px">{{ $rows->customer_phone }}</td>
                    <td style="width:150px">{{ $rows->name }}</td>
                    <td style="width:150px">{{ $rows->created_at }}</td>
                </tr>
                @endforeach           
        </table>
        <table class="table table-bordered table-hover" style="color: black; border: 2px solid green; margin-top: 50px;" >
            <tr style="font-weight: bold;border: 2px solid green;">
                    <td>Ảnh sản phẩm</td>
                    <td>Tên sản phẩm</td>
                    <td>Giá sau KM</td>
                    <td>Size</td>
                    <td>Số lượng</td>
                    <td>Thành tiền</td>
                    <td>Xóa</td>
            </tr>
            @if (isset($listProductInOrder)) 
                @foreach($listProductInOrder as $rows)
                <tr>
                    <td style="text-align: center; width:120px;">
                        @if($rows->image != "" && file_exists("images/product/".$rows->image))
                        <img src="{{ asset('images/product/'.$rows->image) }}" style="width:100px;">
                        @endif
                    </td>
                    <td>{{ $rows->ProductName }}</td>
                    <td>{{ number_format(($rows->price)-(($rows->price)*($rows->discount)/100)) }}đ</td>
                    <td>{{ $rows->size }}</td>
                    <td>{{ $rows->quantity }}</td>
                    <td>{{ number_format((($rows->price)-(($rows->price)*($rows->discount)/100)) * $rows->quantity) }}đ</td>
                    <td><a href=""><i class="fa fa-trash-o fa-2x"></i></a></td>
                </tr>
                @endforeach  
            @endif    
                @foreach($totalOrder as $rows)
                <tr>
                    <td colspan="7" style="font-weight: bold;font-size:16px; color:red; text-align:right">
                        @if (isset($rows->total))
                            Tổng giá trị : {{ number_format($rows->total) }}đ
                        @else
                        Tổng giá trị : 0đ
                        @endif 
                    </td>
                </tr>
               
            
        </table>
                <button style="background: black; border-radius:10px; padding:7px 20px; margin-left:87%">
                    <a href="{{ url('admin/order/update-product/'.$orderId.'-'.$rows->total) }}"style="color: white; font-weight:bold">XÁC NHẬN</a>
                </button>
                 @endforeach  
    </div>
</div>
</div>
@endsection