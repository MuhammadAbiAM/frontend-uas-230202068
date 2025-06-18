<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ObatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('pasien', PasienController::class);
Route::resource('obat', ObatController::class);

Route::get('/pasien/export/pdf', [PasienController::class, 'exportPdf'])->name('pasien.export.pdf');
Route::get('/pasien/export/excel', [PasienController::class, 'exportExcel'])->name('pasien.export.excel');

Route::get('/obat/export/pdf', [ObatController::class, 'exportPdf'])->name('obat.export.pdf');
Route::get('/obat/export/excel', [ObatController::class, 'exportExcel'])->name('obat.export.excel');

