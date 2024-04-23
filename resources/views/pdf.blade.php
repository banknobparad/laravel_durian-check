<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF ใบรับรองการตรวจทุเรียน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ storage_path('fonts/THSarabunNew.ttf') }}") format('truetype');

        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ storage_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');

        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ storage_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');

        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ storage_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');

        }

        body {
            font-family: "THSarabunNew", sans-serif;
        }


        table {
            border-collapse: collapse;

        }

        td,
        th {
            border: 1px solid;
            padding: 5px 5px 5px 5px;

        }

        .setcenter {

            padding-top: 4px !important;
            padding-bottom: 8px !important;
        }

        .border-0 {
            font-size: 22px
        }

        table {
            font-size: 22px
        }

        .td-word-break {
            word-break: break-word;
        }

        .table {
            margin-bottom: 3px;
            /* กำหนดระยะห่างด้านล่างของตาราง */
        }

        .second-table {
            page-break-before: always;
            /* บังคับให้เกิดการขึ้นหน้าใหม่ก่อน table ที่มี class "second-table" */
        }

        .text-indent {
            text-indent: 25px;
            /* กำหนดการย่อหน้าเป็น 20px */
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td style="border: 1px solid #000; text-align: center;">
                <img src="images/icons/Rbru.png" class="featured-block-image img-fluid" alt="" width="50px">
                <img src="images/icons/rbru2.png" class="featured-block-image img-fluid" alt="" width="50px">
                <img src="{{ public_path('images/' . $image) }}" width="80px">
            <td style="border: 1px solid #000; text-align: left;">
                <p style="font-size: 24px;"><strong>หน่วยงานให้บริการ</strong></p>
                <p><strong>จุดบริการตรวจก่อนตัดมหาวิทยาลัยราชภัฏรำไพพรรณี</strong></p>
            </td>
        </tr>
    </table>
    <table class="table border-0">
        <thead class="border-0">
            <tr class="border-0">
                <th scope="col" class="border-0"></th>
                <th scope="col"class="border-0 text-center" style="width:600px"><strong
                        style="font-size: 20px;">หนังสือรับรองผลกาจตรวจก่อนตัด(ตรวจเปอร์เซ็นต์น้ำหนักเนื้อแห้งของทุเรียน)
                    </strong></th>
                <th class="border-0"></th>
            </tr>
        </thead>
    </table>
    <table class="table border-0">
        <thead class="border-0">
            <tr class="border-0">
                <th scope="col" class="border-0"></th>
                <th scope="col"class="border-0 text-end" style="width:600px"><strong
                        style="font-size: 20px;">เขียนที่ มหาวิทยาลัยราชภัฏรำไพพรรณี</strong></th>
                <th class="border-0"></th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-0">
                <th scope="col" class="border-0"></th>
                <th scope="col"class="border-0 text-end" style="width:600px"><strong style="font-size: 16px;">วันที่
                        {{ date('d/m/Y', strtotime($pdf_detail->date_his)) }} เวลา น.</strong></th>
                <th class="border-0"></th>
            </tr>
        </tbody>
    </table>

    <table class="table border-0">
        <tr class="border-0">
            <td scope="col"class="border-0 text-indent" style="width:150px;">ตามที่
                <b>{{ $pdf_detail->name_our }}</b> เลขประจำตัวประชาชน <b>{{ $pdf_detail->id_number_our }}</b>
                ที่อยู่บ้านเลขที่ <b>{{ $pdf_detail->house_number_our }}</b> หมู่ที่ <b>{{ $pdf_detail->moo_our }}</b>
                ตำบล <b>{{ $district_name_our }}</b> อำเภอ <b>{{ $amphures_name_our }}</b> จังหวัด
                <b>{{ $provinces_name_our }}</b>
                หมายเลขโทรศัพท์ <b>{{ $pdf_detail->phone_number_our }}</b> มีสถานะเป็น <b>{{ $pdf_detail->rel_our }}
                </b>ได้นำจากแปลงปลูกของ <b> {{ $pdf_detail->name_his }} </b>
                ที่ตั้งแปลงหมู่ <b>{{ $pdf_detail->moo_his }}</b> ตำบล <b>{{ $district_name_his }}</b> อำเภอ
                <b>{{ $amphures_name_his }}</b>
                จังหวัด <b>{{ $provinces_name_his }}</b> หมายเลขการรับรองGAP <b>{{ $pdf_detail->gap_his }}
                </b>โดยจะเก็บเกี่ยวในวันที่ <b>{{ $pdf_detail->date_his }}</b>
                ปริมาณผลผลิตที่คาดว่าจะเก็บเกี่ยว <b>{{ $pdf_detail->quantity_his }}</b> กิโลกรัม จำนวนพื้นที่ปลูก
                <b>{{ $pdf_detail->area_his }} </b> ไร่
        </tr>
    </table>

    <table class="table border-0">
        <thead class="border-0">
            <tr class="border-0">
            <tr class="border-0">
                <th scope="col" class="border-0 text-indent" style="font-size: 18px;">
                    จุดบริการตรวจก่อนตัดมหาวิทยาลัยราชภัฏรำไพพรรณี ได้ทำการตรวจเปอร์เซ็นต์น้ำหนักแห้งในเนื้อทุเรียนด้วย
                    วิธี FT-NIR (Near Infrared spectroscopy)
                    ซึ่งผลการตรวจเปอร์เซ็นต์น้ำหนักแห้งในเนื้อทุเรียนพัน({{ $pdf_detail->type_his }})
                    ที่ตรวจมีเปอร์เซ็นต์น้ำหนักแห้งในเนื้อทุเรียน_______% (_______)</th>
            </tr>
        </thead>
    </table>

    <table class="table border-1">
        <tbody>
            <tr class="border-0">
                <th scope="col" class="border-0" style="font-size: 20px;">มาตรฐานเปอร์เซ็นต์น้ำหนักแห้งในเนื้อทุเรียน
                </th>
                <th class="border-0"></th>
                <th scope="col"class="border-0 text-end" style="width:300px"><strong
                        style="font-size: 20px;">ลงชื่อ...............................................ผู้ตรวจ</strong></th>
            <tr class="border-0">
                <th scope="col" class="border-1" style="font-size: 20px;">พันธุ์กระดุม ไม่น้อยกว่า 27%</th>
                <th class="border-0"></th>
                <th scope="col"class="border-0 text-end" style="width:300px"><strong
                        style="font-size: 20px;">(..............................................................)</strong></th>

            <tr class="border-0">
                <th scope="col" class="border-1" style="font-size: 20px;">พันธุ์พวมณีและพันธุ์ชนี ไม่น้อยกว่า 30%
                </th>
                <th class="border-0"></th>
                <th scope="col"class="border-0 text-end" style="width:300px"><strong
                        style="font-size: 20px;">ลงชื่อ...............................................ผู้รับรอง</strong></th>
            <tr class="border-0">
                <th scope="col" class="border-1">พันธุ์หมอนทอง ไม่น้อยกว่า32%</th>
                <th class="border-0"></th>
                <th scope="col"class="border-0 text-end" style="width:300px"><strong
                        style="font-size: 20px;">(ผู้ช่วยศาสตราจารย์ ดร.เดือนรุ่ง เบญจมาศ)</strong></th>
            </tr>
        </tbody>
    </table>

    <table class="table border-0">
        <thead class="border-0">
            <tr class="border-0">
                <strong scope="col" class="border-0 text-center" style="font-size: 20px;">
                    หนังสือรับรองผลการตรวจเปอร์เซ็นต์น้ำหนักเนื้อแห้งของทุเรียน มีอายุรับรอง 10 วัน
                    นับตั้งแต่วันที่นำทุเรียนมาตรวจ
                </strong>
            </tr>
            <tr>
                <th scope="col" class="border-0 text-center" style="font-size: 18px;">
                    ข้าพเจ้าได้รับทราบผลการตรวจเปอร์เซ็นต์น้ำหนักเนื้อแห้งของทุเรียน ครั้งนี้เรียบร้อยแล้ว
                </th>
            </tr>
        </thead>
    </table>

    <table class="table border-1">
        <tbody>
            <tr class="border-0">
                <th scope="col" class="border-0"></th>
                <th class="border-0"></th>
                <th scope="col"class="border-0 text-end" style="width:300px"><strong
                        style="font-size: 20px;">ลงชื่อ...............................................ผู้ส่งตรวจ</strong></th>
            <tr class="border-0">
                <th scope="col" class="border-0">หมายเหตุ</th>
                <th class="border-0"></th>
                <th scope="col"class="border-0 text-center" style="width:300px"><strong
                        style="font-size: 20px;">({{ $pdf_detail->name_our }})</strong></th>
        </tbody>
    </table>
    <table class="table border-0">
        <tbody>
            <tr class="border-0">
                <th scope="col" class="border-0" style=" width:300px; font-size: 18px;">1.ผู้รับรอง
                    หมายถึงหัวหน้าชุปฏิบัติการประจำจุบริการตรวจก่อนตัในพื้นที่ตั้งแปลง</th>
            <tr>
                <th scope="col" class="border-0" style=" width:300px; font-size: 18px;">
                2.การรับรองผลตรวจเปอร์เซ็นต์น้ำหนักเนื้อแห้งของทุเรียนจะให้การรับรองผลการตรวจเฉพาะตัวอย่างทุเรียนที่ส่งตรวจนี้เท่านั้น</th>
            </tr>
    </table>

</body>

</html>
