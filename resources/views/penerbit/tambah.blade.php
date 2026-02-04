@extends('layouts.app')

@section('title', 'Tambah Penerbit')

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
                    <h1 class="text-4xl font-bold text-gray-800 mb-2">Tambah Penerbit Baru</h1>
                    <p class="text-gray-600">Lengkapi form di bawah untuk menambahkan data penerbit</p>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            
            <!-- Form Header -->
            <div class="px-8 py-6 bg-gradient-to-r from-green-500 to-teal-600">
                <h2 class="text-xl font-bold text-white flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    Form Data Penerbit
                </h2>
            </div>

            <!-- Form Content -->
            <form action="/penerbit/store" method="post" class="p-8 space-y-6">
                @csrf
                
                <!-- Nama Penerbit -->
                <div>
                    <label for="nama_penerbit" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                        placeholder="Masukkan nama penerbit"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 outline-none"
                    >
                    <p class="mt-1 text-xs text-gray-500">Contoh: Gramedia Pustaka Utama</p>
                </div>

                <!-- Alamat -->
                <div>
                    <label for="alamat_penerbit" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                        <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Alamat Lengkap
                        <span class="text-red-500 ml-1">*</span>
                    </label>
                    <textarea 
                        id="alamat_penerbit"
                        name="alamat_penerbit" 
                        required 
                        rows="4"
                        placeholder="Masukkan alamat lengkap penerbit"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200 outline-none resize-none"
                    ></textarea>
                    <p class="mt-1 text-xs text-gray-500">Contoh: Jl. Palmerah Barat No. 33-37, Jakarta 10270</p>
                </div>

                <!-- Info Required -->
                <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg">
                    <div class="flex">
                        <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-sm text-green-700">
                            <span class="font-semibold">Informasi:</span> Field dengan tanda <span class="text-red-500 font-bold">*</span> wajib diisi.
                        </p>
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
                        class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200"
                    >
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center">
            <p class="text-sm text-gray-500">
                © 2026 Laravel CRUD Tutorial - imahatma.my.id
            </p>
        </div>

    </div>
@endsection