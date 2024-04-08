<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>PDF ใบเบิกเงินสดย่อย</title>
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
        </style>
    </head>
<body>
    

    <table class="table border-0">
        <thead class="border-0">
            <tr class="border-0">
                <th scope="col" class="border-0"></th>
                <th scope="col"class="border-0 text-center" style="width:600px"><strong
                        style="font-size: 20px;">หน่วยงานให้บริการ</strong></th>
                <th class="border-0"></th>
            </tr>
            <tr class="border-0">
                <th scope="col" class="border-0"></th>
                <th scope="col"class="border-0 text-center" style="width:600px"><strong
                        style="font-size: 20px;">จุคบริการตรวจก่อนตัดมหาวิทยาลัยราชภัฏรำไพพรรณี</strong></th>
                <th class="border-0"></th>
            </tr>
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
                <th scope="col"class="border-0 text-end" style="width:600px"><strong
                        style="font-size: 16px;">วันที่ {{ date('d/m/Y', strtotime($pdf_detail->date_his)) }}  เวลา  น.</strong></th>
                <th class="border-0"></th>
            </tr>
        </tbody>
    </table>

    <table class="table border-0">
        <thead class="border-0">
            <tr class="border-0">
                <th scope="col"class="border-0" style="width:200px; font-size: 18px;">ตามที่..... {{$pdf_detail->name_our}}....</th>
                <th scope="col" class="border-0" style="width:250px ;font-size: 18px;">เลขประจำตัวประชาชน ..... {{$pdf_detail->id_number_our}}.....</th>
                <th scope="col" class="border-0" style="font-size: 18px;">ที่อยู่บ้านเลที่</th>
            </tr>
        </thead>
    </table>

</body>
</html>