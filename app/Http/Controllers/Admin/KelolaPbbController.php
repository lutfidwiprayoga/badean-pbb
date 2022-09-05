<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cetak;
use App\Models\Nop;
use App\Models\Pbb;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelolaPbbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->cari) {
            $cari = $request->cari;
            $kelola = Pbb::join('nops', 'pbbs.nop_id', '=', 'nops.id')
                ->where('nops.nop', 'LIKE', '%' . $cari . '%')
                ->orWhere('nops.nama_wp', 'LIKE', '%' . $cari . '%')
                ->orWhere('pbbs.tahun', 'LIKE', '%' . $cari . '%')
                ->get();
        } else {
            $kelola = Pbb::latest()->get();
        }
        $user = User::where('role', 'masyarakat')->get();
        $nop = Nop::get();
        $max_id = DB::table('nops')->max('id');
        $nomor_urut = $max_id + 1;
        $now = Carbon::now();
        $tanggal = $now->year . $now->month . $now->day;
        return view('admin.kelolaPbb', compact('kelola', 'user', 'nop'));
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
        // dd($request->all());
        $nop = Nop::find($request->input('id'));
        $pbb = Pbb::create([
            'nop_id' => $request->nop_id,
            'tahun' => $request->tahun,
            'pbb' => $request->pbb,
            'denda' => $request->denda,
            'kekurangan' => $request->kekurangan,
            'jatuh_tempo' => $request->jatuh_tempo,
            'status_bayar' => $request->status_bayar,
            'kode_bayar' => Carbon::now()->format('Ymd') . $request->nop_id
        ]);
        $cetak = new Cetak();
        $cetak->pbb_id = $pbb->id;
        $cetak->save();

        return redirect()->back()->with('sukses', 'Data Berhasil Di Tambah');
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
        $pbb = Pbb::find($id);
        $pbb->tahun = $request->tahun;
        $pbb->pbb = $request->pbb;
        $pbb->denda = $request->denda;
        $pbb->kekurangan = $request->kekurangan;
        $pbb->jatuh_tempo = $request->jatuh_tempo;
        $pbb->status_bayar = $request->status_bayar;
        $pbb->kode_bayar = $request->kode_bayar;
        $pbb->save();

        return redirect()->back()->with('sukses', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pbb = Pbb::find($id);
        $pbb->delete();
        return redirect()->back()->with('sukses', 'Data Berhasil Di Hapus');
    }
}
