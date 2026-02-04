<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'tbl_buku';
    protected $primaryKey = 'id_buku';

    protected $fillable = [
        'kode_buku',
        'judul',
        'id_penulis',
        'id_penerbit',
        'stok',
    ];

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'id_penulis', 'id_penulis');
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'id_penerbit', 'id_penerbit');
    }
}