<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderProduct;
use App\Models\Booking;
use App\Models\Product;
use App\Models\User;
use App\Models\Table;

class HomeController extends Controller
{
    
    public function index()
{
    $usercount = User::count();
    $bookingcount = Booking::count();
    $orderproductcount = OrderProduct::count();
    $totalorders = $bookingcount + $orderproductcount;

    $completedbooking = Booking::where('status', 'completed')->count();
    $completedorderproduct = OrderProduct::where('status', 'completed')->count();
    $completedtasks = $completedbooking + $completedorderproduct;
   
    $totaltables = Table::count();
    $totalproducts = Product::count();
    $totalitems = $totaltables + $totalproducts;

    $orderproduct = OrderProduct::select('id', 'customer_name', 'product_name as ordered_items', 'category', 'price', 'created_at', 'updated_at', 'status')->get();
    $booking = Booking::select('id', 'customer_name', 'table_name as ordered_items', 'category', 'price', 'created_at', 'updated_at', 'status')->get();
    $orderlist = $orderproduct->merge($booking);
    return view('admin.index', compact('orderlist', 'usercount', 'totalorders', 'completedtasks', 'totalitems'));
}

}
