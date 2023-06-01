<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;
    protected $table = 'disposisi';
    protected $fillable = [
        'kepada', 
        'tenggat',
        'disposisi_kbnn',
        'disposisi_kabid',
        'status',
        'surat_id',
        'user_id',
    ];
    protected $appends = [
        'formatted_tenggat',
    ];

    //mengubah format data tenggat
    public function getFormattedTenggatAttribute(): string {
        return Carbon::parse($this->tenggat)->isoFormat('dddd, D MMMM YYYY');
    }
    
    //Relasi disposisi ke table User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relasi disposisi ke table surat masuk
    public function suratmasuks()
    {
        return $this->belongsTo(SuratMasuk::class, 'surat_id', 'id');
    }
}
