<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Atasan extends Model
{
    protected $table ='atasan_penilai';
    protected $fillable =['nama_atasan', 'nip','golongan','jabatan', 'unit_kerja'];
}
