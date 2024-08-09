<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatatanHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $totalCatatan = Catatan::count();
    //     $ch = Catatan::with('users')->where('peserta_id',Auth::id())->get(); //nanti filter sesuai siapa yang login
    //     return view('catatanharian', ['ch' => $ch, 'totalCatatan' => $totalCatatan]);
    // }

    public function index()
    {
        $tc = Catatan::count();
        $peserta_id = Peserta::where('user_id', Auth::id())->get(['id', 'nama']);
        // dd( $peserta_id );
        $ch = Catatan::where('peserta_id', $peserta_id[0]->id)->get(); // nanti filter sesuai siapa yang login
        return view('catatanharian', ['ch' => $ch, 'tc' => $tc, 'nama' => $peserta_id[0]->nama]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createcatatan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'uraian_kegiatan' => 'required|string|max:255',
        ]);

        $peserta_id = Peserta::where('user_id', Auth::id())->get('user_id');
        $peserta = Peserta::where('user_id', $peserta_id[0]->user_id)->first();
        // dd($peserta); //ini contoh debugging, untuk melihat isi sebuah variable atau object

        $catatan = new Catatan();
        $catatan->tanggal = $validated['tanggal'];
        $catatan->uraian_kegiatan = $validated['uraian_kegiatan'];
        $catatan->peserta_id = $peserta['id']; //TANIA
        $catatan->save();

        return redirect('/catatanharian')->with('success', 'Catatan Harian berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // No implementation provided
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ch = Catatan::findOrFail($id);
        return view('editcatatan', compact('ch'));
    }



    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'uraian_kegiatan' => 'required|string|max:255',
        ]);

        $catatan = Catatan::findOrFail($id);
        $catatan->update($validated);

        return redirect('/catatanharian')->with('success', 'Catatan Harian berhasil diperbarui');
    }

    public function destroy($id)
    {
        $catatan = Catatan::findOrFail($id);
        $catatan->delete();

        return redirect('/catatanharian')->with('success', 'Catatan Harian berhasil dihapus');
    }
}
