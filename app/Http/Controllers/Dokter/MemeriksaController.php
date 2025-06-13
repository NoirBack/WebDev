<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JanjiPeriksa;
use App\Models\Periksa;
use App\Models\DetailPeriksa;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemeriksaController extends Controller
{
    // Menampilkan daftar janji periksa untuk dokter yang sedang login
    public function index()
    {
        // Ambil jadwal periksa aktif dokter
        $jadwalPeriksa = Auth::user()->jadwalPeriksas()->where('status', true)->first();

        // Ambil semua janji periksa berdasarkan jadwal tersebut, termasuk data pasien dan jadwalnya
        $janjiPeriksas = JanjiPeriksa::where('id_jadwal_periksa', $jadwalPeriksa->id)
            ->with(['pasien', 'jadwalPeriksa'])
            ->get();

        // Ambil semua data obat
        $obats = Obat::all();

        // Tampilkan ke view
        return view('dokter.memeriksa.index', compact('janjiPeriksas', 'obats'));
    }

    // Menampilkan form periksa untuk satu janji periksa
    public function periksa($id)
    {
        // Ambil data janji periksa dan pasiennya
        $janjiPeriksa = JanjiPeriksa::with('pasien')->findOrFail($id);

        // Ambil semua data obat
        $obats = Obat::all();

        // Tampilkan ke view
        return view('dokter.memeriksa.periksa', compact('janjiPeriksa', 'obats'));
    }

    // Menyimpan hasil periksa baru
    public function store(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'tgl_periksa' => 'required|date',
            'catatan'     => 'required|string',
            'obat'        => 'required|array',
        ]);

        // Biaya tetap pemeriksaan
        $biayaTetap = 150000;

        // Ambil data obat dari ID yang dipilih
        $obatIds = $request->obat;
        $obats = Obat::whereIn('id', $obatIds)->get();

        // Hitung total biaya obat
        $totalHargaObat = $obats->sum('harga');

        // Total biaya keseluruhan
        $totalBiaya = $biayaTetap + $totalHargaObat;

        // Simpan data pemeriksaan
        $periksa = Periksa::create([
            'id_janji_periksa' => $id,
            'tgl_periksa'      => $request->tgl_periksa,
            'catatan'          => $request->catatan,
            'biaya_periksa'    => $totalBiaya,
        ]);

        // Simpan detail pemeriksaan (obat-obatan yang digunakan)
        foreach ($obatIds as $id_obat) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat'    => $id_obat,
            ]);
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dokter.memeriksa.index')->with('status', 'memeriksa-created');
    }

    // Menampilkan form edit pemeriksaan
    public function edit($id)
    {
        // Ambil janji periksa beserta relasi pemeriksaan, detail obat, dan pasien
        $janjiPeriksa = JanjiPeriksa::with('periksa.detailPeriksas', 'pasien')->findOrFail($id);

        // Ambil semua data obat
        $obats = Obat::all();

        // Tampilkan ke view
        return view('dokter.memeriksa.edit', compact('janjiPeriksa', 'obats'));
    }

    // Memperbarui data pemeriksaan
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'tgl_periksa' => 'required|date',
            'catatan'     => 'required|string',
            'obat'        => 'required|array',
        ]);

        // Biaya tetap pemeriksaan
        $biayaTetap = 150000;

        // Ambil data obat dari ID
        $obatIds = $request->obat;
        $obats = Obat::whereIn('id', $obatIds)->get();

        // Hitung total biaya
        $totalHargaObat = $obats->sum('harga');
        $totalBiaya = $biayaTetap + $totalHargaObat;

        // Update data pemeriksaan
        $periksa = Periksa::findOrFail($id);
        $periksa->update([
            'tgl_periksa'   => $request->tgl_periksa,
            'catatan'       => $request->catatan,
            'biaya_periksa' => $totalBiaya,
        ]);

        // Hapus detail pemeriksaan sebelumnya
        DetailPeriksa::where('id_periksa', $periksa->id)->delete();

        // Tambahkan detail pemeriksaan baru
        foreach ($obatIds as $id_obat) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat'    => $id_obat,
            ]);
        }

        // Redirect dengan pesan sukses
        return redirect()->route('dokter.memeriksa.index')->with('status', 'memeriksa-updated');
    }
}
