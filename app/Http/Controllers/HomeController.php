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

    
   
}

}
