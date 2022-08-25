<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nik;
use App\Models\User;
use Illuminate\Http\Request;

class ValidasiController extends Controller
{
    public function index()
    {
        $validasi = User::where('role', 'masyarakat')->where('verify', 'Belum Aktif')->get();
        $nik = Nik::all();
        return view('admin.validasi', compact('validasi', 'nik'));
    }
    public function validasi(Request $request, $id)
    {
        $user = User::find($id);
        $user->verify = 'Aktif';
        $user->save();
        return redirect()->back()->with('sukses', 'User Berhasil Aktif');
    }
}
