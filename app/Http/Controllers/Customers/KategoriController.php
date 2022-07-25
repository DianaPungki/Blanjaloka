<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Pasar;
use App\Models\Penjual;
use App\Models\ProdukFavorit;
use App\Models\ProdukModels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravolt\Indonesia\Models\Province;

class KategoriController extends Controller
{
    // kategori
    public function index($id)
    {
        $favorit = ProdukFavorit::where('id_users','=', session()->get('id_users'))->get();

        if($favorit != '[]'){
            foreach($favorit as $f){
                $favproduk = $f->id_produk;
                $favuser = $f->id_users;
            }
            
        }else{
            $favproduk = 0;
            $favuser =0;
        }

        if(session()->get('id_pasar'))
        {
            
            $data = [
                'title' => 'Kategori',
                'pasar' => Pasar::all(),
                'provinsi' => Province::pluck('name', 'code'),
                'kategori' => Kategori::all(),
                'getkategori' => Kategori::find($id),
                'countkategori' => count(Kategori::where('id_kategori', $id)->get()),
                'favproduk' => $favproduk,
                'favuser' => $favuser,
                'produkkategori' => Penjual::join('produk','penjual.id_penjual','=','produk.id_penjual')
                ->join('satuan_produk','produk.id_satuanproduk','=','satuan_produk.id_satuanproduk')
                ->where('status_produk','=','on')
                ->where('id_pasar','=',session()->get('id_pasar'))
                ->where('id_kategoriproduk','=', $id)->get()
            ];

        }else{
            
            $data = [
                'title' => 'Kategori',
                'pasar' => Pasar::all(),
                'provinsi' => Province::pluck('name', 'code'),
                'kategori' => Kategori::all(),
                'getkategori' => Kategori::find($id),
                'countkategori' => count(Kategori::where('id_kategori', $id)->get()),
                'favproduk' => $favproduk,
                'favuser' => $favuser,
                'produkkategori' => ProdukModels::join('satuan_produk','produk.id_satuanproduk','=','satuan_produk.id_satuanproduk')
                                    ->where('status_produk','=','on')
                                    ->where('id_kategoriproduk','=', $id)->get()
            ];
        }
        
        return view('web.pembeli.kategori.index',$data);
    }
 
    
}
