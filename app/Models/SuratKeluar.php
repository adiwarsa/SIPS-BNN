<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;
    //Nama table
    protected $table = 'surat_keluar';
    //Inputan yang boleh masuk ke dalam database
    protected $fillable = [
        'no_surat',  
        'kepada', 
        'tanggal_surat',
        'sifat', 
        'kategori', 
        'hal',
        'isi',
        'isilain',
        'kesimpulan',
        'sebagai',
        'topik',
        'tanggal_pelaksanaan',
        'tempat',
        'mulai',
        'selesai',
        'user_id',
        'pegawai_id',
        'staff',
        'menimbang',
        'untuk',
        'dasar',
        'bidang',
        'type',
        'status',
    ];

    protected $appends = [
        'formatted_tanggal_surat',
        'formatted_tanggal_pelaksanaan',
        'formatted_created_at',
        'formatted_updated_at',
        'formatted_mulai',
        'formatted_selesai',
    ];

    //Mengubah format tanggal surat menjadi Hari, tanggal bulan tahun
    public function getFormattedTanggalSuratAttribute(): string {
        return Carbon::parse($this->tanggal_surat)->isoFormat('dddd, D MMMM YYYY');
    }

     //Mengubah format tanggal pelaksanaan surat menjadi Hari, tanggal bulan tahun
    public function getFormattedTanggalPelaksanaanAttribute(): string {
        return Carbon::parse($this->tanggal_pelaksanaan)->isoFormat('dddd, D MMMM YYYY');
    }

     //Mengubah format tanggal created_at menjadi Hari, tanggal bulan tahun, jam menit detik
    public function getFormattedCreatedAtAttribute(): string {
        return $this->created_at->isoFormat('dddd, D MMMM YYYY, HH:mm:ss');
    }

    //Mengubah format tanggal updated menjadi Hari, tanggal bulan tahun, jam menit detik
    public function getFormattedUpdatedAtAttribute(): string {
        return $this->updated_at->isoFormat('dddd, D MMMM YYYY, HH:mm:ss');
    }

    //Mengubah format tanggal mulai menjadi jam wita
    public function getFormattedMulaiAttribute(): string {
        return Carbon::parse($this->attributes['mulai'])->format('H:i').' Wita';
    }

    //Mengubah format tanggal selesai menjadi jam wita
    public function getFormattedSelesaiAttribute(): string {
        return Carbon::parse($this->attributes['selesai'])->format('H:i').' Wita';
    }

    //Relasi surat keluar kepada pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    //Relasi surat keluar kepada surat kepada
    public function suratkepada()
    {
        return $this->hasMany(SuratKepada::class, 'surat_id');
    }
}
