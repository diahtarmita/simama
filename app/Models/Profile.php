<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'lembaga_pendidikan',
        'opd',
        'bidang',
        'judul_proyek',
        'no_telepon',
        'nama_pembimbing',
        'no_telepon_pembimbing',
        'laporan_akhir',
        'sertifikat',
    ];

    // Disarankan untuk menambahkan relasi-relasi model di sini jika diperlukan
}
