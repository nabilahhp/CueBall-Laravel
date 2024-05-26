@extends('layouts.app')

@section('title', 'Laporan Pendapatan')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Transaksi Masuk</h6>
        <a href="{{ route('pendapatan.tambah') }}" class="btn btn-success">+ Pemasukan</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="d-flex mb-3 align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <label for="entries" class="mr-2 custom-label">Show</label>
                    <select id="entries" name="entries" class="form-control w-auto">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    entries
                </div>
                <div class="d-flex align-items-center">
                    <label for="search" class="mr-2 custom-label">Search:</label>
                    <input type="text" id="search" name="search" class="form-control w-auto" placeholder="Search">
                </div>
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Transaksi</th>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @php($no = 1)
                    @foreach ($pendapatan as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->tanggal }}</td>
                            <td>{{ $row->nama_kategori }}</td>
                            <td>{{ $row->jumlah }}</td>
                            <td>
                                <a href="{{ route('pendapatan.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('search').addEventListener('keyup', function() {
    var searchTerm = this.value.toLowerCase();
    var tableBody = document.getElementById('table-body');
    var rows = tableBody.getElementsByTagName('tr');

    for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName('td');
        var found = false;

        for (var j = 0; j < cells.length; j++) {
            if (cells[j].innerText.toLowerCase().indexOf(searchTerm) !== -1) {
                found = true;
                break;
            }
        }

        if (found) {
            rows[i].style.display = '';
        } else {
            rows[i].style.display = 'none';
        }
    }
});
</script>
@endsection
