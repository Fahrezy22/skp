@extends('layout.master')
@section('title')
    SKP
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Skp</h3>
                    <div class="float-right">
                        <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#univ-modal">Tambah</button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if ($msg = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $msg }}</strong>
                        </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                        </div>
                    @endif
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Pegawai</th>
                                <th>Nama Penilai</th>
                                <th>Nama Atasan</th>
                                <th>Orientasi Pelayanan</th>
                                <th>Integritas</th>
                                <th>Komitmen</th>
                                <th>disiplin</th>
                                <th>Kerjasama</th>
                                <th>Kepemimpinan</th>
                                <th>Jumlah</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            {{-- @foreach ($data as $d) --}}
                                <tr>
                                    {{-- <td>{{$no++}}</td>
                                    <td>{{$d->full_name}}</td>
                                    <td>{{$d->nip}}</td>
                                    <td>{{$d->tempat_lahir}}</td>
                                    <td>{{$d->tanggal_lahir}}</td>
                                    <td></td>
                                    <td>{{$d->alamat}}</td>
                                    <td>{{$d->pangkat}}</td>
                                    <td>{{$d->golongan}}</td>
                                    <td>{{$d->jabatan}}</td>
                                    <td>{{$d->no_hp}}</td>
                                    <td>{{$d->unit_kerja}}</td> --}}
                                    {{-- <td>
                                        <button type="button" class="btn btn-warning mb-2" data-toggle="modal" data-target="#editModal-{{ $d->id }}"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#deleteModal-{{ $d->id }}"><i class="fas fa-trash"></i></button>
                                    </td> --}}
                                </tr>  
                            {{-- @endforeach       --}}
                        </tbody>
                    </table>
                </div>
            <!-- /.card-body -->
            </div>
        </div>
    </div>

<div id="univ-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kasus Kriminalitas</h4>
            </div>
            <form id="form-input" action="" method="POST">
                @csrf
                <input type="hidden" value="87.19" id="skp">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Nama Pegawai</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="hidden" name="id" id="id">
                            <select id="pegawai_id" name="pegawai_id" class="form-control" required>
                                <option selected disabled>Pilih</option>
                                @foreach ($data['pegawai'] as $d)
                                <option value="{{$d->id}}">{{$d->full_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Nama Penilai</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="hidden" name="id" id="id">
                            <select id="penilai_id" name="penilai_id" class="form-control" required>
                                <option selected disabled>Pilih</option>
                                @foreach ($data['penilai'] as $d)
                                <option value="{{$d->id}}">{{$d->nama_penilai}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Nama Atasan</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="hidden" name="id" id="id">
                            <select id="atasan_id" name="atasan_id" class="form-control" required>
                                <option selected disabled>Pilih</option>
                                @foreach ($data['atasan'] as $d)
                                <option value="{{$d->id}}">{{$d->nama_atasan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Tanggal SKP</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="tanggal_skp" required name="tanggal_skp" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Orientasi Pelayanan</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="orientasi_pelayanan" required name="orientasi_pelayanan" type="number" class="form-control hitung">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Integritas</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="integritas" required name="integritas" type="number" class="form-control hitung">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Komitmen</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="komitmen" required name="komitmen" type="number" class="form-control hitung">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Disiplin</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="disiplin" required name="disiplin" type="number" class="form-control hitung">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Kerjasama</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="kerjasama" required name="kerjasama" type="number" class="form-control hitung">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Kepemimpinan</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="kepemimpinan" required name="kepemimpinan" type="number" class="form-control hitung">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Jumlah</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="jumlah_perilaku" required name="jumlah_perilaku" type="number" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Nilai</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="nilai_perilaku" required name="nilai_perilaku" type="number" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="batal" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                    <button type="submit" id="simpan" class="btn btn-primary">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    function nilai_rata_rata(){
    var rata_rata = 0;
    $(".hitung").each(function(){
            var get_textbox_value = $(this).val();
    
            if ($.isNumeric(get_textbox_value)) {
                rata_rata += parseFloat(get_textbox_value);
                }                
    });
    var n = rata_rata / $(".hitung").length;
    var pembulatan_nilai_rata_rata=n.toFixed(2);
    $("#nilai_perilaku").val(pembulatan_nilai_rata_rata)
    $("#jumlah_perilaku").val(rata_rata)
    }

    $(document).ready(function(){
        $(".hitung").keyup(function(){
            nilai_rata_rata();
        });
    }); 
        nilai_rata_rata();
</script>
@endsection