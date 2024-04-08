@extends('layouts.app')

@section('title', 'ดูข้อมูล')

@section('content')
    <style>
        .form-group {
            padding: 10px;
        }

        <style>table#ptctable {

            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000000;
            background-color: #f2f2f2;

        }

        thead th {
            background-color: #282e3c;
            color: #ffffff;
            text-align: center;
        }

        tbody td {
            padding: 5px;
        }

        .dataTables_wrapper .dataTables_filter {
            float: none;
            text-align: end;
            margin-bottom: 30px;
            /* เพิ่มระยะห่างด้านล่าง */
        }
    </style>

    </style>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card-body">
                <div class="text-center">

                    <h1>ข้อมูลของคุณ</h1>
                </div>

            </div>

            <table id="myTable" class="display responsive nowrap" style="width: 100%;">
                <thead>
                    <tr>
                        <th>ชื่อผู้ตรวจ</th>
                        <th>หมายเลขGAP</th>
                        <th>พันธุ์ทุเรียน</th>
                        <th>วันที่ส่ง</th>
                        <th>เจ้าของสวน</th>
                        <th>เปอร์เซ็นน้ำตาล</th>
                        <th>print</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                @foreach ($detail as $item)
                    <tbody>
                        <tr>
                            <td>{{ $item->name_our }}</td>
                            <td>{{ $item->gap_his }}</td>
                            <td>{{ $item->type_his }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->name_his }}</td>
                            <td>{{ $item->weight_his }}</td>
                            <td>
                                <a href="{{route('pdf' , $item->docs_id)}}" class="btn btn-info" target="_blank">print</a>
                            </td>
                            <td>
                                <a href="{{route('pdf' , $item->docs_id)}}" class="btn btn-warning">แก้ไข</a>
                            </td>
                            <td>
                                <a href="{{route('pdf' , $item->docs_id)}}" class="btn btn-danger">ลบ</a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
            

            <script>
                $(document).ready(function() {
                    $('#myTable').dataTable({
                        dom: "frtip",
                        responsive: true

                    });
                });
            </script>


        </div>
    </div>
    </div>

@endsection
