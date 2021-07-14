<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Penilai extends Model
{
    protected $table ='penilai';
    protected $fillable =['nama_penilai', 'nip','golongan','jabatan', 'unit_kerja'];
}
