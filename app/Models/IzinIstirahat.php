<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinIstirahat extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'kejadian',
        'kontrol_kembali',
        'pengantar',
        'anamnesis',
        'tinggi_badan',
        'berat_badan',
        'suhu_badan',
        'tekanan_darah',
        'denyut_nadi',
        'laju_pernapasan',
        'saturasi',
        'status',
        'nama_penyakit_id',
        'sekunder',
        'terapi',
        'tindakan_id',
        'alkes',
        'pengguna',
        'keterangan',
        'nama_obat',
        'jumlah_obat',
        'aturan',
        'keterangan_obat',
        'catatan',
        'created_by',
        'updated_by'
    ];

    public function rumahsakitrujukan() {
        return $this->belongsTo(RumahSakitRujukan::class);
    }

    public function spesialisrujukan() {
        return $this->belongsTo(SpesialisRujukan::class);
    }
    
    public function tindakan() {
        return $this->belongsTo(Tindakan::class);
    }

    public function jenisobat() {
        return $this->belongsTo(JenisObat::class);
    }

    public function namaobat() {
        return $this->belongsTo(NamaObat::class);
    }

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
