<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // Nama tabel (karena nama tabel kamu bukan 'siswas')
    protected $table = 'tbl_siswa';

    // Primary key (jika bukan 'id')
    protected $primaryKey = 'nis';

    // Jika primary key bukan auto increment
    public $incrementing = false;

    // Kolom yang boleh diisi mass assignment
    protected $fillable = [
        'nis',
        'nama',
        'kelas',
        'alamat',
        'hp'
    ];

    // Jika tidak pakai timestamps (created_at, updated_at)
    public $timestamps = false;
}