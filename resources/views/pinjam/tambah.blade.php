@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')
<div class="container mx-auto px-4 py-12 max-w-5xl">
    
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
                <h1 class="text-4xl font-bold text-gray-800 mb-2">Tambah Peminjaman Baru</h1>
                <p class="text-gray-600">Lengkapi form untuk mencatat peminjaman buku</p>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        
        <!-- Form Header -->
        <div class="px-8 py-6 bg-gradient-to-r from-indigo-500 to-purple-600">
            <h2 class="text-xl font-bold text-white flex items-center">
                <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Form Peminjaman Buku
            </h2>
        </div>

        <!-- Form Content -->
        <form action="/pinjam/store" method="post" class="p-8 space-y-6">
            @csrf
            
            <!-- Siswa -->
            <div>
                <label for="id_siswa" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Siswa Peminjam
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <select 
                    id="id_siswa"
                    name="id_siswa"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 outline-none @error('id_siswa') border-red-500 @enderror"
                >
                    <option value="">-- Pilih Siswa --</option>
                    @foreach($siswa as $s)
                    <option value="{{ $s->id_siswa }}">{{ $s->nama }} ({{ $s->nis }}) - {{ $s->kelas }}</option>
                    @endforeach
                </select>
                @error('id_siswa')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Petugas -->
            <div>
                <label for="id_petugas" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Petugas
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <select 
                    id="id_petugas"
                    name="id_petugas"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 outline-none @error('id_petugas') border-red-500 @enderror"
                >
                    <option value="">-- Pilih Petugas --</option>
                    @foreach($petugas as $p)
                    <option value="{{ $p->id_petugas }}">{{ $p->nama_petugas }} ({{ $p->nip }})</option>
                    @endforeach
                </select>
                @error('id_petugas')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Waktu Pinjam -->
            <div>
                <label for="waktu_pinjam" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Waktu Peminjaman
                    <span class="text-red-500 ml-1">*</span>
                </label>
                <input 
                    type="datetime-local" 
                    id="waktu_pinjam"
                    name="waktu_pinjam" 
                    required 
                    value="{{ now()->format('Y-m-d\TH:i') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 outline-none @error('waktu_pinjam') border-red-500 @enderror"
                >
                @error('waktu_pinjam')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Pilih Buku (Multiple) -->
            <div>
                <label class="flex items-center text-sm font-semibold text-gray-700 mb-3">
                    <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    Pilih Buku yang Dipinjam
                    <span class="text-red-500 ml-1">*</span>
                </label>
                
                <div class="border border-gray-300 rounded-lg p-4 max-h-96 overflow-y-auto bg-gray-50">
                    @if($buku->isEmpty())
                        <div class="text-center py-8">
                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-gray-500 font-medium">Tidak ada buku yang tersedia</p>
                            <p class="text-sm text-gray-400 mt-1">Semua buku sedang dipinjam atau stok habis</p>
                        </div>
                    @else
                        <div class="space-y-3">
                            @foreach($buku as $b)
                            <label class="flex items-center p-3 bg-white rounded-lg border border-gray-200 hover:bg-indigo-50 hover:border-indigo-300 cursor-pointer transition-all duration-200">
                                <input 
                                    type="checkbox" 
                                    name="id_buku[]" 
                                    value="{{ $b->id_buku }}"
                                    class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 focus:ring-2"
                                >
                                <div class="ml-3 flex-1">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900">{{ $b->judul }}</p>
                                            <p class="text-xs text-gray-600 mt-0.5">
                                                Kode: {{ $b->kode_buku }} | 
                                                Penulis: {{ $b->penulis->nama_penulis ?? '-' }} | 
                                                Penerbit: {{ $b->penerbit->nama_penerbit ?? '-' }}
                                            </p>
                                        </div>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $b->stok > 5 ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            Stok: {{ $b->stok }}
                                        </span>
                                    </div>
                                </div>
                            </label>
                            @endforeach
                        </div>
                    @endif
                </div>
                
                @error('id_buku')
                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                @else
                <p class="mt-2 text-xs text-gray-500">Centang buku yang ingin dipinjam (minimal 1 buku)</p>
                @enderror
            </div>

            <!-- Info -->
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-r-lg">
                <div class="flex">
                    <svg class="w-5 h-5 text-blue-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <p class="text-sm font-semibold text-blue-800 mb-1">Informasi Peminjaman</p>
                        <ul class="text-sm text-blue-700 space-y-1">
                            <li>• Stok buku akan berkurang otomatis setelah peminjaman dicatat</li>
                            <li>• Buku yang ditampilkan hanya yang masih tersedia (stok > 0)</li>
                            <li>• Pastikan data siswa dan petugas sudah benar</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                <a 
                    href="/pinjam" 
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
                    Simpan Peminjaman
                </button>
            </div>
        </form>
    </div>

</div>

<script>
    // Auto select current date/time on load
    window.addEventListener('DOMContentLoaded', function() {
        const dateInput = document.getElementById('waktu_pinjam');
        if (!dateInput.value) {
            const now = new Date();
            now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
            dateInput.value = now.toISOString().slice(0, 16);
        }
    });
</script>
@endsection