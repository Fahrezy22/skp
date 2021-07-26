<?php

namespace App\Http\Controllers;

use App\Model\Pegawai;
use App\Model\Atasan;
use App\Model\Penilai;
use App\Model\SkpModel;

use Illuminate\Http\Request;

class SkpController extends Controller
{
    public function index()
    {
        $data =  array(
           'skp' => SkpModel::all(),
           'pegawai' => Pegawai::all(),
           'penilai' => Penilai::all(),
           'atasan' => Atasan::all(),
        );
        return view('admin.skp', ['data' => $data]);
    }
}
