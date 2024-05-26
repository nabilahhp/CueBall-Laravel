@extends('layouts.app')

@section('title', 'Data Pelanggan')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pelanggan</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('datacustomer.tambah') }}" class="btn btn-primary mb-3">Tambah Pelanggan</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Customer</th>
                        <th>Tanggal Login</th>
                        <th>Nama Customer</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @php($no = 1)
                    @foreach ($datacustomer as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->id_customer }}</td>
                            <td>{{ $row->tanggal_login }}</td>
                            <td>{{ $row->nama_customer }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->email }}</td>
                            <td>
                                <a href="{{ route('datacustomer.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('datacustomer.hapus', $row->id) }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection