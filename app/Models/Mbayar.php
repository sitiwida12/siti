<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mbayar extends Model
{
    use HasFactory;


    public function pembelian(){
        return $this->hasMany(Pembelian::class);
    }
}
