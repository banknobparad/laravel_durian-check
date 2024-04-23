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
                        style="font-size: 20px;">หนังสือรับรองผลกาจตรวจเปอร์เซ็นต์น้ำหนักแห้งในเนื้อทุเรียน
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
        <thead class="border-0">
            <tr class="border-0">
                <th scope="col"class="border-0" style="width:200px; font-size: 18px;">ตามที่
                    {{ $pdf_detail->name_our }}</th>
                <th scope="col" class="border-0" style="width:250px ;font-size: 18px;">เลขประจำตัวประชาชน
                    {{ $pdf_detail->id_number_our }}</th>
                <th scope="col" class="border-0" style="font-size: 18px;">ที่อยู่บ้านเลขที่
                    {{ $pdf_detail->house_number_our }}</th>
                <th scope="col" class="border-0" style="font-size: 18px;">หมู่ที่ {{ $pdf_detail->moo_our }} </th>
            </tr>

        </thead>
    </table>
    <table class="table border-0">
        <thead class="border-0">
            <tr class="border-0">
            <tr class="border-0">
                <th scope="col" class="border-0 " style="font-size: 18px;">ตำบล {{ $district_name_our }}</th>
                <th scope="col" class="border-0" style="font-size: 18px;">อำเภอ {{ $amphures_name_our }}
                </th>
                <th scope="col" class="border-0" style="font-size: 18px;">จังหวัด {{ $provinces_name_our }}
                </th>
                <th scope="col" class="border-0" style="font-size: 18px;">หมายเลขโทรศัพท์
                    {{ $pdf_detail->phone_number_our }}</th>
                <th scope="col" class="border-0" style="font-size: 18px;">มีสถานะเป็น {{ $pdf_detail->rel_our }}
                </th>
            </tr>
        </thead>
    </table>


    <table class="table border-0">
        <thead class="border-0">
            <tr class="border-0">
                <th scope="col" class="border-0 text-indent" style="font-size: 18px;">ได้นำจากแปลงปลูกของ
                    {{ $pdf_detail->name_his }}</th>
                <th scope="col" class="border-0" style="font-size: 18px;"> ที่ตั้งแปลงหมู่
                    {{ $pdf_detail->moo_his }}</th>
                <th scope="col" class="border-0" style="font-size: 18px;"> ตำบล {{ $district_name_his }}
                </th>
                <th scope="col" class="border-0" style="font-size: 18px;"> อำเภอ {{ $amphures_name_his }}
                </th>
            </tr>
        </thead>
    </table>

    <table class="table border-0">
        <thead class="border-0">
            <tr class="border-0">
            <tr class="border-0">
                <th scope="col" class="border-0 " style="font-size: 18px;">จังหวัด
                    {{ $provinces_name_his }}</th>
                <th scope="col" class="border-0" style="font-size: 18px;">หมายเลขการรับรองGAP
                    {{ $pdf_detail->gap_his }} </th>
                <th scope="col" class="border-0" style="font-size: 18px;">โดยจะเก็บเกี่ยวในวันที่
                    {{ $pdf_detail->date_his }}</th>
            </tr>
        </thead>
    </table>

    <table class="table border-0">
        <thead class="border-0">
            <tr class="border-0">
            <tr class="border-0">
                <th scope="col" class="border-0 " style="font-size: 18px;">ปริมาณผลผลิตที่คาดว่าจะเก็บเกี่ยว
                    {{ $pdf_detail->quantity_his }} กิโลกรัม</th>
                <th scope="col" class="border-0" style="font-size: 18px;">จำนวนพื้นที่ปลูก
                    {{ $pdf_detail->area_his }} ไร่ </th>
            </tr>
        </thead>
    </table>

    <table class="table border-0">
        <thead class="border-0">
            <tr class="border-0">
            <tr class="border-0">
                <th scope="col" class="border-0 text-indent" style="font-size: 18px;">
                    ปริมาณผลผลิตที่คาดว่าจะเก็บเกี่ยว กิโลกรัม จำนวนพื้นที่ปลูก ไร่
                    จุดบริการตรวจก่อนตัดมหาวิทยาลัยราชภัฏรำไพพรรณี ได้ทำการตรวจเปอร์เซ็นต์น้ำหนักแห้งในเนื้อทุเรียนด้วย
                    วิธี FT-NIR (Near Infrared spectroscopy)
                    ซึ่งผลการตรวจเปอร์เซ็นต์น้ำหนักแห้งในเนื้อทุเรียนพัน({{ $pdf_detail->type_his }})
                    ที่ตรวจมีเปอร์เซ็นต์น้ำหนักแห้งในเนื้อทุเรียน_______% (_______)</th>
            </tr>
        </thead>
    </table>
    
    {{-- <div style="border: 1px solid black; padding: 20px; width: 250px;">
        <p style="margin: 0;">มาตรฐานเปอร์เซ็นต์น้ำหนักแห้งในเนื้อทุเรียน</p>
        <p style="margin: 0;">พันธุ์กระดุม ไม่น้อยกว่า 27%</p>
        <p style="margin: 0;">พันธุ์พวมณีและพันธุ์ชนี ไม่น้อยกว่า 30%</p>
    </div> --}}
   

    <table class="table border-1">
        <tbody>


            <tr class="border-0">
                <th scope="col" class="border-1">มาตรฐานเปอร์เซ็นต์น้ำหนักแห้งในเนื้อทุเรียน</th>
                <th class="border-0"></th>
                <th scope="col"class="border-0 text-end" style="width:300px"><strong
                        style="font-size: 20px;">ลงชื่อ...............................ผู้ตรวจ</strong></th>
            <tr class="border-0">
                <th scope="col" class="border-1">พันธุ์กระดุม ไม่น้อยกว่า 27%</th>
                <th class="border-0"></th>
                <th scope="col"class="border-0 text-end" style="width:300px"><strong
                        style="font-size: 20px;">(................................................)</strong></th>

            <tr class="border-0">
                <th scope="col" class="border-1">พันธุ์พวมณีและพันธุ์ชนี ไม่น้อยกว่า 30%</th>
                <th class="border-0"></th>
                <th scope="col"class="border-0 text-end" style="width:300px"><strong
                        style="font-size: 20px;">ลงชื่อ...............................ผู้รับรอง</strong></th>
            <tr class="border-0">
                <th scope="col" class="border-0"></th>
                <th class="border-0"></th>
                <th scope="col"class="border-0 text-end" style="width:300px"><strong
                        style="font-size: 20px;">(................................................)</strong></th>
            </tr>
        </tbody>
    </table>

    <table class="table border-0">
        <thead class="border-0">
            <tr class="border-0">
                <th scope="col" class="border-0 text-indent" style="font-size: 18px; font-weight: bold;">
                    หนังสือรับรองผลการตรวจเปอร์เซ็นต์น้ำหนักเนื้อแห้งของทุเรียน มีอายุรับรอง 10 วัน นับตั้งแต่วันที่นำทุเรียนมาตรวจ
                </th>
            </tr>
        </thead>
    </table>

</body>

</html>
