<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;

    protected $table = 'tbl_pinjam';
    protected $primaryKey = 'id_pinjam';

    protected $fillable = [
        'id_siswa',
        'id_petugas',
        'waktu_pinjam',
    ];

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }

    // Relasi ke Petugas
    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas', 'id_petugas');
    }

    // Relasi ke Pinjamdetail (One to Many)
    public function detailpinjam()
    {
        return $this->hasMany(Pinjamdetail::class, 'id_pinjam', 'id_pinjam');
    }
}