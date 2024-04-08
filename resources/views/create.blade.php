@extends('layouts.app')

@section('title', 'กรอกข้อมูล')

@section('content')
    <style>
        .form-group {
            padding: 10px;
        }
    </style>
    <div class="container d-flex flex-column py-3">
        <h2 class="text-center">กรอกข้อมูล</h2>
        <div class="card shadow-sm rounded-3 my-auto col-md-11 mx-auto bg-white">

            <div class="card-header">
                <h5>ข้อมูลของคุณ</h5>
            </div>

            <div class="card-body p-4">

                {{-- การที่เราจะส่งข้อมูล มันจำต้องอยู่ใน form (ถ้าไม่ได้ใช้ api )||(action) กำหนดจุดหมายปลายทาง ของการส่งข้อมูล method="POST" เป็นวิธีการส่งข้อมูลไปยัง server --}}

                <form action="{{ route('create') }}" method="post" class="row">
                    @csrf
                    <div class="form-group col-lg-2">
                        <label for="prefix_our" class="form-label">คำนำหน้า</label>
                        <select id="prefix_our" class="form-control" onchange="onSelectOur()">
                            <option value="" selected disabled>เลือกคำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-10">
                        <label for="name_our" class="form-label">ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control" id="name_our" name="name_our"
                            placeholder="กรุณากรอกชื่อ-นามสกุล">
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="id_number_our" class="form-label">รหัสประจำตัว</label>
                        <input type="text" class="form-control" id="id_number_our" name="id_number_our"
                            placeholder="กรุณากรอกรหัสประจำตัว">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="phone_number_our" class="form-label">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" id="phone_number_our" name="phone_number_our"
                            placeholder="กรุณากรอกเบอร์โทรศัพท์">

                    </div>
                    <div class="form-group col-lg-3">
                        <label for="house_number_our" class="form-label">บ้านเลขที่</label>
                        <input type="text" class="form-control" id="house_number_our" name="house_number_our"
                            placeholder="กรุณากรอกบ้านเลขที่">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="moo_our" class="form-label">หมู่ที่</label>
                        <input type="text" class="form-control" id="moo_our" name="moo_our"
                            placeholder="กรุณากรอกหมู่">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="soi_our" class="form-label">ซอย</label>
                        <input type="text" class="form-control" id="soi_our" name="soi_our" placeholder="กรุณากรอกซอย">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="road_our" class="form-label">ถนน</label>
                        <input type="text" class="form-control" id="road_our" name="road_our"
                            placeholder="กรุณากรอกถนน">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="provinces_our" class="form-label">จังหวัด</label>
                        <select
                            class="form-select {{ $errors->has('provinces_our') ? 'is-invalid' : (old('provinces_our') ? 'is-valid' : '') }}"
                            name="provinces_our" id="provinces_our">
                            <option value="" selected disabled>{{ __('เลือกจังหวัด') }}</option>
                            @foreach ($provinces as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('provinces_our') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name_th }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="amphures_our" class="form-label">เขต/อำเภอ</label>
                        <select
                            class="form-select {{ $errors->has('amphures_our') ? 'is-invalid' : (old('amphures_our') ? 'is-valid' : '') }}"
                            name="amphures_our" id="amphures_our">
                            <option value="" selected disabled>{{ __('เลือกเขต/อำเภอ') }}</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="districts_our" class="form-label">แขวง/ตำบล</label>
                        <select
                            class="form-select {{ $errors->has('districts_our') ? 'is-invalid' : (old('districts_our') ? 'is-valid' : '') }}"
                            name="districts_our" id="districts_our">
                            <option value="" selected disabled>{{ __('เลือกแขวง/ตำบล') }}</option>
                        </select>
                    </div>



                    <div class="form-group col-lg-4">
                        <label for="rel_our" class="form-label">ความสัมพันธ์ (สถานะเกี่ยวกับเจ้าของแปลง)</label>
                        <input type="text" class="form-control" id="rel_our" name="rel_our"
                            placeholder="กรุณากรอกความสัมพันธ์">
                    </div>



                    <div class="card-header">
                        <h5>ข้อมูลของเจ้าของแปลง</h5>
                    </div>



                    <div class="form-group col-lg-2">
                        <label for="prefix_his" class="form-label">คำนำหน้า</label>
                        <select id="prefix_his" class="form-control" onchange="onSelectHis()">
                            <option value="" selected disabled>เลือกคำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-10">
                        <label for="name_his" class="form-label">ชื่อ-นามสกุล</label>
                        <input type="text" class="form-control" id="name_his" name="name_his"
                            placeholder="กรุณากรอกชื่อ-นามสกุล">
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="moo_his" class="form-label">ที่ตั้งแปลง หมู่ที่</label>
                        <input type="text" class="form-control" id="moo_his" name="moo_his"
                            placeholder="กรุณากรอกหมู่ที่ตั้งแปลง">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="soi_his" class="form-label">ซอย</label>
                        <input type="text" class="form-control" id="soi_his" name="soi_his"
                            placeholder="กรุณากรอกซอย">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="road_his" class="form-label">ถนน</label>
                        <input type="text" class="form-control" id="road_his" name="road_his"
                            placeholder="กรุณากรอกถนน">
                    </div>


                    <div class="form-group col-lg-4">
                        <label for="provinces_his" class="form-label">จังหวัด</label>
                        <select
                            class="form-select {{ $errors->has('provinces_his') ? 'is-invalid' : (old('provinces_his') ? 'is-valid' : '') }}"
                            name="provinces_his" id="provinces_his">
                            <option value="" selected disabled>{{ __('เลือกจังหวัด') }}</option>
                            @foreach ($provinces as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('provinces_his') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name_th }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="amphures_his" class="form-label">เขต/อำเภอ</label>
                        <select
                            class="form-select {{ $errors->has('amphures_his') ? 'is-invalid' : (old('amphures_his') ? 'is-valid' : '') }}"
                            name="amphures_his" id="amphures_his">
                            <option value="" selected disabled>{{ __('เลือกเขต/อำเภอ') }}</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="districts_his" class="form-label">แขวง/ตำบล</label>
                        <select
                            class="form-select {{ $errors->has('districts_his') ? 'is-invalid' : (old('districts_his') ? 'is-valid' : '') }}"
                            name="districts_his" id="districts_his">
                            <option value="" selected disabled>{{ __('เลือกแขวง/ตำบล') }}</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="gap_his" class="form-label">หมายเลขรับรอง GAP</label>
                        <input type="text" class="form-control" id="gap_his" name="gap_his"
                            placeholder="กรุณากรอกหมายเลขรับรอง GAP">
                    </div>

                    <div class="form-group col-lg-2">
                        <label for="date_his" class="form-label">วันที่คาดว่าจะเก็บเกี่ยว</label>
                        <input type="text" name="date_his"
                            class="form-control datepicker-his {{ $errors->has('date_his') ? 'is-invalid' : '' }}"
                            value="{{ old('date_his') ? old('date_his') : '' }}">
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="quantity_his" class="form-label">ปริมาณผลผลิตที่คาดว่าจะเก็บเกี่ยว
                            (กิโลกรัม)</label>
                        <input type="text" name="quantity_his" id="quantity_his"
                            placeholder="กรอกปริมาณผลผลิตที่คาดว่าจะเก็บเกี่ยว"
                            class="form-control @error('quantity_his') is-invalid @enderror @if (!empty(old('quantity_his'))) is-valid @endif"
                            value="{{ old('quantity_his') }}">
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="area_his" class="form-label">จำนวนพื้นที่ปลูก (ไร่)</label>
                        <input type="text" name="area_his" id="area_his" placeholder="กรอกจำนวนพื้นที่ปลูก"
                            class="form-control @error('area_his') is-invalid @enderror @if (!empty(old('area_his'))) is-valid @endif"
                            value="{{ old('area_his') }}">
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="type_his" class="form-label">พันธุ์ทุเรียน</label>
                        <input type="text" name="type_his" id="type_his" placeholder="กรอกพันธุ์ทุเรียน"
                            class="form-control @error('type_his') is-invalid @enderror @if (!empty(old('type_his'))) is-valid @endif"
                            value="{{ old('type_his') }}">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="weight_his" class="form-label">เปอร์เซ็นน้ำหนักแห้งในเนื้อทุเรียน
                            (เปอร์เซ็น)</label>
                        <input type="text" name="weight_his" id="weight_his" placeholder="กรอกพันธุ์ทุเรียน"
                            class="form-control @error('weight_his') is-invalid @enderror @if (!empty(old('weight_his'))) is-valid @endif"
                            value="{{ old('weight_his') }}">
                    </div>



                    <div class="form-group col-lg-12">
                        <button type="submit" class="btn btn-dark float-end" for="form-group-input">Send</button>
                    </div>

                </form>
            
            </div>
        </div>
    </div>

    {{-- script สำหรับ ajax ที่ดึงข้อมูลจาก database --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- line and script สำหรับ datepicker  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    {{-- script ของ datepicker อันนี้คือ script ภาษาไทยวัน เดือนจะเป็นภาษาไทย --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/th.js"></script>

    {{-- script คำนำหน้าที่เอาไว้เลือก จะแบ่งเป็น 2 อันคือ our กับ his  --}}
    <script>
        function onSelectOur() {
            var title = document.getElementById('prefix_our').value;
            var nameInput = document.getElementById('name_our');
            var currentName = nameInput.value;

            var regex = /^(นาย|นางสาว|นาง)\s/;
            if (regex.test(currentName)) {
                currentName = currentName.replace(regex, '');
            }

            nameInput.value = title + ' ' + currentName;
        }

        function onSelectHis() {
            var title = document.getElementById('prefix_his').value;
            var nameInput = document.getElementById('name_his');
            var currentName = nameInput.value;

            var regex = /^(นาย|นางสาว|นาง)\s/;
            if (regex.test(currentName)) {
                currentName = currentName.replace(regex, '');
            }

            nameInput.value = title + ' ' + currentName;
        }

        // หลังจากที่เรียก script cnd มาแล้ว ตรงนี้คือ class ที่อ้างอิงถึงช่องที่เอาไว้กรอกเวลา การอ้างอิงถึง class จะใช้ . นำหน้า (".datepicker-his") 
        $(document).ready(function() {
            // ให้ Flatpickr ทำงานกับ input ที่มี class เป็น datepicker-his
            $(".datepicker-his").flatpickr({
                dateFormat: "d/m/Y", // กำหนดรูปแบบวันที่ d/m/Y เรียงเป็นของไทยคือ วัน เดือน ปี
                defaultDate: "today", // กำหนดค่าเริ่มต้นเป็นวันที่ปัจจุบัน
                locale: "th", // กำหนดภาษาเป็นภาษาไทย
            });
        });
    </script>

    {{-- อันนี้คือ function ajax ที่เอาไว้ดึง จังหวัด อำเภอ ตำบล จะแบ่งเป็น 2 อันคือ our และ his --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#provinces_our').change(function() {
                var provinceId = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('fetch-amphures-our') }}",
                    data: {
                        province_id: provinceId
                    },
                    success: function(data) {
                        $('#districts_our').html(
                            '<option value="" selected disabled>{{ __('เลือกแขวง/ตำบล') }}</option>'
                        );

                        var options =
                            '<option value="" selected disabled>{{ __('เลือกเขต/อำเภอ') }}</option>';
                        $.each(data, function(key, value) {
                            options += '<option value="' + value.id + '">' + value
                                .name_th + '</option>';
                        });
                        $('#amphures_our').html(options);
                    }
                });
            });

            $('#amphures_our').change(function() {
                var amphureId = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('fetch-districts-our') }}",
                    data: {
                        amphure_id: amphureId
                    },
                    success: function(data) {
                        var options =
                            '<option value="" selected disabled>{{ __('เลือกแขวง/ตำบล') }}</option>';
                        $.each(data, function(key, value) {
                            options += '<option value="' + value.id + '">' + value
                                .name_th + '</option>';
                        });
                        $('#districts_our').html(options);
                    }
                });
            });
        });
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#provinces_his').change(function() {
                var provinceId = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('fetch-amphures-his') }}",
                    data: {
                        province_id: provinceId
                    },
                    success: function(data) {
                        $('#districts_his').html(
                            '<option value="" selected disabled>{{ __('เลือกแขวง/ตำบล') }}</option>'
                        );

                        var options =
                            '<option value="" selected disabled>{{ __('เลือกเขต/อำเภอ') }}</option>';
                        $.each(data, function(key, value) {
                            options += '<option value="' + value.id + '">' + value
                                .name_th + '</option>';
                        });
                        $('#amphures_his').html(options);
                    }
                });
            });

            $('#amphures_his').change(function() {
                var amphureId = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('fetch-districts-his') }}",
                    data: {
                        amphure_id: amphureId
                    },
                    success: function(data) {
                        var options =
                            '<option value="" selected disabled>{{ __('เลือกแขวง/ตำบล') }}</option>';
                        $.each(data, function(key, value) {
                            options += '<option value="' + value.id + '">' + value
                                .name_th + '</option>';
                        });
                        $('#districts_his').html(options);
                    }
                });
            });
        });
    </script>

@endsection
