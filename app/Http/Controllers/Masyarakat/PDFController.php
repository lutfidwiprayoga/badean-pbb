<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Pbb;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public $cari;

    public function PDF(Request $request)
    {
        $cari_id = $request->input('cari_id');
        $hasil = Pbb::join('nops', 'pbbs.nop_id', '=', 'nops.id')->where('nops.nop', 'like', "%" . $cari_id . "%")
            ->get();
        $pbb = Pbb::join('nops', 'pbbs.nop_id', '=', 'nops.id')
            ->where('nops.nop', 'like', "%" . $cari_id . "%")
            ->select('nop_id')
            ->groupBy('nop_id')
            ->get();
        $now = today();
        $total = DB::table('pbbs')
            // ->join('cetaks', 'pbbs.id', '=', 'cetaks.pbb_id')
            ->join('nops', 'pbbs.nop_id', '=', 'nops.id')
            ->where('nops.nop', 'like', "%" . $cari_id . "%")
            // ->where('status_bayar', null)
            // ->where('cetaks.tanggal_print', today())
            ->select(
                DB::raw('SUM(pbb) as total_pbb'),
                DB::raw('SUM(denda) as total_denda'),
                DB::raw('SUM(pbb)+SUM(denda)as  total_dibayar'),
                // DB::raw('SUM(CASE WHEN pbbs.status_bayar = null THEN pbbs.pbb END) total_pbb'),
                // DB::raw('SUM(CASE WHEN tanggal_print = "$now" THEN pbbs.denda END) total_denda'),
                // DB::raw('SUM(CASE WHEN pbbs.status_bayar = null THEN pbbs.pbb END)+SUM(CASE WHEN tanggal_print = "$now" THEN pbbs.denda END)total_dibayar')
            )
            ->get();
        $pdf = Pdf::loadView('masyarakat.pdf', compact('hasil', 'total', 'pbb'))->setPaper('A4', 'landscape');
        return $pdf->download('rekap-pbb-masyarakat.pdf');
    }
}
