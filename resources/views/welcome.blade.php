<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistem Perpustakaan Digital</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
                -webkit-font-smoothing: antialiased;
            }
        </style>
    </head>
    <body class="bg-gradient-to-br from-indigo-50 via-white to-purple-50">
        
        <!-- Navigation -->
        <nav class="fixed top-0 w-full px-[60px] py-[25px] flex justify-between items-center z-[100] bg-white/90 backdrop-blur-[20px] shadow-sm border-b border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <div class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">PERPUSTAKAAN</div>
            </div>
            <div class="flex gap-[35px] items-center">
                <a href="#home" class="text-gray-700 text-sm font-medium hover:text-indigo-600 transition-colors">Home</a>
                <a href="#features" class="text-gray-700 text-sm font-medium hover:text-indigo-600 transition-colors">Fitur</a>
                <a href="#about" class="text-gray-700 text-sm font-medium hover:text-indigo-600 transition-colors">Tentang</a>
                <a href="#contact" class="text-gray-700 text-sm font-medium hover:text-indigo-600 transition-colors">Kontak</a>
                @if (Route::has('login'))
                    @auth
                        <a href="/siswa" class="px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg font-semibold hover:shadow-lg hover:-translate-y-0.5 transition-all">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg font-semibold hover:shadow-lg hover:-translate-y-0.5 transition-all">Login</a>
                    @endauth
                @endif
            </div>
        </nav>

        <!-- Hero -->
        <section class="min-h-screen flex items-center px-[60px] relative pt-[100px]" id="home">
            <!-- Background Elements -->
            <div class="absolute top-20 right-20 w-72 h-72 bg-indigo-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob"></div>
            <div class="absolute top-40 left-20 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-20 left-1/2 w-72 h-72 bg-pink-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-4000"></div>
            
            <div class="max-w-[1400px] mx-auto w-full grid grid-cols-1 lg:grid-cols-2 gap-16 items-center relative z-10">
                <!-- Left Content -->
                <div>
                    <div class="inline-block px-4 py-2 bg-indigo-100 border border-indigo-200 rounded-full text-[13px] font-semibold tracking-wide mb-6 text-indigo-700">
                        📚 SISTEM MANAJEMEN PERPUSTAKAAN
                    </div>
                    <h1 class="text-[clamp(42px,6vw,72px)] font-bold leading-[1.1] tracking-tight mb-6 text-gray-900">
                        Kelola Perpustakaan<br>Lebih <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Mudah & Efisien</span>
                    </h1>
                    <p class="text-xl text-gray-600 max-w-[600px] mb-10 leading-relaxed">
                        Sistem perpustakaan digital modern yang memudahkan pengelolaan buku, peminjaman, dan administrasi perpustakaan Anda.
                    </p>
                    <div class="flex gap-5 flex-wrap">
                        <a href="/siswa" class="px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl font-semibold text-[15px] hover:shadow-xl hover:-translate-y-1 transition-all flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            Mulai Sekarang
                        </a>
                        <a href="#features" class="px-8 py-4 bg-white text-gray-700 border-2 border-gray-200 rounded-xl font-semibold text-[15px] hover:border-indigo-300 hover:bg-indigo-50 transition-all flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>

                <!-- Right Content - Illustration -->
                <div class="relative">
                    <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-3xl p-12 shadow-2xl transform rotate-3 hover:rotate-0 transition-transform duration-500">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8 space-y-4">
                            <!-- Book Icons -->
                            <div class="grid grid-cols-3 gap-4">
                                <div class="bg-white/20 rounded-lg p-6 flex items-center justify-center hover:scale-110 transition-transform">
                                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <div class="bg-white/20 rounded-lg p-6 flex items-center justify-center hover:scale-110 transition-transform">
                                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <div class="bg-white/20 rounded-lg p-6 flex items-center justify-center hover:scale-110 transition-transform">
                                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="bg-white/30 h-2 rounded-full overflow-hidden">
                                <div class="bg-white h-full w-3/4 rounded-full animate-pulse"></div>
                            </div>
                            <div class="text-white text-center font-semibold">Sistem Perpustakaan Modern</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats -->
        <section class="py-20 px-[60px] bg-white border-y border-gray-100">
            <div class="max-w-[1400px] mx-auto grid grid-cols-2 md:grid-cols-4 gap-12">
                <div class="text-center">
                    <div class="text-5xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">1000+</div>
                    <div class="text-gray-600 text-sm font-medium">Koleksi Buku</div>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">500+</div>
                    <div class="text-gray-600 text-sm font-medium">Anggota Aktif</div>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">2000+</div>
                    <div class="text-gray-600 text-sm font-medium">Peminjaman</div>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">24/7</div>
                    <div class="text-gray-600 text-sm font-medium">Akses Online</div>
                </div>
            </div>
        </section>

        <!-- Features -->
        <section class="py-24 px-[60px]" id="features">
            <div class="max-w-[1400px] mx-auto">
                <div class="text-center mb-16">
                    <div class="inline-block px-4 py-2 bg-indigo-100 rounded-full text-sm font-semibold text-indigo-700 mb-4">FITUR UNGGULAN</div>
                    <h2 class="text-5xl font-bold mb-4 text-gray-900">Kenapa Memilih Kami?</h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">Sistem perpustakaan lengkap dengan fitur modern untuk kemudahan pengelolaan</p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-white p-8 rounded-2xl border border-gray-100 hover:border-indigo-200 hover:shadow-xl transition-all group">
                        <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Manajemen Buku</h3>
                        <p class="text-gray-600 leading-relaxed">Kelola koleksi buku dengan mudah, tambah, edit, dan hapus data buku secara real-time dengan interface yang intuitif.</p>
                    </div>

                    <!-- Feature 2 -->
                    <div class="bg-white p-8 rounded-2xl border border-gray-100 hover:border-indigo-200 hover:shadow-xl transition-all group">
                        <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Sistem Peminjaman</h3>
                        <p class="text-gray-600 leading-relaxed">Catat peminjaman dan pengembalian buku otomatis dengan tracking stok real-time dan notifikasi jatuh tempo.</p>
                    </div>

                    <!-- Feature 3 -->
                    <div class="bg-white p-8 rounded-2xl border border-gray-100 hover:border-indigo-200 hover:shadow-xl transition-all group">
                        <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Data Anggota</h3>
                        <p class="text-gray-600 leading-relaxed">Database anggota lengkap dengan riwayat peminjaman dan sistem membership terintegrasi dengan baik.</p>
                    </div>

                    <!-- Feature 4 -->
                    <div class="bg-white p-8 rounded-2xl border border-gray-100 hover:border-indigo-200 hover:shadow-xl transition-all group">
                        <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Laporan & Statistik</h3>
                        <p class="text-gray-600 leading-relaxed">Dashboard analitik lengkap dengan grafik dan laporan untuk monitoring aktivitas perpustakaan.</p>
                    </div>

                    <!-- Feature 5 -->
                    <div class="bg-white p-8 rounded-2xl border border-gray-100 hover:border-indigo-200 hover:shadow-xl transition-all group">
                        <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Pencarian Cepat</h3>
                        <p class="text-gray-600 leading-relaxed">Temukan buku dengan cepat menggunakan fitur pencarian canggih berdasarkan judul, penulis, atau kategori.</p>
                    </div>

                    <!-- Feature 6 -->
                    <div class="bg-white p-8 rounded-2xl border border-gray-100 hover:border-indigo-200 hover:shadow-xl transition-all group">
                        <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900">Keamanan Data</h3>
                        <p class="text-gray-600 leading-relaxed">Sistem keamanan berlapis dengan enkripsi data dan backup otomatis untuk melindungi informasi perpustakaan.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-24 px-[60px] bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-500 text-white text-center relative overflow-hidden" id="contact">
            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIj48cGF0aCBkPSJNMzYgMzRjMC0yIDItNCAyLTRzMiAyIDIgNHYyYzAgMi0yIDQtMiA0cy0yLTItMi00di0yem0wLTMwYzAtMiAyLTQgMi00czIgMiAyIDR2MmMwIDItMiA0LTIgNHMtMi0yLTItNFY0eiIvPjwvZz48L2c+PC9zdmc+')] opacity-20"></div>
            <div class="max-w-[800px] mx-auto relative z-10">
                <h2 class="text-5xl font-bold mb-6">Siap Modernisasi Perpustakaan Anda?</h2>
                <p class="text-xl mb-10 text-white/90">Bergabunglah dengan ratusan perpustakaan yang telah menggunakan sistem kami untuk meningkatkan efisiensi dan pelayanan.</p>
                <div class="flex gap-5 justify-center flex-wrap">
                    <a href="/siswa" class="px-8 py-4 bg-white text-indigo-600 rounded-xl font-bold text-[15px] hover:shadow-2xl hover:-translate-y-1 transition-all">
                        Mulai Gratis Sekarang
                    </a>
                    <a href="#features" class="px-8 py-4 bg-white/10 text-white border-2 border-white/30 backdrop-blur-sm rounded-xl font-bold text-[15px] hover:bg-white/20 transition-all">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-16 px-[60px] bg-gray-900 text-gray-400">
            <div class="max-w-[1400px] mx-auto">
                <div class="grid md:grid-cols-4 gap-12 mb-12">
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <div class="text-lg font-bold text-white">PERPUSTAKAAN</div>
                        </div>
                        <p class="text-sm leading-relaxed">Sistem manajemen perpustakaan modern untuk kemudahan pengelolaan dan pelayanan terbaik.</p>
                    </div>
                    <div>
                        <h4 class="text-white font-semibold mb-4">Menu</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#home" class="hover:text-white transition-colors">Home</a></li>
                            <li><a href="#features" class="hover:text-white transition-colors">Fitur</a></li>
                            <li><a href="#about" class="hover:text-white transition-colors">Tentang</a></li>
                            <li><a href="#contact" class="hover:text-white transition-colors">Kontak</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-white font-semibold mb-4">Fitur</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="/siswa" class="hover:text-white transition-colors">Data Siswa</a></li>
                            <li><a href="/buku" class="hover:text-white transition-colors">Koleksi Buku</a></li>
                            <li><a href="/pinjam" class="hover:text-white transition-colors">Peminjaman</a></li>
                            <li><a href="/petugas" class="hover:text-white transition-colors">Petugas</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-white font-semibold mb-4">Kontak</h4>
                        <ul class="space-y-2 text-sm">
                            <li>Email: perpustakaan@example.com</li>
                            <li>Telp: (021) 1234-5678</li>
                            <li>Alamat: Jl. Pendidikan No. 123</li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-800 pt-8 text-center text-sm">
                    <p>© {{ date('Y') }} Sistem Perpustakaan. Powered by Laravel v{{ Illuminate\Foundation\Application::VERSION }}</p>
                </div>
            </div>
        </footer>

        <style>
            @keyframes blob {
                0% { transform: translate(0px, 0px) scale(1); }
                33% { transform: translate(30px, -50px) scale(1.1); }
                66% { transform: translate(-20px, 20px) scale(0.9); }
                100% { transform: translate(0px, 0px) scale(1); }
            }
            .animate-blob {
                animation: blob 7s infinite;
            }
            .animation-delay-2000 {
                animation-delay: 2s;
            }
            .animation-delay-4000 {
                animation-delay: 4s;
            }
        </style>
    </body>
</html>