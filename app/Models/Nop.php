<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nop extends Model
{
    use HasFactory;
    protected $fillable = ['nop'];

    public function pbbs()
    {
        return $this->hasMany(Pbb::class);
    }
}
