<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\SatuanProdukModel;
use Illuminate\Support\Facades\Validator;

class Produk extends Controller
{
    public function kategoriproduk(){

        $data = [
            'kategori' =>Kategori::all()
        ];
        return view('admin/produk/kategori_produk/index',$data)->with(['title' => 'Data Kategori Produk', 'sidebar' => 'Kategori Produk']);

    }

    #insert data kategori produk
    public function insertkategoriproduk(Request $request){
        $validator = Validator::make($request->all(),[
            'icon_kategori' => 'required',
            'icon_kategori.*' => 'mimes:svg,jpeg,jpg,png'
        ]);

        if($validator->fails()){

            return redirect('admin/produk/kategori')->withErrors($validator)->withInput();

        }else{

            if($request->hasFile('icon_kategori')){

                $icon_kategori = $request->file('icon_kategori');
                $filename = time().'_'.$icon_kategori->getClientOriginalName();
                $icon_kategori->move('assets/admin/icon_kategoriproduk', $filename);
            
                $data = [
                    'nama_kategori' => $request->post('nama_kategori'),
                    'icon_kategori' => $filename
                ];
    
                Kategori::create($data);

                    return response()->json(['pesan' => 'Berhasil Menambahkan Kategori Produk']);
    
            }
        }
    }

    # mendapatkan data kategori produk berdasarkan id
    public function getkategoriproduk(Request $request){
        return response()->json(
            Kategori::where('id_kategori', $request->post('id_kategori'))->get()
        );
        
    }

    # edit data kategori produk
    public function updatekategoriproduk(Request $request){
        $validator = Validator::make($request->all(),[
            'icon_kategori.*' => 'mimes:svg,jpeg,jpg,png'
        ]);

        if($validator->fails()){

            return redirect('admin/produk/kategori')->withErrors($validator)->withInput();

        }else{

            if($request->hasFile('icon_kategori')){

                $icon_kategori = $request->file('icon_kategori');
                $filename = time().'_'.$icon_kategori->getClientOriginalName();
                $icon_kategori->move('assets/admin/icon_kategoriproduk', $filename);
            
                $data = [
                    'icon_kategori' => $filename
                ];
    
                Kategori::where('id_kategori', $request->post('id_kategori'))->update($data);
            }

            $data = [
                'nama_kategori' => $request->post('nama_kategori')
            ];

            Kategori::where('id_kategori', $request->post('id_kategori'))->update($data);

            return response()->json([
             'pesan' => 'Berhasil Mengedit Data Kategori Produk'
            ]);
        }
    }

    #hapus kategori produk
    public function deletekategoriproduk(Request $request){
     
        Kategori::where('id_kategori', $request->post('id_kategori'))->delete();

        return response()->json([
            'pesan' => 'Berhasil Menghapus Data Kategori Produk'
        ]);
        
    }

    public function satuanproduk(){

        $data = [
            'satuan' =>SatuanProdukModel::all()
        ];
        return view('admin.produk.satuan_produk.index',$data)->with(['title' => 'Data Satuan Produk', 'sidebar' => 'Satuan Produk']);

    }

    #insert data satuan produk
    public function insertsatuanproduk(Request $request){
            
        $data = [
            'nama_satuan' => $request->post('nama_satuan')
            ];
    
        SatuanProdukModel::create($data);

        return response()->json(['pesan' => 'Berhasil Menambahkan satuan Produk']);
    
    }

    # mendapatkan data satuan produk berdasarkan id
    public function getsatuanproduk(Request $request){
        return response()->json(
            SatuanProdukModel::where('id_satuanproduk', $request->post('id_satuanproduk'))->get()
        );
        
    }

    # edit data satuan produk
    public function updatesatuanproduk(Request $request){
        $data = [
            'nama_satuan' => $request->post('nama_satuan')
            ];
    
        SatuanProdukModel::where('id_satuanproduk', $request->post('id_satuanproduk'))->update($data);
    
        return response()->json([
           'pesan' => 'Berhasil Mengedit Data Satuan Produk'
        ]);
        
    }

    #hapus kategori produk
    public function deletesatuanproduk(Request $request){
     
        SatuanProdukModel::where('id_satuanproduk', $request->post('id_satuanproduk'))->delete();

        return response()->json([
            'pesan' => 'Berhasil Menghapus Data Satuan Produk'
        ]);
        
    }
}
