# 📚 Sistem Perpustakaan Digital

Sistem manajemen perpustakaan berbasis web menggunakan Laravel 11 dengan Eloquent ORM dan Blade Template.

## 🎯 Deskripsi

Aplikasi CRUD (Create, Read, Update, Delete) untuk mengelola perpustakaan digital dengan fitur:
- Manajemen data siswa/anggota
- Manajemen data petugas
- Manajemen katalog buku (penerbit & penulis)
- Sistem peminjaman dan pengembalian buku
- Stock management otomatis

## 🛠️ Teknologi yang Digunakan

- **Framework**: Laravel 11
- **Database**: MySQL
- **ORM**: Eloquent
- **Template Engine**: Blade
- **CSS Framework**: Tailwind CSS
- **PHP Version**: 8.2+

## 📋 Fitur Utama

### 1. Master Data
- ✅ CRUD Siswa (NIS, Nama, Kelas, Alamat, HP)
- ✅ CRUD Petugas (NIP, Nama, HP)
- ✅ CRUD Penerbit (Nama Penerbit, Kota, ISBN)
- ✅ CRUD Penulis (Nama Penulis, HP)
- ✅ CRUD Buku (Kode Buku, Judul, Stok, Penerbit, Penulis)

### 2. Transaksi
- ✅ Peminjaman Buku (Multiple selection)
- ✅ Detail Peminjaman
- ✅ Pengembalian Buku
- ✅ Auto Stock Management

### 3. Relasi Database
- Eloquent Relationships (hasMany, belongsTo)
- Foreign Key Constraints
- Database Transactions

## 📁 Struktur Database

```
tbl_siswa (id_siswa, nis, nama, kelas, alamat, hp)
tbl_petugas (id_petugas, nip, nama_petugas, hp_petugas)
tbl_penerbit (id_penerbit, nama_penerbit, kota, ISBN)
tbl_penulis (id_penulis, nama_penulis, hp_penulis)
tbl_buku (id_buku, kode_buku, judul, stok, id_penerbit, id_penulis)
tbl_pinjam (id_pinjam, id_siswa, id_petugas, waktu_pinjam)
tbl_pinjamdetail (id_pinjamdetail, id_pinjam, id_buku)
```

## 🚀 Cara Instalasi

### Prerequisites
- PHP >= 8.2
- Composer
- MySQL
- Node.js & NPM

### Langkah Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/username/sistem-perpustakaan.git
   cd sistem-perpustakaan
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi database** di file `.env`
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=perpustakaan
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Jalankan migration**
   ```bash
   php artisan migrate
   ```

6. **Jalankan seeder** (opsional - untuk data dummy)
   ```bash
   php artisan db:seed
   ```

7. **Compile assets**
   ```bash
   npm run dev
   ```

8. **Jalankan server**
   ```bash
   php artisan serve
   ```

9. **Buka browser**
   ```
   http://localhost:8000
   ```

## 📂 Struktur Folder

```
app/
├── Http/
│   └── Controllers/
│       ├── SiswaController.php
│       ├── PetugasController.php
│       ├── BukuController.php
│       ├── PenerbitController.php
│       ├── PenulisController.php
│       └── PinjamController.php
└── Models/
    ├── Siswa.php
    ├── Petugas.php
    ├── Buku.php
    ├── Penerbit.php
    ├── Penulis.php
    ├── Pinjam.php
    └── PinjamDetail.php

database/
├── migrations/
│   └── xxxx_create_complete_library_tables.php
└── seeders/
    ├── SiswaSeeder.php
    ├── PetugasSeeder.php
    └── BukuSeeder.php

resources/
└── views/
    ├── layouts/
    │   └── app.blade.php
    ├── siswa/
    │   ├── index.blade.php
    │   ├── tambah.blade.php
    │   └── edit.blade.php
    ├── petugas/
    ├── buku/
    ├── penerbit/
    ├── penulis/
    ├── pinjam/
    └── welcome.blade.php
```

## 🎨 Screenshots

### Halaman Home
![Home](https://freeimage.host/i/fteEZ3Q)

### Daftar Siswa
![Siswa](screenshots/siswa.png)

### Form Peminjaman
![Pinjam](screenshots/pinjam.png)

### Database Structure
![Database](screenshots/database.png)

## 🔧 Penggunaan

### CRUD Siswa
```php
// Create
Siswa::create([
    'nis' => '12345',
    'nama' => 'John Doe',
    'kelas' => '12 IPA 1',
    'alamat' => 'Jl. Example',
    'hp' => '081234567890'
]);

// Read
$siswa = Siswa::all();
$siswa = Siswa::find($id);

// Update
$siswa->update(['nama' => 'Jane Doe']);

// Delete
$siswa->delete();
```

### Relasi Eloquent
```php
// Ambil buku dengan penerbit & penulis
$buku = Buku::with(['penerbit', 'penulis'])->get();

// Ambil peminjaman dengan detail siswa & petugas
$pinjam = Pinjam::with(['siswa', 'petugas', 'detail.buku'])->get();
```

## 📝 Routes

```php
// Siswa
GET  /siswa              // Index
GET  /siswa/tambah       // Form Create
POST /siswa/store        // Store
GET  /siswa/edit/{id}    // Form Edit
POST /siswa/update       // Update
GET  /siswa/hapus/{id}   // Delete

// Petugas, Buku, Penerbit, Penulis (sama seperti di atas)

// Peminjaman
GET  /pinjam              // Index
GET  /pinjam/tambah       // Form Create
POST /pinjam/store        // Store (multiple books)
GET  /pinjam/detail/{id}  // Detail
GET  /pinjam/hapus/{id}   // Return (kembalikan buku)
```

## ✨ Fitur Unggulan

1. **Auto Stock Management**
   - Stok berkurang otomatis saat peminjaman
   - Stok kembali otomatis saat pengembalian

2. **Multiple Book Selection**
   - Pinjam beberapa buku sekaligus dalam 1 transaksi

3. **Database Transactions**
   - Semua operasi peminjaman menggunakan transaction
   - Rollback otomatis jika ada error

4. **Modern UI/UX**
   - Responsive design dengan Tailwind CSS
   - Smooth animations dan hover effects
   - User-friendly interface

5. **Eloquent Relationships**
   - Lazy loading & eager loading
   - Clean & readable code

## 👨‍💻 Author

**[NAMA KAMU]**
- NIS/NIM: [NIS/NIM KAMU]
- Kelas: [KELAS KAMU]
- Email: [EMAIL KAMU]

## 📄 License

This project is open-sourced for educational purposes.

## 🙏 Acknowledgments

- Laravel Documentation
- Tailwind CSS
- Eloquent ORM
- Blade Template Engine

---

⭐ **Jika project ini membantu, berikan star!** ⭐
