<?php

use App\Http\Controllers\Admin\RiwayatController;
use App\Http\Controllers\Masyarakat\CariController;
use App\Http\Controllers\Masyarakat\DaftarController;
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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/daftarakun', [DaftarController::class, 'daftar'])->name('masyarakat.daftar');
Route::resource('/riwayatpbb', RiwayatController::class);
Route::get('/caridatapbb', [CariController::class, 'cari'])->name('cari.pbb');
