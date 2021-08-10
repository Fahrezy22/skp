<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SkpModel extends Model
{
    protected $table = 'skp';
    protected $fillable =['id', 'tanggal_awal', 'tanggal_batas', 'orientasi_pelayanan','integritas','komitmen', 'disiplin', 'kerjasama', 'kepemimpinan', 'jumlah_perilaku', 'jumlah_skp', 'skp', 'nilai_rata_rata', 'nilai_prestasi', 'nilai_perilaku', 'pegawai_id', 'penilai_id', 'atasan_id', 'created_at', 'updated_at'];

    public function pegawai_rol()
    {
         return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
    public function penilai_rol()
    {
         return $this->belongsTo(Penilai::class, 'penilai_id');
    }
    public function atasan_rol()
    {
         return $this->belongsTo(Atasan::class, 'atasan_id');
    }
}
