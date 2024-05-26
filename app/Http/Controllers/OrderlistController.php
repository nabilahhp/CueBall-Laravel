<?php

namespace App\Http\Controllers;

use App\Models\Orderlist;
use Illuminate\Http\Request;

class OrderlistController extends Controller
{
    public function index()
    {
        $orderlist = Orderlist::get();

        return view('orderlist.index', ['orderlist' => $orderlist]);
    }

    public function tambah()
    {
        return view('orderlist.form');
    }

    public function simpan(Request $request)
    {
        $data = [
            'id_customer'=>$request->id_customer,
            'customer_name'=>$request->customer_name,
            'order_date'=>$request->order_date,
            'status'=>$request->status,
            'total_amount'=>$request->total_amount,
            'payment_method'=>$request->payment_method,
        ];

        Orderlist::create($data);

        return redirect()->route('orderlist');
    }

    public function edit($id)
    {
        $orderlist = Orderlist::find($id)->first();

        return view('orderlist.form', ['orderlist'=>$orderlist]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'id_customer'=>$request->id_customer,
            'customer_name'=>$request->customer_name,
            'order_date'=>$request->order_date,
            'status'=>$request->status,
            'total_amount'=>$request->total_amount,
            'payment_method'=>$request->payment_method,
        ];

        Orderlist::find($id)->update($data);

        return redirect()->route('orderlist');
    }

    public function hapus($id)
    {
        Orderlist::find($id)->delete();

        return redirect()->route('orderlist');
    }

}
