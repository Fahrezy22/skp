<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\penilai;
use App\Model\Atasan;
use App\Imports\PenilaiImport;
use App\Imports\AtasanImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class PenilaiController extends Controller
{
    public function index()
    {
        $data = Penilai::all();
        $data2 = Atasan::all();
        
        return view('admin.penilai',[
            'data' => $data, 
            'data2' => $data2,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nip' => 'numeric'
        ], 
        [ 
            'nip.numeric' => 'Nip harus Berupa Angka'
        ]);
        // dd($request);

        Penilai::create($request->all());
        return back()->with('success', 'Data berhasil di Tambahkan');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nip' => 'numeric'
        ], 
        [ 
            'nip.numeric' => 'Nomor Hp harus Berupa Angka'
        ]);

        $data = [
            'nama_penilai'  => $request->nama_penilai,
            'nip'           => $request->nip,
            'golongan'      => $request->golongan,
            'jabatan'       => $request->jabatan,
            'unit_kerja'    => $request->unit_kerja,

        ];
        Penilai::where(['id'=> $id])->update($data);
        return back()->with('success', 'Data berhasil di Edit');
    }

    public function delete_penilai($id)
    {
        $penilai = Penilai::find($id);
        $penilai->delete();
        return back()->with('success', 'Data berhasil di Hapus');
    }

    public function add_atasan(Request $request)
    {
        $this->validate($request,[
            'nip' => 'numeric'
        ], 
        [ 
            'nip.numeric' => 'Nip harus Berupa Angka'
        ]);
        // dd($request);

        Atasan::create($request->all());
        return back()->with('success_a', 'Data berhasil di Tambahkan');
    }

    public function update_a(Request $request, $id)
    {
        $this->validate($request,[
            'nip' => 'numeric'
        ], 
        [ 
            'nip.numeric' => 'Nomor Hp harus Berupa Angka'
        ]);

        $data = [
            'nama_atasan'  => $request->nama_atasan,
            'nip'           => $request->nip,
            'golongan'      => $request->golongan,
            'jabatan'       => $request->jabatan,
            'unit_kerja'    => $request->unit_kerja,

        ];
        Atasan::where(['id'=> $id])->update($data);
        return back()->with('success_a', 'Data berhasil di Edit');
    }

    public function import_penilai(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/',$nama_file);

        // import data
        $import = Excel::import(new PenilaiImport(), storage_path('app/public/excel/'.$nama_file));

        //remove from server
        Storage::delete($path);

        if($import) {
            //redirect
            return back()->with('success', 'Data berhasil di Import');
        } else {
            //redirect
            return back()->with('error', 'Data Gagal di Import');
        }
    }

    public function import_atasan(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/',$nama_file);

        // import data
        $import = Excel::import(new AtasanImport(), storage_path('app/public/excel/'.$nama_file));

        //remove from server
        Storage::delete($path);

        if($import) {
            //redirect
            return back()->with('success_a', 'Data berhasil di Import');
        } else {
            //redirect
            return back()->with('error_a', 'Data Gagal di Import');
        }
    }

    public function massdel_p(Request $request)
    {
        $ids = $request->ids;
        Penilai::whereIn('id',$ids)->delete();
        return response()->json(['success'=>"Data Berhasil di Hapus"]);
        // Penilai::whereIn('.implode()')->delete();
        // return back()->with('success', 'Data yang di pilih berhasil di Hapus');
    }
}
