@extends("layouts.Admin.Order.Main")
@section("do-du-lieu-order")
<div class="col-md-12"> 
    <div style="margin-bottom:5px;">
        <div style="color: black; font-size: 17px; text-decoration: underline; font-weight:bold">Thống kê hóa đơn sản phẩm</div>
        <div style=" color: black; font-size: 15px; margin-top: 15px; margin-bottom: 15px;">
            <form method="post" enctype="multipart/form-data" action="index.php?controller=statistical&action=detail">
        Từ <input type="date" name="start"> đến <input type="date" name="finish"> <input type="submit" value="Thống kê">
         </form></div>
    <div class="panel panel-primary" style="border-color: green;">
        <div class="panel-heading" style="background-color: gray;">Danh sách đơn hàng</div>
        <div class="panel-body">
            <table class="table table-bordered table-hover" style="color: black; border: 2px solid green; margin-top: 10px; ">
                <tr style="font-weight: bold;border: 2px solid green;">
                    <th>Khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>Ngày mua</th>
                    <th>Thành tiền</th> 
                    <th>Loại hàng</th>                   
                    <th>Chức năng</th>
                </tr>
                @foreach($listTypeOrder as $rows)
                <tr>
                    <td>{{ $rows->fullname }}</td>
                    <td>{{ $rows->customer_phone }}</td>
                    <td>{{ $rows->created_at }}</td>
                    <td>{{ number_format($rows->total_money) }}</td>
                    <td> <button style="background: green; color:black; border-radius:10px; padding:5px 12px">Offline</button></td>
                    <td>
                        <button style="background:black; border-radius:10px; padding:5px 12px">
                            <a href="{{ url('admin/order/chi-tiet-don-hang/'.$rows->id) }}" style="color: white">Chi tiết</a>
                        </button>
                    </td>
                </tr>
                @endforeach
            </table>
            
        </div>
    </div>
</div>
@endsection