<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\JanjiPeriksa;

class RiwayatPeriksaController extends Controller
{
    // Tampilkan daftar semua janji periksa pasien
    public function index()
    {
        $no_rm = Auth::user()->no_rm;
        $janjiPeriksas = JanjiPeriksa::where('id_pasien', Auth::user()->id)->get();
        return view('pasien.riwayat-periksa.index', compact('no_rm', 'janjiPeriksas'));
    }

    // Detail janji yang belum diperiksa
    public function detail($id)
    {
        $janjiPeriksa = JanjiPeriksa::with('jadwalPeriksa.dokter')->findOrFail($id);
        return view('pasien.riwayat-periksa.detail', compact('janjiPeriksa'));
    }

    // Menampilkan riwayat periksa lengkap (sudah diperiksa)
    public function riwayat($id)
    {
        $janjiPeriksa = JanjiPeriksa::with('jadwalPeriksa.dokter', 'periksa.detailPeriksas.obat')->findOrFail($id);
        $riwayat = $janjiPeriksa->periksa;
        return view('pasien.riwayat-periksa.riwayat', compact('janjiPeriksa', 'riwayat'));
    }

    // Menampilkan halaman untuk cetak bukti pemeriksaan
    public function cetak()
    {
        $riwayats = JanjiPeriksa::where('id_pasien', Auth::id())
            ->whereHas('periksa')
            ->with(['periksa.detailPeriksas.obat', 'jadwalPeriksa.dokter'])
            ->get();

        return view('pasien.riwayat-periksa.cetak', compact('riwayats'));
    }
}
