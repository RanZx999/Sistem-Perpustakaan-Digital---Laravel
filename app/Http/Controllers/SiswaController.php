<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SiswaController extends Controller
{
    public function index(){
        $siswa=DB::table('tbl_siswa')->get();
        return view('siswa.index' ,['datasiswa'=>$siswa]);
    }

    public function tambah(){
        return view('siswa.tambah');
    }
    public function store(Request $request){
        DB::table('tbl_siswa')->insert([
            'nis'=>$request->nis,
            'nama'=>$request->nama,
            'kelas'=>$request->kelas,
            'alamat'=>$request->alamat,
            'hp'=>$request->hp
        ]);
        return redirect('/siswa');
    }
    public function edit($id)
    { 
        $siswa = DB::table('tbl_siswa')->where('id_siswa',$id)->get(); 
        return view('siswa.edit',['datasiswa' => $siswa]);
    }
    public function update(Request $request)
    {
        DB::table('tbl_siswa')->where('id_siswa',$request->id)->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'hp' => $request->hp
        ]);
        return redirect('/siswa');
    }

    public function hapus($id)
    {
        DB::table('tbl_siswa')->where('id_siswa',$id)->delete();
        return redirect('/siswa');
    }
}