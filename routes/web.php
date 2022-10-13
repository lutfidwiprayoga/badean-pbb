<?php

use App\Http\Controllers\Admin\KelolaNOPController;
use App\Http\Controllers\Admin\KelolaPbbController;
use App\Http\Controllers\Admin\PDFController;
use App\Http\Controllers\Admin\RiwayatController;
use App\Http\Controllers\Admin\ValidasiController;
use App\Http\Controllers\KepalaDesa\LaporanController;
use App\Http\Controllers\Masyarakat\CariController;
use App\Http\Controllers\Masyarakat\DaftarController;
use App\Http\Controllers\Masyarakat\HistoryBayarController;
use App\Http\Controllers\Masyarakat\PDFController as MasyarakatPDFController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/informasi', function () {
    return view('informasi');
});

Route::get('/informasi', function () {
    return view('informasi');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//masyarakat
Route::post('/daftarakun', [DaftarController::class, 'daftar'])->name('masyarakat.daftar');
Route::get('/caridatapbb', [CariController::class, 'cari'])->name('cari.pbb');
Route::get('/cetak-pdf', [MasyarakatPDFController::class, 'pdf'])->name('masyarakat.pdf');
Route::get('/history-masyarakat', [HistoryBayarController::class, 'history'])->name('masyarakat.history');
Route::get('/cetak-pdf-history-masyarakat', [HistoryBayarController::class, 'pdf'])->name('masyarakat.history.pdf');
//admin
Route::resource('/kelolapbb', KelolaPbbController::class);
Route::resource('/kelolanop', KelolaNOPController::class);
Route::resource('/riwayatpbb', RiwayatController::class);
Route::get('/validasi-user', [ValidasiController::class, 'index'])->name('validuser.index');
Route::put('/validasi-user/{id}', [ValidasiController::class, 'validasi'])->name('validuser.verify');
Route::get('/cetak-pdf/riwayat', [PDFController::class, 'cetakPDF'])->name('admin.pdf');
//Kepala Desa
Route::resource('/laporan-kepaladesa', LaporanController::class);
