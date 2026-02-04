@extends('layouts.app')

@section('title', 'Detail Peminjaman')

@section('content')
<div class="container mx-auto px-4 py-12 max-w-6xl">
    
    <!-- Header Section -->
    <div class="mb-8">
        <a href="/pinjam" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium mb-4 transition-colors duration-200">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke Daftar Peminjaman
        </a>
        
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-gray-800 mb-2">Detail Peminjaman</h1>
                <p class="text-gray-600">Informasi lengkap peminjaman buku</p>
            </div>
        </div>
    </div>

    <!-- Info Card -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 mb-6">
        <div class="px-8 py-6 bg-gradient-to-r from-indigo-500 to-purple-600">
            <h2 class="text-xl font-bold text-white flex items-center">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Informasi Peminjaman
            </h2>
        </div>

        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Siswa -->
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-6 rounded-xl border border-blue-100">
                    <div class="flex items-center mb-4">
                        <div class="p-3 bg-blue-500 rounded-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Peminjam</p>
                            <p class="text-lg font-bold text-gray-900">{{ $pinjam->siswa->nama }}</p>
                        </div>
                    </div>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">NIS:</span>
                            <span class="font-semibold text-gray-900">{{ $pinjam->siswa->nis }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Kelas:</span>
                            <span class="font-semibold text-gray-900">{{ $pinjam->siswa->kelas }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">HP:</span>
                            <span class="font-semibold text-gray-900">{{ $pinjam->siswa->hp }}</span>
                        </div>
                    </div>
                </div>

                <!-- Petugas -->
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-6 rounded-xl border border-purple-100">
                    <div class="flex items-center mb-4">
                        <div class="p-3 bg-purple-500 rounded-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Petugas</p>
                            <p class="text-lg font-bold text-gray-900">{{ $pinjam->petugas->nama_petugas }}</p>
                        </div>
                    </div>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">NIP:</span>
                            <span class="font-semibold text-gray-900">{{ $pinjam->petugas->nip }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">HP:</span>
                            <span class="font-semibold text-gray-900">{{ $pinjam->petugas->hp_petugas }}</span>
                        </div>
                    </div>
                </div>

                <!-- Waktu Pinjam -->
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-xl border border-green-100">
                    <div class="flex items-center mb-4">
                        <div class="p-3 bg-green-500 rounded-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Waktu Peminjaman</p>
                            <p class="text-lg font-bold text-gray-900">
                                {{ \Carbon\Carbon::parse($pinjam->waktu_pinjam)->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                    <div class="text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Jam:</span>
                            <span class="font-semibold text-gray-900">
                                {{ \Carbon\Carbon::parse($pinjam->waktu_pinjam)->format('H:i') }} WIB
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Total Buku -->
                <div class="bg-gradient-to-br from-amber-50 to-orange-50 p-6 rounded-xl border border-amber-100">
                    <div class="flex items-center mb-4">
                        <div class="p-3 bg-amber-500 rounded-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Buku Dipinjam</p>
                            <p class="text-lg font-bold text-gray-900">{{ $detailbuku->count() }} Buku</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Buku -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <div class="px-8 py-6 bg-gradient-to-r from-indigo-500 to-purple-600">
            <h2 class="text-xl font-bold text-white flex items-center">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                Daftar Buku yang Dipinjam
            </h2>
        </div>

        <div class="p-8">
            <div class="space-y-4">
                @foreach($detailbuku as $index => $detail)
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 p-6 rounded-xl border border-gray-200 hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-4 flex-1">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center text-white font-bold text-lg">
                                    {{ $index + 1 }}
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-gray-900 mb-2">{{ $detail->buku->judul }}</h3>
                                <div class="grid grid-cols-2 gap-3 text-sm">
                                    <div>
                                        <span class="text-gray-600">Kode Buku:</span>
                                        <span class="ml-2 font-semibold text-gray-900">{{ $detail->buku->kode_buku }}</span>
                                    </div>
                                    <div>
                                        <span class="text-gray-600">Stok Tersisa:</span>
                                        <span class="ml-2 font-semibold {{ $detail->buku->stok > 0 ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $detail->buku->stok }}
                                        </span>
                                    </div>
                                    <div>
                                        <span class="text-gray-600">Penulis:</span>
                                        <span class="ml-2 font-semibold text-gray-900">{{ $detail->buku->penulis->nama_penulis ?? '-' }}</span>
                                    </div>
                                    <div>
                                        <span class="text-gray-600">Penerbit:</span>
                                        <span class="ml-2 font-semibold text-gray-900">{{ $detail->buku->penerbit->nama_penerbit ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                Dipinjam
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="mt-6 flex items-center justify-end space-x-3">
        <a 
            href="/pinjam" 
            class="inline-flex items-center px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-lg transition-all duration-200"
        >
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali
        </a>
        <a 
            href="/pinjam/hapus/{{ $pinjam->id_pinjam }}" 
            onclick="return confirm('Yakin ingin mengembalikan semua buku ini? Stok akan dikembalikan.')"
            class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200"
        >
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Kembalikan Buku
        </a>
    </div>

</div>
@endsection