<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Dokter\JadwalPeriksaController;
use App\Http\Controllers\Dokter\ObatController;
use App\Http\Controllers\Dokter\ProfilController;
use App\Http\Controllers\Dokter\MemeriksaController;

use App\Http\Controllers\Pasien\JanjiPeriksaController;
use App\Http\Controllers\Pasien\RiwayatPeriksaController;
use App\Http\Controllers\Pasien\ProfilPasienController;

// Halaman utama: redirect berdasarkan role
Route::get('/', function () {
    if (Auth::check()) {
        $role = Auth::user()->role;
        return match($role) {
            'dokter' => redirect()->route('dokter.dashboard'),
            'pasien' => redirect()->route('pasien.dashboard'),
            default => view('welcome'),
        };
    }
    return view('welcome');
});


// ==================== ROUTE DOKTER ====================
Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->name('dokter.')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dokter.dashboard');
    })->name('dashboard');

    // Jadwal Periksa
    Route::prefix('jadwal-periksa')->name('jadwal-periksa.')->group(function () {
        Route::get('/', [JadwalPeriksaController::class, 'index'])->name('index');
        Route::post('/', [JadwalPeriksaController::class, 'store'])->name('store');
        Route::patch('/{id}', [JadwalPeriksaController::class, 'update'])->name('update');
    });

    // Obat (CRUD Resource)
    Route::resource('obat', ObatController::class);

    // Edit Profil
    Route::get('/profil', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::patch('/profil', [ProfilController::class, 'update'])->name('profil.update');

    // Memeriksa
    Route::prefix('memeriksa')->name('memeriksa.')->group(function () {
        Route::get('/', [MemeriksaController::class, 'index'])->name('index');
        Route::get('/{id}/periksa', [MemeriksaController::class, 'periksa'])->name('periksa');
        Route::post('/{id}', [MemeriksaController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [MemeriksaController::class, 'edit'])->name('edit');
        Route::patch('/{id}', [MemeriksaController::class, 'update'])->name('update');
    });
});


// ==================== ROUTE PASIEN ====================
Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->name('pasien.')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('pasien.dashboard');
    })->name('dashboard');

    // Janji Periksa
    Route::prefix('janji-periksa')->name('janji-periksa.')->group(function () {
        Route::get('/', [JanjiPeriksaController::class, 'index'])->name('index');
        Route::post('/', [JanjiPeriksaController::class, 'store'])->name('store');
    });

    // Riwayat Periksa
    Route::prefix('riwayat-periksa')->name('riwayat-periksa.')->group(function () {
        Route::get('/', [RiwayatPeriksaController::class, 'index'])->name('index');
        Route::get('/{id}/detail', [RiwayatPeriksaController::class, 'detail'])->name('detail');
        Route::get('/{id}/riwayat', [RiwayatPeriksaController::class, 'riwayat'])->name('riwayat');
        Route::get('/cetak', [RiwayatPeriksaController::class, 'cetak'])->name('cetak'); // tambahan cetak bukti
    });

    // Profil Pasien
    Route::get('/profil', [ProfilPasienController::class, 'edit'])->name('profil.edit'); // jika pakai controller sendiri
    Route::patch('/profil', [ProfilPasienController::class, 'update'])->name('profil.update');
});


// Route default auth (login, register, etc)
require __DIR__.'/auth.php';
