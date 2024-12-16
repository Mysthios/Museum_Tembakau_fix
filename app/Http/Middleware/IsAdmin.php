<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Admin;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah session admin_logged_in ada dan bernilai true
        if ($request->session()->has('admin_logged_in') && $request->session()->get('admin_logged_in') === true) {
            // Ambil admin_id dari session
            $adminId = $request->session()->get('admin_id');

            // Validasi admin di database
            $admin = Admin::find($adminId);

            // Jika admin tidak ditemukan, hapus session dan redirect ke login
            if (!$admin) {
                $request->session()->forget(['admin_logged_in', 'admin_id']);
                return redirect('admin/login')->with('error', 'Session tidak valid. Silakan login kembali.');
            }

            // Tambahkan data admin ke dalam request jika valid
            $request->merge(['admin' => $admin]);

            return $next($request); // Lanjutkan ke request berikutnya
        }

        // Jika tidak ada session, redirect ke halaman login
        return redirect('admin/login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
    }
}


