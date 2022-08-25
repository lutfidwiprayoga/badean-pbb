<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pbb;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    public function cetakPDF()
    {
        $cetak = Pbb::latest()->get();
        $total = DB::table('pbbs')
            ->join('cetaks', 'cetaks.pbb_id', '=', 'pbbs.id')
            ->select(DB::raw('sum(kekurangan) as kurang_bayar'))
            ->get();
        $pdf = Pdf::loadView('admin.pdf', compact('cetak', 'total'))->setPaper('A4', 'landscape');
        return $pdf->download('rekap-pbb.pdf');
    }
}
