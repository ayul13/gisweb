<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminKategoriController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Kategoris - Peta Desa";
        $viewData["kategoris"] = Kategori::all();
        return view('admin.kategori.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        Kategori::validate($request);

        $newKategori = new Kategori();
        $newKategori->setName($request->input('name'));
        $newKategori->setDescription($request->input('description'));
        $newKategori->setPrice($request->input('price'));
        $newKategori->setImage("game.png");
        $newKategori->save();

        if ($request->hasFile('image')) {
            $imageName = $newKategori->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newKategori->setImage($imageName);
            $newKategori->save();
        }

        return back();
    }

    public function delete($id)
    {
        Kategori::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit Kategori - Online Store";
        $viewData["Kategori"] = Kategori::findOrFail($id);
        return view('admin.Kategori.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Kategori::validate($request);

        $Kategori = Kategori::findOrFail($id);
        $Kategori->setName($request->input('name'));
        $Kategori->setDescription($request->input('description'));
        $Kategori->setPrice($request->input('price'));

        if ($request->hasFile('image')) {
            $imageName = $Kategori->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $Kategori->setImage($imageName);
        }

        $Kategori->save();
        return redirect()->route('admin.Kategori.index');
    }
}
