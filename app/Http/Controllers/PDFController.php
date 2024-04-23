<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Durian_detail;
use App\Models\image;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    //
    public function pdf($id)

    {
        $pdf_detail = Durian_detail::where('id', $id)->firstOrFail();

        $provinces = DB::table('provinces')->get();
        $amphures = DB::table('amphures')->get();
        $districts = DB::table('districts')->get();

        $districts_our_id = $pdf_detail->districts_our;
        $amphures_our_id = $pdf_detail->amphures_our;
        $provinces_our_id = $pdf_detail->provinces_our;

        
        $district_name_our = $districts->where('id', $districts_our_id)->first()->name_th;
        $amphures_name_our = $amphures->where('id', $amphures_our_id)->first()->name_th;
        $provinces_name_our = $provinces->where('id', $provinces_our_id)->first()->name_th;
        

        $districts_his_id = $pdf_detail->districts_his;
        $amphures_his_id = $pdf_detail->amphures_his;
        $provinces_his_id = $pdf_detail->provinces_his;


     
        $district_name_his = $districts->where('id', $districts_his_id)->first()->name_th;
        $amphures_name_his = $amphures->where('id', $amphures_his_id)->first()->name_th;
        $provinces_name_his = $provinces->where('id', $provinces_his_id)->first()->name_th;

        $image = image::get();
        // dd($image);

        $pdf =PDF::loadView('pdf', [
            'pdf_detail' => $pdf_detail,
            'provinces' => $provinces,
            'amphures' => $amphures,
            'districts' => $districts,
            'district_name_our' => $district_name_our,
            'amphures_name_our' => $amphures_name_our,
            'provinces_name_our' => $provinces_name_our,

            'district_name_his' => $district_name_his,
            'amphures_name_his' => $amphures_name_his,
            'provinces_name_his' => $provinces_name_his,
            'image' => $image,

        ]);

        // dd($district_name);

        return @$pdf->stream();
    }
}
