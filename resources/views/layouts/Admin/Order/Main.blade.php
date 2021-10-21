@extends("layouts.app")
@section("do-du-lieu")
<script src="{{ url('https://code.jquery.com/jquery-3.5.0.js') }}"></script>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
<div class="col-md-12">

    <div class="menu">
        <ul>
            <li><a href="{{ url('admin/order/') }}">Hàng</a>
                <ul>
                    <li><a href="{{ url('admin/order') }}">Đơn hàng</a></li>
                    <li><a href="{{ url('admin/order/thong-ke-don-hang') }}">Thống kê</a></li>
                    <li><a href="{{ url('admin/order/tao-don-hang') }}">Tạo đơn</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ url('admin/timekeeping/check_by_date') }}">Loại hàng</a>
                <ul>
                    <li><a href="{{ url('admin/order/online') }}">Online</a></li>
                    <li><a href="{{ url('admin/order/offline') }}">Offline</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="{{ url('admin/timekeeping/check_by_date') }}">Giỏ hàng Online</a>
                <ul>
                    <li><a href="{{ url('admin/timekeeping/check_by_date') }}">Chờ xác nhận</a></li>
                    <li><a href="{{ url('admin/timekeeping/check_by_name') }}">Đang giao</a></li>
                    <li><a href="{{ url('admin/timekeeping/check_by_name') }}">Đã giao</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <hr style="background: black; height:2px;">
   <style>
        .menu ul{
        margin: 0;
        padding: 0;
        list-style: none;
        background-color:white;
       
    }
    .menu > ul > li{
        display: inline-block;
        border: 2px solid black;
        position: relative;
        padding: 10px 15px;
        
    }
    .menu a{color: black; font-weight: bold}
    .menu li:hover{
        background:green;
    }
    .menu > ul > li > ul {
        display: none;
        position: absolute;
        top: 43px;
        left: -2px;
        z-index: 99;
    }
    .menu > ul > li > ul li{
        padding: 7px 15px;
        border: 1px solid black;
        width: 120px;
    }
    .menu ul li:hover ul{
        display: block;
    }
    .panel-heading{
  background-image: url("{{ asset('backend/layout1/img/background2.jpg') }}");}
   </style> 
   
  
    @yield("do-du-lieu-order")
  
@endsection