@extends('layouts.app')

@section('title', 'Form Transaksi')

@section('content')
<form action="{{ isset($pengeluaran) ? route('pengeluaran.tambah.update', $pengeluaran->id): route('pengeluaran.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Pengeluaran</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="transaksi">Transaksi</label>
                        <input type="text" class="form-control" id="transaksi" name="transaksi" value="{{ isset($pengeluaran) ? $pengeluaran->transaksi : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ isset($pengeluaran) ? $pengeluaran->tanggal : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_kategori">Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ isset($pengeluaran) ? $pengeluaran->nama_kategori : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{ isset($pengeluaran) ? $pengeluaran->harga : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ isset($pengeluaran) ? $pengeluaran->jumlah : '' }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection