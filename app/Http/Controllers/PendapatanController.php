<?php

namespace App\Http\Controllers;

use App\Models\Pendapatan;
use Illuminate\Http\Request;

class PendapatanController extends Controller
{
    public function index()
    {
        $pendapatan = Pendapatan::get();

        return view('pendapatan.index', ['pendapatan' => $pendapatan]);
    }

    public function tambah()
    {
        return view('pendapatan.form');
    }

    public function simpan(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'nama_kategori' => $request->nama_kategori,
            'jumlah' => $request->jumlah,
        ];

        Pendapatan::create($data);

        return redirect()->route('pendapatan');
    }

    public function edit($id)
    {
        $pendapatan = Pendapatan::find($id)->first();

        return view('pendapatan.form', ['pendapatan'=>$pendapatan]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'nama_kategori' => $request->nama_kategori,
            'jumlah' => $request->jumlah,
        ];

        Pendapatan::find($id)->update($data);

        return redirect()->route('pendapatan');
    }
}
