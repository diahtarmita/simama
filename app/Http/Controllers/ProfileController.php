<?php

namespace App\Http\Controllers;

use App\Models\Opd;
use App\Models\Jenis;
use App\Models\Lemdik;
use App\Models\Bidang;
use App\Models\Peserta;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Encore\Admin\Grid\Filter\Where;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        

        //ambil semua opd, lemdik, bidang
        $opds = Opd::all();
        $lemdiks = Lemdik::all();
        $bidangs = Bidang::all();
        $jeniss = Jenis::all();
        $peserta = Peserta::where('user_id', '=', $user['id'])->first();

        return view('profile', ['peserta' => $peserta, 'opds' => $opds, 'lemdiks' => $lemdiks, 'bidangs' => $bidangs, 'jeniss' => $jeniss]); //tambahi
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
            'jenis_id' => 'required|integer',
            'judul_proyek' => 'required|string|max:255',
            'no_telp_peserta' => 'required|numeric',
            'pembimbing_lemdik' => 'required|string|max:255',
            'no_telp_pembimbing' => 'required|numeric',
            'laporan_akhir' => 'nullable|string|max:255', // Menambah 'nullable' agar saat user ingin melakukan perubahan data profile, user tidak diharuskan mengisi inputan laporan_akhir by Arvin
            'sertifikat' => 'string|max:255',
        ]);
        
        $request->session()->put('opd_id', $validatedData['opd_id']);
       
        
        
        // Simpan data profil
        $user = Auth::user();
        

        $peserta = Peserta::where('user_id', $user->id)->first();
        
        if ($peserta) {
            // Jika peserta sudah ada, perbarui data
            $peserta->update($validatedData);
        } else {
            // Jika peserta belum ada, buat baru
            $peserta = Peserta::create(array_merge($validatedData, ['user_id' => $user->id]));
        }


        // Simpan laporan akhir dan sertifikat
        //$laporanPath = $request->file('laporan_akhir')->store('laporan');
        //$sertifikatPath = $request->file('sertifikat')->store('sertifikat');
        //$profile->laporan_akhir = $laporanPath;
        //$profile->sertifikat = $sertifikatPath;

        $peserta->save();

        return redirect('/profile')->with('success', 'Profile berhasil disimpan!');
    }

    public function downloadSertifikat($id)
{
    $peserta = Peserta::findOrFail($id);

    if ($peserta->sertifikat) {
        // Menambahkan path subdirektori jika diperlukan
        $filePath = $peserta->sertifikat;

        //Log::info('Trying to download file at path: ' . $filePath); // Debugging

        // Periksa apakah file ada di lokasi yang ditentukan
        if (Storage::exists($filePath)) {
            //Log::info('File exists. Proceeding to download.');
            return Storage::download($filePath);
        } else {
            //Log::error('File not found at path: ' . $filePath); // Debugging
            return back()->with('error', 'File sertifikat tidak ditemukan.');
        }
    } else {
        //Log::error('Sertifikat path is null for peserta with ID: ' . $id);
        return back()->with('error', 'Sertifikat tidak ditemukan.');
    
    }
}
}