@extends('layout.master')
@section('title')
    Pegawai
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Penilai</h3>
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
                            <th>Nama Penilai</th>
                            <th>NIP</th>
                            <th>Golongan</th>
                            <th>Jabatan</th>
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
                                <td>{{$d->nama_penilai}}</td>
                                <td>{{$d->nip}}</td>
                                <td>{{$d->golongan}}</td>
                                <td>{{$d->jabatan}}</td>
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
                            <th>Nama Penilai</th>
                            <th>NIP</th>
                            <th>Golongan</th>
                            <th>Jabatan</th>
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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Atasan Penilai</h3>
                <div class="float-right">
                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#add_a">Tambah</button>
                    <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#import_a">Import</button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if ($msg = Session::get('success_a'))
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
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Atasan Penilai</th>
                            <th>NIP</th>
                            <th>Golongan</th>
                            <th>Jabatan</th>
                            <th>Unit Kerja</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=1;
                        @endphp
                        @foreach ($data2 as $d)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$d->nama_atasan}}</td>
                                <td>{{$d->nip}}</td>
                                <td>{{$d->golongan}}</td>
                                <td>{{$d->jabatan}}</td>
                                <td>{{$d->unit_kerja}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning mb-2" data-toggle="modal" data-target="#editModal_a-{{ $d->id }}"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#deleteModal_a-{{ $d->id }}"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>  
                        @endforeach      
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nama Atasan Penilai</th>
                            <th>NIP</th>
                            <th>Golongan</th>
                            <th>Jabatan</th>
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

{{-- modal tambah penilai --}}
<form action="{{route('penilai')}}" method="POST">
    @csrf
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label>Nama Penilai</label>
                    <input type="text" class="form-control" name="nama_penilai" placeholder="Nama Penilai" required>
                </div>
            
                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" class="form-control" name="nip" placeholder="NIP" required>
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

{{-- modal edit penilai --}}
@foreach ($data as $d)
<form action="/penilai/edit/{{$d->id}}" method="POST">
    @csrf
    <div class="modal fade" id="editModal-{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label>Nama Penilai</label>
                    <input type="text" class="form-control" name="nama_penilai" value="{{$d->nama_penilai}}" required>
                </div>
            
                <div class="form-group">
                    <label>NIP</label>
                    <input type="text" class="form-control" name="nip" value="{{$d->nip}}" required>
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

{{-- modal delete penilai --}}
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
                <h3>Apakah anda yakin ingin menghapus data <strong>{{ $d->nama_penilai }}</strong> ???</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a href="/penilai/delete/{{ $d->id }}" class="btn btn-primary">Ya</a>
            </div>
            </div>
        </div>
    </div>
@endforeach

{{-- modal tambah atasan --}}
<form action="/penilai/add" method="POST">
    @csrf
    <div class="modal fade" id="add_a" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Atasan Penilai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label>Nama Atasan Penilai</label>
                <input type="text" class="form-control" name="nama_atasan" placeholder="Nama Atasan Penilai" required>
            </div>
         
            <div class="form-group">
                <label>NIP</label>
                <input type="text" class="form-control" name="nip" placeholder="NIP" required>
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

{{-- modal edit atasan --}}
@foreach ($data2 as $d)
<form action="/penilai/edit/atasan/{{$d->id}}" method="POST">
    @csrf
    <div class="modal fade" id="editModal_a-{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data Atasan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
                <label>Nama Atasan Penilai</label>
                <input type="text" class="form-control" name="nama_atasan" value="{{$d->nama_atasan}}" required>
            </div>
         
            <div class="form-group">
                <label>NIP</label>
                <input type="text" class="form-control" name="nip" value="{{$d->nip}}" required>
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

<!-- modal Import Penilai -->
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">IMPORT DATA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="penilai/import" method="POST" enctype="multipart/form-data">
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

<!-- modal Import Atasan -->
<div class="modal fade" id="import_a" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">IMPORT DATA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="penilai/import/atasan" method="POST" enctype="multipart/form-data">
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
@endsection