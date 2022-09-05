<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cetak;
use App\Models\Pbb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $tahun_awal = $request->input('tahun_awal');
        $tahun_akhir = $request->input('tahun_akhir');
        if (request()->tahun_awal || request()->tahun_akhir) {
            $cetak = Pbb::whereBetween('tahun', [$tahun_awal, $tahun_akhir])
                ->get();
            $total = DB::table('pbbs')
                ->whereBetween('tahun', [$tahun_awal, $tahun_akhir])
                ->select(DB::raw('sum(kekurangan) as kurang_bayar'))
                ->get();
        } else {
            $cetak = Pbb::latest()->get();
            $total = DB::table('pbbs')
                // ->join('cetaks', 'cetaks.pbb_id', '=', 'pbbs.id')
                ->select(DB::raw('sum(kekurangan) as kurang_bayar'))
                ->get();
        }
        return view('admin.riwayat', compact('cetak', 'total', 'tahun_awal', 'tahun_akhir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
