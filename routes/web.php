<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BlogPenggunaController;
use App\Http\Controllers\BlogAdminController;

Route::get('/', function () {

    $totalKegiatan = DB::table('kegiatan')->count();

    $totalRiwayat = DB::table('riwayat')->count();

    return view('welcome', compact('totalKegiatan', 'totalRiwayat'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// PROFIL — dipisah ke sini (bukan di dalam group 'user' / 'admin') supaya
// hanya didaftarkan SEKALI dan tetap bisa diakses oleh kedua jenis role,
// tanpa bentrok nama route (profile.edit / profile.update / profile.destroy).
Route::middleware(['auth', 'nocache'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'user', 'nocache'])->group(function () {

    // BERANDA
    Route::get('/blogpengguna', [BlogPenggunaController::class, 'index'])
        ->name('user.dashboard');

    // KEGIATAN
    Route::get('/kegiatanpengguna', [BlogPenggunaController::class, 'kegiatan'])
        ->name('user.kegiatan');

    // DETAIL KEGIATAN
    Route::get('/kegiatan/{id}', [BlogPenggunaController::class, 'detailkegiatan'])
        ->name('kegiatan.detail');

    // DAFTAR KEGIATAN
    Route::post('/daftar-kegiatanpengguna/{id}', [BlogPenggunaController::class, 'daftarkegiatan'])
        ->name('kegiatan.daftar');

    // RIWAYAT
    Route::get('/riwayatpengguna', [BlogPenggunaController::class, 'riwayat'])
        ->name('user.riwayat');

    // BATALKAN
    Route::get('/batalkan/{id}', [BlogPenggunaController::class, 'batalkan'])
        ->name('riwayat.batalkan');

    // PROFIL
    Route::get('/profilpengguna', [BlogPenggunaController::class, 'profil'])
        ->name('user.profil');

    // EDIT PROFIL
    Route::get('/editprofilpengguna', [BlogPenggunaController::class, 'editprofil'])
        ->name('user.editprofil');

    // UPDATE PROFIL
    Route::post('/updateprofilpengguna', [BlogPenggunaController::class, 'updateprofil'])
        ->name('user.updateprofil');

});

Route::middleware(['auth', 'admin', 'nocache'])->group(function () {

    // DASHBOARD ADMIN
    Route::get('/admin/dashboard', [BlogAdminController::class, 'dashboard'])->name('admin.dashboard');

    // KELOLA KEGIATAN
    Route::get('/admin/kegiatan', [BlogAdminController::class, 'kegiatan'])->name('admin.kegiatan');
    Route::get('/admin/kegiatan/tambah', [BlogAdminController::class, 'tambahKegiatan'])->name('admin.kegiatan.tambah');
    Route::post('/admin/kegiatan', [BlogAdminController::class, 'storeKegiatan'])->name('admin.kegiatan.store');
    Route::get('/admin/kegiatan/{id}/edit', [BlogAdminController::class, 'editKegiatan'])->name('admin.kegiatan.edit');
    Route::put('/admin/kegiatan/{id}', [BlogAdminController::class, 'updateKegiatan'])->name('admin.kegiatan.update');
    Route::delete('/admin/kegiatan/{id}', [BlogAdminController::class, 'hapusKegiatan'])->name('admin.kegiatan.hapus');

    // KELOLA VOLUNTEER
    Route::get('/admin/volunteer', [BlogAdminController::class, 'volunteer'])->name('admin.volunteer');
    Route::patch('/admin/volunteer/{id}/terima', [BlogAdminController::class, 'terimaVolunteer'])->name('admin.volunteer.terima');
    Route::patch('/admin/volunteer/{id}/tolak', [BlogAdminController::class, 'tolakVolunteer'])->name('admin.volunteer.tolak');

});

require __DIR__ . '/auth.php';