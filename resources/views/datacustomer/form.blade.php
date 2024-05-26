@extends('layouts.app')

@section('title', 'Data Pelanggan')

@section('content')
<form action="{{ isset($datacustomer) ? route('datacustomer.tambah.update', $datacustomer->id) : route('datacustomer.tambah.simpan') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($datacustomer) ? 'Edit Pelanggan':'Tambah Pelanggan' }}n</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_customer">Id Customer</label>
                        <input type="text" class="form-control" id="id_customer" name="id_customer" value="{{ isset ($datacustomer) ? $datacustomer->id_customer : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_login">Tanggal Login</label>
                        <input type="date" class="form-control" id="tanggal_login" name="tanggal_login" value="{{ isset ($datacustomer) ? $datacustomer->tanggal_login : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_customer">Nama Customer</label>
                        <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="{{ isset ($datacustomer) ? $datacustomer->nama_customer : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">No HP</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ isset ($datacustomer) ? $datacustomer->phone : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ isset ($datacustomer) ? $datacustomer->email : '' }}">
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
