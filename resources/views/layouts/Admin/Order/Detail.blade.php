@extends("layouts.Admin.Order.Main")
@section("do-du-lieu-order")

<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <input onclick="history.go(-1);" type="button" value="Quay lại" class="btn btn-danger" style="background-color: green;">
    </div>    
    <div class="panel panel-primary">
        <div class="panel-heading" style="background-color: gray;">Chi tiết đơn hàng</div>
        <div class="panel-body">
            <style>
                .panel-heading{
                background-image: url("{{ asset('backend/layout1/img/background2.jpg') }}");}
            </style>
            <!-- tdong tin don hang -->
            <table class="table table-bordered table-hover" style=" color: black;">
                @if (isset($informationOrder))
                    @foreach ($informationOrder as $rows)
                        <tr>
                            <td style="width:200px; font-weight:bold">Tên khách hàng</td>
                            <td>{{ $rows->fullname }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">Địa chỉ</td>
                            <td>{{ $rows->address }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">Điện thoại</td>
                            <td>{{ $rows->customer_phone }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">Tổng giá</td>
                            <td>{{ number_format($rows->total_money) }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">Thời gian đặt</td>
                            <td>{{ $rows->created_at }}</td>
                        </tr>
                        <tr>
                            <td style="font-weight:bold">Trạng thái(đơn online)</td>
                            <td>
                                @if ($rows->type == 1)
                                    @if ($rows->status_online == 1)
                                    <span class="label label-danger">Chờ xác nhận</span>
                                    @elseif ($rows->status_online == 2)
                                        <span class="label label-primary">Đã giao hàng</span>
                                    @else
                                        <span class="label label-primary">Đã nhận hàng</span>
                                    @endif
                                @else
                                    <span class="label label-primary">Đây là đơn hàng offline</span>
                                @endif 
                            </td>
                        </tr>
                    @endforeach     
                @endif
            </table>
            <!-- /thong tin -->
            <table class="table table-bordered table-hover" style="color: black; border: 2px solid green;" >
                <tr style="font-weight: bold;border: 2px solid green;">
                    <td>Ảnh</td>
                    <td>Tên sản phẩm</td>
                    <td>Đơn giá</td>
                    <td>Size</td>
                    <td>Số lượng</td>
                    <td>Thành tiền</td>
                    
                </tr>
                @foreach($listProductInOrder as $rows)

                <tr>
                    <td>
                        @if($rows->image != "" && file_exists("images/product/".$rows->image))
                        <img src="{{ asset('images/product/'.$rows->image) }}" style="width:100px;">
                        @endif    
                    </td>
                    <td>{{ $rows->ProductName }}</td>
                    <td>{{ number_format(($rows->price)-(($rows->price)*($rows->discount)/100)) }}đ</td>
                    <td>{{ $rows->size }}</td>
                    <td>{{ $rows->quantity }}</td>
                    <td>{{ number_format((($rows->price)-(($rows->price)*($rows->discount)/100)) * $rows->quantity) }}đ</td>
                    
                </tr>
                @endforeach
            </table>            
        </div>
    </div>
</div>
@endsection