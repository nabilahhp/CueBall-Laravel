<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.index', compact('user'));
    }

    public function edit()
    {
        
    }

    public function update(Request $request)
    {

    }
}
