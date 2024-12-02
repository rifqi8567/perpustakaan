<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class createbuku extends Model
{
    /** @use HasFactory<\Database\Factories\CreatebukuFactory> */
    use HasFactory;

    protected $fillable = [
        'judul_buku',
        'nama_penerbit',
        'tahun_diterbitkan',
        'jumlah_halaman',
        'upload_file',
        'upload_gambar'
    ];
}
