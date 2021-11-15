<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homepage;
use App\Http\Controllers\Auth;
use App\Http\Controllers\Customers\Dashboard as DashboardCustomers;
use App\Http\Controllers\Customers\Setting as SettingCustomers;

//---------------------------------------------------------------------
use App\Http\Controllers\Admin\Dashboard as DashboardAdmin;
use App\Http\Controllers\Admin\Customers as CustomersAdmin;
use App\Http\Controllers\Admin\Sellers as SellersAdmin;
use App\Http\Controllers\Admin\Pasar as PasarAdmin;
use App\Http\Controllers\Admin\Toko as TokoAdmin;
use App\Http\Controllers\Admin\Driver as DriverAdmin;
use App\Http\Controllers\Admin\PemdaController as PemdaAdmin;
use App\Http\Controllers\Admin\Produk as ProdukAdmin;
//------------------------------------------------------------------
use App\Http\Controllers\Sellers\Dashboard as DashboardSellers;
use App\Http\Controllers\Sellers\Produk as ProdukSellers;
use App\Http\Controllers\Sellers\Setting as SettingSellers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Homepage::class, 'index']);

# authentification users login and registers
Route::get('/login', [Auth::class, 'userslogin']);
Route::get('/register', [Auth::class, 'usersregister']);
# users register handler
Route::post('/usersregister', [Auth::class, 'usersregister_handler']);

# aktifasi email
Route::get('verification/{id}/{token}', [Auth::class, 'usersverification']);

#facebook
Route::get('auth/facebook', [Auth::class, 'facebook']);
Route::get('auth/facebook/callback', [Auth::class, 'facebook_callback']);

# Register / Login With Google
Route::get('auth/google', [Auth::class, 'google']);
Route::get('auth/google/callback', [Auth::class, 'google_callback']);

# users login handler
Route::post('/userslogin', [Auth::class, 'userslogin_handler']);

# Logout Semua Akun
Route::get('logout', [Auth::class, 'logout']);

# login admin
Route::get('auth/admin', [Auth::class, 'adminlogin']);
# admin login handler
Route::post('auth/adminlogin', [Auth::class, 'adminlogin_handler']);

# Lokasi get
Route::post('location/getkabupaten', [\App\Http\Controllers\Location::class, 'kabupaten']);
Route::post('location/getkecamatan', [\App\Http\Controllers\Location::class, 'kecamatan']);

# Lupa Password
Route::get('forgetpassword', [Auth::class, 'forgetpassword']);
# Lupa Password Handler
Route::post('forgetpassword_handler', [Auth::class, 'forgetpassword_handler']);
# Form Reset Password
Route::get('forgetpassword/{token}', [Auth::class, 'resetpassword_view']);
# Reset Password Action
Route::post('resetpassword_handler', [Auth::class, 'resetpassword_handler']);

