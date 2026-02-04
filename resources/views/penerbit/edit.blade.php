@extends('layouts.app')

@section('title', 'Edit Penerbit')

@section('content')
    <div class="container mx-auto px-4 py-12 max-w-3xl">
        
        <!-- Header Section -->
        <div class="mb-8">
            <a href="/penerbit" class="inline-flex items-center text-green-600 hover:text-green-800 font-medium mb-4 transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Daftar Penerbit
            </a>
            
            <div class="flex items-center justify-between">
                <div>
                    <span class="inline-block px-3 py-1 text-xs font-semibold text-green-600 bg-green-100 rounded-full mb-3">
                        www.imahatma.my.id
                    </span>
                    <h1 class="text-4xl font-bold text-gray-800 mb-2">Edit Data Penerbit</h1>
                    <p class="text-gray-600">Perbarui informasi data penerbit</p>
                </div>
            </div>
        </div>

        @foreach($datapenerbit as $p)
        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            
            <!-- Form Header -->
            <div class="px-8 py-6 bg-gradient-to-r from-amber-500 to-orange-600">
                <h2 class="text-xl font-bold text-white flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Form Edit Data Penerbit
                </h2>
            </div>

            <!-- Form Content -->
            <form action="/penerbit/update" method="post" class="p-8 space-y-6">
                @csrf
                <input type="hidden" name="id" value="{{ $p->id_penerbit }}">
                
                <!-- Penerbit Info Badge -->
                <div class="bg-gradient-to-r from-green-50 to-teal-50 border-l-4 border-green-500 p-4 rounded-r-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-12 w-12 bg-gradient-to-br from-green-400 to-teal-500 rounded-full flex items-center justify-center text-white font-bold text-xl">
                            {{ strtoupper(substr($p->nama_penerbit, 0, 1)) }}
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-700">Sedang mengedit data penerbit:</p>
                            <p class="text-lg font-bold text-gray-900">{{ $p->nama_penerbit }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Nama Penerbit -->
                <div>
                    <label for="nama_penerbit" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-5 h-5 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        Nama Penerbit
                        <span class="text-red-500 ml-1">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="nama_penerbit"
                        name="nama_penerbit" 
                        required 
                        value="{{ $p->nama_penerbit }}"
                        placeholder="Masukkan nama penerbit"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200 outline-none"
                    >
                    <p class="mt-1 text-xs text-gray-500">Contoh: Gramedia Pustaka Utama</p>
                </div>

                <!-- Kota (if exists in your DB) -->
                @if(isset($p->kota))
                <div>
                    <label for="kota" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-5 h-5 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Kota
                    </label>
                    <input 
                        type="text" 
                        id="kota"
                        name="kota" 
                        value="{{ $p->kota }}"
                        placeholder="Masukkan kota"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200 outline-none"
                    >
                    <p class="mt-1 text-xs text-gray-500">Contoh: Jakarta</p>
                </div>
                @endif

                <!-- ISBN (if exists in your DB) -->
                @if(isset($p->ISBN))
                <div>
                    <label for="ISBN" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-5 h-5 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                        </svg>
                        ISBN
                    </label>
                    <input 
                        type="text" 
                        id="ISBN"
                        name="ISBN" 
                        value="{{ $p->ISBN }}"
                        placeholder="Masukkan ISBN"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200 outline-none"
                    >
                    <p class="mt-1 text-xs text-gray-500">Contoh: 978-602-03-1234-5</p>
                </div>
                @endif

                <!-- Alamat -->
                @if(isset($p->alamat_penerbit))
                <div>
                    <label for="alamat_penerbit" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-5 h-5 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Alamat Lengkap
                    </label>
                    <textarea 
                        id="alamat_penerbit"
                        name="alamat_penerbit" 
                        rows="4"
                        placeholder="Masukkan alamat lengkap penerbit"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200 outline-none resize-none"
                    >{{ $p->alamat_penerbit }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Contoh: Jl. Palmerah Barat No. 33-37, Jakarta 10270</p>
                </div>
                @endif

                <!-- Warning Info -->
                <div class="bg-amber-50 border-l-4 border-amber-500 p-4 rounded-r-lg">
                    <div class="flex">
                        <svg class="w-5 h-5 text-amber-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-amber-800 mb-1">Perhatian!</p>
                            <p class="text-sm text-amber-700">
                                Pastikan data yang Anda ubah sudah benar sebelum menyimpan. Perubahan akan langsung tersimpan ke database.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                    <a 
                        href="/penerbit" 
                        class="inline-flex items-center px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-lg transition-all duration-200"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Batal
                    </a>
                    <button 
                        type="submit" 
                        class="inline-flex items-center px-6 py-3 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Update Data
                    </button>
                </div>
            </form>
        </div>
        @endforeach

        <!-- Footer -->
        <div class="mt-8 text-center">
            <p class="text-sm text-gray-500">
                © 2026 Laravel CRUD Tutorial - imahatma.my.id
            </p>
        </div>

    </div>
@endsection