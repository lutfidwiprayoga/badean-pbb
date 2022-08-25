<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function daftar(Request $request)
    {
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'nik' => $request->nik,
            'alamat' => $request->nik,
            'no_hp' => $request->no_hp,
            'role' => 'masyarakat',
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->back()->with('sukses', 'Silahkan Tunggu Admin Konfirmasi Akun anda');
    }
}
