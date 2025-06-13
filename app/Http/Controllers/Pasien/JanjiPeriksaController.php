<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\JanjiPeriksa;
use App\Models\JadwalPeriksa;

class JanjiPeriksaController extends Controller
{
    public function index()
    {
        $no_rm = Auth::user()->no_rm;

        $janjiPeriksas = JanjiPeriksa::where('id_pasien', Auth::user()->id)->get();

        $dokters = User::with(['jadwalPeriksas' => function ($query) {
            $query->where('status', true);
        }])->where('role', 'dokter')->get();

        return view('pasien.janji-periksa.index')->with([
            'no_rm' => $no_rm,
            'dokters' => $dokters,
            'janjiPeriksas' => $janjiPeriksas,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_dokter' => 'required|exists:users,id',
            'keluhan' => 'required|string',
        ]);

        $jadwalPeriksa = JadwalPeriksa::where('id_dokter', $request->id_dokter)
            ->where('status', true)->firstOrFail();

        $jumlahJanji = JanjiPeriksa::where('id_jadwal_periksa', $jadwalPeriksa->id)->count();
        $noAntrian = $jumlahJanji + 1;

        JanjiPeriksa::create([
            'id_pasien' => Auth::id(),
            'id_jadwal_periksa' => $jadwalPeriksa->id,
            'keluhan' => $request->keluhan,
            'no_antrian' => $noAntrian,
        ]);

        return Redirect::route('pasien.janji-periksa.index')->with('status', 'Janji berhasil dibuat!');
    }
}
