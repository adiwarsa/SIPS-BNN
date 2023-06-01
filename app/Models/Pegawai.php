<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $fillable = [
        'nama', 
        'nip', 
        'status',
        'jabatan', 
    ];

    //Relasi pegawai ke surat keluar
    public function suratkeluar()
    {
        return $this->hasMany(SuratKeluar::class);
    }

    //Relasi pegawai ke surat kepada
    public function suratkepada()
    {
        return $this->hasMany(SuratKepada::class);
    }
}
