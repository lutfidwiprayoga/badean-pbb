<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pbb extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'user_id',
        'tahun',
        'pbb',
        'denda',
        'kekurangan',
        'status_bayar',
        'kode_bayar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function cetaks()
    {
        return $this->hasMany(Cetak::class);
    }
}
