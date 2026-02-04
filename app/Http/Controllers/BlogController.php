<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class BlogController extends Controller
{
    public function home()
    { 
        return view('v_home'); 
    } 
    
    public function tentang()
    { 
        return view('v_tentang'); 
    } 
    
    public function kontak()
    { 
        return view('v_kontak'); 
    }
}