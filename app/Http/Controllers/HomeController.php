<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\user_manajemen;
use App\Helpers\jurnalhelper;
use App\Models\data_barang_now;
use App\Models\data_barang;

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

    public function hy(){
        return view('hy');
    }


    public function dashboard($menu)
    {
        session_start();
        if (!isset($_COOKIE['kukis'])) {
            return redirect()->route('login');
        }
        if (isset($_COOKIE['kukis'])) {
            $kukis = $_COOKIE['kukis'];
            if (jurnalhelper::cekkukis($kukis)) {
                $usernya = user_manajemen::where('kukis', $_COOKIE['kukis'])->first();
                if($menu == 'dashboard' ||  $menu == 'data_barang' ||$menu == 'user_manajemen' || $menu == 'mutasi' || $menu == 'pengguna' || $menu == 'penghapusan' || $menu == 'export_to_excel'){
                    if($_COOKIE['posisi'] == 'pengguna' && $menu == 'user_manajemen'){
                        return redirect()->route('dashboard', ['menu' => 'dashboard']);
                    } else {
                        if($menu == 'dashboard' || $menu == 'user_manajemen'){
                            $datanya = user_manajemen::paginate(10);
                            $_SESSION['data_barang_time'] = 'now';
                        } elseif ($menu == 'data_barang' || $_COOKIE['posisi'] == 'admin'){
                            if($_SESSION['data_barang_time'] == 'now'){
                                $datanya = data_barang_now::paginate(10);
                            } else {
                                $datanya = data_barang::paginate(10);
                            }
                        }
                        return view('dashboard', ['posisi' => $_COOKIE['posisi'], 'nama' => $_COOKIE['nama'], 'nik' => $_COOKIE['nik'], 'area' => $_COOKIE['area'], 'waktu' => $_COOKIE['current_time_formatted'], 'tanggal' => $_COOKIE['tanggal'], 'menu' => $menu, 'datanya' => $datanya]);
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
