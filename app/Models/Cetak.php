<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cetak extends Model
{
    use HasFactory;
    protected $fillable = [
        'pbb_id',
        'nop',
        'nama_wp',
        'alamat_wp',
        'tanggal_print',
        'jatuh_tempo',
    ];

    public function pbb()
    {
        return $this->belongsTo(Pbb::class, 'pbb_id', 'id');
    }
}
