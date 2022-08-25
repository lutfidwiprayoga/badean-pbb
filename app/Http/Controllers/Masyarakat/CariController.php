<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Cetak;
use Illuminate\Http\Request;

class CariController extends Controller
{
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $hasil = Cetak::where('nop', 'like', "%" . $cari . "%")->get();
        return view('masyarakat.caripbb', compact('hasil'));
    }
}
