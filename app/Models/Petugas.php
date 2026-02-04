<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table = 'tbl_petugas';

    protected $primaryKey = 'id_petugas';

    protected $fillable = [
        'nip',
        'nama_petugas',
        'hp_petugas',
    ];
}