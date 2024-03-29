<?php

namespace App\Http\Controllers;

use App\Models\user_manajemen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Helpers\jurnalhelper;

class HomeController extends Controller
{
    public function index()
    {
        if (isset($_COOKIE['kukis'])) {
            $kukis = $_COOKIE['kukis'];
            if (jurnalhelper::cekkukis($kukis)) {
                return redirect()->route('dashboard');
            }
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $input = $request->only('nik', 'password');
        $validator = Validator::make($input, [
            'nik' => 'required|numeric',
            'password' => 'required'
        ], [
            'nik.required' => 'Nomor Induk Kependudukan (NIK) diperlukan.',
            'nik.numeric' => 'Nomor Induk Kependudukan (NIK) harus berupa angka.',
            'password.required' => 'Kata sandi diperlukan.'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $usernya = user_manajemen::where('nik', $request->nik)->first();

        if (!$usernya) {
            return back()->withErrors(['nik' => 'NIK tidak ditemukan.'])->withInput();
        }

        if (!$usernya || !Hash::check($request->password, $usernya->password)) {
            return back()->withErrors(['password' => 'NIK atau kata sandi salah.'])->withInput();
        }

        jurnalhelper::buatkukis($usernya);

        return redirect()->route('dashboard');
    }


    public function salahlogin()
    {
        return redirect()->route('index');
    }

    public function dashboard()
    {
        if (!isset($_COOKIE['kukis'])) {
            return redirect()->route('login');
        }
        if (isset($_COOKIE['kukis'])) {
            $kukis = $_COOKIE['kukis'];
            if (jurnalhelper::cekkukis($kukis)) {

                return view('dashboard', ['posisi' => $_COOKIE['posisi'], 'nama' => $_COOKIE['nama'], 'nik' => $_COOKIE['nik'], 'area' => $_COOKIE['area'], 'waktu' => $_COOKIE['current_time_formatted'], 'tanggal' => $_COOKIE['tanggal']]);
            }
        }
        return redirect()->route('index');
    }

    public function salahweb($salahweb)
    {
        return redirect()->route('index');
    }

    public function logout()
    {
        $usernya = user_manajemen::where('kukis', $_COOKIE['kukis'])->first();
        if (isset($_COOKIE['kukis'])) {
            $kukis = $_COOKIE['kukis'];
            if (jurnalhelper::cekkukis($kukis)) {
                jurnalhelper::hapuskukis($usernya);
            }
        }
        return redirect()->route('index');
    }
}
