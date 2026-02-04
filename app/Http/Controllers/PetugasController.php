<?php

namespace App\Http\Controllers;

use App\Models\Petugas; 
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $datapetugas = Petugas::all();
        return view('petugas.index', compact('datapetugas'));
    }

    public function create()
    {
        return view('petugas.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_petugas' => 'required|string|max:255',
            'nip'          => 'required|unique:tbl_petugas,nip',
            'hp_petugas'   => 'required',
        ]);

        Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'nip'          => $request->nip,
            'hp_petugas'   => $request->hp_petugas,
        ]);

        return redirect()->route('petugas.index')->with('success', 'Petugas berhasil ditambahkan!');
    }

    public function edit($id)
    {
        // Cari pakai id_petugas (sesuai primary key di model)
        $datapetugas = Petugas::where('id_petugas', $id)->get();
        return view('petugas.edit', compact('datapetugas'));
    }

    public function update(Request $request)
    {
        $id = $request->id; // Ambil id dari form hidden input
        
        $request->validate([
            'nama_petugas' => 'required|string|max:255',
            'nip'          => 'required|unique:tbl_petugas,nip,'.$id.',id_petugas',
            'hp_petugas'   => 'required',
        ]);

        $petugas = Petugas::findOrFail($id);
        $petugas->update([
            'nama_petugas' => $request->nama_petugas,
            'nip'          => $request->nip,
            'hp_petugas'   => $request->hp_petugas,
        ]);

        return redirect()->route('petugas.index')->with('success', 'Data diperbarui!');
    }

    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();

        return redirect()->route('petugas.index')->with('success', 'Petugas dihapus!');
    }
}