<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;
use App\Models\Pinjamdetail;
use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\Buku;

class PinjamController extends Controller
{
    public function index()
    {
        $datapinjam = Pinjam::with(['siswa', 'petugas', 'detailpinjam.buku'])->get();
        return view('pinjam.index', compact('datapinjam'));
    }
    public function tambah()
    {
        $siswa = Siswa::all();
        $petugas = Petugas::all();
        $buku = Buku::with(['penulis', 'penerbit'])->where('stok', '>', 0)->get();
        return view('pinjam.tambah', compact('siswa', 'petugas', 'buku'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_siswa'      => 'required|exists:tbl_siswa,id_siswa',
            'id_petugas'    => 'required|exists:tbl_petugas,id_petugas',
            'waktu_pinjam'  => 'required|date',
            'id_buku'       => 'required|array|min:1',
            'id_buku.*'     => 'exists:tbl_buku,id_buku',
        ]);
        $pinjam = Pinjam::create([
            'id_siswa'     => $request->id_siswa,
            'id_petugas'   => $request->id_petugas,
            'waktu_pinjam' => $request->waktu_pinjam,
        ]);

        // Buat detail pinjam & kurangi stok
        foreach ($request->id_buku as $id_buku) {
            Pinjamdetail::create([
                'id_pinjam' => $pinjam->id_pinjam,
                'id_buku'   => $id_buku,
            ]);

            // Kurangi stok buku
            Buku::where('id_buku', $id_buku)->decrement('stok');
        }

        return redirect('/pinjam')->with('success', 'Peminjaman berhasil dicatat!');
    }

    // Detail - Tampilkan detail peminjaman
    public function detail($id)
    {
        $pinjam = Pinjam::with(['siswa', 'petugas'])->findOrFail($id);
        $detailbuku = Pinjamdetail::with(['buku.penulis', 'buku.penerbit'])
                        ->where('id_pinjam', $id)->get();
        return view('pinjam.detail', compact('pinjam', 'detailbuku'));
    }

    // Hapus - Kembalikan buku & hapus peminjaman
    public function hapus($id)
    {
        // Kembalikan stok buku
        $detailpinjam = Pinjamdetail::where('id_pinjam', $id)->get();
        foreach ($detailpinjam as $detail) {
            Buku::where('id_buku', $detail->id_buku)->increment('stok');
        }

        // Hapus detail pinjam dulu
        Pinjamdetail::where('id_pinjam', $id)->delete();

        // Hapus pinjam
        Pinjam::where('id_pinjam', $id)->delete();

        return redirect('/pinjam')->with('success', 'Buku berhasil dikembalikan!');
    }
}