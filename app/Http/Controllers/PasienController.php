<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PasienExport;

class PasienController extends Controller
{
    protected $apiUrl = 'http://localhost:8080/pasien';

    public function index(Request $request)
    {
        $response = Http::get($this->apiUrl);
        $pasien = $response->json();

        if ($request->has('search')) {
            $search = strtolower($request->search);
            $pasien = collect($pasien)->filter(function ($item) use ($search) {
                return str_contains(strtolower($item['nama']), $search) ||
                    str_contains(strtolower($item['alamat']), $search) ||
                    str_contains(strtolower($item['tanggal_lahir']), $search) ||
                    str_contains(strtolower($item['jenis_kelamin']), $search);
            })->values()->all();
        }

        return view('pasien.index', compact('pasien'));
    }

    public function show($id)
    {
        $response = Http::get("{$this->apiUrl}/{$id}");
        $pasien = $response->json();

        return view('pasien.show', compact('pasien'));
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $response = Http::asForm()->post('http://localhost:8080/pasien', [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        if ($response->status() === 400) {
            $errors = $response->json();
            return back()->withErrors($errors['messages'])->withInput();
        }

        return redirect()->route('pasien.index')->with('success', 'Data Pasien berhasil ditambahkan');
    }

    public function edit($id)
    {
        $response = Http::get("{$this->apiUrl}/{$id}")->json();
        $pasien = $response;
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $response = Http::asForm()->put("http://localhost:8080/pasien/{$id}", [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        if ($response->status() === 400) {
            $errors = $response->json();
            return back()->withErrors($errors['messages'])->withInput();
        }

        return redirect()->route('pasien.index')->with('success', 'Data Pasien berhasil diupdate');
    }

    public function destroy($id)
    {
        $response = Http::delete("{$this->apiUrl}/{$id}");

        if ($response->successful()) {
            return redirect()->route('pasien.index')->with('success', 'Data Pasien berhasil dihapus.');
        }

        return back()->withErrors(['error' => 'Gagal menghapus pasien.']);
    }

    public function exportPdf()
    {
        $pasien = Http::get($this->apiUrl)->json();
        $pdf = PDF::loadView('pasien.pdf', compact('pasien'));
        return $pdf->download('data_pasien.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new PasienExport, 'data_pasien.xlsx');
    }
}
