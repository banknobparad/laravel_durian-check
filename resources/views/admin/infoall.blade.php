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
                    <h1>ข้อมูลของผู้ลงทะเบียน</h1>
                </div>
            </div>

            <table id="durain" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th style="text-align: left;">ชื่อผู้ตรวจ</th>
                        <th style="text-align: left;">หมายเลขGAP</th>
                        <th style="text-align: left;">พันธุ์ทุเรียน</th>
                        <th style="text-align: left;">วันที่ส่ง</th>
                        <th style="text-align: left;">เจ้าของสวน</th>
                        <th style="text-align: left;">เบอร์โทรศัพท์</th>
                        <th style="text-align: left;">ลบ</th>
                        <th style="text-align: left;">ปริ้น</th>
                        <th style="text-align: left;">สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        @foreach ($item->durian_detail as $detail)
                            <tr>
                                <td>{{ $detail->name_our }}</td>
                                <td>{{ $detail->gap_his }}</td>
                                <td>{{ $detail->type_his }}</td>
                                <td>{{ $detail->created_at }}</td>
                                <td>{{ $detail->name_his }}</td>
                                <td>{{ $detail->phone_number_our }}</td>
                                <td>
                                    <a href="{{ route('delete', $detail->id) }}" class="btn btn-danger btn-delete">ลบ</a>
                                </td>
                                <td>
                                    <a href="{{ route('pdf', $detail->id) }}" class="btn btn-info" target="_blank"><i
                                            class="fa-solid fa-print" style="color: #ffffff;"></i></a>
                                </td>

                                <td>
                                    <div class="dropdown">
                                        <button
                                            class="btn btn-primary dropdown-toggle @if ($detail->status == 'รอตรวจสอบ') btn-warning @elseif($detail->status == 'ผ่าน') btn-success @elseif($detail->status == 'ไม่ผ่าน') btn-danger @endif"
                                            type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            @if ($detail->status == 'รอตรวจสอบ')
                                                รอตรวจสอบ
                                            @elseif($detail->status == 'ผ่าน')
                                                ผ่าน
                                            @elseif($detail->status == 'ไม่ผ่าน')
                                                ไม่ผ่าน
                                            @endif
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                                href="{{ route('change', ['id' => $detail->id, 'status' => 'รอตรวจสอบ']) }}">รอตรวจสอบ</a>
                                            <a class="dropdown-item"
                                                href="{{ route('change', ['id' => $detail->id, 'status' => 'ผ่าน']) }}">ผ่าน</a>
                                            <a class="dropdown-item"
                                                href="{{ route('change', ['id' => $detail->id, 'status' => 'ไม่ผ่าน']) }}">ไม่ผ่าน</a>
                                        </div>
                                    </div>
                                </td>



                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
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
                    "sSearch": "ค้นหา:",
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
        $('.btn-delete').click(function(event) {
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
