@extends("layouts.app")
@section("do-du-lieu")

<div class="col-md-12">

    <div class="menu">
        <ul>
            <li><a href="{{ url('admin/timekeeping/') }}">Chấm công</a></li>
            <li>
                <a href="{{ url('admin/timekeeping/check_by_date') }}">Kiểm tra</a>
                <ul>
                    <li><a href="{{ url('admin/timekeeping/check_by_date') }}">Theo ngày</a></li>
                    <li><a href="{{ url('admin/timekeeping/check_by_name') }}">Theo tên</a></li>
                </ul>
            </li>
            <li><a href="{{ url('admin/timekeeping/check_salary') }}">Tính lương</a></li>
            <li><a href="{{ url('admin/timekeeping/notes') }}">Ghi chú</a></li>
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
   </style> 
    <form method="POST" action="{{ route('timekeeping.checkSalary') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <b style="color: black; text-decoration:underline">Từ ngày:</b> <input type="date" name="check_date_start" required> 
        đến <input type="date" name="check_date_finish" required> 
        <input type="submit" value="Kiểm tra"> 
    </form>

    <div class="panel panel-primary" style="border-color: green; margin-top:25px">
        <div class="panel-heading" style="text-decoration: underline;font-size:16px;font-family: times new roman;">Kiểm tra chấm công theo ngày</div>
        <style>
            .panel-heading{
            background-image: url("{{ asset('backend/layout1/img/background2.jpg') }}");}
        </style>
        
        <div class="panel-body">
            <table class="table table-bordered table-hover" style="color: black; border: 2px solid green; margin-top: 10px; " >
                <tr style="font-weight: bold;border: 2px solid green;">
                    <th>Họ tên</th>
                    <th>Hệ số lương</th>
                    <th>Số công</th>
                    <th>Lương</th>
                </tr>
                @if (isset($salaryPerEmployee)) 
                    @foreach($salaryPerEmployee as $rows)
                    <tr>
                        <td>{{ $rows->name }}</td>
                        <td>{{ number_format($rows->hsl) }}</td>
                        <td>{{ $rows->SoCong }} (={{ (($rows->SoCong)/2) }} ngày) </td>
                        <td>{{ number_format(($rows->SoCong) * (($rows->hsl)/2)) }}</td>
                    </tr>
                    @endforeach
                
                @endif

                
            </table>
        </div>
    </div>
    
</div>  
@endsection