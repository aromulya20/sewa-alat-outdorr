<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index()
    {
        $data = Alat::all();
        return view('alat.index', compact('data'));
    }

    public function create()
    {
        return view('alat.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama_alat' => 'required',
            'stok' => 'required|integer',
            'harga_sewa' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $path = null;

        if ($req->hasFile('foto')) {
            $path = $req->file('foto')->store('foto_alat', 'public');
        }

        Alat::create([
            'nama_alat' => $req->nama_alat,
            'stok' => $req->stok,
            'harga_sewa' => $req->harga_sewa,
            'foto' => $path
        ]);

        return redirect()->route('alat.index');
    }

    public function edit($id)
    {
        $alat = Alat::findOrFail($id);
        return view('alat.edit', compact('alat'));
    }

    public function update(Request $req, $id)
    {
        $alat = Alat::findOrFail($id);

        $path = $alat->foto;
        if ($req->hasFile('foto')) {
            $path = $req->file('foto')->store('foto_alat', 'public');
        }

        $alat->update([
            'nama_alat' => $req->nama_alat,
            'stok' => $req->stok,
            'harga_sewa' => $req->harga_sewa,
            'foto' => $path
        ]);

        return redirect()->route('alat.index');
    }

    public function destroy($id)
    {
        Alat::destroy($id);
        return back();
    }
}
