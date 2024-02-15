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
            'nik' => 'required|numeric',
            'password' => 'required'
        ], [
            'nik.required' => 'Nomor Induk Kependudukan (NIK) diperlukan.',
            'nik.numeric' => 'Nomor Induk Kependudukan (NIK) harus berupa angka.',
            'password.required' => 'Kata sandi diperlukan.'
        ]);

        // Jika validasi gagal, maka akan kembali ke halaman sebelumnya dengan keterangan kesalahan
        if ($request->fails()) {
            return back()->withErrors($request->errors())->withInput();
        }

        // Validasi berhasil, maka redirect ke route dashboard
        return redirect()->route('dashboard');
    }


    public function dashboard()
    {
        return view('dashboard');
    }
}
