<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $table = 'Peserta';
    protected $fillable = [
        'user_id',
        'nama',
        'lemdik_id',
        'opd_id',
        'bidang_id',
        'email',
        'jenis_id',
        'judul_proyek',
        'no_telp_peserta',
        'pembimbing_lemdik',
        'no_telp_pembimbing',
        'laporan_akhir',
        'sertifikat',
        'image',
    ];
    public $timestamps = false;

    public function opd()
    {
        return $this->belongsTo(Opd::class); //untuk memanggil data OPD
    }

    public function bidang()
    {
        return $this->belongsTo(Bidang::class); //untuk memanggil data bidang
    }

    public function lemdik()
    {
        return $this->belongsTo(Lemdik::class); //untuk memanggil data lemdik
    }

    public function jenis()
    {
        return $this->belongsTo(Jenis::class); //untuk memanggil data lemdik
    }
    public function catatan()
    {
        return $this->hasMany(Catatan::class);
    }
}
