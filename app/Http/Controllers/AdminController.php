<?php

namespace App\Http\Controllers;

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
        $data = Table::find($id);
        $data->delete();
        toastr()->addSuccess(' Table Deleted Successfully.');
        return redirect()->back();
    }


    public function customer()
    {
        $customer = User::where('usertype', 'user')->get();
        return view('admin.customer', compact('customer'));
    }

    public function editcustomer($id)
    {
    $customer = User::find($id);
    if (!$customer) {
        return redirect('/customer')->with('error', 'Customer not found.');
    }
    return view('admin.editcustomer', compact('customer'));
    }

    public function updatecustomer(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'usertype' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        $customer = User::find($id);

        if (!$customer) {
            return redirect('/customer')->with('error', 'Customer not found.');
        }

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->usertype = $request->usertype;
        $customer->phone = $request->phone;
        $customer->address = $request->address;

        $customer->save();

        toastr()->addSuccess('Customer Updated Successfully.');

        return redirect('/customer');
    }

    public function deletecustomer($id)
    {
        $customer = User::find($id);

        if (!$customer) {
            return redirect()->back()->with('error', 'Customer not found.');
        }

        $customer->delete();

        toastr()->addSuccess('Customer Deleted Successfully.');

        return redirect()->back();
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
        $booking = Booking::all();
        return view('admin.booking', compact('booking'));
    }

    public function addbooking()
    {
        $category = Category::all();
        $customer = User::where('usertype', 'user')->get();
        $table = Table::where('status', 'available')->get();

        return view('admin.addbooking', compact('category', 'table', 'customer'));
    }

    public function editbooking($id)
    {
        $customer = User::where('usertype', 'user')->get();
        $data = Booking::find($id);
        $category = Category::all();
        return view('admin.editbooking', compact('data', 'category', 'customer'));
    }

    public function uploadbooking(Request $request)
    {
        $data = new Booking();
        $data->customer_name = $request->customer_name;
        $data->table_name = $request->table_name;
        $data->category = $request->category;
        $data->booking_date = $request->booking_date;
        $data->start_time = $request->start_time;
        $data->end_time = $request->end_time;
        $data->price = $request->price;
        $data->payment_method = $request->payment_method;
        $data->status = $request->status;

        if ($request->hasFile('payment_proof')) {
            $image = $request->file('payment_proof');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('invoice'), $imagename);
            $data->payment_proof = $imagename;
        } else {
            $data->payment_proof = null; // Ensure it is set to null if not provided
        }

        // Save the Booking instance
        $data->save();

        toastr()->addSuccess('Booking Created Successfully.');
        return redirect('/booking');
    }

    public function updatebooking(Request $request, $id)
    {
                
                $data = Booking::find($id);
                $data->customer_name = $request->customer_name;
                $data->table_name = $request->table_name;
                $data->category = $request->category;
                $data->booking_date = $request->booking_date;
                $data->start_time = $request->start_time;
                $data->end_time = $request->end_time;
                $data->price = $request->price;
                $data->payment_method = $request->payment_method;
                $data->status = $request->status;
                $image = $request->payment_proof;
                If($image)
                {
                    $imagename = time().'.'.$image->getClientOriginalExtension();
                    $request->payment_proof->move('invoice',$imagename);
                    $data->payment_proof = $imagename;
                }

                $data->save();

                toastr()->addSuccess('Booking Updated Successfully.');
                return redirect('/booking');
            }

    public function deletebooking($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        toastr()->addSuccess('Booking Deleted Successfully.');
        return redirect()->back();
    }

    public function income()
{
    $orderproduct = OrderProduct::select('id', 'product_name as source', 'category', 'price', 'updated_at', 'status')
                                  ->where('status', 'completed')
                                  ->get();
    $booking = Booking::select('id', 'table_name as source', 'category', 'price', 'updated_at', 'status')
                       ->where('status', 'completed')
                       ->get();

    $incomedata = $orderproduct->concat($booking);

    foreach ($incomedata as $data) {
        // Check if the data already exists in the Income table
        $existingIncome = Income::where('order_id', $data->id)
                                ->where('source', $data->source)
                                ->where('category', $data->category)
                                ->where('amount', $data->price)
                                ->where('date', $data->updated_at)
                                ->where('status', $data->status)
                                ->first();
        
        // If the data does not exist, create a new entry
        if (!$existingIncome) {
            Income::create([
                'order_id' => $data->id,
                'source' => $data->source,
                'category' => $data->category,
                'amount' => $data->price,
                'date' => $data->updated_at,
                'status' => $data->status,
            ]);
        }
    }

    // Retrieve all income data
    $income = Income::all();

    // Return the view with the income data
    return view('admin.income', compact('income'));
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




    




