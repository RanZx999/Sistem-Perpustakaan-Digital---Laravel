<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenulisController extends Controller
{
    public function index() {
        $datapenulis = DB::table('tbl_penulis')->get();
        return view('penulis.index', compact('datapenulis'));
    }

    public function tambah() {
        return view('penulis.tambah');
    }

    public function store(Request $request) {
        DB::table('tbl_penulis')->insert([
            'nama_penulis' => $request->nama_penulis,
            'hp_penulis'   => $request->hp_penulis,
        ]);
        return redirect('/penulis')->with('success', 'Penulis berhasil ditambah!');
    }

    public function edit($id) {
        $datapenulis = DB::table('tbl_penulis')->where('id_penulis', $id)->get();
        return view('penulis.edit', compact('datapenulis'));
    }

    public function update(Request $request) {
        DB::table('tbl_penulis')->where('id_penulis', $request->id)->update([
            'nama_penulis' => $request->nama_penulis,
            'hp_penulis'   => $request->hp_penulis,
        ]);
        return redirect('/penulis')->with('success', 'Penulis berhasil diupdate!');
    }

    public function hapus($id) {
        DB::table('tbl_penulis')->where('id_penulis', $id)->delete();
        return redirect('/penulis');
    }
}