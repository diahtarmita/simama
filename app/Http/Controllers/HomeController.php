<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        //cari user yg login
        //cari data peserta dari user tersebut
        $peserta = Peserta::where('user_id', auth()->id())->get();
        // dd($peserta);
        $totalCatatan = Catatan::where('peserta_id', $peserta[0]->id)->count(); //filter sesuai siapa yang login
        $laporanAkhir = Peserta::whereNotNull('laporan_akhir')->where('laporan_akhir','!=', '')->where('user_id', $user['id'])->exists(); //ambil data kolom laporan_akhir dengan kondisi data bukan NULL dan bukan '', return value boolen (true/false) 
        $sertifikat = Peserta::whereNotNull('sertifikat')->where('sertifikat','!=', '')->where('user_id', $user['id'])->exists(); //ambil data kolom sertifikat dengan kondisi data bukan NULL dan bukan '', return value boolen (true/false) 
        
        return view('home', compact('totalCatatan', 'peserta', 'laporanAkhir', 'sertifikat')); //titipin data peserta disini
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $catatan = Catatan::count();
        // dd($catatan); // Debugging line
        // return view('home', ['catatan' => $catatan]); // Mengirimkan jumlah catatan ke view
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
