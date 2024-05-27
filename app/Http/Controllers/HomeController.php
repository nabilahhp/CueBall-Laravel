<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderProduct;
use App\Models\Booking;

class HomeController extends Controller
{
    
    public function index()
{
    $orderproduct = OrderProduct::select('id', 'customer_name', 'product_name as ordered_items', 'category', 'price', 'created_at', 'updated_at', 'status')->get();
    $booking = Booking::select('id', 'customer_name', 'table_name as ordered_items', 'category', 'price', 'created_at', 'updated_at', 'status')->get();
    $orderlist = $orderproduct->merge($booking);
    return view('admin.index', compact('orderlist'));
}

}
