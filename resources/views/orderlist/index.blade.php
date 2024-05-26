@extends('layouts.app')

@section('title', 'Order List')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Order List</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('orderlist.tambah') }}" class="btn btn-primary mb-3">Add Order List</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Customer</th>
                        <th>Customer Name</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Total Amount</th>
                        <th>Payment Method</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($orderlist as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->id_customer }}</td>
                        <td>{{ $row->customer_name }}</td>
                        <td>{{ $row->order_date }}</td>
                        <td>{{ $row->status }}</td>
                        <td>{{ $row->total_amount }}</td>
                        <td>{{ $row->payment_method }}</td>
                        <td>
                            <a href="{{ route('orderlist.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('orderlist.hapus', $row->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
