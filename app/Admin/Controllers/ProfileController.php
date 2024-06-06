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
            'lemdik_id' => 'required|string|max:255',
            'opd_id' => 'required|string|max:255',
            'bidang_id' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'judul_proyek' => 'required|string|max:255',
            'no_telp_peserta' => 'required|numeric',
            'pembimbing_lemdik' => 'required|string|max:255',
            'no_telp_pembimbing' => 'required|numeric',
            'laporan_akhir' => 'required|mimes:pdf|max:2048',
            'sertifikat' => 'required|mimes:pdf|max:2048',
        ]);

        // Simpan data profil
        $profile = new Profile(); // Menggunakan model Profile
        $profile->nama = $request->nama;
        $profile->lemdik_id = $request->lemdik_id;
        $profile->opd_id = $request->opd_id;
        $profile->bidang_id = $request->bidang_id;
        $profile->email = $request->email;
        $profile->jenis_id = $request->jenis_id;
        $profile->judul_proyek = $request->judul_proyek;
        $profile->no_telp_peserta = $request->no_telp_peserta;
        $profile->pembimbing_lemdik = $request->pembimbing_lemdik;
        $profile->no_telp_pembimbing = $request->no_telp_pembimbing;

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

