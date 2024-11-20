<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $primaryKey = 'nomor_surat';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nomor_surat','judul','waktu_pengarsipan','file_surat', 'id_kategori'
    ];

    // Relasi many to one : Arsip punya satu kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
