<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dokter\JadwalPeriksaController;
use App\Http\Controllers\Dokter\ObatController;

// Halaman awal (redirect berdasarkan role jika login)
Route::get('/', function () {
    if (Auth::check()) {
        $role = Auth::user()->role;
        if ($role === 'dokter') {
            return redirect()->route('dokter.dashboard');
        } elseif ($role === 'pasien') {
            return redirect()->route('pasien.dashboard');
        }
    }
    return view('welcome');
});

// Grup route untuk role dokter
Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->name('dokter.')->group(function () {

    // Dashboard Dokter
    Route::get('/dashboard', function () {
        return view('dokter.dashboard');
    })->name('dashboard');

    // Jadwal Periksa
    Route::prefix('jadwal-periksa')->name('jadwal-periksa.')->group(function () {
        Route::get('/', [JadwalPeriksaController::class, 'index'])->name('index');
        Route::post('/', [JadwalPeriksaController::class, 'store'])->name('store');
        Route::patch('/{id}', [JadwalPeriksaController::class, 'update'])->name('update');
    });

    // Mengelola Obat (CRUD lengkap)
    Route::resource('obat', ObatController::class);
});

// Grup route untuk role pasien
Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->name('pasien.')->group(function () {
    Route::get('/dashboard', function () {
        return view('pasien.dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
