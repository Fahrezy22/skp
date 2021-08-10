<?php

namespace App\Http\Controllers;

use App\Model\Pegawai;
use App\Model\Atasan;
use App\Model\Penilai;
use App\Model\SkpModel;
use App\Model\DetailSkpModel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SkpController extends Controller
{
    public function index()
    {
        $data =  array(
           'skp' => SkpModel::with('pegawai_rol', 'penilai_rol', 'atasan_rol')->get(),
           'pegawai' => Pegawai::all(),
           'penilai' => Penilai::all(),
           'atasan' => Atasan::all(),
        );
        return view('admin.skp', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $rules = [
            "pegawai_id" => "required"
        ];
        $message = [
            'required' => 'Field harus diisi'
        ];
        $this->validate($request, $rules, $message);
        $date = Carbon::now();
        // dd($request);
        $data = array(
            'pegawai_id'            => $request->pegawai_id,
            'pegawai_id'            => $request->pegawai_id,
            'penilai_id'            => $request->penilai_id,
            'atasan_id'             => $request->atasan_id,
            'tanggal_awal'          => $request->tanggal_awal,
            'tanggal_batas'         => $request->tanggal_batas,
            'skp'                   => $request->skp,
            'jumlah_skp'            => $request->jumlah_skp,
            'orientasi_pelayanan'   => $request->orientasi_pelayanan,
            'integritas'            => $request->integritas,
            'kerjasama'             => $request->kerjasama,
            'disiplin'              => $request->disiplin,
            'komitmen'              => $request->komitmen,
            'kepemimpinan'          => $request->kepemimpinan,
            'jumlah_perilaku'       => $request->jumlah_perilaku,
            'nilai_rata_rata'       => $request->nilai_rata_rata,
            'nilai_perilaku'        => $request->nilai_perilaku,
            'nilai_prestasi'        => $request->nilai_prestasi,
            'created_at'            => $date,
            'updated_at'            => $date,
        );
        DB::table('skp')->insert($data);
        return redirect()->back()->with('status', 'Data tersimpan');
    }

    public function edit($id)
    {
        $respon = SkpModel::where('id',$id)
            ->with('pegawai_rol', 'penilai_rol', 'atasan_rol')->first();
        return response()->json($respon);
    }

    public function update(Request $request)
    {
        $rules = [
            "pegawai_id" => "required"
        ];
        $message = [
            'required' => 'Field harus diisi'
        ];
        $this->validate($request, $rules, $message);
        $date = Carbon::now();
        $id = $request->id;
        $data = array(
            'pegawai_id'            => $request->pegawai_id,
            'pegawai_id'            => $request->pegawai_id,
            'penilai_id'            => $request->penilai_id,
            'atasan_id'             => $request->atasan_id,
            'tanggal_awal'          => $request->tanggal_awal,
            'tanggal_batas'         => $request->tanggal_batas,
            'skp'                   => $request->skp,
            'jumlah_skp'            => $request->jumlah_skp,
            'orientasi_pelayanan'   => $request->orientasi_pelayanan,
            'integritas'            => $request->integritas,
            'kerjasama'             => $request->kerjasama,
            'disiplin'              => $request->disiplin,
            'komitmen'              => $request->komitmen,
            'kepemimpinan'          => $request->kepemimpinan,
            'jumlah_perilaku'       => $request->jumlah_perilaku,
            'nilai_rata_rata'       => $request->nilai_rata_rata,
            'nilai_perilaku'        => $request->nilai_perilaku,
            'nilai_prestasi'        => $request->nilai_prestasi,
            'updated_at'            => $date,
        );
        SkpModel::where('id',$id)->update($data);
        return redirect()->back()->with('status','Data berhasil di perbaharui');
    }

    public function destroy(Request $request)
    {
        SkpModel::where('id', $request->id)->delete();
        return redirect()->back()->with('status','Data berhasil dihapus');
    }

    public function detail($id)
    {
        $data = array(
            'skp' => SkpModel::where('id',$id)->with('pegawai_rol', 'penilai_rol', 'atasan_rol')->get(),
            'detail' => DetailSkpModel::where('skp_id',$id)->with('skp_rol')->get(),
            'total' => DetailSkpModel::where('skp_id',$id)->with('skp_rol')->first(),
        );
        return view('skp.detail')->with('data' ,$data);
    }

    public function detail_store(Request $request)
    {
        $date = Carbon::now();
        $data = $request->all();
        $kondisi = $data['ktj'];
        $skp = $request->skp_id;
        $data2 = [];
        // dd($data);
            foreach ($kondisi as $item => $value) {
                $data2[] = array(
                    'ktj' => $data['ktj'][$item],
                    'ak' => $data['ak'][$item],
                    'output' => $data['output'][$item],
                    'mutu' => $data['mutu'],
                    'waktu' => $data['waktu'][$item],
                    'biaya' => $data['biaya'][$item],
                    'mutu_realisasi' => $data['mutu_realisasi'][$item],
                    'total_ak' => $data['total_ak'],
                    'perhitungan' => $data['perhitungan'][$item],
                    'nilai_capaian' => $data['nilai_capaian'][$item],
                    'skp_id' => $skp,
                    'created_at' => $date,
                    'updated_at' => $date,
                );
            }
            DB::table('detail_skp')->insert($data2);
            return redirect()->back()->with('status', 'Data tersimpan');
            // dd($data2); 
    }

    public function detail_edit(Request $request)
    {
        $date = Carbon::now();
        $data = $request->all();
        $kondisi = $data['ktj'];
        $ids = $data['id'];
        $skp = $request->skp_id;
        // $data2 = [];
        $anu = [];
        // dd($ids);
            foreach ($kondisi as $item => $value) {
                $anu = $data['id'][$item];
                $data2 = array(
                    'ktj' => $data['ktj'][$item],
                    'ak' => $data['ak'][$item],
                    'output' => $data['output'][$item],
                    'mutu' => $data['mutu'],
                    'waktu' => $data['waktu'][$item],
                    'biaya' => $data['biaya'][$item],
                    'mutu_realisasi' => $data['mutu_realisasi'][$item],
                    'total_ak' => $data['total_ak'],
                    'perhitungan' => $data['perhitungan'][$item],
                    'nilai_capaian' => $data['nilai_capaian'][$item],
                    'skp_id' => $skp,
                    'updated_at' => $date,
                );
                $dbazar=DetailSkpModel::where('id',$request->id[$item])->first();
                $dbazar->update($data2);
            }
            // dd($dbazar);
            // DB::table('detail_skp')->where('id',$dbazar)->update($data2);
            return redirect()->back()->with('status', 'Data tersimpan');
            dd($data2); 
    }
}