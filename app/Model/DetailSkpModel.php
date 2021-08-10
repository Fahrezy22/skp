<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DetailSkpModel extends Model
{
    protected $table = 'detail_skp';
    protected $fillable =['id', 'ktj', 'ak', 'output', 'mutu', 'waktu', 'biaya', 'mutu_realisasi', 'total_ak', 'perhitungan', 'nilai_capaian', 'skp_id', 'created_at', 'updated_at'];

    public function skp_rol()
    {
         return $this->belongsTo(Pegawai::class, 'skp_id');
    }
}
