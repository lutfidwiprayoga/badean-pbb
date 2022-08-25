<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cetak;
use App\Models\Nop;
use App\Models\Pbb;
use App\Models\User;
use Illuminate\Http\Request;

class KelolaPbbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelola = Pbb::latest()->get();
        $user = User::where('role', 'masyarakat')->get();
        return view('admin.kelolaPbb', compact('kelola', 'user'));
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
        $nop = Nop::create([
            'nop' => $request->nop,
        ]);
        $pbb = Pbb::create([
            'user_id' => $request->user_id,
            'nop_id' => $nop->id,
            'nama_wp' => $request->nama_wp,
            'alamat_wp' => $request->alamat_wp,
            'tahun' => $request->tahun,
            'pbb' => $request->pbb,
            'denda' => $request->denda,
            'kekurangan' => $request->kekurangan,
            'jatuh_tempo' => $request->jatuh_tempo,
            'status_bayar' => $request->status_bayar,
            'kode_bayar' => $request->kode_bayar,
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
