<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $table = 'Peserta';
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
}
