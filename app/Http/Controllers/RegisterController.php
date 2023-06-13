<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $store = ModelsUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => 3,
            'password' => Hash::make($request->password),
        ]);

        if($store) {
            return redirect()->route('login')->with('success', 'Register berhasil, silahkan login');
        } else {
            return redirect()->back()->with('error', 'Register gagal, silahkan coba lagi');
        }
    }
}
