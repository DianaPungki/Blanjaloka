<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\Penjual;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        $data =[
            'title' => 'Keranjang',
            'keranjang' => Penjual::join('produk','penjual.id_penjual','=','produk.id_penjual')
                            ->join('satuan_produk','produk.id_satuanproduk','=','satuan_produk.id_satuanproduk')
                            ->join('keranjang','produk.id_produk','=','keranjang.id_produk')
                            ->where('keranjang.id_users','=',session()->get('id_users'))->get(),
        ];

        return view('web.pembeli.keranjang.index',$data);
    }

    public function store($id_produk)
    {
        $itemuser = session()->get('id_users');
        
        $validasikeranjang = Keranjang::where('id_produk',$id_produk)->where('id_users',$itemuser)->first();

        if($validasikeranjang){
            
            $keranjang = Keranjang::select('kuantitas')->where('id_produk',$id_produk)->where('id_users',$itemuser)->first();
            
            $kuantitas = $keranjang->kuantitas + 1;

            $data = [
                'kuantitas' => $kuantitas
            ];

            Keranjang::where('id_produk',$id_produk)->where('id_users',$itemuser)->update($data);

        }else{

            $data = [
                'id_produk' => $id_produk,
                'id_users' => $itemuser,
                'kuantitas' => '1'
            ];
    
            Keranjang::create($data);

        }
        return back();
    }

    public function kuantitasplus($id_keranjang)
    {
        $keranjang = Keranjang::where('id_keranjang',$id_keranjang)->first();
        $kuantitas =$keranjang->kuantitas + 1; 
        $data = [
            'kuantitas' => $kuantitas
        ];
       Keranjang::where('id_keranjang',$id_keranjang)->update($data);
       
       return back();
    }

    public function kuantitasminus($id_keranjang)
    {
        $keranjang = Keranjang::where('id_keranjang',$id_keranjang)->first();
        $kuantitas =$keranjang->kuantitas - 1; 

        if($kuantitas == 0) {
            Keranjang::where('id_keranjang',$id_keranjang)->delete();
        }else{
            $data = [
                'kuantitas' => $kuantitas
            ];
           Keranjang::where('id_keranjang',$id_keranjang)->update($data);
        }
        
       
       return back();
    }

    public function destroy($id)
    {
        Keranjang::where('id_keranjang',$id)->delete();

        return back();
    }
}
