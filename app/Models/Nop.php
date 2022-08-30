<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nop extends Model
{
    use HasFactory;
    protected $fillable = ['nop', 'nama_wp', 'alamat_wp', 'user_id'];

    public function pbbs()
    {
        return $this->hasMany(Pbb::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
