<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function mbayar()
    {
        return $this->belongsTo(Mbayar::class);
    }
}
