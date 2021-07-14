<?php

namespace App\Imports;

use App\Model\Penilai;
use Maatwebsite\Excel\Concerns\ToModel;

class PenilaiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Penilai([
            'nama_penilai'  => $row[0],
            'nip'           => $row[1],
            'golongan'      => $row[2],
            'jabatan'       => $row[3],
            'unit_kerja'    => $row[4],
        ]);
    }
}
