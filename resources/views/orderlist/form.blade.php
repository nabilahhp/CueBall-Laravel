@extends('layouts.app')

@section('title', 'Order List')

@section('content')
<form action="{{ isset($orderlist) ? route('orderlist.tambah.update', $orderlist->id) : route('orderlist.tambah.simpan') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($orderlist) ? 'Order List' : 'Add Order List'  }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="id_customer">Id Customer</label>
                        <input type="text" class="form-control" id="id_customer" name="id_customer" value="{{ isset($orderlist) ? $orderlist->id_customer : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="order_date">Order Date</label>
                        <input type="date" class="form-control" id="order_date" name="order_date" value="{{ isset($orderlist) ? $orderlist->order_date : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="customer_name">Customer Name</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ isset($orderlist) ? $orderlist->customer_name : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="{{ isset($orderlist) ? $orderlist->status : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="total_amount">Total Amount</label>
                        <input type="text" class="form-control" id="total_amount" name="total_amount" value="{{ isset($orderlist) ? $orderlist->total_amount : '' }}">
                    </div>
                    <div class="form-group">
                        <label for="payment_method">Payment Method</label>
                        <input type="text" class="form-control" id="payment_method" name="payment_method" value="{{ isset($orderlist) ? $orderlist->payment_method : '' }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection