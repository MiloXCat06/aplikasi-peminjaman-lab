<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Databarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'merk',
        'dataruang_id'
    ];

    public function dataruang() 
    {
        return $this->belongsTo(dataruang::class);
    }
}
