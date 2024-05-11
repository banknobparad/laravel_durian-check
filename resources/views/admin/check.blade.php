@extends('layouts.app')

@section('title', 'Check')

@section('activeCheck')
    active border-2 border-bottom border-warning
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 style="color: #93bc4c"> <i class="fa-regular fa-user"></i> ข้อมูลผู้ใช้ที่ได้ลงทะเบียน</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="userTable">
                                <thead>
                                    <tr>
                                        <th style="text-align: left;">ชื่อผู้ลงทะเบียน</th>
                                        <th>เวลาที่ลงทะเบียน</th>
                                        <th style="text-align: center;">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($checkdatas as $user)
                                        @if (isset($user->user) && $user->user->first() && $user->user->first()->name)
                                            <tr>
                                                <td style="text-align: left;">
                                                    {{ $user->user->first()->name }}
                                                </td>
                                                <td>{{ $user->created_at->format('H:i:s') }}</td>
                                                <td style="text-align: center;">
                                                    <form action="{{ route('checkuser', ['id' => $user->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="button" class="btn btn-sm btn-danger delete-user"
                                                            data-user-id="{{ $user->id }}">
                                                            <i class="fa-regular fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </td>


                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 style="color: #93bc4c"> <i class="fa-regular fa-user"></i> ข้อมูล GAP ที่ได้ลงทะเบียน</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="gapTable">
                                <thead>
                                    <tr>
                                        <th>รหัส GAP</th>
                                        <th>เวลาที่ลงทะเบียน</th>
                                        <th style="text-align: center;">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($checkdatas as $gap)
                                        @if (isset($gap->gap_id) && $gap->gap_id)
                                            <tr>
                                                <td>{{ $gap->gap_id }}</td>
                                                <td>{{ $gap->created_at->format('H:i:s') }}</td>
                                                <td style="text-align: center;">
                                                    <form action="{{ route('checkgap', ['id' => $gap->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="button" class="btn btn-sm btn-danger delete-button"
                                                            data-id="{{ $gap->id }}">
                                                            <i class="fa-regular fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 py-5">
                <div style="color: #627e32" class="display-6 text-center">เวลาที่จะรีเซ็ตข้อมูล</div>
            </div>
            <div class="col-md-12 ">
                <div style="color: #93bc4c" id="timer" class="display-6 text-center"></div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            function countdown() {
                var now = new Date();
                var midnight = new Date(
                    now.getFullYear(),
                    now.getMonth(),
                    now.getDate() +1,
                    now.getHours(),
                    now.getMinutes(),
                    0, 0, 0
                );

                var timeLeft = midnight.getTime() - now.getTime();
                var hoursLeft = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutesLeft = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                var secondsLeft = Math.floor((timeLeft % (1000 * 60)) / 1000);

                $('#timer').html(hoursLeft + "ชั่วโมง " + minutesLeft + "นาที " + secondsLeft + "วิ");

                // ส่งคำขอลบข้อมูลโดยใช้ AJAX เมื่อถึงเที่ยงคืน
                if (hoursLeft === 0 && minutesLeft === 0 && secondsLeft === 0) {
                    $.ajax({
                        url: '{{ route('deletecheckdata') }}',
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'เคลียร์ข้อมูลสำเร็จ',
                                timer: 2000, // แสดงข้อความนี้เป็นเวลา 2 วินาที
                                timerProgressBar: true,
                                showConfirmButton: false
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error deleting data:', error);
                        }
                    });
                }
            }

            countdown(); // เรียกใช้ฟังก์ชัน countdown เมื่อโหลดหน้าเว็บ

            // เรียกใช้ countdown() ทุกๆ 1 วินาที
            setInterval(countdown, 1000);
        });
    </script>






    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
            $('#gapTable').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.delete-button').click(function(event) {
                event.preventDefault();
                var gapId = $(this).data('id');

                Swal.fire({
                    title: 'คุณต้องการเปลี่ยนข้อมูล GAP ใช้นี้หรือไม่?',
                    text: 'ข้อมูล GAP นี้จะสามารถลงทะเบียนได้อีกครั้ง!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ลบ',
                    cancelButtonText: 'ยกเลิก',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).closest('form').submit();
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.delete-user').click(function(event) {
                event.preventDefault();
                var userId = $(this).data('user-id');

                Swal.fire({
                    title: 'คุณต้องการเปลี่ยนข้อมูลผู้ใช้นี้หรือไม่',
                    text: 'ข้อมูลผู้ใช้นี้จะสามารถลงทะเบียนได้อีกครั้ง',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ลบ',
                    cancelButtonText: 'ยกเลิก',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).closest('form').submit();
                    }
                });
            });
        });
    </script>
@endsection
