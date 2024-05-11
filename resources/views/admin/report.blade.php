@extends('layouts.app')

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
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-4">
                <h2 class="text-center">รายงานข้อมูล</h2>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-warning" id="btn1">1 วัน</button>
                    <button type="button" class="btn btn-warning" id="btn30">1 เดือน</button>
                    <button type="button" class="btn btn-warning" id="btnAll">ทั้งหมด</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mt-3">
                    <label for="monthSelect">เลือกเดือน:</label>
                    <select class="form-select" id="monthSelect">
                        <option value="1">มกราคม</option>
                        <option value="2">กุมภาพันธ์</option>
                        <option value="3">มีนาคม</option>
                        <option value="4">เมษายน</option>
                        <option value="5">พฤษภาคม</option>
                        <option value="6">มิถุนายน</option>
                        <option value="7">กรกฎาคม</option>
                        <option value="8">สิงหาคม</option>
                        <option value="9">กันยายน</option>
                        <option value="10">ตุลาคม</option>
                        <option value="11">พฤศจิกายน</option>
                        <option value="12">ธันวาคม</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>150</h3>
                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>150</h3>
                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>150</h3>
                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-2">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>150</h3>
                        <p>New Orders</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-12">

                <canvas id="myChart" width="300" height="90"></canvas>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // โค้ดสำหรับการสร้างกราฟดูข้อมูล
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                    label: 'My Dataset',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // การจัดการเหตุการณ์เมื่อคลิกปุ่ม
        document.getElementById('btn1').addEventListener('click', function() {
            // โค้ดสำหรับแสดงข้อมูลเฉพาะ 1 วัน
            console.log('ดูข้อมูลเฉพาะ 1 วัน');
        });

        document.getElementById('btn30').addEventListener('click', function() {
            // โค้ดสำหรับแสดงข้อมูลเฉพาะ 1 เดือน
            console.log('ดูข้อมูลเฉพาะ 1 เดือน');
        });

        document.getElementById('btnAll').addEventListener('click', function() {
            // โค้ดสำหรับแสดงข้อมูลทั้งหมด
            console.log('ดูข้อมูลทั้งหมด');
        });
    </script>
@endsection
