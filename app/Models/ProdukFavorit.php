<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukFavorit extends Model
{
    use HasFactory;

    protected $table = 'produkfavorit';

    protected $fillable = [
        'id_produkfavorit',
        'id_produk',
        'id_users',     
    ];

    public function produk () {
        return $this->belongsTo('App\Models\ProdukModels', 'id_produk');
    }
    public function user () {
        return $this->belongsTo('App\Models\Users', 'id_users');
    }
}
