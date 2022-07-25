<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjual extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_penjual',
        'status',
        'id_users',
        'id_pasar',
        'logo_toko',
        'nama_toko',
        'deskripsi_toko',
        'foto_toko',
        'no_toko',
        'embbed_maps_toko',
        'alamat_toko',
        'no_ktp',
        'no_rekening',
        'nama_bank',
        'foto_ktp',
        'foto_penjual_ktp',
        'id_kategoritoko',
        'pin',
        
    ];

    protected $hidden = [
        'password',
    ];

    # Set Primary Key tabel users
    protected $primaryKey = 'id_penjual';
    # Insert dan Update otomatis kolom created_at dan update_at
    public $timestamps = true;
    protected $table = 'penjual';
}
