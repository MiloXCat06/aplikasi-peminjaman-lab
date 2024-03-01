<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datariwayat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kelas',
        'nama_barang',
        'merk',
        'status'
    ];
}
