@extends('layout.master')
@section('title')
    Pegawai
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Pegawai</h3>
                <div class="float-right">
                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#add">Tambah</button>
                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#import">Import</button>
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
                            <th>NIP</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Pangkat</th>
                            <th>Golongan</th>
                            <th>Jabatan</th>
                            <th>Nomor Hp</th>
                            <th>Unit Kerja</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($data as $d)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$d->full_name}}</td>
                                <td>{{$d->nip}}</td>
                                <td>{{$d->tempat_lahir}}</td>
                                <td>{{$d->tanggal_lahir}}</td>
                                <td>
                                    @if ($d->jenis_kelamin == 'L')
                                        Laki-Laki
                                    @endif
                                    @if ($d->jenis_kelamin == 'P')
                                        Perempuan
                                    @endif
                                </td>
                                <td>{{$d->alamat}}</td>
                                <td>{{$d->pangkat}}</td>
                                <td>{{$d->golongan}}</td>
                                <td>{{$d->jabatan}}</td>
                                <td>{{$d->no_hp}}</td>
                                <td>{{$d->unit_kerja}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning mb-2" data-toggle="modal" data-target="#editModal-{{ $d->id }}"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#deleteModal-{{ $d->id }}"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>  
                        @endforeach      
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama Pegawai</th>
                            <th>NIP</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Pangkat</th>
                            <th>Golongan</th>
                            <th>Jabatan</th>
                            <th>No_hp</th>
                            <th>Unit Kerja</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        <!-- /.card-body -->
        </div>
    </div>
</div>

{{-- modal tambah --}}
<form action="{{route('pegawai')}}" method="POST">
    @csrf
    <div class="modal fade" id="add" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pegwai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="text" class="form-control" name="full_name" placeholder="Nama Pegawai" required>
                </div>
            
                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" class="form-control" name="nip" placeholder="NIP" required>
                </div>

                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" required>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" class="form-control">
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                </div>

                <div class="form-group">
                    <label>Pangkat</label>
                    <input type="text" class="form-control" name="pangkat" placeholder="Pangkat" required>
                </div>

                <div class="form-group">
                    <label>Golongan</label>
                    <input type="text" class="form-control" name="golongan" placeholder="Golongan" required>
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" placeholder="Jabatan" required>
                </div>

                <div class="form-group">
                    <label>No Hp</label>
                    <input type="text" class="form-control" name="no_hp" placeholder="No Hp" required>
                </div>

                <div class="form-group">
                    <label>Unit Kerja</label>
                    <input type="text" class="form-control" name="unit_kerja" placeholder="Unit Kerja" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </div>
        </div>
    </div>
</form>

{{-- modal edit --}}
@foreach ($data as $d)
<form action="/pegawai/edit/{{$d->id}}" method="POST">
    @csrf
    <div class="modal fade" id="editModal-{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label>Nama Pegawai</label>
                    <input type="text" class="form-control" name="full_name" value="{{$d->full_name}}" required>
                </div>
            
                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" class="form-control" name="nip" value="{{$d->nip}}" required>
                </div>

                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" value="{{$d->tempat_lahir}}" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" placeholder="dd-mm-yyyy" name="tanggal_lahir" value="{{ $d->tanggal_lahir}}" required>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" class="form-control">
                        @if ($d->jenis_kelamin == 'P')
                            <option value="L">Laki-Laki</option>
                            <option value="P" selected>Perempuan</option>
                        @endif
                        @if ($d->jenis_kelamin == 'L')
                            <option value="L" selected>Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="{{$d->alamat}}" required>
                </div>

                <div class="form-group">
                    <label>Pangkat</label>
                    <input type="text" class="form-control" name="pangkat" value="{{$d->pangkat}}" required>
                </div>

                <div class="form-group">
                    <label>Golongan</label>
                    <input type="text" class="form-control" name="golongan" value="{{$d->golongan}}" required>
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" value="{{$d->jabatan}}" required>
                </div>

                <div class="form-group">
                    <label>No Hp</label>
                    <input type="text" class="form-control" name="no_hp" value="{{$d->no_hp}}" required>
                </div>

                <div class="form-group">
                    <label>Unit Kerja</label>
                    <input type="text" class="form-control" name="unit_kerja" value="{{$d->unit_kerja}}" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </div>
        </div>
    </div>
</form>
@endforeach

<!-- modal Import -->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">IMPORT DATA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="pegawai/import" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>PILIH FILE</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                    <button type="submit" class="btn btn-success">IMPORT</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- modal delete delete --}}
@foreach ($data as $d)
    <div class="modal fade" id="deleteModal-{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Apakah anda yakin ingin menghapus data <strong>{{ $d->full_name }}</strong> ?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a href="/pegawai/delete/{{ $d->id }}" class="btn btn-primary">Ya</a>
            </div>
            </div>
        </div>
    </div>
@endforeach
@endsection