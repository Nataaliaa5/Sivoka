<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BlogPenggunaController;

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
    Route::get('/blogpengguna', [BlogPenggunaController::class, 'index']);

    // KEGIATAN
    Route::get('/kegiatanpengguna', [BlogPenggunaController::class, 'kegiatan']);

    // DETAIL KEGIATAN
    Route::get('/kegiatan/{id}', [BlogPenggunaController::class, 'detailkegiatan'])
        ->name('kegiatan.detail');

    // DAFTAR KEGIATAN
    Route::post('/daftar-kegiatanpengguna/{id}', [BlogPenggunaController::class, 'daftarkegiatan'])
        ->name('kegiatan.daftar');

    // RIWAYAT
    Route::get('/riwayatpengguna', [BlogPenggunaController::class, 'riwayat']);

    // BATALKAN
    // Catatan: masih pakai GET. Idealnya diubah ke POST/PATCH karena ini aksi
    // yang mengubah data (supaya tidak bisa ter-trigger cuma dengan buka link).
    // Belum saya ubah otomatis karena view/blade-nya kemungkinan masih pakai <a href>.
    Route::get('/batalkan/{id}', [BlogPenggunaController::class, 'batalkan'])->name('riwayat.batalkan');

    // PROFIL (tampilan ringkas ala blog, terpisah dari ProfileController resmi di atas)
    Route::get('/profilpengguna', [BlogPenggunaController::class, 'profil']);

    // EDIT PROFIL
    Route::get('/editprofilpengguna', [BlogPenggunaController::class, 'editprofil']);

    // UPDATE PROFIL
    Route::post('/updateprofilpengguna', [BlogPenggunaController::class, 'updateprofil']);

});

Route::middleware(['auth', 'admin', 'nocache'])->group(function () {

    // Tambahkan di sini route-route khusus admin
    // (misal: kelola kegiatan, kelola volunteer, dsb.)

});

require __DIR__ . '/auth.php';