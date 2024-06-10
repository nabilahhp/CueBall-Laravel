<?php

namespace App\Http\Controllers;

use App\Models\Bayar;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Table;
use App\Models\User;
use App\Models\OrderProduct;
use App\Models\Booking;
use App\Models\Expenses;
use App\Models\Income;
use App\Models\Pesan;
use App\Models\Bayarmkn;
use App\Models\Customer;
use App\Models\JamSewa;
use App\Models\Sewa;


class AdminController extends Controller
{

   public function category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    } 

    public function addcategory(Request $request)
    {
        $request->validate([
        'category' => 'required|string|max:255',
        ]);

        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->success('Category Added Successfully.');
        return redirect()->back();
    }

    public function deletecategory($id)
    {
        $data = Category::find($id);

    if ($data) {
        $data->delete();
        toastr()->addSuccess('Category Deleted Successfully.');
    } else {
        toastr()->addError('Category Not Found.');
    }
    return redirect()->back();
    }

    public function editcategory($id)
    {
        $data = Category::find($id);
        return view('admin.editcategory',compact('data'));
    }

    public function updatecategory(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name= $request->category;
        $data->save();
        toastr()->addSuccess('Category Updated Successfully.');
        return redirect('/category');
    }


    public function product()
    {
        $makanan = Product::all();
        return view('admin.product', compact('makanan'));
    } 

    public function addproduct()
    {
        $category = Category::all();
        return view('admin.addproduct', compact('category'));
    }

    public function deleteproduct($id)
    {
    try {
        $data = Product::findOrFail($id);
        $data->delete();
        toastr()->addSuccess(' Product Deleted Successfully.');
    } catch (\Exception $e) {
        toastr()->addError(' Error: ' . $e->getMessage());
    }
    return redirect()->back();
    }

    public function editproduct($id)
    {
        $data = Product::findOrFail($id);
        $category = Category::all();
        return view('admin.editproduct', compact('data','category'));
    }

    public function uploadproduct(Request $request)
    {
        $data = new Product;
        $data->nm = $request->nm;
        $data->deskripsi = $request->deskripsi;
        $data->harga = $request->harga;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image = $request->foto;
        If($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->foto->move('products',$imagename);
            $data->foto = $imagename;
        }
        $data->save();
        toastr()->addSuccess('Product Added Successfully.');
        return redirect('/product');  
    }

    public function updateproduct(Request $request, $id)
    {
        $data = Product::findOrFail($id);
        $data->nm = $request->nm;
        $data->deskripsi= $request->deskripsi;
        $data->harga= $request->harga;
        $data->quantity= $request->quantity;
        $data->category= $request->category;
        $image = $request->foto;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->foto->move('products',$imagename);
            $data->foto = $imagename;
        }
        $data->save();
        toastr()->addSuccess('Product Updated Successfully.');
        return redirect('/product');
    }


    public function table()
    {
        $meja = Table::all();
        return view('admin.table', compact('meja'));
    } 

    public function addtable()
    {
        $category = Category::all();
        return view('admin.addtable', compact('category'));
    }

    public function uploadtable(Request $request)
{
    $data = new Table;
    $data->nm = $request->nm;
    $data->ket = $request->ket;
    $data->capacity = $request->capacity;
    $data->category = $request->category;
    $data->harga = $request->harga;
    $data->status = $request->status;
    $image = $request->foto;
    if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $image->move('tables', $imagename);
        $data->foto = $imagename;
    }
    $data->save();
    toastr()->addSuccess('Table Added Successfully.');
    return redirect('/table');
    }

    public function edittable($id)
    {
        $data = Table::findOrFail($id);
        $category = Category::all();
        return view('admin.edittable', compact('data','category'));
    }

    public function updatetable(Request $request, $id)
    {
        $data = Table::findOrFail($id);
        $data->nm = $request->nm;
        $data->ket = $request->ket;
        $data->capacity = $request->capacity;
        $data->category = $request->category;
        $data->harga = $request->harga;
        $data->status = $request->status;
        $image = $request->foto;
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move('tables', $imagename);
            $data->foto = $imagename;
        }
        $data->save();
        toastr()->addSuccess('Table Added Successfully.');
        return redirect('/table');  
    }

    public function deletetable($id)
    {
        $data = Table::findOrFail($id);
        $data->delete();
        toastr()->addSuccess(' Table Deleted Successfully.');
        return redirect()->back();
    }


    public function user()
    {
        $user = User::all();
        return view('admin.user', compact('user'));
    }
    public function edituser($id)
    {
        $data = User::find($id);
        return view('admin.edituser', compact('data'));
    }
    public function updateuser(Request $request, $id)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        'usertype' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'address' => 'required|string|max:255',
    ]);
    $user = User::find($id);
    if (!$user) {
        return redirect('/user')->with('error', 'User not found.');
    }
    $user->name = $request->name;
    $user->email = $request->email;
    $user->usertype = $request->usertype;
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->save();
    toastr()->addSuccess('User Updated Successfully.');
    return redirect('/user');
    }

    public function deleteuser($id)
    {
        $data = User::find($id);
        $data->delete();
        toastr()->addSuccess(' User Deleted Successfully.');
        return redirect()->back();
    }


    public function customer()
    {
        $customer = Customer::all();
        return view('admin.customer', compact('customer'));
    }


    public function orderproduct()
    {
    $orderproduct = Pesan::all();
    return view('admin.orderproduct', compact('orderproduct'));
    }
    
    public function editorderproduct($id)
    {
        $data = OrderProduct::findOrFail($id);
        return view('admin.editorderproduct', compact('data'));
    }

    public function updateorderproduct(Request $request, $id)
    {
        $data = OrderProduct::findOrFail($id);
        $data->tgl_pesan = $request->tgl_pesan;
        $data->nama = $request->nama;
        $data->hp = $request->hp;
        $data->meja = $request->meja;
        $data->total_products = $request->total_products;
        $data->total_price = $request->total_price;
        $data->status = $request->status;
        $data->save();
        toastr()->addSuccess('Order Product Updated Successfully.');
        return redirect('/orderproduct');   
    }

    public function deleteorderproduct($id)
    {
        $data = OrderProduct::findOrFail($id);
        $data->delete();
        toastr()->addSuccess('Order Product Deleted Successfully.');
        return redirect()->back();
    }

    
    public function booking()
    {
        $sewa = Sewa::all();
        $jamsewa = JamSewa::all();
        return view('admin.booking', compact('sewa', 'jamsewa'));
    }

    public function editbooking($id)
    {
        $sewa = Sewa::findOrFail($id);
        return view('admin.editbooking', compact('sewa'));
    }

    public function updatebooking(Request $request, $id)
    {   
        $sewa = Sewa::findOrFail($id);
        $sewa->tgl_pesan = $request->input('tgl_pesan');
        $sewa->harga = $request->input('harga');
        $sewa->tot = $request->input('tot');
        $sewa->status = $request->input('status');
        $sewa->save();

        toastr()->addSuccess('Booking Updated Successfully.');
        return redirect('/booking');
    }

    public function editjamsewa($idsewa)
    {   
    $jamsewa = JamSewa::where('idsewa', $idsewa)->first();
    return view('admin.editjamsewa', compact('jamsewa'));
    }

    public function updatejamsewa(Request $request, $id)
    {
    $jamsewa = JamSewa::findOrFail($id);
    $jamsewa->tanggal = $request->input('tanggal');
    $jamsewa->jam = $request->input('jam');
    $jamsewa->status = $request->input('status');
    $jamsewa->save();
    toastr()->addSuccess('Booking Updated Successfully.');
    return redirect('/booking');
    }

    public function deletebooking($id)
    {
        $sewa = Sewa::findOrFail($id);
        $sewa->delete();
        toastr()->addSuccess('Booking Deleted Successfully.');
        return redirect()->back();
    }

    public function deletejamsewa($id)
    {
        $data = JamSewa::findOrFail($id);
        $data->delete();
        toastr()->addSuccess('Booking Deleted Successfully.');
        return redirect()->back();
    }

    public function bayar()
    {
    $bayar = Bayar::all();
    return view('admin.bayar', compact('bayar'));
    }

    public function editbayar($id)
    {
        $bayar = Bayar::findOrFail($id);
        return view('admin.editbayar', compact('bayar'));
    }

    public function updatebayar(Request $request, $id)
    {   
        $bayar = Bayar::findOrFail($id);
        $bayar->tgl_upload = $request->input('tgl_upload');
        $bayar->konfirmasi = $request->input('konfirmasi');
        $image = $request->bukti;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->bukti->move('products',$imagename);
            $bayar->bukti = $imagename;
        }
        $bayar->save();

        toastr()->addSuccess('Payment Updated Successfully.');
        return redirect('/bayar');
    }

    public function deletebayar($id)
    {
        $bayar = Bayar::findOrFail($id);
        $bayar->delete();
        toastr()->addSuccess('Payment Deleted Successfully.');
        return redirect()->back();
    }

    public function bayarmkn()
    {
    $bayarmkn = Bayarmkn::all();
    return view('admin.bayarmkn', compact('bayarmkn'));
    }

    public function editbayarmkn($id)
    {
        $bayarmkn = Bayarmkn::findOrFail($id);
        return view('admin.editbayarmkn', compact('bayarmkn'));
    }

    public function updatebayarmkn(Request $request, $id)
    {   
        $bayarmkn = Bayarmkn::findOrFail($id);
        $bayarmkn->tgl_upload = $request->input('tgl_upload');
        $bayarmkn->konfirmasi = $request->input('konfirmasi');
        $image = $request->bukti;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->bukti->move('products',$imagename);
            $bayarmkn->bukti = $imagename;
        }
        $bayarmkn->save();

        toastr()->addSuccess('Payment Updated Successfully.');
        return redirect('/bayarmkn');
    }

    public function deletebayarmkn($id)
    {
        $bayarmkn = Bayarmkn::findOrFail($id);
        $bayarmkn->delete();
        toastr()->addSuccess('Payment Deleted Successfully.');
        return redirect()->back();
    }

    public function income()
{
    $income = Income::all();
    return view('admin.income', compact('income'));
}

    public function editincome($id)
    {
        $income = Income::find($id);
        return view('admin.editincome',compact('income'));
    }

    public function addincome()
    {
        return view('admin.addincome');
    }

    public function uploadincome(Request $request)
    {
        $income = new Income;
        $income->source = $request->source;
        $income->description = $request->description;
        $income->amount = $request->amount;
        $income->date = $request->date;
        $income->save();
        toastr()->addSuccess('Income Added Successfully.');
        return redirect('/income');  
    }

    public function updateincome(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'source' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        // Cari data yang akan diupdate
        $income = Income::findOrFail($id);

        // Update data
        $income->update($request->all());

        // Tambahkan pesan sukses
        toastr()->addSuccess('Income Updated Successfully.');
        
        // Redirect ke halaman income
        return redirect('/income');
    }

    public function deleteincome($id)
    {
        $income = Income::find($id);
        $income->delete();
        toastr()->addSuccess(' Income Deleted Successfully.');
        return redirect()->back();
    }

    public function expenses()
    {
        $expenses = Expenses::all();
        return view('admin.expenses', compact('expenses'));
    }

    public function addexpenses()
    {
        return view('admin.addexpenses');
    }

    public function uploadexpenses(Request $request)
    {
        $data = new Expenses;
        $data->source = $request->source;
        $data->description = $request->description;
        $data->amount = $request->amount;
        $data->date = $request->date;
        $data->save();
        toastr()->addSuccess('Expenses Added Successfully.');
        return redirect('/expenses');  
    }

    public function editexpenses($id)
    {
        $data = Expenses::find($id);
        return view('admin.editexpenses',compact('data'));
    }

    public function updateexpenses(Request $request, $id)
    {
        $data = Expenses::find($id);
        $data->source = $request->source;
        $data->description = $request->description;
        $data->amount = $request->amount;
        $data->date = $request->date;
        $data->save();
        toastr()->addSuccess('Expenses Updated Successfully.');
        return redirect('/expenses');
    }

    public function deleteexpenses($id)
    {
        $data = Expenses::find($id);
        $data->delete();
        toastr()->addSuccess(' Expenses Deleted Successfully.');
        return redirect()->back();
    }

}




    




