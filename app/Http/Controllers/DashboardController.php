<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    if (Auth::user()->role->name == 'User') {
        return redirect()->route('product.index');
    } else {
        return view('dashboard');
    }
        
    }
}
