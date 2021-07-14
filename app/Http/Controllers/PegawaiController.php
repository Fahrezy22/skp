<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Pegawai;
use App\Imports\PegawaiImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index()
    {
        $data =  Pegawai::all();
        return view('admin.pegawai', ['data' => $data]);
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

        Pegawai::create($request->all());
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
            'full_name'         => $request->full_name,
            'nip'               => $request->nip,
            'tempat_lahir'      => $request->tempat_lahir,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'pangkat'           => $request->pangkat,
            'golongan'          => $request->golongan,
            'jabatan'           => $request->jabatan,
            'alamat'            => $request->alamat,
            'no_hp'             => $request->no_hp,
            'unit_kerja'        => $request->unit_kerja,

        ];
        Pegawai::where(['id'=> $id])->update($data);
        return back()->with('success', 'Data berhasil di Edit');
    }

    public function import(Request $request)
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
        $import = Excel::import(new PegawaiImport(), storage_path('app/public/excel/'.$nama_file));

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
    
    public function destroy($id)
    {
        $penilai = Pegawai::find($id);
        $penilai->delete();
        return back()->with('success', 'Data berhasil di Hapus');
    }
}
