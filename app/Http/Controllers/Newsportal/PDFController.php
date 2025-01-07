<?php

namespace App\Http\Controllers;

use App\Createform;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $create = Createform::all();
        $pdf = PDF::loadView('PDF', compact('create'));
        Storage::put('public/pdf/invoice.pdf', $pdf->output());
        return $pdf->download('jaruwa.pdf');
        // share data to view
        // $pdf = mb_convert_encoding(\View::make('PDF', compact('create')), 'HTML-ENTITIES', 'UTF-8');
        // return $pdf;
        // libxml_use_internal_errors(true);
        // return PDF::loadHtml($pdf)->download('nepali_font_pdf_view.pdf');
    }
}
