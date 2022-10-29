@extends('layouts.admin')

@section('konten')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Format Surat</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">×</button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert">×</button>
        </div>
    @endif


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary shadow" data-toggle="modal" data-target="#tambah">Tambah
                <i class="fas fa-plus"></i> </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table dataTable table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Surat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surat as $srt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $srt->nama_surat }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary shadow" data-toggle="modal"
                                        data-target="#edit{{ $srt->id }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-sm btn-danger shadow" data-toggle="modal"
                                        data-target="#hapus{{ $srt->id }}"><i class="fa fa-trash-alt"></i></button>
                                    <a href="{{ route('download-format-surat', $srt->file_surat) }}"
                                        class="btn btn-sm btn-success shadow"><i class="fas fa-download"></i></a>
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
                        action="{{ route('kirim-format-surat') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="no_surat">Nama Surat</label>
                                <input type="text" class="form-control @error('nama_surat') is-invalid @enderror"
                                    id="no_surat" name="nama_surat" placeholder="Nama Surat"
                                    value="{{ old('nama_surat') }}" required>
                                @error('nama_surat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-12">
                                <label for="file_surat">File Surat</label>
                                <input type="file" class="form-control @error('file_surat') is-invalid @enderror"
                                    id="file_surat" name="file_surat" value="">
                                <div id="filehelp" class="small">Format: .docx | Maks: 10MB
                                </div>
                                @error('file_surat')
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

    @foreach ($surat as $srt)
        <!-- Modal ubah data-->
        <div class="modal fade" id="edit{{ $srt->id }}" tabindex="-1" aria-hidden="true" id="staticBackdrop"
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
                            action="{{ route('update-format-surat', $srt->id) }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="no_surat">Nama Surat</label>
                                    <input type="text" class="form-control @error('nama_surat') is-invalid @enderror"
                                        id="no_surat" name="nama_surat" placeholder="Nama Surat"
                                        value="{{ $srt->nama_surat }}" required>
                                    @error('nama_surat')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label for="file_surat">File Surat</label>
                                    <input type="file" class="form-control @error('file_surat') is-invalid @enderror"
                                        id="file_surat" name="file_surat" value="">
                                    <div id="filehelp" class="small">kosongkan jika tidak mengubah file
                                    </div>
                                    @error('file_surat')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" value="create">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- modal hapus -->
        <div class="modal fade" id="hapus{{ $srt->id }}" tabindex="-1" aria-hidden="true" id="staticBackdrop"
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
                        <p>Apakah anda yakin akan menghapus data surat {{ $srt->nama_surat }} ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a href="{{ route('hapus-format-surat', $srt->id) }}" type="button"
                            class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
