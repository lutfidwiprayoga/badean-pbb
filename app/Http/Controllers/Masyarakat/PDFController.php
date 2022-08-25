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
        $now = today();
        $total = DB::table('pbbs')
            ->join('cetaks', 'pbbs.id', '=', 'cetaks.pbb_id')
            ->where('status_bayar', null)
            ->where('cetaks.tanggal_print', today())
            ->select(
                DB::raw('SUM(pbb) as total_pbb'),
                DB::raw('SUM(denda) as total_denda'),
                DB::raw('SUM(pbb)+SUM(denda)as  total_dibayar'),
            )
            ->get();
        $pdf = Pdf::loadView('masyarakat.pdf', compact('hasil', 'total'))->setPaper('A4', 'landscape');
        return $pdf->download('rekap-pbb-masyarakat.pdf');
    }
}
