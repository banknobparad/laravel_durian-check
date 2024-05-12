@extends('layouts.app')
@section('title', 'รายงาน')

@section('activeReport')
    active border-2 border-bottom border-warning
@endsection

@section('content')
    <style>
        .small-box {
            border-radius: .25rem;
            box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
            display: block;
            margin-bottom: 20px;
            position: relative;
        }

        .small-box>.inner {
            padding: 10px;
        }

        .small-box>.small-box-footer {
            background-color: rgba(0, 0, 0, .1);
            color: rgba(255, 255, 255, .8);
            display: block;
            padding: 3px 0;
            position: relative;
            text-align: center;
            text-decoration: none;
            z-index: 10;
        }

        .bg-info .inner h3,
        .bg-info .inner p,
        .bg-info .small-box-footer {
            color: white !important;
        }

        .bg-success .inner h3,
        .bg-success .inner p,
        .bg-success .small-box-footer {
            color: white !important;
        }

        .bg-danger .inner h3,
        .bg-danger .inner p,
        .bg-danger .small-box-footer {
            color: white !important;
        }

        .bg-warning .inner h3,
        .bg-warning .inner p,
        .bg-warning .small-box-footer {
            color: white !important;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-4">
                <h2 class="text-center">รายงานข้อมูล</h2>

            </div>
            <div class="card col-md-3">
                <form method="GET" action="{{ route('filterData') }}">
                    <div class="form-group">
                        <label>Start Date:</label>
                        <input type="date" name="start_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>End Date:</label>
                        <input type="date" name="end_date" class="form-control">
                    </div>

                    <div class="col-md-12 p-1 d-flex justify-content-between">
                        <div class="card col-md-6">
                            <button type="submit" class="btn btn-sm btn-primary">ค้นหา</button>
                        </div>
                        <div class="card col-md-6">
                            <a href="{{ route('report') }}" class="btn btn-sm btn-secondary">เคลียร์</a>
                        </div>
                    </div>



            </div>
            </form>
            <div class="col-md-3">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>ลงทะเบียนทั้งหมด</h3>
                        <p id="register">{{ $durian_details->count() }} ครั้ง</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('infoAll') }}" class="small-box-footer">ดูเพิ่มเติม <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>ผ่าน</h3>
                        <p id="approved">{{ $durian_details->where('status', 'ผ่าน')->count() }} ครั้ง</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('infoAll') }}" class="small-box-footer">ดูเพิ่มเติม <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>ไม่ผ่าน</h3>
                        <p id="disapproved">{{ $durian_details->where('status', 'ไม่ผ่าน')->count() }} ครั้ง</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('infoAll') }}" class="small-box-footer">ดูเพิ่มเติม <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="small-box bg-warning" style="background-color: #ba8c02">
                    <div class="inner">
                        <h3>รอตรวจสอบ</h3>
                        <p id="pending">{{ $durian_details->where('status', 'รอตรวจสอบ')->count() }} ครั้ง</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('infoAll') }}" class="small-box-footer">ดูเพิ่มเติม <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="card col-md-6 py-2 mt-3 my-4">

                <canvas id="myChart" width="300" height="230"></canvas>

            </div>
            <div class="card col-md-6 py-2 mt-3 my-4">

                <table id="report" class="table table-bordered table-hover table-striped display">
                    <thead class="table-th-color">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่อผู้ตรวจ</th>
                            <th scope="col">GAP</th>
                            <th scope="col">วันที่ตรวจ</th>
                            <th style="text-align: center;" scope="col">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($durian_details as $detail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $detail->name_our }}</td>
                                <td>{{ $detail->gap_his }}</td>
                                <td>{{ $detail->created_at }}</td>
                                <td style="text-align: center;">
                                    @if ($detail->status == 'รอตรวจสอบ')
                                        <button class="btn btn-warning">{{ $detail->status }}</button>
                                    @elseif($detail->status == 'ผ่าน')
                                        <button class="btn btn-success">{{ $detail->status }}</button>
                                    @elseif($detail->status == 'ไม่ผ่าน')
                                        <button class="btn btn-danger">{{ $detail->status }}</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        new DataTable('#report', {
            responsive: true,
            ordering: false,
            autoWidth: false,
            language: {
                emptyTable: "ไม่พบข้อมูลที่ค้นหา",
                zeroRecords: "ไม่พบข้อมูลตามเงื่อนไขที่ระบุ",
                loadingRecords: "กำลังโหลดข้อมูล...",
                search: "ค้นหา:",

                aria: {
                    sortAscending: ": เรียงลำดับจากน้อยไปมาก",
                    sortDescending: ": เรียงลำดับจากมากไปน้อย"
                }
            }
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['ผ่าน', 'ไม่ผ่าน', 'รอการตรวจสอบ'],
                datasets: [{
                    label: 'ข้อมูลการตรวจสอบ',
                    data: [
                        {{ $durian_details->where('status', 'ผ่าน')->count() }},
                        {{ $durian_details->where('status', 'ไม่ผ่าน')->count() }},
                        {{ $durian_details->where('status', 'รอตรวจสอบ')->count() }},
                    ],
                    backgroundColor: ['rgba(25, 135, 84, 0.5)', 'rgba(220, 53, 69, 0.5)',
                        'rgba(255, 193, 3, 0.5)'
                    ],
                    borderColor: ['rgba(25, 135, 84, 1)', 'rgba(220, 53, 69, 1)',
                        'rgba(255, 193, 3, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
@endsection
