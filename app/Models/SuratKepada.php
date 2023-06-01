<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKepada extends Model
{
    use HasFactory;

    protected $table = 'kepada_surat';
    protected $fillable = [
        'surat_id',
        'pegawai_id',
    ];

    //Relasi ke suratkeluar
    public function suratkeluar()
    {
        return $this->belongsTo(SuratKeluar::class);
    }

    //Relasi ke pegawai
    public function pegawai()
    {
        return $this->hasOne(Pegawai::class, 'id', 'pegawai_id');
    }
}
