@extends("layouts.app")
@section("do-du-lieu")

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
   
   <div class="panel panel-primary" style="border-color: green;">
    <div class="panel-heading" style="text-decoration: underline;font-size:16px;font-family: times new roman;">Chấm công cho nhân viên</div>
    <style>
        .panel-heading{
        background-image: url("{{ asset('backend/layout1/img/background2.jpg') }}");}
    </style>
    
    <div class="panel-body">
        <table class="table table-bordered table-hover" style="color: black; border: 2px solid green; margin-top: 10px; " >
            <tr style="font-weight: bold;border: 2px solid green;">
                <th>Họ tên</th>
                <th>Số công</th>
                <th>Ngày</th>
                <th></th>
            </tr>
            @foreach($listEmployee as $rows)
            <form method="post" action="{{ route('timekeeping.store', ['id' => $rows->id]) }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            @csrf  
            @method('PUT')
            <tr>
                <td>{{ $rows->name }}</td>
                <td>
                    <select name="SoCong" style="padding: 5px 30px">
                        <option value="0">Nghỉ</option>
                        <option value="1">1 Buổi</option>
                        <option value="2">Cả ngày</option>
                    </select>
                </td>
                <td><input type="date" name="working_day" required style="padding:3px 10px;"></td>
                <td><input type="submit" value="Chấm công" style="background:green; border-radius:10px; padding:5px 10px"></td>
            </tr>
            </form>
            @endforeach
            
        </table>
    </div>
    </div>
    
</div>  
@endsection