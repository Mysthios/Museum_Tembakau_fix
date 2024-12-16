<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\InfoMuseumController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\IsAdmin;

// -----------------------------------------
// Public Routes
// -----------------------------------------
Route::get('/', [InfoMuseumController::class, 'index'])->name('info-museum.index'); // Halaman utama (Info Museum)

Route::get('/acara', [AcaraController::class, 'index'])->name('acara.index'); // Halaman acara
Route::get('/program-donasi', [DonasiController::class, 'index'])->name('program-donasi.index'); // Halaman program donasi
Route::get('/tiket', [TiketController::class, 'index'])->name('tiket.index'); // Halaman tiket

// -----------------------------------------
// Login Routes
// -----------------------------------------
// Route untuk halaman login
Route::get('admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');
// Route untuk halaman dashboard setelah login
// Route::get('admin/index', [AdminController::class, 'dashboard'])->name('admin.dashboard.index');

// -----------------------------------------
// Admin Routes
// -----------------------------------------
// Hanya bisa diakses oleh admin
Route::middleware([IsAdmin::class])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Admin Acara
    Route::get('admin/adminacara/readadminacara', [AdminController::class, 'readAdminAcara'])->name('admin.read_adminacara');
    Route::get('admin/acara', [AcaraController::class, 'indexAdmin'])->name('admin.acara.index'); 
    Route::post('admin/acara/store', [AcaraController::class, 'store'])->name('admin.acara.store');
    Route::get('admin/acara/{id}/edit', [AcaraController::class, 'edit'])->name('admin.acara.edit'); 
    Route::put('admin/acara/{id}', [AcaraController::class, 'update'])->name('admin.acara.update'); 
    Route::delete('admin/acara/{id}', [AcaraController::class, 'destroy'])->name('admin.acara.destroy');

    // Admin Koleksi
    Route::get('admin/adminkoleksi/readadminkoleksi', [AdminController::class, 'readAdminKoleksi'])->name('admin.read_adminkoleksi');
    Route::get('admin/koleksi', [KoleksiController::class, 'indexAdmin'])->name('admin.koleksi.index');
    Route::post('admin/koleksi/store', [KoleksiController::class, 'store'])->name('admin.koleksi.store');
    Route::get('admin/koleksi/{id}/edit', [KoleksiController::class, 'edit'])->name('admin.koleksi.edit');
    Route::put('admin/koleksi/{id}', [KoleksiController::class, 'update'])->name('admin.koleksi.update');
    Route::delete('admin/koleksi/{id}', [KoleksiController::class, 'destroy'])->name('admin.koleksi.destroy');

    // 
    Route::get('admin/admintiket/readadminkoleksi', [AdminController::class, 'readAdminTiket'])->name('admin.read_admintiket');

    //
    Route::get('admin/adminprogramdonasi/readadminprogramdonasi', [AdminController::class, 'readAdminDonasi'])->name('admin.read_adminprogramdonasi');
});


// -----------------------------------------
// Admin Acara Routes
// -----------------------------------------
Route::get('acara', [AcaraController::class, 'showAcara'])->name('acara.show'); // User
Route::get('acara/{id}', [AcaraController::class, 'detailAcara'])->name('acara.detail'); // User


// -----------------------------------------
// Admin Koleksi Routes
// ----------------------------------------- 
Route::get('koleksi', [KoleksiController::class, 'showKoleksi'])->name('koleksi.show'); // User
Route::get('koleksi/{id}', [KoleksiController::class, 'detailKoleksi'])->name('koleksi.detail'); // User

// -----------------------------------------
// Admin Tiket Routes 
// -----------------------------------------
Route::get('admin/tiket', [TiketController::class, 'readAdminTiket'])->name('admin.tiket.index');
Route::get('admin/tiket', [TiketController::class, 'readAdminTiket'])->name('admin.read_admintiket');


// Routes for User Management
Route::get('/users', [UserController::class, 'loadAllUsers']);
Route::get('/add/user', [UserController::class, 'loadAddUserForm']);
Route::post('/add/user', [UserController::class, 'AddUser'])->name('AddUser');
Route::get('/edit/{id}', [UserController::class, 'loadEditForm']);
Route::post('/edit/user', [UserController::class, 'EditUser'])->name('EditUser');
Route::get('/delete/{id}', [UserController::class, 'deleteUser']);
