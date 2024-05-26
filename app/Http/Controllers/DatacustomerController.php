<?php

namespace App\Http\Controllers;

use App\Models\Datacustomer;
use Illuminate\Http\Request;

class DatacustomerController extends Controller
{
    public function index()
    {
        $datacustomer = Datacustomer::get();

        return view('datacustomer.index', ['datacustomer'=> $datacustomer]);
    }

    public function tambah()
    {
        $datacustomer = Datacustomer::get();

        return view('datacustomer.form', ['datacustomer' => $datacustomer]);
    }

    public function simpan(Request $request)
    {
        $data = [
            'id_customer'=>$request->id_customer,
            'tanggal_login'=>$request->tanggal_login,
            'nama_customer'=>$request->nama_customer,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'alamat'=>$request->alamat,
        ];
        
        Datacustomer::create($data);

        return redirect()->route('datacustomer');
    }

    public function edit($id)
    {
        $datacustomer = Datacustomer::find($id);

        return view('datacustomer.form', ['datacustomer' => $datacustomer]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'id_customer'=>$request->id_customer,
            'tanggal_login'=>$request->tanggal_login,
            'nama_customer'=>$request->nama_customer,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'alamat'=>$request->alamat,
        ];

        Datacustomer::find($id)->update($data);

        return redirect()->route('datacustomer');
    }

    public function hapus($id)
    {
        Datacustomer::find($id)->delete();

        return redirect()->route('datacustomer');
    }

}
