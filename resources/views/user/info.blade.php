@extends('layouts.app')

@section('title', 'ดูข้อมูล')

@section('content')
    <style>
        .form-group {
            padding: 10px;
        }

        table#ptctable {
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


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="card-body">
                <div class="text-center">
                    <h1>ข้อมูลของคุณ</h1>
                </div>
            </div>

            <table id="durain" class="table table-striped nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>ชื่อผู้ตรวจ</th>
                        <th>หมายเลขGAP</th>
                        <th>พันธุ์ทุเรียน</th>
                        <th>วันที่ส่ง</th>
                        <th>เจ้าของสวน</th>
                        <th>เปอร์เซ็นน้ำตาล</th>
                        <th>แก้ไข</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail as $item)
                        <tr>
                            <td>{{ $item->name_our }}</td>
                            <td>{{ $item->gap_his }}</td>
                            <td>{{ $item->type_his }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->name_his }}</td>
                            <td>{{ $item->weight_his }}</td>
                            <td>
                                <a href="{{ route('edit', $item->id) }}" class="btn btn-warning">แก้ไข</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#durain').dataTable({
                dom: "frtip",
                responsive: true,
                "language": {
                    "sProcessing": "กำลังดำเนินการ...",
                    "sLengthMenu": "แสดง _MENU_ รายการ",
                    "sZeroRecords": "ไม่พบข้อมูล",
                    "sEmptyTable": "ไม่มีข้อมูลในตาราง",
                    "sInfo": "",
                    "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 รายการ",
                    "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกหมวดหมู่)",
                    "sInfoPostFix": "",
                    "sSearch": "ค้นหาควย:",
                    "sUrl": "",
                    "oPaginate": {
                        // "sFirst": "เริ่มต้น",
                        // "sPrevious": "ก่อนหน้า",
                        // "sNext": "ถัดไป",
                        // "sLast": "สุดท้าย"
                    },
                    "oAria": {
                        "sSortAscending": ": เปิดใช้งานเพื่อเรียงลำดับคอลัมน์จากน้อยไปมาก",
                        "sSortDescending": ": เปิดใช้งานเพื่อเรียงลำดับคอลัมน์จากมากไปน้อย"
                    }
                },
            });
        });
    </script>
@endsection
