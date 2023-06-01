<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;
    protected $table = 'surat_masuk';
    protected $fillable = [
        'no_surat', 
        'dari', 
        'kepada', 
        'tanggal_surat',
        'tanggal_terima', 
        'perihal',
        'keterangan',
        'file',
        'id_klasifikasi',
        'user_id',
    ];

    protected $appends = [
        'formatted_tanggal_surat',
        'formatted_tanggal_terima',
        'formatted_created_at',
        'formatted_updated_at',
    ];
    
    //Mengubah format tanggal surat menjadi Hari, tanggal bulan tahun
    public function getFormattedTanggalSuratAttribute(): string {
        return Carbon::parse($this->tanggal_surat)->isoFormat('dddd, D MMMM YYYY');
    }

    //Mengubah format tanggal terima menjadi Hari, tanggal bulan tahun
    public function getFormattedTanggalTerimaAttribute(): string {
        return Carbon::parse($this->tanggal_terima)->isoFormat('dddd, D MMMM YYYY');
    }
    
    //Mengubah format tanggal created_at menjadi Hari, tanggal bulan tahun, jam menit detik
    public function getFormattedCreatedAtAttribute(): string {
        return $this->created_at->isoFormat('dddd, D MMMM YYYY, HH:mm:ss');
    }

    //Mengubah format tanggal updated_at menjadi Hari, tanggal bulan tahun, jam menit detik
    public function getFormattedUpdatedAtAttribute(): string {
        return $this->updated_at->isoFormat('dddd, D MMMM YYYY, HH:mm:ss');
    }

    //Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relasi ke disposisi
    public function dispositions()
    {
        return $this->hasMany(Disposition::class, 'surat_id', 'id');
    }
}
