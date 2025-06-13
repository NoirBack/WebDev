<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfilController extends Controller
{
    // Tampilkan form edit profil
    public function edit()
    {
        $user = Auth::user(); // ambil data user yang sedang login
        return view('dokter.profil.edit', compact('user'));
    }

    // Proses update data profil
    public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string',
        'no_hp' => 'required|string|max:50',
        'poli' => 'required|string|max:50',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6',
    ]);

    $user->nama = $request->nama;
    $user->alamat = $request->alamat;
    $user->no_hp = $request->no_hp;
    $user->poli = $request->poli;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('dokter.profil.edit')->with('status', 'Profil berhasil diperbarui.');
}

}
