@extends('layouts.app')

@section('title', 'Form Transaksi')

@section('content')
<form action="{{ isset($pendapatan) ? route('pendapatan.tambah.update', $pendapatan->id): route('pendapatan.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                 <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Pemasukan</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Transaksi</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ isset($pendapatan) ? $pendapatan->nama : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ isset($pendapatan) ? $pendapatan->tanggal : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"value="{{ isset($pendapatan) ? $pendapatan->nama_kategori : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ isset($pendapatan) ? $pendapatan->jumlah : '' }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
    </div>
</form>
@endsection