<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class GuruController extends Controller
{
    public function gurutampil($nama) 
    { 
        return $nama; 
    }
    public function formulir()
    { 
        return view('formulir'); 
    }
    public function proses(Request $request)
    { 
        $var_nama = $request->input('nama'); 
        $var_alamat = $request->input('alamat'); 
        
        return "Nama : ".$var_nama.", Alamat : ".$var_alamat; 
    }
}