<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\ProdukFavorit;
use App\Models\ProdukModels;
use Illuminate\Http\Request;

class ProdukfavoritController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemuser = session()->get('id_users');
        $itemfavorit = ProdukModels::join('satuan_produk','produk.id_satuanproduk','=','satuan_produk.id_satuanproduk')
                                    ->join('produkfavorit','produk.id_produk','=','produkfavorit.id_produk')
                                    ->where('status_produk','=','on')
                                    ->where('id_users', $itemuser)->get();
        $data = [
            'title' => 'Wishlist',
            'favorit' => $itemfavorit,
        ];
        return view('web.pembeli.favorit.index', $data)->with('no', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id_produk)
    {
        $itemuser = session()->get('id_users');
        
        $validasifavorit = ProdukFavorit::where('id_produk',$id_produk)->where('id_users',$itemuser)->first();
        
        if($validasifavorit){
           ProdukFavorit::where('id_produk',$id_produk)->where('id_users',$itemuser)->delete();
           
        }else{
            $inputan = [
                'id_produk' => $id_produk,
                'id_users' => $itemuser
            ];
           
            ProdukFavorit::create($inputan);

            // return response()->json(['Pesan'=>'Produk berhasil ditambahkan ke Favorit Kamu']);

            
        }

        return back();
            
    }

    // public function destroy(ProdukFavorit $produkfavorit)
    // {
    //     $itemfavorit = ProdukFavorit::findOrFail($produkfavorit);
    //     if ($itemfavorit->delete()) {
    //         return back()->with('success', 'Produk Favorit berhasil dihapus');
    //     } else {
    //         return back()->with('error', 'Produk Favorit gagal dihapus');
    //     }
    // }
}
