<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pbb extends Model
{
    use HasFactory;
    protected $fillable = [
        'nop_id',
        'user_id',
        'nama_wp',
        'alamat_wp',
        'jatuh_tempo',
        'tahun',
        'pbb',
        'denda',
        'kekurangan',
        'status_bayar',
        'kode_bayar',
    ];

    public function nop()
    {
        return $this->belongsTo(Nop::class, 'nop_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function cetaks()
    {
        return $this->hasMany(Cetak::class);
    }
}
