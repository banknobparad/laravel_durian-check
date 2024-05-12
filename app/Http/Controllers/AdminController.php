<?php

namespace App\Http\Controllers;

use App\Models\Checkdata;
use App\Models\User;
use App\Models\Durian_detail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function check()
    {
        $checkdatas = Checkdata::with('user')->get();

        return view('admin.check', compact('checkdatas'));
    }

    public function checkuser($id)
    {
        // หาข้อมูลในฐานข้อมูล
        $checkdata = Checkdata::findOrFail($id);

        // ทำการอัปเดตค่าในฐานข้อมูล
        $checkdata->update(['user_id' => null]);

        // ส่งกลับไปยังหน้าที่ต้องการ
        return redirect()->back()->with('success', 'ลบข้อมูลผู้ลงทะเบียนเรียบร้อยแล้ว');
    }

    public function checkgap($id)
    {
        // หาข้อมูลในฐานข้อมูล
        $checkdata = Checkdata::findOrFail($id);

        // ทำการอัปเดตค่าในฐานข้อมูล
        $checkdata->update(['gap_id' => null]);

        // ส่งกลับไปยังหน้าที่ต้องการ
        return redirect()->back()->with('success', 'ลบข้อมูลผู้ลงทะเบียนเรียบร้อยแล้ว');
    }

    public function deletecheckdata()
    {
        // รหัสที่ใช้ในการลบข้อมูลจากตาราง checkdatas
        Checkdata::truncate();

        return response()->json(['message' => 'Data deleted successfully']);
    }

    public function infoAll()
    {
        $user = User::where('role', '!=', 'Admin')->with('Durian_detail')->get();

        // dd($user->toArray());
        return view('admin.infoall', compact('user'));
    }

    public function delete($id)
    {
        Durian_detail::where('id', $id)->delete();

        // dd($id);
        return redirect()->back();
    }

    public function change($id)
    {
        $durian = Durian_detail::find($id);

        // กำหนดสถานะใหม่โดยใช้เงื่อนไขตรวจสอบ
        $newStatus = '';
        $newDate = $durian->date; // กำหนดให้เป็นวันเดียวกับเดิมก่อน
        switch ($durian->status) {
            case 'รอตรวจสอบ':
                $newStatus = 'ผ่าน';
                $newDate = Carbon::now()->addDays(11)->toDateString(); // เพิ่มวันที่อีก 10 วัน
                break;
            case 'ผ่าน':
                $newStatus = 'ไม่ผ่าน';
                // ลบข้อมูลวันในฟิลล์ date
                $newDate = null;
                break;
            case 'ไม่ผ่าน':
                $newStatus = 'รอตรวจสอบ';
                // ลบข้อมูลวันในฟิลล์ date
                $newDate = null;
                break;
            default:
                // ค่าเริ่มต้นหรือการจัดการข้อผิดพลาด
                break;
        }

        $data = [
            'status' => $newStatus,
            'date' => $newDate, // อัพเดทวันที่ใหม่ (หรือ null ถ้าไม่มีวันที่)
        ];

        $durian->update($data);

        return redirect()->back();
    }


    public function report(Request $request)
    {

        $durian_details = Durian_detail::get();

        return view('admin.report', compact('durian_details'));
    }


    public function filterData(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // ดึงข้อมูลจากตาราง durian_details โดยกำหนดเงื่อนไขเป็นช่วงของวันที่
        $durian_details = Durian_detail::whereBetween('created_at', [$start_date, $end_date])->get();

        return view('admin.report', compact('durian_details'));
    }
}
