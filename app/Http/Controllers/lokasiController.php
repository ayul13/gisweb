<?php

namespace App\Http\Controllers;
use App\Models\kategori;
use App\Models\lokasi;
use Illuminate\Http\Request;

class lokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Menampilkan Halaman utama Lokasi
        $lokasi = lokasi::with('kategori')->latest()->paginate(2);
        return view('lokasi.index', compact('lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Menampilkan Form Lokasi
        $kategori = kategori::all();
        return view('lokasi.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan ke dalam tabel lokasi
        $validated = $request->validate([
            'nama' => 'required',
            'lat' => 'required',
            'lang' => 'required',
            'marker' => 'required',
            'id_kategori' => 'required'
        ]);
        
        $lokasi = new lokasi();
        $lokasi->nama = $request->nama;
        $lokasi->lat = $request->lat;
        $lokasi->lang = $request->lang;
        $lokasi->marker = $request->marker;
        $lokasi->save();
        return redirect()->route('lokasi.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_lokasi)
    {
        //Menampilkan Lokasi
        $lokasi = lokasi::findOrFail($id_lokasi);
        return view('lokasi.show', compact('lokasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_lokasi)
    {
        //Mengedit lokasi
        $kategori = kategori::all();
        $lokasi = lokasi::with('kategori')->findOrFail($id_lokasi);
        return view('lokasi.edit', compact('lokasi', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_lokasi)
    {
        //
        $validated = $request->validate([
            'nama' => 'required',
            'lat' => 'required',
            'lang' => 'required',
            'marker' => 'required'
        ]);
        
        $lokasi = lokasi::findOrFail($id_lokasi);
        $lokasi->nama = $request->nama;
        $lokasi->lat = $request->lat;
        $lokasi->lang = $request->lang;
        $lokasi->marker = $request->marker;
        $lokasi->save();
        return redirect()->route('lokasi.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_lokasi)
    {
        //Menghapus Lokasi
        $lokasi = lokasi::findOrFail($id_lokasi);
        $lokasi->delete();
        return redirect()->route('lokasi.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
