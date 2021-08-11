@extends('layout.master')
@section('title')
Detail SKP
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">SKP</h3>
                @foreach ($data['skp'] as $d)
                    <a href="/export/{{$d->id}}" class="btn btn-secondary float-right"><i class="fas fa-print"></i></a>
                @endforeach
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="7" class="text-center">SKP</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['skp'] as $d)
                        <tr>
                            <th rowspan="11">4.</th>
                            <th colspan="5">Unsur yang di nilai</th>
                            <th>Jumlah</th>
                        </tr>
                        <tr>
                            <th colspan="5">a. sasaran Kinerja pegawai &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                {{$d->skp}} &nbsp; &nbsp; &nbsp; &nbsp; x &nbsp; &nbsp; &nbsp; &nbsp; 60%</th>
                            </th>
                            <td>{{ number_format($d->jumlah_skp, 2) }}</td>
                        </tr>
                        <tr>
                            <td rowspan="9" class="align-middle">b. perilaku kerja</td>
                            <td colspan="2">1. Orientasi Pelayanan</td>
                            <td>{{$d->orientasi_pelayanan}}</td>
                            <td>
                                @if ($d->orientasi_pelayanan <= 100 && $d->orientasi_pelayanan >= 90)
                                    (sangat Baik)
                                    @endif
                                    @if ($d->orientasi_pelayanan <= 89 && $d->orientasi_pelayanan >= 80)
                                        (Baik)
                                        @endif
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">2. Integritas</td>
                            <td>{{$d->integritas}}</td>
                            <td>
                                @if ($d->integritas <= 100 && $d->integritas >= 90)
                                    (sangat Baik)
                                    @endif
                                    @if ($d->integritas <= 89 && $d->integritas >= 80)
                                        (Baik)
                                        @endif
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">3. Komitmen</td>
                            <td>{{$d->komitmen}}</td>
                            <td>
                                @if ($d->komitmen <= 100 && $d->komitmen >= 90)
                                    (sangat Baik)
                                    @endif
                                    @if ($d->komitmen <= 89 && $d->komitmen >= 80)
                                        (Baik)
                                        @endif
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">4. Disiplin</td>
                            <td>{{$d->disiplin}}</td>
                            <td>
                                @if ($d->disiplin <= 100 && $d->disiplin >= 90)
                                    (sangat Baik)
                                    @endif
                                    @if ($d->disiplin <= 89 && $d->disiplin >= 80)
                                        (Baik)
                                        @endif
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">5. Kerjasama</td>
                            <td>{{$d->kerjasama}}</td>
                            <td>
                                @if ($d->kerjasama <= 100 && $d->kerjasama >= 90)
                                    (sangat Baik)
                                    @endif
                                    @if ($d->kerjasama <= 89 && $d->kerjasama >= 80)
                                        (Baik)
                                        @endif
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">6. Kepemimpinan</td>
                            <td>{{$d->kepemimpinan}}</td>
                            <td>
                                @if ($d->kepemimpinan <= 100 && $d->kepemimpinan >= 90)
                                    (sangat Baik)
                                    @endif
                                    @if ($d->orientasi_pelayanan <= 89 && $d->orientasi_pelayanan >= 80)
                                        (Baik)
                                        @endif
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">7. Jumlah</td>
                            <td>{{$d->jumlah_perilaku}}</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">8. Nilai Rata-Rata</td>
                            <td>{{$d->nilai_rata_rata}}</td>
                            <td>
                                @if ($d->nilai_rata_rata <= 100 && $d->nilai_rata_rata >= 90)
                                    (sangat Baik)
                                    @endif
                                    @if ($d->nilai_rata_rata <= 89 && $d->nilai_rata_rata >= 80)
                                        (Baik)
                                        @endif
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th colspan="4">9. Nilai Perilaku &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;{{$d->nilai_rata_rata}} &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; x &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                40%</th>
                            </th>
                            <td>{{$d->nilai_perilaku}}</td>
                        </tr>
                        <tr>
                            <th rowspan="2" colspan="6" class="align-middle text-center">NILAI PRESTASI KERJA</th>
                            <td>{{$d->nilai_prestasi}}</td>
                        </tr>
                        <tr>
                            <td>
                                @if ($d->nilai_prestasi <= 100 && $d->nilai_prestasi >= 90)
                                    (sangat Baik)
                                    @endif
                                    @if ($d->nilai_prestasi <= 89 && $d->nilai_prestasi >= 80)
                                        (Baik)
                                        @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

