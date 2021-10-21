@extends("layouts.Admin.Order.Main")
@section("do-du-lieu-order")

<style>
    .show_form_create_order_familiar_customer{display: none;}
    .show_form_create_order_customer{display: none;}
</style>
<div class="col-md-12">
   
   <button style="background:black; color:white; padding:3px 7px;margin-top:20px">Tạo đơn cho khách cho quen</button>
   <div class="show_form_create_order_familiar_customer">
    <form method="POST" action="{{ route('order.familiarCustomer') }}">
        <div style="color: black; margin:5px">(*) Khách hàng quen thuộc sẽ được giảm 2% tổng giá trị đơn hàng</div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table table-bordered table-hover" style="color: black;">
            <tr>
                <td colspan="2"><b style="color: black;">Thông tin khách hàng  </b></td>   
            </tr>
            <tr>
                <td><b style="color: black;">Số điện thoại </b></td>
                <td><input type="text" name="customer_phone" style="width:30%" placeholder="Nhập số điện thoại khách hàng"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Tạo đơn" style="background: black; color: white; padding:3px 7px"> </td>
            </tr>
    </table>
    </form>
    </div>
    <script>
        $( "button" ).click(function() {
          $( ".show_form_create_order_familiar_customer" ).slideToggle();
        });
        </script>

<button style="background:black; color:white; padding:3px 7px;margin-top:20px">Tạo đơn cho khách mới</button>
   <div class="show_form_create_order_customer">
    <form enctype="multipart/form-data" method="POST" action="{{ route('order.newCustomer') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table table-bordered table-hover" style="color: black;">
            <tr>
                <td colspan="2"><b style="color: black;">Thông tin khách hàng  </b></td>   
            </tr>
            <tr>
                <td><b style="color: black;">Họ tên </b></td>
                <td><input type="text" name="fullname" style="width:30%" placeholder="Nhập tên khách hàng"></td>
            </tr>
            <tr>
                <td><b style="color: black;">Số điện thoại </b></td>
                <td><input type="text" name="phone" style="width:30%" placeholder="Nhập số điện thoại khách hàng"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Tạo đơn" style="background: black; color: white; padding:3px 7px"> </td>
            </tr>
        </table>
    </form>
    </div>
    <script>
        $( "button" ).click(function() {
          $( ".show_form_create_order_customer" ).slideToggle();
        });
        </script>
</div>
@endsection