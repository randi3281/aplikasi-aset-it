<?php

namespace App\Http\Controllers;

use App\Exports\DataBarangNowExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\user_manajemen;
use App\Models\area_user_aplikasi;
use App\Helpers\jurnalhelper;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataBarangExport;
use App\Exports\MutasiExport;
use App\Exports\MutasiNowExport;
use App\Exports\PenghapusanExport;
use App\Exports\PenghapusanNowExport;
use App\Models\data_barang_now;
use App\Models\data_barang;
use App\Models\penghapusan_now;
use App\Models\penghapusan;
use App\Models\mutasi_now;
use App\Models\mutasi;
use Carbon\Carbon;

class prosesController extends Controller
{
    public function login(Request $request)
    {
        session_start();
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

        $data_area = area_user_aplikasi::where('nik', $request->nik)->get();
        $_SESSION['nik_diambil'] = $request->nik;
        return view('area', ['data_area' => $data_area]);
    }

    public function login_lempar(Request $request)
    {
        session_start();
        $input = $request->only('area');
        $validator = Validator::make($input, [
            'area' => 'required|string'
        ], [
            'area.required' => 'Area diperlukan.',
            'area.numeric' => 'Area harus berupa tulisan.'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $usernya = user_manajemen::where('nik', $_SESSION['nik_diambil'])->where('area', $request->area)->first();
        jurnalhelper::buatkukis($usernya);

        return redirect()->route('dashboard', ['menu' => 'dashboard']);
    }

    public function store(Request $request)
    {
        // Validasi input dari formulir
        $validasi = Validator::make($request->all(), [
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
        $user->area = $request->area . " " . $request->daerah;
        $user->save();

        $area_user_aplikasi = new area_user_aplikasi;
        $area_user_aplikasi->nik = $request->nik;
        $area_user_aplikasi->area_user = $request->area . " " . $request->daerah;
        $area_user_aplikasi->save();

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

    public function databarangpilihan(Request $request)
    {
        session_start();
        $_SESSION['data_barang_time'] = 'old';
        $_SESSION['data_barang_area']= $request->area;
        $_SESSION['data_barang_bulan']= $request->bulan;
        $_SESSION['data_barang_tahun']= $request->tahun;
        return redirect()->route('dashboard', ['menu' => 'data_barang']);
    }

    public function mutasipilihan(Request $request)
    {
        session_start();
        $_SESSION['mutasi_time'] = 'old';
        $_SESSION['mutasi_area']= $request->area;
        $_SESSION['mutasi_bulan']= $request->bulan;
        $_SESSION['mutasi_tahun']= $request->tahun;
        return redirect()->route('dashboard', ['menu' => 'mutasi']);
    }

    public function penghapusanpilihan(Request $request)
    {
        session_start();
        $_SESSION['penghapusan_time'] = 'old';
        $_SESSION['penghapusan_area']= $request->area;
        $_SESSION['penghapusan_bulan']= $request->bulan;
        $_SESSION['penghapusan_tahun']= $request->tahun;
        return redirect()->route('dashboard', ['menu' => 'penghapusan']);
    }

    public function export_data_barang(Request $request)
    {
        session_start();
        if($request->area == 'all' && $request->bulan == 'all' && $request->tahun == 'all'){
            return Excel::download(new DataBarangNowExport, 'Data Barang Sekarang.xlsx');
        } else {
            return Excel::download(new DataBarangExport($request->bulan, $request->tahun, $request->area), 'Data Barang ' . $request->area . " ". $request->bulan . " " . $request->tahun .'.xlsx');
        }
    }

    public function export_mutasi(Request $request)
    {
        session_start();
        if($request->area == 'all' && $request->bulan == 'all' && $request->tahun == 'all'){
            return Excel::download(new MutasiNowExport, 'Mutasi Sekarang.xlsx');
        } else {
            return Excel::download(new MutasiExport($request->bulan, $request->tahun, $request->area), 'Mutasi ' . $request->area . " ". $request->bulan . " " . $request->tahun .'.xlsx');
        }
    }
    public function export_penghapusan(Request $request)
    {
        session_start();
        if($request->area == 'all' && $request->bulan == 'all' && $request->tahun == 'all'){
            return Excel::download(new PenghapusanNowExport, 'Penghapusan Sekarang.xlsx');
        } else {
            return Excel::download(new PenghapusanExport($request->bulan, $request->tahun, $request->area), 'Penghapusan ' . $request->area . " ". $request->bulan . " " . $request->tahun .'.xlsx');
        }
    }

    public function store_pengguna(Request $request)
    {
        // Validasi input dari formulir
        $validator = Validator::make($request->all(), [
            'tanggal_perolehan' => 'required|date',
            'nama_barang_asset' => 'required|string|max:255',
            'kode_fa_fams' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'outlet_pencatatan' => 'required|string|max:255',
            'outlet_actual' => 'required|string|max:255',
            'type_barang' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nama_user' => 'required|string|max:255',
            'nik' => 'required|numeric',
            'nama_komputer' => 'required|string|max:255',
            'ip_address' => 'required|string|max:255',
            'kondisi' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'serial_number' => 'required|string|max:255',
            'shopos' => 'required|string|max:255',
            'landesk' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data_barang_now = new data_barang_now;
        $data_barang_now->tanggal_perolehan = $request->tanggal_perolehan;
        $data_barang_now->asset = $request->nama_barang_asset;
        $data_barang_now->kode_fa_fams = $request->kode_fa_fams;
        $data_barang_now->nama_barang = $request->nama_barang;
        $data_barang_now->outlet_pencatatan = $request->outlet_pencatatan;
        $data_barang_now->outlet_actual = $request->outlet_actual;
        $data_barang_now->type_barang = $request->type_barang;
        $data_barang_now->location = $request->location;
        $data_barang_now->jabatan = $request->jabatan;
        $data_barang_now->nama_user = $request->nama_user;
        $data_barang_now->nik = $request->nik;
        $data_barang_now->komputer_nama = $request->nama_komputer;
        $data_barang_now->ip_address = $request->ip_address;
        $data_barang_now->kondisi = $request->kondisi;
        $data_barang_now->keterangan = $request->keterangan;
        $data_barang_now->serial_number = $request->serial_number;
        $data_barang_now->sophos = $request->shopos;
        $data_barang_now->landesk = $request->landesk;
        $data_barang_now->save();


        return redirect()->route('dashboard', ['menu' => 'data_barang']);
    }

    public function edit_pengguna($id)
    {
        session_start();
        // Temukan entitas pengguna berdasarkan ID
        $useredit = data_barang_now::findOrFail($id);
        // buatlah session yang menandakan edit iya
        session(['edit' => 'iya']);
        session(['useredit' => $useredit]);

        // Tampilkan view edit dengan data pengguna yang akan diedit
        return redirect()->route('dashboard', ['menu' => 'data_barang']);
    }

    public function destroy_pengguna($id){
        // Temukan entitas pengguna berdasarkan ID
        $user = data_barang_now::findOrFail($id);

        // Hapus data pengguna
        $user->delete();

        // Redirect kembali ke halaman sebelumnya atau halaman lain yang diinginkan
        return redirect()->route('dashboard', ['menu' => 'data_barang']);
    }

}
