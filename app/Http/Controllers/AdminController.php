<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koleksi;
use Illuminate\Support\Facades\Auth;
use Illumintate\Foundation\Auth\User as Authcenticable;
use App\Models\Acara;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Proses login








    // public function login(Request $request)
    // {
    // // Username dan password yang di-hardcode
    // $hardcodedUsername = 'admin';
    // $hardcodedPassword = 'password123'; // Password yang ditentukan

    // // Validasi input
    // $credentials = $request->validate([
    //     'username' => 'required',
    //     'password' => 'required',
    // ]);

    // // Cek apakah username dan password cocok
    // if ($credentials['username'] === $hardcodedUsername && $credentials['password'] === $hardcodedPassword) {
    //     // Simpan informasi login ke session
    //     $request->session()->put('admin_logged_in', true);

    //     // Redirect ke dashboard
    //     return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
    // }

    // // Jika login gagal
    // return back()->with('error', 'Username atau Password salah.');
    // }

    public function login(Request $request)
    {
    // Validasi input username dan password
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cari admin berdasarkan username
        $admin = \App\Models\Admin::where('username', $credentials['username'])->first();

        // Cek apakah admin ditemukan dan password cocok
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            // Regenerasi session ID agar session lama tidak digunakan
            $request->session()->regenerate();
        
            // Simpan informasi admin ke session
            $request->session()->put('admin_logged_in', true);
            $request->session()->put('admin_id', $admin->admin_id);
        
            // Redirect ke dashboard
            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
        }
        
        // Jika login gagal, redirect kembali ke halaman login dengan pesan error
        return redirect()->route('admin.login')->with('error', 'Username atau password salah.');

    }



    // Menampilkan halaman dashboard admin 
    public function dashboard()
    {
        return view('admin.dashboard'); // pastikan Anda memiliki file view 'admin.dashboard'
    }

    // Menampilkan halaman Manajemen Acara (ubah menjadi readAdminAcara)
    public function readAdminAcara()
    {
        $acaras = Acara::all(); // Ambil semua data acara
        return view('admin.adminacara.readadminacara', compact('acaras'));
    }

    public function readAdminKoleksi()
    {
        $koleksis = Koleksi::all(); // Ambil semua data koleksi
        return view('admin.adminkoleksi.readadminkoleksi', compact('koleksis')); // Kirim ke view
    }
    
    
    public function readAdminTiket()
    {
        return view('admin.admintiket.readadmintiket'); // Halaman untuk melihat acara
    }

    public function readAdminDonasi()
    {
        return view('admin.adminprogramdonasi.readadminprogramdonasi', compact('programDonasis'));
    }


}
