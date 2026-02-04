<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\PinjamController;

// Home
Route::get('/', function () {
    return view('welcome');
});

// SISWA
Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/siswa/tambah', [SiswaController::class, 'tambah']);
Route::post('/siswa/store', [SiswaController::class, 'store']);
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);
Route::post('/siswa/update', [SiswaController::class, 'update']);
Route::get('/siswa/hapus/{id}', [SiswaController::class, 'hapus']);

// PETUGAS
Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.index');
Route::get('/petugas/tambah', [PetugasController::class, 'create'])->name('petugas.create');
Route::post('/petugas/store', [PetugasController::class, 'store'])->name('petugas.store');
Route::get('/petugas/edit/{id}', [PetugasController::class, 'edit'])->name('petugas.edit');
Route::post('/petugas/update', [PetugasController::class, 'update'])->name('petugas.update');
Route::get('/petugas/hapus/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');

// BUKU
Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/tambah', [BukuController::class, 'tambah']);
Route::post('/buku/store', [BukuController::class, 'store']);
Route::get('/buku/edit/{id}', [App\Http\Controllers\BukuController::class, 'edit']);
Route::post('/buku/update', [App\Http\Controllers\BukuController::class, 'update']);
Route::get('/buku/hapus/{id}', [BukuController::class, 'hapus']);


// PENERBIT
Route::get('/penerbit', [PenerbitController::class, 'index']);
Route::get('/penerbit/tambah', [PenerbitController::class, 'tambah']);
Route::post('/penerbit/store', [PenerbitController::class, 'store']);
Route::get('/penerbit/edit/{id}', [PenerbitController::class, 'edit']);
Route::post('/penerbit/update', [PenerbitController::class, 'update']);
Route::get('/penerbit/hapus/{id}', [PenerbitController::class, 'hapus']);

// PENULIS
Route::get('/penulis', [PenulisController::class, 'index']);
Route::get('/penulis/tambah', [PenulisController::class, 'tambah']);
Route::post('/penulis/store', [PenulisController::class, 'store']);
Route::get('/penulis/edit/{id}', [PenulisController::class, 'edit']);
Route::post('/penulis/update', [PenulisController::class, 'update']);
Route::get('/penulis/hapus/{id}', [PenulisController::class, 'hapus']);

// PEMINJAMAN
Route::get('/pinjam', [PinjamController::class, 'index']);
Route::get('/pinjam/tambah', [PinjamController::class, 'tambah']);
Route::post('/pinjam/store', [PinjamController::class, 'store']);
Route::get('/pinjam/detail/{id}', [PinjamController::class, 'detail']);
Route::get('/pinjam/hapus/{id}', [PinjamController::class, 'hapus']);