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

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // BERANDA
    Route::get('/blogpengguna', [BlogPenggunaController::class, 'index']);

    // KEGIATAN
    Route::get('/kegiatanpengguna', [BlogPenggunaController::class, 'kegiatan']);

    // DETAIL KEGIATAN
    Route::get('/kegiatan/{id}', [BlogPenggunaController::class, 'detailkegiatan'])
        ->name('kegiatan.detail');

    // DAFTAR KEGIATAN
    Route::post('/daftar-kegiatanpengguna/{id}', [BlogPenggunaController::class, 'daftarKegiatan'])
        ->name('kegiatan.daftar');

    // RIWAYAT
    Route::get('/riwayatpengguna', [BlogPenggunaController::class, 'riwayat']);

    // BATALKAN
    Route::get('/batalkan/{id}', [BlogPenggunaController::class, 'batalkan'])
        ->name('riwayat.batalkan');

    // PROFIL
    Route::get('/profilpengguna', [BlogPenggunaController::class, 'profil']);

    // EDIT PROFIL
    Route::get('/editprofilpengguna', [BlogPenggunaController::class, 'editprofil']);

    // UPDATE PROFIL
    Route::post('/updateprofilpengguna', [BlogPenggunaController::class, 'updateprofil']);

});

require __DIR__ . '/auth.php';