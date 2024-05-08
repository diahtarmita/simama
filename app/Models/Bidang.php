<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;
    protected $table = "bidang";
    public $timestamps = false;
    protected $fillable = ['id', 'nama'];

    public function opd()
    {
        return $this->belongsTo(Opd::class); //untuk memanggil data OPD
    }
}
