<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SKP</title>
    <style>
        table{
            border: 1px;border-spacing: 0;
        }
    </style>
</head>

<body>
    <table border="1" style="border-collapse:collapse;" width="100%" height="20000px">
        <thead>
            <tr>
                <th colspan="7" class="text-center">SKP</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th rowspan="11" style="vertical-align: text-top;">4.</th>
                <th colspan="5">Unsur yang di nilai</th>
                <th>Jumlah</th>
            </tr>
            <tr>
                <th colspan="5">a. sasaran Kinerja pegawai &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                    {{$data->skp}} &nbsp; &nbsp; &nbsp; &nbsp; x &nbsp; &nbsp; &nbsp; &nbsp; 60%</th>
                </th>
                <td>{{ number_format($data->jumlah_skp, 2) }}</td>
            </tr>
            <tr>
                <td rowspan="9" width="20%" class="align-middle">b. perilaku kerja</td>
                <td colspan="2">1. Orientasi Pelayanan</td>
                <td>{{$data->orientasi_pelayanan}}</td>
                <td>
                    @if ($data->orientasi_pelayanan <= 100 && $data->orientasi_pelayanan >= 90)
                        (sangat Baik)
                        @endif
                        @if ($data->orientasi_pelayanan <= 89 && $data->orientasi_pelayanan >= 80)
                            (Baik)
                            @else
                                -
                            @endif
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">2. Integritas</td>
                <td>{{$data->integritas}}</td>
                <td>
                    @if ($data->integritas <= 100 && $data->integritas >= 90)
                        (sangat Baik)
                        @endif
                        @if ($data->integritas <= 89 && $data->integritas >= 80)
                            (Baik)
                            @else
                                -
                            @endif
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">3. Komitmen</td>
                <td>{{$data->komitmen}}</td>
                <td>
                    @if ($data->komitmen <= 100 && $data->komitmen >= 90)
                        (sangat Baik)
                        @endif
                        @if ($data->komitmen <= 89 && $data->komitmen >= 80)
                            (Baik)
                            @else
                                -
                            @endif
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">4. Disiplin</td>
                <td>{{$data->disiplin}}</td>
                <td>
                    @if ($data->disiplin <= 100 && $data->disiplin >= 90)
                        (sangat Baik)
                        @endif
                        @if ($data->disiplin <= 89 && $data->disiplin >= 80)
                            (Baik)
                            @else
                                -
                            @endif
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">5. Kerjasama</td>
                <td>{{$data->kerjasama}}</td>
                <td>
                    @if ($data->kerjasama <= 100 && $data->kerjasama >= 90)
                        (sangat Baik)
                        @endif
                        @if ($data->kerjasama <= 89 && $data->kerjasama >= 80)
                            (Baik)
                            @else
                                -
                            @endif
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">6. Kepemimpinan</td>
                <td>{{$data->kepemimpinan}}</td>
                <td>
                    @if ($data->kepemimpinan <= 100 && $data->kepemimpinan >= 90)
                        (sangat Baik)
                        @endif
                        @if ($data->orientasi_pelayanan <= 89 && $data->orientasi_pelayanan >= 80)
                            (Baik)
                            @else
                                -
                            @endif
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">7. Jumlah</td>
                <td>{{$data->jumlah_perilaku}}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">8. Nilai Rata-Rata</td>
                <td>{{$data->nilai_rata_rata}}</td>
                <td>
                    @if ($data->nilai_rata_rata <= 100 && $data->nilai_rata_rata >= 90)
                        (sangat Baik)
                        @endif
                        @if ($data->nilai_rata_rata <= 89 && $data->nilai_rata_rata >= 80)
                            (Baik)
                            @else
                                -
                            @endif
                </td>
                <td></td>
            </tr>
            <tr>
                <th colspan="4">9. Nilai Perilaku  &nbsp; &nbsp;  &nbsp;{{$data->nilai_rata_rata}} &nbsp; &nbsp; x &nbsp;
                    40%</th>
                </th>
                <td>{{$data->nilai_perilaku}}</td>
            </tr>
            <tr>
                <th rowspan="2" colspan="6" class="align-middle text-center">NILAI PRESTASI KERJA</th>
                <td>{{$data->nilai_prestasi}}</td>
            </tr>
            <tr>
                <td>
                    @if ($data->nilai_prestasi <= 100 && $data->nilai_prestasi >= 90)
                        (sangat Baik)
                    @endif
                    @if ($data->nilai_prestasi <= 89 && $data->nilai_prestasi >= 80)
                        (Baik)
                    @else
                            -
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