//--------------------------------------------------------------------------------------
// *************************************************************************************
//---------------------------------------------------------------------------------------
# Halaman admin
Route::prefix('admin')->group(function () {
    # Homepage Admin
    Route::get('/', [DashboardAdmin::class, 'index'])->middleware('sessionadmin');
    # Pasar
    Route::prefix('pasar')->group(function () {
        Route::get('/', [PasarAdmin::class, 'pasar'])->middleware('sessionadmin');
        Route::get('add', [PasarAdmin::class, 'addpasar'])->middleware('sessionadmin');
        Route::post('addhandler', [PasarAdmin::class, 'insertdatapasar'])->middleware('sessionadmin');
        Route::get('edit/{id}', [PasarAdmin::class, 'editpasar'])->middleware('sessionadmin');
        Route::post('edithandler', [PasarAdmin::class, 'updatedatapasar'])->middleware('sessionadmin');
        Route::post('hapusfoto', [PasarAdmin::class, 'deletefotopasar'])->middleware('sessionadmin');
        Route::post('deletehandler', [PasarAdmin::class, 'deletepasar'])->middleware('sessionadmin');

        # jam operasional
        Route::get('jam/{id}', [PasarAdmin::class, 'jamoperasionalpasar'])->middleware('sessionadmin');
        Route::post('jam/insert', [PasarAdmin::class, 'insertjamoperasionalpasar'])->middleware('sessionadmin');
        Route::post('jam/get', [PasarAdmin::class, 'getjamoperasionalpasarbyid'])->middleware('sessionadmin');
        Route::post('jam/update', [PasarAdmin::class, 'updatejamoperasionalpasar'])->middleware('sessionadmin');
        Route::post('jam/delete', [PasarAdmin::class, 'deletejamoperasionalpasar'])->middleware('sessionadmin');

        # pengelola pasar
        Route::get('pengelola', [PasarAdmin::class, 'pengelolapasar'])->middleware('sessionadmin');
        Route::post('pengelola/insert', [PasarAdmin::class, 'insertpengelolapasar'])->middleware('sessionadmin');
        Route::post('pengelola/get', [PasarAdmin::class, 'getpengelolapasar'])->middleware('sessionadmin');
        Route::post('pengelola/update', [PasarAdmin::class, 'editpengelolapasar'])->middleware('sessionadmin');
        Route::post('pengelola/delete', [PasarAdmin::class, 'deletepengelolapasar'])->middleware('sessionadmin');


    });
    # Users Data
    Route::prefix('users')->group(function () {
        #Customers Data
        Route::get('customers', [CustomersAdmin::class, 'customers'])->middleware('sessionadmin');
        Route::get('customers/add', [CustomersAdmin::class, 'addcustomers'])->middleware('sessionadmin');
        Route::post('customers/addhandler', [CustomersAdmin::class, 'insertcustomers'])->middleware('sessionadmin');
        Route::get('customers/edit/{id}', [CustomersAdmin::class, 'editcustomers'])->middleware('sessionadmin');
        Route::post('customers/edithandler', [CustomersAdmin::class, 'updatecustomers'])->middleware('sessionadmin');
        Route::post('customers/makesellers', [CustomersAdmin::class, 'makesellers'])->middleware('sessionadmin');
        Route::post('customers/delete', [CustomersAdmin::class, 'deletecustomers'])->middleware('sessionadmin');
        Route::get('customers/json', [CustomersAdmin::class, 'customersjson'])->middleware('sessionadmin');

        #Sellers Data
        Route::get('sellers', [SellersAdmin::class, 'sellers'])->middleware('sessionadmin');
        Route::post('sellers/delete', [SellersAdmin::class, 'deleteakunsellers'])->middleware('sessionadmin');
        Route::get('sellers/edit/{id}', [SellersAdmin::class, 'editsellers'])->middleware('sessionadmin');
        Route::post('sellers/edithandler', [SellersAdmin::class, 'updatesellers'])->middleware('sessionadmin');
        Route::post('sellers/deletefototoko', [SellersAdmin::class, 'deletefototoko'])->middleware('sessionadmin');
        Route::get('sellers/datasensitive/{id}', [SellersAdmin::class, 'datasensitivesellers'])->middleware('sessionadmin');
        Route::get('sellers/json', [SellersAdmin::class, 'sellersjson'])->middleware('sessionadmin');

        # Driver Data
        Route::get('driver', [DriverAdmin::class, 'driver'])->middleware('sessionadmin');
        Route::get('driver/add', [DriverAdmin::class, 'tambahform'])->middleware('sessionadmin');
        Route::post('driver/insert', [DriverAdmin::class, 'insertdriver'])->middleware('sessionadmin');
        Route::get('driver/edit/{id}', [DriverAdmin::class, 'editdriver'])->middleware('sessionadmin');
        Route::post('driver/update', [DriverAdmin::class, 'updatedriver'])->middleware('sessionadmin');
        Route::post('driver/delete', [DriverAdmin::class, 'deletedriver'])->middleware('sessionadmin');
        Route::get('driver/json', [DriverAdmin::class, 'driverjson'])->middleware('sessionadmin');

        # Pemda Data
        Route::get('pemda', [PemdaAdmin::class, 'pemda'])->middleware('sessionadmin');
        Route::post('pemda/insert', [PemdaAdmin::class, 'insertpemda'])->middleware('sessionadmin');
        Route::post('pemda/get', [PemdaAdmin::class, 'getpemda'])->middleware('sessionadmin');
        Route::post('pemda/update', [PemdaAdmin::class, 'editpemda'])->middleware('sessionadmin');
        Route::post('pemda/delete', [PemdaAdmin::class, 'deletepemda'])->middleware('sessionadmin');
        Route::get('pemda/json', [PemdaAdmin::class, 'pemdajson'])->middleware('sessionadmin');

    });
    # Master Toko
    Route::prefix('toko')->group(function () {
        # List Kategori Toko
        Route::get('kategori', [TokoAdmin::class, 'kategoritoko'])->middleware('sessionadmin');
        Route::post('kategori/add', [TokoAdmin::class, 'insertkategoritoko'])->middleware('sessionadmin');
        Route::post('kategori/get', [TokoAdmin::class, 'getkategoritoko'])->middleware('sessionadmin');
        Route::post('kategori/update', [TokoAdmin::class, 'updatekategoritoko'])->middleware('sessionadmin');
        Route::post('kategori/delete', [TokoAdmin::class, 'deletekategoritoko'])->middleware('sessionadmin');

        # Jam Operasional Toko
        Route::get('jam/{id}', [TokoAdmin::class, 'jamoperasionaltoko'])->middleware('sessionadmin');
        Route::post('jam/insert', [TokoAdmin::class, 'insertjamtoko'])->middleware('sessionadmin');
        Route::post('jam/get', [TokoAdmin::class, 'getjamtoko'])->middleware('sessionadmin');
        Route::post('jam/update', [TokoAdmin::class, 'updatejamtoko'])->middleware('sessionadmin');
        Route::post('jam/delete', [TokoAdmin::class, 'deletejamtoko'])->middleware('sessionadmin');

        # Update status toko
        Route::post('status', [TokoAdmin::class, 'updatestatustoko'])->middleware('sessionadmin');

        # List Data Toko
        Route::get('/', [TokoAdmin::class, 'datatoko'])->middleware('sessionadmin');
        Route::get('json', [TokoAdmin::class, 'datatokojson'])->middleware('sessionadmin');
    });
    #Master Produk
    Route::prefix('produk')->group(function () {
        # List Kategori Produk
        Route::get('kategori', [ProdukAdmin::class, 'kategoriproduk'])->middleware('sessionadmin');
        Route::post('kategori/insert', [ProdukAdmin::class, 'insertkategoriproduk'])->middleware('sessionadmin');
        Route::post('kategori/get', [ProdukAdmin::class, 'getkategoriproduk'])->middleware('sessionadmin');
        Route::post('kategori/update', [ProdukAdmin::class, 'updatekategoriproduk'])->middleware('sessionadmin');
        Route::post('kategori/delete', [ProdukAdmin::class, 'deletekategoriproduk'])->middleware('sessionadmin');
    });
});

