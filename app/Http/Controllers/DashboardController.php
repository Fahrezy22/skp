<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Pegawai;
use App\Model\Atasan;
use App\Model\Penilai;
use App\Model\SkpModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $date = Carbon::now()->format('Y');
        $data = array(
            'pegawai' => Pegawai::count(),
            'penilai' => Penilai::count(),
            'atasan' => Atasan::count(),
            'skp' =>  SkpModel::with('pegawai_rol', 'penilai_rol', 'atasan_rol')
                ->get(),
        );
        return view('admin.dashboard')->with('data' , $data);
    }

    public function search(Request $request)
    {
        $from = $request->start;
        $to = $request->end;

        $data  = array(
            'skp' => SkpModel::whereYear('tanggal_awal', '>=', $from)
            ->whereYear('tanggal_batas', '<=', $to)->with('pegawai_rol', 'penilai_rol', 'atasan_rol')
            ->get(),
            'tanggal' => SkpModel::whereYear('tanggal_awal', '>=', $from)
            ->whereYear('tanggal_batas', '<=', $to)->with('pegawai_rol', 'penilai_rol', 'atasan_rol')
            ->first(),
            
        );
        return view('skp.search')->with('data' , $data);
    }
}
