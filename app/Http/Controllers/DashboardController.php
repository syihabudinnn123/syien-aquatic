<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    if (Auth::user()->role->name == 'User') {
        return redirect()->route('product.index');
    } else {
        $products=Product::all();
        $sliders=Slider::all();
        $categories=Category::all();
        $brands=Brand::all();


        return view('dashboard', compact('products', 'sliders', 'categories', 'brands'));
    }
        
    }
}
