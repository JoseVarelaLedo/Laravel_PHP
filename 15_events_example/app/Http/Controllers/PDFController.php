<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function index()
    {
        return view('pdf.pdf_example');
    }
    public function download()
    {
        $data = ['data' => 'Jose Ledo'];
        $pdf = Pdf::setOption([
            'dpi'               => 150,
            'defaultFont'       => 'arial',
            'defaultPaperSize'  => 'letter',

        ])->
        loadView('pdf.pdf_example', $data);
        //$pdf->save('/my-file.pdf');
        return $pdf->download('my-example.pdf');
    }
}
