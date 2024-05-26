@extends('layouts.app')

@section('title','Form Barang')
    
@section('content')
<form action="{{ isset ($barang) ? route('barang.tambah.update', $barang->id): route('barang.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                 <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">{{ isset($barang) ? 'Edit Barang':'Tambah Barang' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ isset($barang) ? $barang->nama_barang : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{ isset($barang) ? $barang->harga : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok"value="{{ isset($barang) ? $barang->stok : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="kategori_barang">kategori</label>
                        <input type="text" class="form-control" id="kategori_barang" name="kategori_barang" value="{{ isset($barang) ? $barang->kategori_barang : '' }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
         </div> 
    @endsection