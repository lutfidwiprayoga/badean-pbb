<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Pbb;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryBayarController extends Controller
{
    public function history()
    {
        $history = Pbb::join('nops', 'pbbs.nop_id', '=', 'nops.id')
            ->where('nops.user_id', '=', Auth::user()->id)
            ->where('status_bayar', 'LUNAS')
            ->get();
        return view('masyarakat.history', compact('history'));
    }

    public function pdf()
    {
        $history = Pbb::join('nops', 'pbbs.nop_id', '=', 'nops.id')
            ->where('nops.user_id', '=', Auth::user()->id)
            ->where('status_bayar', 'LUNAS')
            ->get();
        $pdf = Pdf::loadView('masyarakat.history-pdf', compact('history'))->setPaper('A4', 'landscape');
        return $pdf->download('history-pembayaran.pdf');
    }
}
