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
                    <h1>ข้อมูลของ User</h1>
                </div>
            </div>
            {{-- @php
                dd($user);
            @endphp --}}

            <table id="durain" class="table" style="width:100%">

                <thead>
                    <tr>
                        <th style="text-align: left;">ชื่อผู้ตรวจ</th>
                        <th style="text-align: left;">หมายเลขGAP</th>
                        <th style="text-align: left;">พันธุ์ทุเรียน</th>
                        <th style="text-align: left;">วันที่ส่ง</th>
                        <th style="text-align: left;">เจ้าของสวน</th>
                        <th style="text-align: left;">เปอร์เซ็นน้ำตาล</th>
                        <th style="text-align: left;">แก้ไข</th>
                        <th style="text-align: left;">ลบ</th>
                        <th style="text-align: left;">ปริ้น</th>
                        <th style="text-align: left;">สถานะ</th>
                    </tr>
                </thead>
                <thead>
                    @foreach ($user as $item)
                        <tr>
                            <th colspan="10" style="text-align: left; font-weith: bold; background-color: #ffffff">
                                ชื่อผู่ใช้งาน {{ $item->name }}</th>
                        </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($item->durian_detail as $item)
                            <td style="text-align: left;">{{ $item->name_our }}</td>
                            <td style="text-align: left;">{{ $item->gap_his }}</td>
                            <td style="text-align: left;">{{ $item->type_his }}</td>
                            <td style="text-align: left;">{{ $item->created_at }}</td>
                            <td style="text-align: left;">{{ $item->name_his }}</td>
                            <td style="text-align: left;">{{ $item->weight_his }}</td>
                            <td style="text-align: left;">
                                <a href="{{ route('pdf', $item->docs_id) }}" class="btn btn-warning">แก้ไข</a>
                            </td>
                            <td style="text-align: left;">
                                <a href="{{ route('delete', $item->id) }}" class="btn btn-danger">ลบ</a>
                            </td>
                            <td style="text-align: left;">
                                <a href="{{ route('pdf', $item->id) }}" class="btn btn-info" target="_blank"><i
                                        class="fa-solid fa-print" style="color: #ffffff;"></i></a>

                            </td>
                            <td>
                                @if ($item->status == true)
                                    <a href="{{ route('change', $item->id) }}" class="btn btn-success">เผยแพร่</a>
                                @else
                                    <a href="{{ route('change', $item->id) }}" class="btn btn-secondary">ฉบับร่าง</a>
                                @endif
                            </td>
                    </tr>
                    @endforeach
                </tbody>
                @endforeach
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // เพิ่ม event listener สำหรับปุ่มลบ
        $('.btn-danger').click(function(event) {
            event.preventDefault(); // ยกเลิกการทำงานปกติของปุ่ม

            var deleteUrl = $(this).attr('href'); // รับ URL สำหรับการลบ

            // แสดง SweetAlert2 เพื่อยืนยันการลบ
            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: 'คุณต้องการลบรายการนี้หรือไม่?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ใช่, ลบทันที!',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    // ถ้าผู้ใช้กด "ยืนยัน" ให้เรียกใช้งาน URL สำหรับการลบ
                    window.location.href = deleteUrl;
                }
            });
        });
    </script>
@endsection
