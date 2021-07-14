<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table ='pegawai';
    protected $fillable =['full_name', 'nip','tempat_lahir','tanggal_lahir', 'jenis_kelamin','pangkat','golongan','jabatan','alamat','no_hp','unit_kerja'];
}
