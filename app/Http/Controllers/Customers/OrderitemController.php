<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use App\Models\OrderItem;
use App\Models\Penjual;
use Illuminate\Http\Request;
use Nette\Utils\Random;

class OrderitemController extends Controller
{
    public function index()
    {
        $data =[
            'title' => 'Order',
            'order' => Penjual::join('produk','penjual.id_penjual','=','produk.id_penjual')
                            ->join('satuan_produk','produk.id_satuanproduk','=','satuan_produk.id_satuanproduk')
                            ->join('orderitems','produk.id_produk','=','orderitems.id_produk')
                            ->where('orderitems.id_users','=',session()->get('id_users'))->get(),
            'total' => '0'
        ];

        return view('web.pembeli.pesanan.index',$data);
    }

    public function store(Request $request)
    {
        if(empty($_POST['id_keranjang'])){

            return response()->json([
                'message' => 'Gagal; Checklist minimal 1 keranjang'
            ]);

        }else{

            foreach($_POST['id_keranjang'] as $x):

                $keranjang = Keranjang::find($x);

                $data = array(
                    'kuantitas' => $keranjang->kuantitas,
                    'kode_order' => 0,
                    'id_users' => $keranjang->id_users,
                    'id_produk' => $keranjang->id_produk
                );

                OrderItem::create($data);

                Keranjang::where('id_keranjang',$x)->delete();
            
            endforeach;

            return response()->json([
                'message' => count($_POST['id_keranjang']).' pesanan berhasil'
            ]);

        }
    }

    public function destroy($id)
    {
        $order = OrderItem::find($id);
        $input = [
            'id_users' => $order->id_users,
            'id_produk' => $order->id_produk,
            'kuantitas' => $order->kuantitas
        ];
        Keranjang::create($input);

        OrderItem::where('id_orderitems',$id)->delete();
    }
}