<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Kategori;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::paginate(10);

        return view('barang.index', ['barang' => $barang]);
    }

    public function tambah()
    {
        $kategori = Kategori::get();
        
        return view('barang.form', ['kategori' => $kategori]);
    }

    public function simpan(Request $request)
    {
        $data = [
            'nama_barang'=>$request->nama_barang,
            'harga'=>$request->harga,
            'stok'=>$request->stok,
            'kategori_barang'=>$request->kategori_barang,
        ];
        
        Barang::create($data);

        return redirect()->route('barang');
    }

    public function edit($id)
    {
        $barang = Barang::find($id)->first();

        return view('barang.form', ['barang' => $barang]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'nama_barang'=>$request->nama_barang,
            'harga'=>$request->harga,
            'stok'=>$request->stok,
            'kategori_barang'=>$request->kategori_barang,
        ];
        Barang::find($id)->update($data);

        return redirect()->route('barang');
    }

    public function hapus($id)
    {
        Barang::find($id)->delete();
        
        return redirect()->route('barang');
    }
}