//--------------------------------------------------------------------------------------
// *************************************************************************************
//---------------------------------------------------------------------------------------
# Ke Laman Login Sellers
Route::get('sellers/daftar', [Auth::class, 'sellers'])->middleware('sessionusers');
Route::post('sellers/daftar_handler', [Auth::class, 'sellersregister_handler'])->middleware('sessionusers');
# Halaman Sellers
Route::prefix('sellers')->group(function () {
    # Homepage Sellers
    Route::get('/', [DashboardSellers::class, 'index'])->middleware('sessionusers');

    # Modul Produk
    Route::prefix('produk')->group(function () {
        
        # Data Produk
        Route::get('/', [ProdukSellers::class, 'index'])->middleware('sessionusers');
        # Tambah Produk
        Route::get('add', [ProdukSellers::class, 'addproduk'])->middleware('sessionusers');
        # Input Produk
        Route::post('insert', [ProdukSellers::class, 'inputproduk'])->middleware('sessionusers');
        # Edit Form
        Route::get('edit/{id}', [ProdukSellers::class, 'editproduk'])->middleware('sessionusers');
        # Update Produk
        Route::post('update', [ProdukSellers::class, 'updateproduk'])->middleware('sessionusers');
        # Delete Produk
        Route::post('delete', [ProdukSellers::class, 'deleteproduk'])->middleware('sessionusers');
    });

    # Modul Setting
    Route::prefix('setting')->group(function () {
        
        # Akun Saya
        Route::get('akun', [SettingSellers::class, 'akun'])->middleware('sessionusers');

        # Toko Saya
        Route::get('toko', [SettingSellers::class, 'toko'])->middleware('sessionusers');


    });

});

# Login Berhasil Penjual & Pembeli
Route::get('/index', [DashboardCustomers::class, 'index'])->middleware('sessionusers');
# Setting Customers
Route::prefix('setting')->group(function () {
    # Laman Profil
    Route::get('profil', [SettingCustomers::class, 'profil'])->middleware('sessionusers');
    Route::post('profil/update', [SettingCustomers::class, 'updateprofil'])->middleware('sessionusers');
    Route::post('profil/updatefoto', [SettingCustomers::class, 'updatefotoprofil'])->middleware('sessionusers');

    # Laman Alamat
    Route::get('alamat', [SettingCustomers::class, 'alamat'])->middleware('sessionusers');
    Route::post('alamat/update', [SettingCustomers::class, 'updatealamat'])->middleware('sessionusers');

    # Laman Password
    Route::get('ubahpassword', [SettingCustomers::class, 'ubahpassword'])->middleware('sessionusers');
    Route::post('ubahpassword/update', [SettingCustomers::class, 'ubahpassword_handler'])->middleware('sessionusers');

});