@extends('layout.master')
@section('title')
Hasil
@endsection
@section('header')<a class="btn" href="{{route('dashboard')}}"><i class="fas fa-arrow-left"></i></a>
hasil Pencarian
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title col-md-3">Data SKP Tahun 
                        {{ \Carbon\Carbon::parse($data['tanggal']->tanggal_awal)->format('Y')}}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example3" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="align-middle text-center">#</th>
                            <th style="align-middle text-center">NIP</th>
                            <th style="align-middle text-center">Nama Pegawai</th>
                            <th style="align-middle text-center">Jabatan</th>
                            <th style="align-middle text-center">ODP</th>
                            <th style="align-middle text-center">Nama Atasan Pejabat Penilai</th>
                            <th style="align-middle text-center">NIP Atasan Pejabat Penilai</th>
                            <th style="align-middle text-center">Nama Pejabat Penilai</th>
                            <th style="align-middle text-center">NIP Pejabat Penilai</th>
                            <th style="align-middle text-center">Tahun</th>
                            <th style="align-middle text-center">Nilai Capaian SKP</th>
                            <th style="align-middle text-center">Orientasi Pelayanan</th>
                            <th style="align-middle text-center">Integritas</th>
                            <th style="align-middle text-center">Komitmen</th>
                            <th style="align-middle text-center">Disiplin</th>
                            <th style="align-middle text-center">Kerjasama</th>
                            <th style="align-middle text-center">Kepemimpinan</th>
                            <th style="align-middle text-center">Jumlah SKP</th>
                            <th style="align-middle text-center">Nilai Rata-Rata</th>
                            <th style="align-middle text-center">Nilai Perilaku</th>
                            <th style="align-middle text-center">Total Nilai SKP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no=1;
                        @endphp
                        @foreach ($data['skp'] as $d)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$d->pegawai_rol->nip}}</td>
                            <td>{{$d->pegawai_rol->full_name}}</td>
                            <td>{{$d->pegawai_rol->jabatan}}</td>
                            <td>{{$d->pegawai_rol->unit_kerja}}</td>
                            <td>{{$d->atasan_rol->nama_atasan}}</td>
                            <td>{{$d->atasan_rol->nip}}</td>
                            <td>{{$d->penilai_rol->nama_penilai}}</td>
                            <td>{{$d->penilai_rol->nip}}</td>
                            <td>{{ \Carbon\Carbon::parse($d->tanggal_awal)->format('Y')}}</td>
                            <td>{{ $d->skp }}</td>
                            <td>{{ $d->orientasi_pelayanan }}</td>
                            <td>{{ $d->integritas }}</td>
                            <td>{{ $d->komitmen }}</td>
                            <td>{{ $d->disiplin }}</td>
                            <td>{{ $d->kerjasama }}</td>
                            <td>{{ $d->kepemimpinan }}</td>
                            <td>{{ number_format($d->jumlah_skp, 2) }}</td>
                            <td>{{ $d->nilai_rata_rata }}</td>
                            <td>{{ $d->nilai_perilaku }}</td>
                            <td>{{ $d->nilai_prestasi }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
