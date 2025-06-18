<?php
namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\Http;

class ObatExport implements FromView
{
    public function view(): View
    {
        $obat = Http::get('http://localhost:8080/obat')->json();
        return view('obat.excel', compact('obat'));
    }
}

