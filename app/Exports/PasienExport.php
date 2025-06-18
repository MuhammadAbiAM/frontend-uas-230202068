<?php
namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Http;

class PasienExport implements FromView
{
    public function view(): View
    {
        $pasien = Http::get('http://localhost:8080/pasien')->json();
        return view('pasien.excel', compact('pasien'));
    }
}

