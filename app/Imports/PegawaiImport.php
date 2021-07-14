<?php

namespace App\Imports;

use App\Model\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;

class PegawaiImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pegawai([
            'full_name'     => $row[0],
            'nip'           => $row[1],
            'tempat_lahir'  => $row[2],
            'tanggal_lahir' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[3]),
            'jenis_kelamin' => $row[4],
            'pangkat'       => $row[5],
            'golongan'      => $row[6],
            'jabatan'       => $row[7],
            'alamat'        => $row[8],
            'no_hp'         => $row[9],
            'unit_kerja'    => $row[10],
        ]);
    }
}
