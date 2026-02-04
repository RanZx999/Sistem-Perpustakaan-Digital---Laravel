<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenerbitController extends Controller
{
    public function index() {
        $datapenerbit = DB::table('tbl_penerbit')->get();
        return view('penerbit.index', compact('datapenerbit'));
    }

    public function tambah() {
        return view('penerbit.tambah');
    }

    public function store(Request $request) {
        DB::table('tbl_penerbit')->insert([
            'nama_penerbit' => $request->nama_penerbit,
            'kota'          => $request->kota,
            'ISBN'          => $request->ISBN,
        ]);
        return redirect('/penerbit')->with('success', 'Penerbit berhasil ditambah!');
    }

    public function edit($id) {
        $datapenerbit = DB::table('tbl_penerbit')->where('id_penerbit', $id)->get();
        return view('penerbit.edit', compact('datapenerbit'));
    }

    public function update(Request $request) {
        DB::table('tbl_penerbit')->where('id_penerbit', $request->id)->update([
            'nama_penerbit' => $request->nama_penerbit,
            'kota'          => $request->kota,
            'ISBN'          => $request->ISBN,
        ]);
        return redirect('/penerbit')->with('success', 'Penerbit berhasil diupdate!');
    }

    public function hapus($id) {
        DB::table('tbl_penerbit')->where('id_penerbit', $id)->delete();
        return redirect('/penerbit');
    }
}