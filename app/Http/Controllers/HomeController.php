<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pesan;
use App\Models\Sewa;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil jumlah user dari tabel users
        $userCount = Customer::count();
        $productCount = Product::count();
        $tableCount = Table::count();
        $totalOrders = Pesan::count();
        $totalBookings = Sewa::count();
        $totalOrderAndBooking = $totalOrders + $totalBookings;
        

        // Kirim jumlah user ke view
        return view('admin.index', compact('userCount', 'productCount', 'tableCount', 'totalOrderAndBooking'));
    }
}
