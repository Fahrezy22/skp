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
                    @if ($msg = Session::get('status'))
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
                                <th>NIP Pegawai</th>
                                <th>Nama Penilai</th>
                                <th>Nama Atasan</th>
                                <th>Tanggal SKP</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($data['skp'] as $d)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$d->pegawai_rol->full_name}}</td>
                                    <td>{{$d->pegawai_rol->nip}}</td>
                                    <td>{{$d->penilai_rol->nama_penilai}}</td>
                                    <td>{{$d->atasan_rol->nama_atasan}}</td>
                                    <td>{{$d->tanggal_awal}} - {{$d->tanggal_batas}}</td>
                                    <td><a href="skp/detail/{{$d->id}}" class="btn btn-warning"><i class="fas fa-archive"></i></a></td>
                                    <td>
                                        <button id="btn_edit" data-id="{{$d->id}}" class="btn btn-warning"><i
                                                class="fas fa-edit"></i></button>
                                        <button id="btn_hapus" data-id="{{$d->id}}" class="btn btn-danger"><i
                                                class="fas fa-trash"></i></button>
                                    </td>
                                </tr>  
                            @endforeach      
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
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <form id="form-input" action="{{route('skp.store')}}" method="POST">
                @csrf
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
                            <select id="atasan_id" name="atasan_id" class="form-control" required>
                                <option selected disabled>Pilih</option>
                                @foreach ($data['atasan'] as $d)
                                <option value="{{$d->id}}">{{$d->nama_atasan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Jangka Waktu Penilaian</label>
                        <div class="col-md-4 col-sm-4 ">
                            <input id="tanggal_awal" required name="tanggal_awal" type="date" class="form-control">
                        </div>-
                        <div class="col-md-4 col-sm-4 ">
                            <input id="tanggal_batas" required name="tanggal_batas" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Skp</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="skp" required name="skp" type="text" class="form-control hitung2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Orientasi Pelayanan</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="orientasi_pelayanan" name="orientasi_pelayanan" type="number" class="form-control hitung">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Integritas</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="integritas" name="integritas" type="number" class="form-control hitung">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Komitmen</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="komitmen" name="komitmen" type="number" class="form-control hitung">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Disiplin</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="disiplin" name="disiplin" type="number" class="form-control hitung">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Kerjasama</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="kerjasama" name="kerjasama" type="number" class="form-control hitung">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Kepemimpinan</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="kepemimpinan" name="kepemimpinan" type="number" class="form-control hitung">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Jumlah SKP</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="jumlah_skp" required name="jumlah_skp" type="number" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Jumlah</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="jumlah_perilaku" required name="jumlah_perilaku" type="number" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Nilai Rata-Rata</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="nilai_rata_rata" required name="nilai_rata_rata" type="number" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Nilai Perilaku</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="nilai_perilaku" required name="nilai_perilaku" type="number" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 ">Nilai Prestasi</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="nilai_prestasi" required name="nilai_prestasi" type="number" class="form-control" readonly>
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
    var leg = 0;
    $(".hitung").each(function(){
            var get_textbox_value = $(this).val();
            var get_nn = $(this);
    
            if ($.isNumeric(get_textbox_value) && get_nn.val() != "") {
                rata_rata += parseFloat(get_textbox_value);
                leg++;  
                }                
    });
    var n = rata_rata / leg ;
    var pembulatan_nilai_rata_rata=n.toFixed(2);
    var a = $("#skp").val();
    var b = 60 / 100;
    var c = parseFloat(a) * b;
    var d = c.toFixed(2);
    var e = d + pembulatan_nilai_rata_rata;
    var f = 40 /100;
    var g = pembulatan_nilai_rata_rata * f;
    var h = g.toFixed(2);
    var i = parseFloat(h) + parseFloat(d);
    var j = i.toFixed(2);
    $("#jumlah_skp").val(d)
    $("#nilai_perilaku").val(h)
    $("#nilai_prestasi").val(j)
    $("#nilai_rata_rata").val(pembulatan_nilai_rata_rata)
    $("#jumlah_perilaku").val(rata_rata)
    }

    $(document).ready(function()
    {
        $(".hitung, #skp").keyup(function(){
                nilai_rata_rata();
        });
    }); 
        nilai_rata_rata();
</script>
@endsection
@section('js2')
<script>
    $(document).ready(function()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#batal').on('click' , function(){
            location.reload();
        });

        $('body').on('click','#btn_edit',function(){
            let dataId = $(this).data('id');
            $.get('skp/'+ dataId + '/edit',function(data){
                $('#univ-modal').modal('show');
                $('.modal-title').html('Edit data');
                $('#id').val(data.id);
                $('#pegawai_id').val(data.pegawai_id);
                $('#penilai_id').val(data.penilai_id);
                $('#atasan_id').val(data.atasan_id);
                $('#tanggal_awal').val(data.tanggal_awal);
                $('#tanggal_batas').val(data.tanggal_batas);
                $('#skp').val(data.skp);
                $('#orientasi_pelayanan').val(data.orientasi_pelayanan);
                $('#integritas').val(data.integritas);
                $('#kepemimpinan').val(data.kepemimpinan);
                $('#disiplin').val(data.disiplin);
                $('#komitmen').val(data.komitmen);
                $('#kerjasama').val(data.kerjasama);
                $('#jumlah_skp').val(data.jumlah_skp);
                $('#jumlah_perilaku').val(data.jumlah_perilaku);
                $('#nilai_rata_rata').val(data.nilai_rata_rata);
                $('#nilai_perilaku').val(data.nilai_perilaku);
                $('#nilai_prestasi').val(data.nilai_prestasi);
                $('#form-input').attr('action','{{route('skp.update')}}')
            });
        });
        $('body').on('click','#btn_hapus',function(){
            let dataId = $(this).data('id');
            $.get('skp/'+ dataId + '/edit',function(data){
                $('#univ-modal').modal('show');
                $('.modal-body').html('');
                $('.modal-body').append(`
                    <h3>Apakah anda yakin ingin menghapus data <strong>`+ data.pegawai_rol.full_name +`</strong></h3>
                    <input type="hidden" name="id" value="`+ data.id +`">
                `);
                $('#simpan').html('HAPUS');
                $('.modal-title').html('Hapus data');
                $('#form-input').attr('action','{{route('skp.destroy')}}')
            });
        });
    });
</script>
@endsection