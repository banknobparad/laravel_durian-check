<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Durian_detail;

class PDFController extends Controller
{
    //
    public function pdf($docs_id)

    {

        $pdf_detail = Durian_detail::where('docs_id',$docs_id)->firstOrFail();

        // dd($pdf_detail->ToArray());
        $pdf = PDF::loadView('pdf', [

            'pdf_detail' => $pdf_detail,

        ]);

        return @$pdf->stream();
    }
}
