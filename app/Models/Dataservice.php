<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataservice extends Model
{
    use HasFactory;

    protected $fillable = [
        'Kerusakan',
        'Deskripsi',
        'Tanggal_service',
        'Selesai_service',
        'Teknisi',
        'Biaya',
        'databarang_id'
    ];

    public function databarang() 
    {
        return $this->belongsTo(databarang::class);
    }
}
