<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DatacustomerController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\OrderlistController;
use App\Http\Controllers\PendapatanController;
use App\Http\Controllers\PengeluaranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DatauserController;
use App\Models\Datacustomer;
use App\Models\Pengeluaran;

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

Route::controller(AuthController::class)->group( function() {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSimpan')->name('register.simpan');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAksi')->name('login.aksi');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function(){
    Route::get('dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
    
    Route::controller(BarangController::class)->prefix('barang')->group( function(){
        Route::get('', 'index')->name('barang');
        Route::get('tambah', 'tambah')->name('barang.tambah');
        Route::post('tambah', 'simpan')->name('barang.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('barang.edit');
        Route::post('edit/{id}', 'update')->name('barang.tambah.update');
        Route::get('hapus/{id}', 'hapus')->name('barang.hapus');
    });

	Route::controller(KategoriController::class)->prefix('kategori')->group( function () {
		Route::get('', 'index')->name('kategori');
		Route::get('tambah', 'tambah')->name('kategori.tambah');
		Route::post('tambah', 'simpan')->name('kategori.tambah.simpan');
		Route::get('hapus/{id}', 'hapus')->name('kategori.hapus');
	});

    Route::controller(PendapatanController::class)->prefix('pendapatan')->group( function() {
        Route::get('', 'index')->name('pendapatan');
        Route::get('tambah', 'tambah')->name('pendapatan.tambah');
        Route::post('tambah', 'simpan')->name('pendapatan.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('pendapatan.edit');
        Route::post('edit/{id}', 'update')->name('pendapatan.tambah.update');
    });

    Route::controller(PengeluaranController::class)->prefix('pengeluaran')->group( function() {
        Route::get('', 'index')->name('pengeluaran');
        Route::get('tambah', 'tambah')->name('pengeluaran.tambah');
        Route::post('tambah', 'simpan')->name('pengeluaran.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('pengeluaran.edit');
        Route::post('edit/{id}', 'update')->name('pengeluaran.tambah.update');
    });

    Route::controller(AdminController::class)->prefix('admin')->group( function () {
        Route::get('', 'index')->name('admin');
        Route::get('edit/{id}', 'edit')->name('admin.edit');
    });

    Route::controller(DatauserController::class)->prefix('datauser')->group( function() {
        Route::get('', 'index')->name('datauser');
    });

    Route::controller(DatacustomerController::class)->prefix('datacustomer')->group( function() {
        Route::get('', 'index')->name('datacustomer');
        Route::get('tambah', 'tambah')->name('datacustomer.tambah');
        Route::post('tambah', 'simpan')->name('datacustomer.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('datacustomer.edit');
        Route::post('edit/{id}', 'update')->name('datacustomer.tambah.update');
        Route::get('hapus/{id}', 'hapus')->name('datacustomer.hapus');
    });
    
    Route::controller(OrderlistController::class)->prefix('orderlist')->group( function() {
        Route::get('', 'index')->name('orderlist');
        Route::get('tambah', 'tambah')->name('orderlist.tambah');
        Route::post('tambah', 'simpan')->name('orderlist.tambah.simpan');
        Route::get('edit/{id}', 'edit')->name('orderlist.edit');
        Route::post('edit/{id}', 'update')->name('orderlist.tambah.update');
        Route::get('hapus/{id}', 'hapus')->name('orderlist.hapus');
    });

});
