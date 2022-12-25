@extends('layouts.admin')

@section('konten')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Slider</h1>
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
                <i class="fas fa-plus-square"></i></button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table dataTable table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slider as $sld)
                            <tr class="view">
                                <td>{{ $loop->iteration }}</td>
                                <td><img class="img" width="100"
                                        src="{{ asset('assets/img/slider/' . $sld->gambar) }}" alt="{{ $sld->judul }}">
                                </td>
                                <td>{{ $sld->judul }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary shadow" data-toggle="modal"
                                        data-target="#edit{{ $sld->id }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-sm btn-danger shadow" data-toggle="modal"
                                        data-target="#hapus{{ $sld->id }}"><i class="fa fa-trash-alt"></i></button>
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
                        action="{{ route('kirim-slider') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                    placeholder="Masukan Judul" value="{{ old('judul') }}">
                                @error('judul')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="form-group col-sm-12">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" class="form-control required" id="deskripsi" name="deskripsi"
                                    placeholder="Masukan Deskripsi" value="{{ old('deskripsi') }}">
                            </div> --}}
                            <div class="form-group col-sm-12">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control required" id="gambar" name="gambar"
                                    placeholder="Masukan Gambar" value="">
                                <small class="text-muted">Format : JPG | 4 X 3 | Maks : 1MB</small>
                                @error('gambar')
                                    <div class="alert alert-danger">{{ $message }}</div>
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

    @foreach ($slider as $sld)
        <!-- Modal ubah data-->
        <div class="modal fade" id="edit{{ $sld->id }}" tabindex="-1" aria-hidden="true" id="staticBackdrop"
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
                            action="{{ route('update-slider', $sld->id) }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        placeholder="Masukan Judul" value="{{ $sld->judul }}"
                                        value="{{ old('judul') }}">
                                    @error('judul')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" class="form-control required" id="gambar" name="gambar"
                                        placeholder="Masukan Gambar" value="">
                                    <small>Kosongkan jika tidak ingin mengubah gambar</small>
                                    @error('gambar')
                                        <div class="alert alert-danger">{{ $message }}</div>
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
        <div class="modal fade" id="hapus{{ $sld->id }}" tabindex="-1" aria-hidden="true" id="staticBackdrop"
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
                        <p>Apakah anda yakin akan menghapus data {{ $sld->judul }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a href="{{ route('hapus-slider', $sld->id) }}" type="button" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
