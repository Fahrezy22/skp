<?php

namespace App\Imports;

use App\Model\Atasan;
use Maatwebsite\Excel\Concerns\ToModel;

class AtasanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Atasan([
            'nama_atasan'  => $row[0],
            'nip'           => $row[1],
            'golongan'      => $row[2],
            'jabatan'       => $row[3],
            'unit_kerja'    => $row[4],
        ]);
    }
}
