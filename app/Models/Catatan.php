<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;
    protected $table = 'catatan';
    protected $fillable = ['tanggal', 'uraian_kegiatan'];
    public $timestamps = false;

    public function users(){
        return $this->belongsTo(User::class, 'peserta_id');
    }
    public function peserta(){
        return $this->belongsTo(Peserta::class, 'peserta_id');
    }
}
