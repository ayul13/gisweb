<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $wilayah = Wilayah::all();
        return view('wilayah.index', compact('wilayah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('wilayah.create');
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
        $validated = $request->validate([
            'nama'=>'required',
            'data_geojson'=>'required',
            'warna'=>'required',
            'nama_kecamatan'=>'required',
            'nama_desa'=>'required'
        ]);
        $wilayah = new Wilayah();
        $wilayah->nama=$request->nama;
        $wilayah->data_geojson=$request->data_geojson;
        $wilayah->warna=$request->warna;
        $wilayah->nama_kecamatan=$request->nama_kecamatan;
        $wilayah->nama_desa=$request->nama_desa;
        $wilayah->save();
        return redirect()->route('wilayah.index')
            ->with('success','Data Berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $wilayah = wilayah::findOrFail($id);
        return view('wilayah.show', compact('wilayah'));
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
        $wilayah = wilayah::findOrFail($id);
        return view('wilayah.edit', compact('wilayah'));
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
        $validated = $request->validate([
            'nama'=>'required',
            'data_geojson'=>'required',
            'warna'=>'required',
            'nama_kecamatan'=>'required',
            'nama_desa'=>'required'
        ]);
        $wilayah = Wilayah::findOrFail($id);
        $wilayah->nama=$request->nama;
        $wilayah->data_geojson=$request->data_geojson;
        $wilayah->warna=$request->warna;
        $wilayah->nama_kecamatan=$request->nama_kecamatan;
        $wilayah->nama_desa=$request->nama_desa;
        $wilayah->save();
        return redirect()->route('wilayah.index')
            ->with('success','Data Berhasil diedit');
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
        $wilayah = wilayah::findOrFail($id);
        $wilayah->delete();
        return redirect()->route('wilayah.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
