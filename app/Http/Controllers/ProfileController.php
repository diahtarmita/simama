<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function show()
    {
        // Logika untuk menampilkan form profil
        return view('profile.show');
    }

    public function store(Request $request)
    {
        // Validasi form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'lembaga_pendidikan' => 'required|string|max:255',
            'opd' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
            'judul_proyek' => 'required|string|max:255',
            'no_telepon' => 'required|numeric',
            'nama_pembimbing' => 'required|string|max:255',
            'no_telepon_pembimbing' => 'required|numeric',
            'laporan_akhir' => 'required|mimes:pdf|max:2048',
            'sertifikat' => 'required|mimes:pdf|max:2048',
        ]);

        // Simpan data profil
        $profile = new Profile(); // Menggunakan model Profil
        $profile->nama = $request->nama;
        $profile->lembaga_pendidikan = $request->lembaga_pendidikan;
        $profile->opd = $request->opd;
        $profile->bidang = $request->bidang;
        $profile->judul_proyek = $request->judul_proyek;
        $profile->no_telepon = $request->no_telepon;
        $profile->nama_pembimbing = $request->nama_pembimbing;
        $profile->no_telepon_pembimbing = $request->no_telepon_pembimbing;

        // Simpan laporan akhir dan sertifikat
        $laporanPath = $request->file('laporan_akhir')->store('laporan');
        $sertifikatPath = $request->file('sertifikat')->store('sertifikat');
        $profile->laporan_akhir = $laporanPath;
        $profile->sertifikat = $sertifikatPath;

        $profile->save();

        return redirect('/profile')->with('success', 'Profile berhasil disimpan!');
    }
}
