<?php

namespace App\Http\Controllers;

use App\Models\Datauser;
use Illuminate\Http\Request;

class DatauserController extends Controller
{
    public function index()
    {
        return view('datauser.index');
    }
}
