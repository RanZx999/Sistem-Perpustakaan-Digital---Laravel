@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<div class="container mx-auto px-4 py-12 max-w-3xl">
    
    <!-- Header Section -->
    <div class="mb-8">
        <a href="/buku" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium mb-4 transition-colors duration-200">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke Daftar Buku
        </a>
        
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-gray-800 mb-2">Edit Buku</h1>
                <p class="text-gray-600">Perbarui informasi buku di bawah</p>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        
        <!-- Form Header -->
        <div class="px-8 py-6 bg-gradient-to-r from-indigo-500 to-purple-600">
            <h2 class="text-xl font-bold text-white flex items-center">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Form Edit Data Buku
            </h2>
        </div>

        <!-- Form Content -->
        @foreach($databuku as $buku)
        <form action="/buku/update" method="post" class="p-8 space-y-6">
            @csrf
            
            <!-- Hidden ID -->
            <input type="hidden" name="id" value="{{ $buku->id_buku }}">
            
            <!-- Kode Buku -->
            <div>
                <label for="kode_buku" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                    </svg>
                    Kode Buku
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <input 
                    type="text" 
                    id="kode_buku"
                    name="kode_buku" 
                    required 
                    placeholder="Masukkan kode buku"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 outline-none"
                    value="{{ $buku->kode_buku }}"
                >
                <p class="mt-1 text-xs text-gray-500">Contoh: BK001</p>
            </div>

            <!-- Judul -->
            <div>
                <label for="judul" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    Judul Buku
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <input 
                    type="text" 
                    id="judul"
                    name="judul" 
                    required 
                    placeholder="Masukkan judul buku"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 outline-none"
                    value="{{ $buku->judul }}"
                >
                <p class="mt-1 text-xs text-gray-500">Contoh: Laskar Pelangi</p>
            </div>

            <!-- Penulis -->
            <div>
                <label for="id_penulis" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                    </svg>
                    Penulis
                </label>
                <select 
                    id="id_penulis"
                    name="id_penulis"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 outline-none"
                >
                    <option value="">-- Pilih Penulis --</option>
                    @foreach($penulis as $pen)
                    <option value="{{ $pen->id_penulis }}" {{ $buku->id_penulis == $pen->id_penulis ? 'selected' : '' }}>
                        {{ $pen->nama_penulis }}
                    </option>
                    @endforeach
                </select>
                <p class="mt-1 text-xs text-gray-500">Pilih penulis buku (opsional)</p>
            </div>

            <!-- Penerbit -->
            <div>
                <label for="id_penerbit" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    Penerbit
                </label>
                <select 
                    id="id_penerbit"
                    name="id_penerbit"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 outline-none"
                >
                    <option value="">-- Pilih Penerbit --</option>
                    @foreach($penerbit as $pnb)
                    <option value="{{ $pnb->id_penerbit }}" {{ $buku->id_penerbit == $pnb->id_penerbit ? 'selected' : '' }}>
                        {{ $pnb->nama_penerbit }}
                    </option>
                    @endforeach
                </select>
                <p class="mt-1 text-xs text-gray-500">Pilih penerbit buku (opsional)</p>
            </div>

            <!-- Stok -->
            <div>
                <label for="stok" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    Jumlah Stok
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <input 
                    type="number" 
                    id="stok"
                    name="stok" 
                    required 
                    min="0"
                    placeholder="Masukkan jumlah stok"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 outline-none"
                    value="{{ $buku->stok }}"
                >
                <p class="mt-1 text-xs text-gray-500">Contoh: 5</p>
            </div>

            <!-- Info Required -->
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg">
                <div class="flex">
                    <svg class="w-5 h-5 text-blue-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <p class="text-sm text-blue-700">
                        <span class="font-semibold">Informasi:</span> Field dengan tanda <span class="text-red-500 font-bold">*</span> wajib diisi.
                    </p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                <a 
                    href="/buku" 
                    class="inline-flex items-center px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-lg transition-all duration-200"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Batal
                </a>
                <button 
                    type="submit" 
                    class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200"
                >
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Update Data
                </button>
            </div>
        </form>
        @endforeach
    </div>

</div>
@endsection