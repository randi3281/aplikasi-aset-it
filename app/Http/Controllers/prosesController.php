<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\user_manajemen;
use App\Helpers\jurnalhelper;

class prosesController extends Controller
{
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

        return redirect()->route('dashboard', ['menu' => 'dashboard']);
    }

    public function store(Request $request)
    {
        // Validasi input dari formulir
        $request->validate([
            'nama' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'nik' => 'required|numeric',
            'posisi' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'daerah' => 'required|string|max:255',
        ]);

        // Buat entitas pengguna baru
        $user = new user_manajemen;

        // Isi data pengguna dengan data dari formulir
        $user->nama = $request->nama;
        $user->nik = $request->nik;
        $user->password = bcrypt($request->password);
        $user->posisi = $request->posisi;
        $user->area = $request->area." ".$request->daerah;
        $user->save();

        // Redirect kembali ke halaman sebelumnya atau halaman lain yang diinginkan
        return redirect()->route('dashboard', ['menu' => 'user_manajemen']);
    }

    public function edit($id)
    {
        session_start();
        // Temukan entitas pengguna berdasarkan ID
        $useredit = user_manajemen::findOrFail($id);
        // buatlah session yang menandakan edit iya
        $_SESSION['edit'] = 'iya';
        session(['useredit' => $useredit]);

        $words = explode(' ', $useredit->area); // Membagi nilai berdasarkan spasi

        // Mengabaikan elemen pertama (kata1)
        $wordsExceptFirst = array_slice($words, 1);

        // Menampilkan kata-kata selain kata pertama
        // buatlah array kata
        $katabaru = array();
        foreach ($wordsExceptFirst as $word) {
            // inputkan ke array katabaru
            array_push($katabaru, $word);

        }
        // buatlah katabaru menjadi sebuah kalimat dengan tambahan spasi
        $katapertama = $words[0];
        $katabaru = implode(" ", $katabaru);
        session(['area' => $katabaru]);
        session(['katapertama' => $katapertama]);


        // Tampilkan view edit dengan data pengguna yang akan diedit
        return redirect()->route('dashboard', ['menu' => 'user_manajemen']);
    }

    public function update(Request $request, $id)
    {
        session_start();
            $_SESSION['edit'] = 'tidak';
        if(isset($request->tomboledit)){
            // Validasi input dari formulir
            $request->validate([
                // 'nama' => 'required|string|max:255',
                // 'password' => 'required|string|max:255',
                // 'nik' => 'required|numeric',
                // 'posisi' => 'required|string|max:255',
                // 'area' => 'required|string|max:255',
                // 'daerah' => 'required|string|max:255',
            ]);

            // Temukan entitas pengguna berdasarkan ID
            $user = user_manajemen::findOrFail($id);

            // Update data pengguna dengan data baru dari formulir
            $user->nama = $request->nama;
            $user->nik = $request->nik;
            if($request->password != null){
                $user->password = bcrypt($request->password);
            }
            $user->posisi = $request->posisi;
            $user->area = $request->area." ".$request->daerah;
            $user->save();

            // Redirect kembali ke halaman sebelumnya atau halaman lain yang diinginkan
            return redirect()->route('dashboard', ['menu' => 'user_manajemen']);
        }

        if(isset($request->tombolbatal)){
            $_SESSION['edit'] = 'tidak';
            return redirect()->route('dashboard', ['menu' => 'user_manajemen']);
        }
    }

    public function destroy($id)
    {
        // Temukan entitas pengguna berdasarkan ID
        $user = user_manajemen::findOrFail($id);

        // Hapus data pengguna
        $user->delete();

        // Redirect kembali ke halaman sebelumnya atau halaman lain yang diinginkan
        return redirect()->route('dashboard', ['menu' => 'user_manajemen']);
    }
}
