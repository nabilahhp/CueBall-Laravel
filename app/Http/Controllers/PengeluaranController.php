<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluaran = Pengeluaran::get();

        return view('pengeluaran.index', ['pengeluaran'=>$pengeluaran]);
    }

    public function tambah()
    {
        return view('pengeluaran.form');
    }

    public function simpan(Request $request)
    {
        $data = [
            'transaksi' => $request->transaksi,
            'tanggal' => $request->tanggal,
            'nama_kategori' => $request->nama_kategori,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
        ];

        Pengeluaran::create($data);

        return redirect()->route('pengeluaran');
    }

    public function edit($id)
    {
        $pengeluaran = Pengeluaran::find($id)->first();

        return view('pengeluaran.form', ['pengeluaran'=>$pengeluaran]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'transaksi' => $request->transaksi,
            'tanggal' => $request->tanggal,
            'nama_kategori' => $request->nama_kategori,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
        ];
        Pengeluaran::find($id)->update($data);

        return redirect()->route('pengeluaran');
    }
}