@if (count($data['detail']))
<div class="row edit">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail SKP</h3>
                <div class="float-right">
                    <button type="button" id="btn_edit" class="btn btn-primary ">edit</button>
                    @foreach ($data['skp'] as $d)
                        <a href="/detail/export/{{$d->id}}" class="btn btn-secondary"><i class="fas fa-print"></i></a>
                    @endforeach
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if ($msg = Session::get('status'))
                    <div class="alert alert-success">
                        <strong>{{ $msg }}</strong>
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead class="r">
                        <tr>
                            <th class="align-middle text-center">Kegiatan Tugas Jabatan</th>
                            <th class="align-middle text-center" style="width: 90px">AK</th>
                            <th class="align-middle text-center">Kuan/Output</th>
                            <th class="align-middle text-center">Waktu</th>
                            <th class="align-middle text-center">Biaya</th>
                            <th class="align-middle text-center">Kual/Mutu</th>
                            <th class="align-middle text-center" style="width: 100px">Perhitungan</th>
                            <th class="align-middle text-center" style="width: 90px">Nilai Capaian</th>
                        </tr>
                    </thead>
                    <tbody class="d">
                        @php
                            $no = 1;
                        @endphp
                            @foreach ($data['detail'] as $d)
                                <tr>
                                    <td>{{$d->ktj}}</td>
                                    <td>{{$d->ak}}</td>
                                    <td>{{$d->output}}</td>
                                    <td>{{$d->waktu}}</td>
                                    @if ($d->biaya == "")
                                        <td class="text-center">-</td>
                                    @else
                                        <td>{{$d->biaya}}</td>
                                    @endif
                                    <td>{{$d->mutu_realisasi}}</td>
                                    <td>{{$d->perhitungan}}</td>
                                    <td>{{$d->nilai_capaian}}</td>
                                    @foreach ($data['skp'] as $d)
                                        <input type="hidden" name="skp_id" value="{{$d->id}}">
                                    @endforeach
                                </tr>
                            @endforeach
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="align-middle text-center">Total AK</th>
                            <td class="e">{{ number_format($data['total']->total_ak, 2) }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th colspan="7" rowspan="3" class="align-middle text-center">Nilai Capaian SKP</th>
                        </tr>
                        <tr>
                            @foreach ($data['skp'] as $d)
                                <td>{{$d->nilai_prestasi}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>@if ($d->nilai_prestasi <= 100 && $d->nilai_prestasi >= 90)
                                (sangat Baik)
                                @endif
                                @if ($d->nilai_prestasi <= 89 && $d->nilai_prestasi >= 80)
                                    (Baik)
                                    @endif</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Detail</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{route('detail.store')}}" method="POST">
                    @csrf
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="align-middle text-center">Kegiatan Tugas Jabatan</th>
                                <th class="align-middle text-center" style="width: 90px">AK</th>
                                <th class="align-middle text-center">Kuan/Output</th>
                                <th class="align-middle text-center">Waktu</th>
                                <th class="align-middle text-center">Biaya</th>
                                <th class="align-middle text-center">Kual/Mutu</th>
                                <th class="align-middle text-center" style="width: 100px">Perhitungan</th>
                                <th class="align-middle text-center" style="width: 90px">Nilai Capaian</th>
                                <th><button type="button" class="btn btn-primary addRow"><i class="fas fa-plus"></i></button></th>
                            </tr>
                        </thead>
                        <tbody class="nganu">
                            @php
                                $no = 1;
                            @endphp
                                <tr>
                                    <td><input type="text" class="form-control form-control-border" name="ktj[]" placeholder="Isi Di sini ....."></td>
                                    <td><input type="text" class="form-control form-control-border ak" name="ak[]" placeholder="Isi Di sini ....."></td>
                                    <td><input type="text" class="form-control form-control-border" name="output[]" placeholder="Isi Di sini ....."></td>
                                    <td><input type="text" class="form-control form-control-border" name="waktu[]" placeholder="Isi Di sini ....."></td>
                                    <td><input type="text" class="form-control form-control-border" name="biaya[]" placeholder="Isi Di sini ....."></td>
                                    <td><input type="text" class="form-control form-control-border" name="mutu_realisasi[]" placeholder="Isi Di sini ....."></td>
                                    <td><input type="text" class="form-control form-control-border" name="perhitungan[]"></td>
                                    <td><input type="text" class="form-control form-control-border" name="nilai_capaian[]"></td>
                                    <td><button type="button" class="btn btn-danger remove"><i class="fas fa-trash"></i></button></td>
                                    <input type="hidden" name="mutu" value="100">
                                    @foreach ($data['skp'] as $d)
                                        <input type="hidden" name="skp_id" value="{{$d->id}}">
                                    @endforeach
                                </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="align-middle text-center">Total AK</th>
                                <td><input type="text" class="form-control form-control-border total" name="total_ak"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th colspan="8" rowspan="3" class="align-middle text-center">Nilai Capaian SKP</th>
                            </tr>
                            <tr>
                                @foreach ($data['skp'] as $d)
                                    <td>{{$d->nilai_prestasi}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>@if ($d->nilai_prestasi <= 100 && $d->nilai_prestasi >= 90)
                                    (sangat Baik)
                                    @endif
                                    @if ($d->nilai_prestasi <= 89 && $d->nilai_prestasi >= 80)
                                        (Baik)
                                        @endif</td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="card-footer clearfix">
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
@section('js')
    <script>
        $(document).on('click', '.addRow', function() {
            addRow();
        });
        function addRow()
        {
            var tr ='<tr>'+'<td><input type="text" class="form-control form-control-border" name="ktj[]" placeholder="Isi Di sini ....."></td><td><input type="text" class="form-control form-control-border ak" name="ak[]" placeholder="Isi Di sini ....."></td><td><input type="text" class="form-control form-control-border" name="output[]" placeholder="Isi Di sini ....."></td><td><input type="text" class="form-control form-control-border" name="waktu[]" placeholder="Isi Di sini ....."></td><td><input type="text" class="form-control form-control-border" name="biaya[]" placeholder="Isi Di sini ....."></td><td><input type="text" class="form-control form-control-border" name="mutu_realisasi[]" placeholder="Isi Di sini ....."></td><td><input type="text" class="form-control form-control-border" name="perhitungan[]"></td><td><input type="text" class="form-control form-control-border" name="nilai_capaian[]"></td><td><button type="button" class="btn btn-danger remove"><i class="fas fa-trash"></i></button></td>'+'</tr>';
            $('.nganu').append(tr);
        };
        $(document).on('click', '.remove', function() {
            $(this).parent().parent().remove();
        });

        $(document).on('keyup', '.ak', function() {
            total();
        });
        function total() {
            var total =0;
            $('.ak').each(function(i,e) {
                var ak = $(this).val()-0;
                total += ak;
            });
            var j = total.toFixed(2);
            $('.total').val(j);
        };

        $(document).on('click', '#btn_edit', function() {
            $('.edit').html('');
            $('.edit').append(
                '<div class="col-12"><div class="card"><div class="card-header"><h3 class="card-title">Edit Detail</h3></div><span class="badge badge-danger"> Harap Masukan Kembali Salah Satu AK</span><div class="card-body"><form action="{{route('detail.edit')}}" method="POST">@csrf<table class="table table-bordered"><thead><tr><th class="align-middle text-center">Kegiatan Tugas Jabatan</th><th class="align-middle text-center" style="width: 90px">AK</th><th class="align-middle text-center">Kuan/Output</th><th class="align-middle text-center">Waktu</th><th class="align-middle text-center">Biaya</th><th class="align-middle text-center">Kual/Mutu</th><th class="align-middle text-center" style="width: 100px">Perhitungan</th><th class="align-middle text-center" style="width: 90px">Nilai Capaian</th><th><button type="button" class="btn btn-primary addRow"><i class="fas fa-plus"></i></button></th></tr></thead><tbody class="nganu">@foreach ($data['detail'] as $d)<tr><td><input type="text" class="form-control form-control-border" name="ktj[]" value="{{$d->ktj}}"></td><td><input type="text" class="form-control form-control-border ak" name="ak[]" value="{{$d->ak}}"></td><td><input type="text" class="form-control form-control-border" name="output[]" value="{{$d->output}}"></td><td><input type="text" class="form-control form-control-border" name="waktu[]" value="{{$d->waktu}}"></td><td><input type="text" class="form-control form-control-border" name="biaya[]" value="{{$d->biaya}}"></td><td><input type="text" class="form-control form-control-border" name="mutu_realisasi[]" value="{{$d->mutu_realisasi}}"></td><td><input type="text" class="form-control form-control-border" name="perhitungan[]" value="{{$d->perhitungan}}"></td><td><input type="text" class="form-control form-control-border" name="nilai_capaian[]" value="{{$d->nilai_capaian}}"></td><td><button type="button" class="btn btn-danger remove"><i class="fas fa-trash"></i></button></td><input type="hidden" name="mutu" value="100"><input type="hidden" name="id[]" value="{{$d->id}}"><input type="hidden" name="skp_id" value="{{$d->skp_id}}"></tr>@endforeach</tbody><tfoot><tr><th class="align-middle text-center">Total AK</th><td><input type="text" class="form-control form-control-border total" name="total_ak"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr><th colspan="8" rowspan="3" class="align-middle text-center">Nilai Capaian SKP</th></tr><tr>@foreach ($data['skp'] as $d)<td>{{$d->nilai_prestasi}}</td>@endforeach</tr><tr><td>@if ($d->nilai_prestasi <= 100 && $d->nilai_prestasi >= 90)(sangat Baik)@endif @if ($d->nilai_prestasi <= 89 && $d->nilai_prestasi >= 80)(Baik)@endif</td></tr></tfoot></table><div class="card-footer clearfix"><button type="submit" class="btn btn-primary float-right">Simpan</button></div></form></div></div></div>'
            );
        });
    </script>
@endsection