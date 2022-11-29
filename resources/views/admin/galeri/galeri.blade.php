@extends('layouts.admin')

@section('konten')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Galeri</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">×</button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert">×</button>
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary shadow" data-toggle="modal" data-target="#tambah">Tambah
                <i class="fa fa-plus-square"></i> </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table dataTable table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($galeri as $glr)
                            <tr class="view">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('assets/img/galeri/' . $glr->foto) }}" alt="" height="100px"
                                        class="">
                                </td>
                                <td>{{ $glr->nama }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary shadow" data-toggle="modal"
                                        data-target="#edit{{ $glr->id }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-sm btn-danger shadow" data-toggle="modal"
                                        data-target="#hapus{{ $glr->id }}"><i class="fa fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal tambah data-->
    <div class="modal fade" id="tambah" tabindex="-1" aria-hidden="true" id="staticBackdrop" data-backdrop="static"
        data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelHeading">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" enctype="multipart/form-data" method="POST"
                        action="{{ route('kirim-galeri') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="nama">Nama Gambar</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" placeholder="Nama Gambar" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="alert alert-danger">{{ $message }}
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control required" id="foto" name="foto"
                                    placeholder="Masukan foto" value="">
                                <small class="text-muted">Format: JPG | Maks: 5MB</small>
                                @error('foto')
                                    <div class="alert alert-danger">{{ $message }}
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                    </div>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" value="create">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal edit data-->
    @foreach ($galeri as $glr)
        <div class="modal fade" id="edit{{ $glr->id }}" tabindex="-1" aria-hidden="true" id="staticBackdrop"
            data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modelHeading">Ubah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="POST"
                            action="{{ route('update-galeri', $glr->id) }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="nama">Nama Gambar</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" placeholder="Nama Gambar"
                                        value="{{ $glr->nama }}" value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="alert alert-danger">{{ $message }}
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-12">
                                    <img src="{{ asset('assets/img/galeri/' . $glr->foto) }}" alt=""
                                        class="img-fluid">
                                </div>
                                <div class="form-group col-sm-12 mt-2">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control required" id="foto" name="foto"
                                        placeholder="Masukan foto" value="">
                                    <small class="text-muted">Format: JPG | Maks: 5MB | Kosongkan jika tidak ingin
                                        mengubah foto</small>
                                    @error('foto')
                                        <div class="alert alert-danger">{{ $message }}
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                        </div>
                                    @enderror
                                </div>

                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" value="create">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- modal hapus -->
        <div class="modal fade" id="hapus{{ $glr->id }}" tabindex="-1" aria-hidden="true" id="staticBackdrop"
            data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modelHeading">Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin akan menghapus data {{ $glr->foto }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a href="{{ route('hapus-galeri', $glr->id) }}" type="button" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
