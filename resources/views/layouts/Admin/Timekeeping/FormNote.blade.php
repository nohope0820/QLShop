@extends("layouts.app")
@section("do-du-lieu")
<script src="{{ url('https://code.jquery.com/jquery-3.5.0.js') }}"></script>
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
    .show_form_note{display: none;}
   </style>
   
   <button style="background:black; color:white; padding:3px 7px">Thêm ghi chú</button>
   <div class="show_form_note">
    <form method="POST" action="{{ route('timekeeping.note') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table class="table table-bordered table-hover" style="color: black;">
            <tr>
                <td><b style="color: black;">Chọn tên nhân viên  </b></td>
                <td><select name="MaNV" style="padding: 2px 20px">
                        @foreach ($listEmployee as $rows)
                            <option value="{{ $rows->id }}">{{ $rows->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><b style="color: black;">Chọn ngày  </b> </td>
                <td><input type="date" name="working_day"></td>
            </tr>
            <tr>
                <td><b style="color: black;">Nhận xét </b></td>
                <td><input type="text" name="note" placeholder="Nhập đánh giá" style="width:50%"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Ghi chú" style="background: black; color: white; padding:3px 7px"> </td>
            </tr>
        </table>
    </form>
    </div>
    <script>
        $( "button" ).click(function() {
          $( ".show_form_note" ).slideToggle();
        });
        </script>



    <div class="panel panel-primary" style="border-color: green; margin-top:25px">
        <div class="panel-heading" style="text-decoration: underline;font-size:16px;font-family: times new roman;">Ghi chú</div>
        <style>
            .panel-heading{
            background-image: url("{{ asset('backend/layout1/img/background2.jpg') }}");}
        </style>
        
        <div class="panel-body">
            <table class="table table-bordered table-hover" style="color: black; border: 2px solid green; margin-top: 10px; " >
                <tr style="font-weight: bold;border: 2px solid green;">
                    <th>Họ tên</th>
                    <th>Ngày đánh giá</th>
                    <th>Nội dung</th>
                </tr>
                @if (isset($listNotes)) 
                    @foreach($listNotes as $rows)
                    <tr>
                        <td>{{ $rows->name }}</td>
                        <td>{{ $rows->working_day }}</td>
                        <td>{{ $rows->note }}</td>
                    </tr>
                    @endforeach
                
                @endif

                
            </table>
        </div>
    </div>
    
</div>  
@endsection