@extends('layouts.app')

@section('title', 'Edit Penulis')

@section('content')
    <div class="container mx-auto px-4 py-12 max-w-3xl">
        
        <!-- Header Section -->
        <div class="mb-8">
            <a href="/penulis" class="inline-flex items-center text-rose-600 hover:text-rose-800 font-medium mb-4 transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Daftar Penulis
            </a>
            
            <div class="flex items-center justify-between">
                <div>
                    <span class="inline-block px-3 py-1 text-xs font-semibold text-rose-600 bg-rose-100 rounded-full mb-3">
                        www.imahatma.my.id
                    </span>
                    <h1 class="text-4xl font-bold text-gray-800 mb-2">Edit Data Penulis</h1>
                    <p class="text-gray-600">Perbarui informasi data penulis</p>
                </div>
            </div>
        </div>

        @foreach($datapenulis as $p)
        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            
            <!-- Form Header -->
            <div class="px-8 py-6 bg-gradient-to-r from-amber-500 to-orange-600">
                <h2 class="text-xl font-bold text-white flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Form Edit Data Penulis
                </h2>
            </div>

            <!-- Form Content -->
            <form action="/penulis/update" method="post" class="p-8 space-y-6">
                @csrf
                <input type="hidden" name="id" value="{{ $p->id_penulis }}">
                
                <!-- Penulis Info Badge -->
                <div class="bg-gradient-to-r from-rose-50 to-pink-50 border-l-4 border-rose-500 p-4 rounded-r-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-12 w-12 bg-gradient-to-br from-rose-400 to-pink-500 rounded-full flex items-center justify-center text-white font-bold text-xl">
                            {{ strtoupper(substr($p->nama_penulis, 0, 1)) }}
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-700">Sedang mengedit data penulis:</p>
                            <p class="text-lg font-bold text-gray-900">{{ $p->nama_penulis }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Nama Penulis -->
                <div>
                    <label for="nama_penulis" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-5 h-5 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Nama Penulis
                        <span class="text-red-500 ml-1">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="nama_penulis"
                        name="nama_penulis" 
                        required 
                        value="{{ $p->nama_penulis }}"
                        placeholder="Masukkan nama lengkap penulis"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200 outline-none"
                    >
                    <p class="mt-1 text-xs text-gray-500">Contoh: Andrea Hirata</p>
                </div>

                <!-- Nomor HP -->
                <div>
                    <label for="hp_penulis" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-5 h-5 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        Nomor HP
                    </label>
                    <input 
                        type="text" 
                        id="hp_penulis"
                        name="hp_penulis" 
                        value="{{ $p->hp_penulis }}"
                        placeholder="Masukkan nomor HP penulis"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-200 outline-none"
                    >
                    <p class="mt-1 text-xs text-gray-500">Contoh: 081234567890</p>
                </div>

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
                        href="/penulis" 
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