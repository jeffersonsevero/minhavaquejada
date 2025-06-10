<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Spatie\LaravelPdf\Support\pdf;

class DownloadPdfController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return pdf()
            ->view('pdf.pass')
            ->download('senhas.pdf');
    }
}
