<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanMakanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'nama_penyakit_id',
        'permitaan_makanan',
        'catatan',
        'tanggal_mulai',
        'tanggal_selesai',
        'total',
        'ttd',
        'created_by',
        'updated_by'
    ];


    public function namapenyakit() {
        return $this->belongsTo(NamaPenyakit::class);
    }

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function user() {
        return $this->hasMany(User::class);
    }
}
