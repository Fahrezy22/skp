<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">SKP</h3>
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
                            <td>{{ $d->jumlah_skp }}</td>
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
                    <a href="" class="btn btn-primary float-right">edit</a>
                @else
                    <a href="" class="btn btn-primary float-right">Tambah</a>
                @endif