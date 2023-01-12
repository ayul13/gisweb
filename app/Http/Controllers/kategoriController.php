<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan halaman kategori
        $kategori= kategori::all();
        return view('kategori.index', compact('kategori'));
        // echo "<h1>Hi!</h1>";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //menampilkan Form Kategori
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan ke dalam tabel kategori
        $validated = $request->validate([
            'nama_kategori'=> 'required',
            'ket' => 'required'
        ]);
        $kategori = new kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->ket = $request->ket;
        $kategori->save();
        return redirect()->route('kategori.index')
            ->with('success', 'Data Berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_kategori)
    {
        //menampilkan Kategori
        $kategori = kategori::findOrFail($id_kategori);
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_kategori)
    {
        //mengedit kategori
        $kategori = kategori::findOrFail($id_kategori);
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kategori)
    {
        //
        $validated = $request->validate([
            'nama_kategori'=> 'required',
            'ket' => 'required'

        ]);
        $kategori = kategori::findOrFail($id_kategori);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->ket = $request->ket;
        $kategori->save();
        return redirect()->route('kategori.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kategori)
    {
        //hapus
        $kategori = kategori::findOrFail($id_kategori);
        $kategori->delete();
        return redirect()->route('kategori.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
