<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\user_manajemen;
use App\Helpers\jurnalhelper;

class HomeController extends Controller
{
    public function index()
    {
        if (isset($_COOKIE['kukis'])) {
            $kukis = $_COOKIE['kukis'];
            if (jurnalhelper::cekkukis($kukis)) {
                return redirect()->route('dashboard', ['menu' => 'dashboard']);
            }
        }
        return view('login');
    }



    public function dashboard($menu)
    {
        if (!isset($_COOKIE['kukis'])) {
            return redirect()->route('login');
        }
        if (isset($_COOKIE['kukis'])) {
            $kukis = $_COOKIE['kukis'];
            if (jurnalhelper::cekkukis($kukis)) {
                $usernya = user_manajemen::where('kukis', $_COOKIE['kukis'])->first();
                if($menu == 'dashboard' || $menu == 'user_manajemen' || $menu == 'mutasi' || $menu == 'pengguna' || $menu == 'penghapusan'){
                    if($_COOKIE['posisi'] == 'pengguna' && $menu == 'user_manajemen'){
                        return redirect()->route('dashboard', ['menu' => 'dashboard']);
                    } else {
                        $user_manajemen = user_manajemen::paginate(10);
                        return view('dashboard', ['posisi' => $_COOKIE['posisi'], 'nama' => $_COOKIE['nama'], 'nik' => $_COOKIE['nik'], 'area' => $_COOKIE['area'], 'waktu' => $_COOKIE['current_time_formatted'], 'tanggal' => $_COOKIE['tanggal'], 'menu' => $menu, 'user_manajemen' => $user_manajemen]);
                    }
                }else{
                    return redirect()->route('dashboard', ['menu' => 'dashboard']);
                }
            }
        }
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
