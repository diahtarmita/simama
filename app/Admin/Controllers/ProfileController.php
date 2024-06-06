<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Lemdik;
use App\Models\Opd;
use App\Models\Peserta;
use Illuminate\Http\Request;
use App\Models\Profile; // Menggunakan namespace yang sesuai dengan model
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function show()
    {
        // Logika untuk menampilkan form profil
        $user=Auth::user();
        dd($user);
        $peserta = Peserta::where('user_id','=',$user['id'])->first();
        return view('profile.show', ['peserta'=>$peserta]);
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
        $profile = new Profile(); // Menggunakan model Profile
        $profile->nama = $request->nama;
        $profile->lembaga_pendidikan = $request->lembaga_pendidikan;
        $profile->opd = $request->opd;
        $profile->bidang = $request->bidang;
        $profile->judul_proyek = $request->judul_proyek;
        $profile->no_telepon = $request->no_telepon;
        $profile->nama_pembimbing = $request->nama_pembimbing;
        $profile->no_telepon_pembimbing = $request->no_telepon_pembimbing;

        // Simpan laporan akhir dan sertifikat
        if ($request->hasFile('laporan_akhir')) {
            $laporanPath = $request->file('laporan_akhir')->store('laporan');
            $profile->laporan_akhir = $laporanPath;
        }

        if ($request->hasFile('sertifikat')) {
            $sertifikatPath = $request->file('sertifikat')->store('sertifikat');
            $profile->sertifikat = $sertifikatPath;
        }

        $profile->save();

        return redirect('/profile')->with('success', 'Profil berhasil disimpan!');
    }
}

