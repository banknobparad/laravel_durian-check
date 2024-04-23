<?php

namespace App\Http\Controllers;

use App\Models\Durian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Durian_detail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DurianController extends Controller
{

    public function __construct()
    {
        $this->middleware('user');
    }

    // function showcreate คือแสดงหน้า create.blace.php มันเอาไว้แสดงหน้าที่เรากรอกข้อมูล
    public function showcreate()
    {
        $provinces = DB::table('provinces')->get();

        return view('user.create', compact('provinces'));
    }

    // function พวกนี้เอาไว้ดึงข้อมูล อำเภอ ตำบล จาก datebase
    public function fetchAmphuresOur(Request $request)
    {
        $provinceId = $request->input('province_id');
        $amphures = DB::table('amphures')->where('province_id', $provinceId)->get();
        return response()->json($amphures);
    }

    public function fetchDistrictsOur(Request $request)
    {
        $amphureId = $request->input('amphure_id');
        $districts = DB::table('districts')->where('amphure_id', $amphureId)->get();
        return response()->json($districts);
    }

    public function fetchAmphuresHis(Request $request)
    {
        $provinceId = $request->input('province_id');
        $amphures = DB::table('amphures')->where('province_id', $provinceId)->get();
        return response()->json($amphures);
    }

    public function fetchDistrictsHis(Request $request)
    {
        $amphureId = $request->input('amphure_id');
        $districts = DB::table('districts')->where('amphure_id', $amphureId)->get();
        return response()->json($districts);
    }

    // function create คือ function ที่เราจะส่งข้อมูลที่ได้รับมาจากหน้า create.blade.php function นี้จะส่งข้อมูลเข้า datebase
    public function create(Request $request)
    {
        // ส่วนแรกเลยคือ validate มันคือการตรวจสอบความถูกต้องตรวจสอบข้อมูลเช่น ชื่อก็ควรเป็นพยัญชนะเท่านั้นไม่มีตัวเลข

        $docs_id = GeneratoridController::IDGenerator(new Durian_detail, 'docs_id', 4, 'Durian');

        $request->validate(
            [
                // ส่วนของ our our คือของเรา
                //                 'name_our' => 'required|regex:/^[a-zA-Zก-๏\s]+$/u',
                // 'id_number_our' => 'required|numeric|regex:/^\d{13}$/',
                // 'phone_number_our' => 'required|numeric|regex:/^\d{10}$/|',
                // 'house_number_our' => 'required',
                // 'provinces_our' => 'required',
                // 'amphures_our' => 'required',
                // 'districts_our' => 'required',
                // 'rel_our' => 'required',

                // // ส่วนของ his
                // 'name_his' => 'required|regex:/^[a-zA-Zก-๏\s]+$/u',
                // 'provinces_his' => 'required',
                // 'amphures_his' => 'required',
                // 'districts_his' => 'required',
                // 'gap_his' => 'required',
                // 'date_his' => 'required',
                // 'quantity_his' => 'required',
                // 'area_his' => 'required',
                // 'type_his' => 'required',
                // 'weight_his' => 'required', 
            ],

            [
                // พิมพ์ข้อความแจ้งเตือน
                // our
                //             'name_our.required' => 'กรุณาป้อนชื่อ',
                // 'name_our.regex' => 'กรุณาป้อนชื่อเป็นตัวหนังสือเท่านั้น',

                // 'id_number_our.required' => 'กรุณาป้อนเลขบัตรประชาชน',
                // 'id_number_our.numeric' => 'กรุณาป้อนเลขบัตรประชาชนเป็นตัวเลขเท่านั้น',
                // 'id_number_our.regex' => 'กรุณาป้อนเลขบัตรประชาชนเป็น 13 ตัวอักษร',

                // 'phone_number_our.required' => 'กรุณาป้อนเบอร์โทร',
                // 'phone_number_our.numeric' => 'กรุณาป้อนเบอร์โทรเป็นตัวเลขเท่านั้น',
                // 'phone_number_our.regex' => 'กรุณาป้อนเบอร์โทรเป็น 10 ตัวอักษร',

                // 'house_number_our' => 'กรุณากรอกบ้านเลขที่',

                // 'provinces_our' => 'กรุณากรอกจังหวัด',
                // 'amphures_our' => 'กรุณากรอกอำเภอ',
                // 'districts_our' => 'กรุณากรอกตำบล',
                // 'rel_our' => 'กรุณากรอกความสัมพันธ์เกี่ยวกับเจ้าของแปลง',

                // // his
                // 'name_his.required' => 'กรุณาป้อนชื่อ',
                // 'name_his.regex' => 'กรุณาป้อนชื่อเป็นตัวหนังสือเท่านั้น',
                 ]

        );

        $inputdata = [
            'docs_id' => $docs_id,
            'user_id' => Auth()->user()->id,
            'name_our' => $request->name_our,
            'id_number_our' => $request->id_number_our,
            'phone_number_our' => $request->phone_number_our,
            'house_number_our' => $request->house_number_our,
            'moo_our' => $request->moo_our,
            'soi_our' => $request->soi_our,
            'road_our' => $request->road_our,
            'provinces_our' => $request->provinces_our,
            'amphures_our' => $request->amphures_our,
            'districts_our' => $request->districts_our,
            'rel_our' => $request->rel_our,
            'name_his' => $request->name_his,
            'moo_his' => $request->moo_his,
            'soi_his' => $request->soi_his,
            'road_his' => $request->road_his,
            'provinces_his' => $request->provinces_his,
            'amphures_his' => $request->amphures_his,
            'districts_his' => $request->districts_his,
            'date_his' => Carbon::createFromFormat('d/m/Y', $request->date_his)->format('Y-m-d'),
            'quantity_his' => $request->quantity_his,
            'area_his' => $request->area_his,
            'type_his' => $request->type_his,
            'gap_his' => $request->gap_his,
            'weight_his' => $request->weight_his,

        ];
        // dd($input_our);
        // Durian_detail::create($input_our);

        Durian_detail::create($inputdata);

        return redirect()->route('info')->with('success', 'เช็คชื่อสำเร็จ');
    }

    public function info()
    {
        $detail = Durian_detail::where('user_id', Auth::id())->where('status', '1')->get();

        // dd($detail);
        return view('user.info', compact('detail'));
    }

    public function delete($id)
    {

        Durian_detail::where('id', $id)->where('user_id', Auth::id())->delete();

        // dd($id);
        return redirect()->back()->with('question', 'ลบข้อมูลสำเร็จ');
    }

    public function edit($id)
    {
        $edit = Durian_detail::where('id', $id)->where('user_id', Auth::id())->first();
        $provinces = DB::table('provinces')->get();
        $amphures = DB::table('amphures')->get();
        $districts = DB::table('districts')->get();

        // dd($edit->toArray());
        return view('user.edit', compact('edit', 'provinces', 'amphures', 'districts'));
    }

    public function update(Request $request, $id)
    {

        $request->validate(
            [
                //  ส่วนของ our our คือของเรา
                // 'name_our' => 'required|regex:/^[a-zA-Zก-๏\s]+$/u',
                // 'id_number_our' => 'required|numeric|regex:/^\d{13}$/',
                // 'phone_number_our' => 'required|numeric|regex:/^\d{10}$/|',
                // 'house_number_our' => 'required',
                // 'provinces_our' => 'required',
                // 'amphures_our' => 'required',
                // 'districts_our' => 'required',
                // 'rel_our' => 'required',

                // ส่วนของ his
                // 'name_his' => 'required|regex:/^[a-zA-Zก-๏\s]+$/u',
                // 'provinces_his' => 'required',
                // 'amphures_his' => 'required',
                // 'districts_his' => 'required',
                // 'gap_his' => 'required',
                // 'date_his' => 'required',
                // 'quantity_his' => 'required',
                // 'area_his' => 'required',
                // 'type_his' => 'required',
                // 'weight_his' => 'required', 
            ],
            [

                // 'name_our.required' => 'กรุณาป้อนชื่อ',
                // 'name_our.regex' => 'กรุณาป้อนชื่อเป็นตัวหนังสือเท่านั้น',

                // 'id_number_our.required' => 'กรุณาป้อนเลขบัตรประชาชน',
                // 'id_number_our.numeric' => 'กรุณาป้อนเลขบัตรประชาชนเป็นตัวเลขเท่านั้น',
                // 'id_number_our.regex' => 'กรุณาป้อนเลขบัตรประชาชนเป็น 13 ตัวอักษร',

                // 'phone_number_our.required' => 'กรุณาป้อนเบอร์โทร',
                // 'phone_number_our.numeric' => 'กรุณาป้อนเบอร์โทรเป็นตัวเลขเท่านั้น',
                // 'phone_number_our.regex' => 'กรุณาป้อนเบอร์โทรเป็น 10 ตัวอักษร',

                // 'house_number_our' => 'กรุณากรอกบ้านเลขที่',

                // 'provinces_our' => 'กรุณากรอกจังหวัด',
                // 'amphures_our' => 'กรุณากรอกอำเภอ',
                // 'districts_our' => 'กรุณากรอกตำบล',
                // 'rel_our' => 'กรุณากรอกความสัมพันธ์เกี่ยวกับเจ้าของแปลง',

                // // his
                // 'name_his.required' => 'กรุณาป้อนชื่อ',
                // 'name_his.regex' => 'กรุณาป้อนชื่อเป็นตัวหนังสือเท่านั้น', 
            ]
        );

        $updatedata = [
            'user_id' => Auth()->user()->id,
            'name_our' => $request->name_our,
            'id_number_our' => $request->id_number_our,
            'phone_number_our' => $request->phone_number_our,
            'house_number_our' => $request->house_number_our,
            'moo_our' => $request->moo_our,
            'soi_our' => $request->soi_our,
            'road_our' => $request->road_our,
            'provinces_our' => $request->provinces_our,
            'amphures_our' => $request->amphures_our,
            'districts_our' => $request->districts_our,
            'rel_our' => $request->rel_our,
            'name_his' => $request->name_his,
            'moo_his' => $request->moo_his,
            'soi_his' => $request->soi_his,
            'road_his' => $request->road_his,
            'provinces_his' => $request->provinces_his,
            'amphures_his' => $request->amphures_his,
            'districts_his' => $request->districts_his,
            'date_his' => Carbon::createFromFormat('d/m/Y', $request->date_his)->format('Y-m-d'),
            'quantity_his' => $request->quantity_his,
            'area_his' => $request->area_his,
            'type_his' => $request->type_his,
            'gap_his' => $request->gap_his,
            'weight_his' => $request->weight_his,
        ];

        Durian_detail::find($id)->update($updatedata);

        return redirect()->route('info');
    }
}
