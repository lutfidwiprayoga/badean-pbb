<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pbb;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public $tahun_awal;
    public $tahun_akhir;
    public function cetakPDF(Request $request)
    {
        // $cetak = Pbb::latest()->get();
        // $total = DB::table('pbbs')
        //     ->join('cetaks', 'cetaks.pbb_id', '=', 'pbbs.id')
        //     ->select(DB::raw('sum(kekurangan) as kurang_bayar'))
        //     ->get();
        $tahun_awal_id = $request->input('tahun_awal_id');
        $tahun_akhir_id = $request->input('tahun_akhir_id');
        if (request()->tahun_awal_id || request()->tahun_akhir_id) {
            $cetak = Pbb::whereBetween('tahun', [$tahun_awal_id, $tahun_akhir_id])
                ->get();
            $total = DB::table('pbbs')
                ->whereBetween('tahun', [$tahun_awal_id, $tahun_akhir_id])
                ->select(DB::raw('sum(kekurangan) as kurang_bayar'))
                ->get();
        } else {
            $cetak = Pbb::latest()->get();
            $total = DB::table('pbbs')
                // ->join('cetaks', 'cetaks.pbb_id', '=', 'pbbs.id')
                ->select(DB::raw('sum(kekurangan) as kurang_bayar'))
                ->get();
        }
        $pdf = Pdf::loadView('admin.pdf', compact('cetak', 'total'))->setPaper('A4', 'landscape');
        return $pdf->download('rekap-pbb.pdf');
    }
}
