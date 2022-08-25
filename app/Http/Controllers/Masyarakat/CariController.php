<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Pbb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CariController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $hasil = Pbb::join('nops', 'pbbs.nop_id', '=', 'nops.id')->where('nops.nop', 'like', "%" . $cari . "%")
            ->get();
        $now = today();
        $total = DB::table('pbbs')
            ->join('cetaks', 'pbbs.id', '=', 'cetaks.pbb_id')
            ->where('status_bayar', null)
            ->where('cetaks.tanggal_print', today())
            ->select(
                DB::raw('SUM(pbb) as total_pbb'),
                DB::raw('SUM(denda) as total_denda'),
                DB::raw('SUM(pbb)+SUM(denda)as  total_dibayar'),
                // DB::raw('SUM(CASE WHEN pbbs.status_bayar = null THEN pbbs.pbb END) total_pbb'),
                // DB::raw('SUM(CASE WHEN tanggal_print = "$now" THEN pbbs.denda END) total_denda'),
                // DB::raw('SUM(CASE WHEN pbbs.status_bayar = null THEN pbbs.pbb END)+SUM(CASE WHEN tanggal_print = "$now" THEN pbbs.denda END)total_dibayar')
            )
            ->get();
        // dd($total);
        return view('masyarakat.caripbb', compact('hasil', 'total', 'cari'));
    }
}
