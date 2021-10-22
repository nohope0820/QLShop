<!doctype html>
<html lang="en">

<head>
    <title>BẢNG ĐIỀU KHIỂN || FLASH_STORE</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/layout1/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/layout1/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/layout1/vendor/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/layout1/vendor/chartist/css/chartist-custom.css') }}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('backend/layout1/css/main.css') }}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{ asset('backend/layout1/css/demo.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="{{ url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700') }}" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('backend/layout1/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('backend/layout1/img/favicon.png') }}">
       <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
       <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          alert(msg);
        }
      </script>
     <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="index.html"><img src="{{ asset('backend/layout1/img/logo.jpg') }}" width="75px;" style="margin-top: -10px;" alt="Klorofil Logo" class="img-responsive logo"></a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                <form class="navbar-form navbar-left">
                    <div class="input-group">
                        <input type="text" value="" class="form-control" placeholder="Tìm kiếm..." style="border-color: green;">
                        <span class="input-group-btn"><button type="button" class="btn btn-primary" style="background-color: green; border-color: green;">TÌM</button></span>
                    </div>
                </form>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="lnr lnr-alarm"></i>
                                <span class="badge bg-danger">5</span>
                            </a>
                            <ul class="dropdown-menu notifications">
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
                                <li><a href="#" class="more">Xem tất cả thông báo</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Trợ giúp</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Sử dụng cơ bản</a></li>
                                <li><a href="#">Làm việc với dữ liệu</a></li>
                                <li><a href="#">Bảo vệ</a></li>
                                <li><a href="#">Xử lí sự cố</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                                <span>
                                    {{ Auth::user()->name }}
                                </span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="lnr lnr-user"></i> <span>Thông tin của tôi</span></a></li>
                                <li><a href="#"><i class="lnr lnr-envelope"></i> <span>Tin nhắn</span></a></li>
                                <li><a href="#"><i class="lnr lnr-cog"></i> <span>Cài đặt</span></a></li>
                                <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();"><i class="lnr lnr-exit"></i> <span>Đăng xuất</span></a>
                                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                                  </li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar" style="margin-top: 10px; ">
        <style>
          .sidebar{
            background-image: url("{{ asset('backend/layout1/img/footer-background1.jpg') }}");
          }
        </style>
            
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        @if ( Auth::user()->role == 3)
                            <li><a href="{{ url('home') }}" class=""><i class="lnr lnr-home"></i> <span>Bảng điều khiển</span></a></li>        
                            <li><a href="index.php?controller=news" class=""><i class="lnr lnr-alarm"></i> <span>Chấm công - Lương</span></a></li>
                        @elseif (Auth::user()->role == 1)
                            <li><a href="{{ url('home') }}" class=""><i class="lnr lnr-home"></i> <span>Bảng điều khiển</span></a></li>        
                            <li><a href="index.php?controller=news" class=""><i class="lnr lnr-alarm"></i> <span>Tin tức</span></a></li>
                            <li class="click"><a href="{{ url('admin/category') }}" class=""><i class="lnr lnr-chart-bars"></i> <span>Danh mục sản phẩm</span></a></li>
                            <li class="click"><a href="{{ url('admin/product') }}" class=""><i class="lnr lnr-chart-bars"></i> <span>Danh sách sản phẩm</span></a></li>
                            <li><a href="{{ url('admin/order') }}"><i class="lnr lnr-chart-bars"></i> <span>Đơn hàng</span></a> </li>
                        @else
                            <li><a href="{{ url('home') }}" class=""><i class="lnr lnr-home"></i> <span>Bảng điều khiển</span></a></li>        
                            <li><a href="index.php?controller=news" class=""><i class="lnr lnr-alarm"></i> <span>Tin tức</span></a></li>
                            <li class="click"><a href="{{ url('admin/category') }}" class=""><i class="lnr lnr-chart-bars"></i> <span>Danh mục sản phẩm</span></a></li>
                            <li class="click"><a href="{{ url('admin/product') }}" class=""><i class="lnr lnr-chart-bars"></i> <span>Danh sách sản phẩm</span></a></li>
                            <li><a href="{{ url('admin/order') }}"><i class="lnr lnr-chart-bars"></i> <span>Đơn hàng</span></a> </li>
                            <li class="click"><a href="{{ url('admin/employee') }}" class=""><i class="lnr lnr-chart-bars"></i> <span>Quản lý kho hàng</span></a></li>
                            <li class="click"><a href="{{ url('admin/employee') }}" class=""><i class="lnr lnr-code"></i> <span>Quản lý khách hàng</span></a></li>
                            <li class="click"><a href="{{ url('admin/employee') }}" class=""><i class="lnr lnr-code"></i> <span>Quản lý nhân viên</span></a></li>
                            <li class="click"><a href="{{ url('admin/account') }}" class=""><i class="lnr lnr-code"></i> <span>Quản lý tài khoản</span></a></li>
                            <li><a href="{{ url('admin/timekeeping') }}"><i class="lnr lnr-chart-bars"></i> <span>Chấm công</span></a> </li>
                        @endif
                        
                    </ul>
                </nav>
            </div>
        </div>
        <style type="text/css">
            .sidebar-scroll li:hover{background: black;}
        </style>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                @yield("do-du-lieu")
            </div>
                                
        </div>
        <!-- END MAIN -->
        
    </div>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="{{ asset('backend/layout1/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/layout1/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/layout1/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('backend/layout1/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('backend/layout1/vendor/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('backend/layout1/scripts/klorofil-common.js') }}"></script>
    
</body>

</html>
