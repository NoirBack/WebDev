<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JadwalPeriksa;

class JadwalPeriksaController extends Controller
{
    public function index()
    {
        $jadwalPeriksas = JadwalPeriksa::where('id_dokter', Auth::user()->id)->get();

        return view('dokter.jadwal-periksa.index', [
            'jadwalPeriksas' => $jadwalPeriksas
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        // Cek jika jadwal yang sama sudah ada
        $exists = JadwalPeriksa::where('id_dokter', Auth::user()->id)
            ->where('hari', $request->hari)
            ->where('jam_mulai', $request->jam_mulai)
            ->where('jam_selesai', $request->jam_selesai)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('status', 'jadwal-periksa-exists');
        }

        JadwalPeriksa::create([
            'id_dokter' => Auth::user()->id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => false, // default tidak aktif
        ]);

        return redirect()->back()->with('status', 'jadwal-periksa-created');
    }

    public function update($id)
    {
        $jadwalPeriksa = JadwalPeriksa::findOrFail($id);

        // Toggle status: aktif <-> tidak aktif
        $jadwalPeriksa->status = !$jadwalPeriksa->status;
        $jadwalPeriksa->save();

        return redirect()->back()->with('status', 'jadwal-periksa-updated');
    }
}
