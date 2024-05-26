<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Table;
use App\Models\User;
use App\Models\OrderProduct;
use App\Models\Booking;

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
        $product = Product::all();
        return view('admin.product', compact('product'));
    } 
    public function addproduct()
    {
        $category = Category::all();
        return view('admin.addproduct', compact('category'));
    }

    public function deleteproduct($id)
    {
        $data = Product::find($id);
        $data->delete();
        toastr()->addSuccess(' Product Deleted Successfully.');
        return redirect()->back();
    }
    public function editproduct($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.editproduct', compact('data','category'));
    }
    public function uploadproduct(Request $request)
    {
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image = $request->image;
        If($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->addSuccess('Product Added Successfully.');
        return redirect('/product');  
    }

    public function updateproduct(Request $request, $id)
    {
        $data = Product::find($id);
        $data->title= $request->title;
        $data->description= $request->description;
        $data->price= $request->price;
        $data->quantity= $request->quantity;
        $data->category= $request->category;
        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->addSuccess('Product Updated Successfully.');
        return redirect('/product');
    }



    public function table()
    {
        $table = Table::all();
        return view('admin.table', compact('table'));
    } 

    public function addtable()
    {
        $category = Category::all();
        return view('admin.addtable', compact('category'));
    }

    public function uploadtable(Request $request)
    {
        $data = new Table;
        $data->name = $request->name;
        $data->capacity = $request->capacity;
        $data->category = $request->category;
        $data->price = $request->price;
        $data->status = $request->status;
        $data->save();
        toastr()->addSuccess('Table Added Successfully.');
        return redirect('/table');  
    }
    public function edittable($id)
    {
        $data = Table::find($id);
        $category = Category::all();
        return view('admin.edittable', compact('data','category'));
    }
    public function updatetable(Request $request, $id)
    {
        $data = Table::find($id);
        $data->name = $request->name;
        $data->capacity = $request->capacity;
        $data->category = $request->category;
        $data->price = $request->price;
        $data->status = $request->status;
        $data->save();
        toastr()->addSuccess('Table Added Successfully.');
        return redirect('/table');  
    }
    public function deletetable($id)
    {
        $data = Table::find($id);
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
        $orderproduct = OrderProduct::all();
        return view('admin.orderproduct', compact('orderproduct'));
    }

    public function editorderproduct($id)
    {
        $data = OrderProduct::find($id);
        $category = Category::all();
        return view('admin.editorderproduct', compact('data','category'));
    }

    public function updateorderproduct(Request $request, $id)
    {
        $data = OrderProduct::find($id);
        $data->customer_name = $request->customer_name;
        $data->category = $request->category;
        $data->product_name = $request->product_name;
        $data->total = $request->total;
        $data->payment_method = $request->payment_method;
        $data->status = $request->status;
        $image = $request->payment_proof;
        If($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->payment_proof->move('products',$imagename);
            $data->payment_proof = $imagename;
        }
        $data->save();
        toastr()->addSuccess('Product Updated Successfully.');
        return redirect('/orderproduct');   
    }

    public function deleteorderproduct($id)
    {
        $data = OrderProduct::find($id);
        $data->delete();
        toastr()->addSuccess(' Product Deleted Successfully.');
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
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'table_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'booking_date' => 'required|date',
            'booking_time' => 'required',
            'total_price' => 'required|numeric',
            'payment_method' => 'required|string|max:255',
            'payment_proof' => 'nullable|file|mimes:jpg,png,jpeg,pdf|max:2048',
            'status' => 'required|string|max:255',
        ]);

        $booking = Booking::find($id);
        $booking->customer_name = $request->customer_name;
        $booking->table_name = $request->table_name;
        $booking->category = $request->category;
        $booking->booking_date = $request->booking_date;
        $booking->booking_time = $request->booking_time;
        $booking->total_price = $request->total_price;
        $booking->payment_method = $request->payment_method;
        $booking->status = $request->status;

        if ($request->hasFile('payment_proof')) {
            $image = $request->file('payment_proof');
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('invoice'), $imagename);
            $booking->payment_proof = $imagename;
        }

        $booking->save();

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
}




    




