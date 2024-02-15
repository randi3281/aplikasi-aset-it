<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);



        return redirect()->route('dashboard');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
