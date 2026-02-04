<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Penulis;
use App\Models\Penerbit;

class BukuController extends Controller
{
    public function index() {
        // Mengambil data buku beserta relasi penulis & penerbit
        $databuku = Buku::with(['penulis', 'penerbit'])->get();
        return view('buku.index', compact('databuku'));
    }
    

    public function tambah() {
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        return view('buku.tambah', compact('penulis', 'penerbit'));
    }

    public function store(Request $request) {
        Buku::create([
            'kode_buku'   => $request->kode_buku,
            'judul'       => $request->judul,
            'stok'        => $request->stok,
            'id_penerbit' => $request->id_penerbit,
            'id_penulis'  => $request->id_penulis,
        ]);
        return redirect('/buku')->with('success', 'Buku berhasil ditambah!');
    }

    public function edit($id) {
        $databuku = Buku::where('id_buku', $id)->get();
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        return view('buku.edit', compact('databuku', 'penulis', 'penerbit'));
    }

    public function update(Request $request) {
        Buku::where('id_buku', $request->id)->update([
            'kode_buku'   => $request->kode_buku,
            'judul'       => $request->judul,
            'stok'        => $request->stok,
            'id_penerbit' => $request->id_penerbit,
            'id_penulis'  => $request->id_penulis,
        ]);
        return redirect('/buku')->with('success', 'Buku berhasil diupdate!');
    }

    public function hapus($id) {
        Buku::where('id_buku', $id)->delete();
        return redirect('/buku');
    }
}