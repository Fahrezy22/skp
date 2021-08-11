<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2 style="text-align: center">
        PENILAIAN CAPAIAN SASARAN KERJA PEGAWAI NEGERI SIPIL
    </h2>
    <p>Jangka Waktu Penilaian 02 januari s.d 31 desember 2019</p>
    <table border="1" style="border-collapse: collapse" width="100%">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Kegiatan Tugas Jabatan</th>
                <th rowspan="2">AK</th>
                <th colspan="4">Target</th>
                <th rowspan="2">AK</th>
                <th colspan="4">Realisasi</th>
                <th rowspan="2">Perhitungan</th>
                <th rowspan="2">Nilai Capaian</th>
            </tr>
            <tr>
                <th>Kuant/Output</th>
                <th>Kual/Mutu</th>
                <th>Waktu</th>
                <th>Biaya</th>
                <th>Kuant/Output</th>
                <th>Kual/Mutu</th>
                <th>Waktu</th>
                <th>Biaya</th>
            </tr>
            <tr style="height: 5px">
                <td style="text-align: center">1</td>
                <td style="text-align: center">2</td>
                <td style="text-align: center">3</td>
                <td style="text-align: center">4</td>
                <td style="text-align: center">5</td>
                <td style="text-align: center">6</td>
                <td style="text-align: center">7</td>
                <td style="text-align: center">8</td>
                <td style="text-align: center">9</td>
                <td style="text-align: center">10</td>
                <td style="text-align: center">11</td>
                <td style="text-align: center">12</td>
                <td style="text-align: center">13</td>
                <td style="text-align: center">14</td>
            </tr>
        </thead>
        <tbody>
            @php
                $no=1;
            @endphp
            @foreach ($data['detail'] as $d)
                <tr style="height: 40px">
                    <td style="text-align: center">{{$no++}}</td>
                    <td style="text-align: center">{{$d->ktj}}</td>
                    <td style="text-align: center">{{$d->ak}}</td>
                    <td style="text-align: center">{{$d->output}}</td>
                    <td style="text-align: center">{{$d->mutu}}</td>
                    <td style="text-align: center">{{$d->waktu}}</td>
                    @if ($d->biaya == "")
                                        <td style="text-align: center">-</td>
                                    @else
                                        <td>{{$d->biaya}}</td>
                                    @endif
                    <td style="text-align: center">{{$d->ak}}</td>
                    <td style="text-align: center">{{$d->output}}</td>
                    <td style="text-align: center">{{$d->mutu_realisasi}}</td>
                    <td style="text-align: center">{{$d->waktu}}</td>
                    @if ($d->biaya == "")
                                        <td style="text-align: center">-</td>
                                    @else
                                        <td>{{$d->biaya}}</td>
                                    @endif
                    <td style="text-align: center">{{$d->perhitungan}}</td>
                    <td style="text-align: center">{{$d->nilai_capaian}}</td>
                </tr>
            @endforeach
            <tr style="height: 40px">
                <td style="text-align: center">7</td>
                <td style="text-align: center">Total AK</td>
                <td style="text-align: center">{{$data['total']->total_ak}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center">{{$data['total']->total_ak}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th rowspan="2" colspan="13" style="text-align: center">
                    Nilai Capaian
                </th>
                <td style="text-align: center">{{$data['skp']->nilai_prestasi}}</td>
            </tr>
            <tr>
                <td style="text-align: center">
                @if ($data['skp']->nilai_prestasi <= 100 && $data['skp']->nilai_prestasi >= 90)
                        (sangat Baik)
                        @endif
                        @if ($data['skp']->nilai_prestasi <= 89 && $data['skp']->nilai_prestasi >= 80)
                            (Baik)
                            @else
                                -
                            @endif</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
