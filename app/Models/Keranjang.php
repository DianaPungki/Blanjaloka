<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'id_keranjang';
    public $timestamps = false;
    protected $table = 'keranjang';
}
