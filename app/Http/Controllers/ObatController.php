<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    protected $apiUrl = 'http://localhost:8080/obat';

    public function index(Request $request)
    {
        $response = Http::get($this->apiUrl);
        $obat = $response->json();

        if ($request->has('search')) {
            $search = strtolower($request->search);
            $obat = collect($obat)->filter(function ($item) use ($search) {
                return str_contains(strtolower($item['nama_obat']), $search) ||
                    str_contains(strtolower($item['kategori']), $search) ||
                    str_contains(strtolower($item['stok']), $search) ||
                    str_contains(strtolower($item['harga']), $search);
            })->values()->all();
        }

        return view('obat.index', compact('obat'));
    }


    public function show($id)
    {
        $response = Http::get("{$this->apiUrl}/{$id}");
        $obat = $response->json();

        return view('obat.show', compact('obat'));
    }

    public function create()
    {
        return view('obat.create');
    }

    public function store(Request $request)
    {
        $response = Http::asForm()->post('http://localhost:8080/obat', [
            'nama_obat' => $request->nama_obat,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        if ($response->status() === 400) {
            $errors = $response->json();
            return back()->withErrors($errors['messages'])->withInput();
        }

        return redirect()->route('obat.index')->with('success', 'Data Obat berhasil ditambahkan');
    }

    public function edit($id)
    {
        $response = Http::get("{$this->apiUrl}/{$id}");
        $obat = $response;

        return view('obat.edit', compact('obat'));
    }

    public function update(Request $request, $id)
    {
        $response = Http::asForm()->put("http://localhost:8080/obat/{$id}", [
            'nama_obat' => $request->nama_obat,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        if ($response->status() === 400) {
            $errors = $response->json();
            return back()->withErrors($errors['messages'])->withInput();
        }

        return redirect()->route('obat.index')->with('success', 'Data Obat berhasil diupdate');
    }

    public function destroy($id)
    {
        $response = Http::delete("{$this->apiUrl}/{$id}");

        if ($response->successful()) {
            return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus.');
        }

        return back()->withErrors(['error' => 'Gagal menghapus obat.']);
    }
}
