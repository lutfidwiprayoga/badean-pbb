<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nop;
use App\Models\User;
use Illuminate\Http\Request;

class KelolaNOPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nop = Nop::get();
        $user = User::where('role', 'masyarakat')->get();
        return view('admin.kelolaNOP', compact('nop', 'user'));
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
        Nop::create([
            'user_id' => $request->user_id,
            'nop' => $request->nop,
            'nama_wp' => $request->nama_wp,
            'alamat_wp' => $request->alamat_wp,
        ]);

        return redirect()->back()->with('sukses', 'Data Wajib Pajak Berhasil Ditambahkan');
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
        Nop::find($id)->update($request->all());
        return redirect()->back()->with('sukses', 'Data Berhasil Di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nop = Nop::find($id);
        $nop->delete();
        return redirect()->back()->with('sukses', 'Data Berhasil Dihapus');
    }
}
