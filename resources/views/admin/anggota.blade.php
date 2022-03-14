@extends('layouts.admin')

@section('konten')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Anggota</h1>
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
                Data</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table dataTable table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>JK</th>
                            <th>Angkatan</th>
                            <th>Fakultas</th>
                            <th>Jurusan</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggota as $agt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $agt->nama }}</td>
                                <td>{{ $agt->nim }}</td>
                                <td>
                                    @switch($agt->jk)
                                        @case('Laki-Laki')
                                            L
                                        @break

                                        @default
                                            P
                                    @endswitch
                                </td>
                                <td>{{ $agt->angkatan }}</td>
                                <td>{{ $agt->fakultas }}</td>
                                <td>{{ $agt->jurusan }}</td>
                                <td>{{ $agt->alamat }}</td>
                                <td>{{ $agt->status }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary shadow mb-1" data-toggle="modal"
                                        data-target="#edit{{ $agt->id }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-sm btn-danger shadow" data-toggle="modal"
                                        data-target="#hapus{{ $agt->id }}"><i class="fa fa-trash-alt"></i></button>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelHeading">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" enctype="multipart/form-data" method="POST"
                        action="{{ route('kirimanggota') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control required" id="nama" name="nama"
                                    placeholder="Masukan Nama" value="" minlength="2" required="">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control required" id="nim" name="nim"
                                    placeholder="Masukan NIM" value="" minlength="9" required="">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="fakultas">Fakultas</label>
                                <input type="text" class="form-control required" id="fakultas" name="fakultas"
                                    placeholder="Masukan Fakultas" value="" minlength="2" required="">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="jurusan">Jurusan</label>
                                <input type="text" class="form-control required" id="jurusan" name="jurusan"
                                    placeholder="Masukan Jurusan" value="" minlength="2" required="">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="angkatan">Angkatan</label>
                                <input type="text" class="form-control required" id="angkatan" name="angkatan"
                                    placeholder="Masukan Angkatan" value="" minlength="4" maxlength="4" required="">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="status">Status Anggota</label>
                                <input type="text" class="form-control required" id="status" name="status"
                                    placeholder="Masukan Status Anggota" value="" minlength="2" required="">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control required" id="alamat" name="alamat"
                                    placeholder="Masukan Alamat" value="" minlength="2" required="">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="jk">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
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

    @foreach ($anggota as $agt)
        <!-- Modal ubah data-->
        <div class="modal fade" id="edit{{ $agt->id }}" tabindex="-1" aria-hidden="true" id="staticBackdrop"
            data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modelHeading">Ubah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" enctype="multipart/form-data" method="POST"
                            action="{{ route('updateanggota', $agt->id) }}">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $agt->id }}">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control required" id="nama" name="nama"
                                        value="{{ $agt->nama }}" minlength="2" required="">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control required" id="nim" name="nim"
                                        value="{{ $agt->nim }}" minlength="9" required="">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="fakultas">Fakultas</label>
                                    <input type="text" class="form-control required" id="fakultas" name="fakultas"
                                        value="{{ $agt->fakultas }}" minlength="2" required="">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="jurusan">Jurusan</label>
                                    <input type="text" class="form-control required" id="jurusan" name="jurusan"
                                        value="{{ $agt->jurusan }}" minlength="2" required="">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="angkatan">Angkatan</label>
                                    <input type="text" class="form-control required" id="angkatan" name="angkatan"
                                        value="{{ $agt->angkatan }}" minlength="4" maxlength="4" required="">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="status">Status Anggota</label>
                                    <input type="text" class="form-control required" id="status" name="status"
                                        value="{{ $agt->status }}" minlength="2" required="">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control required" id="alamat" name="alamat"
                                        value="{{ $agt->alamat }}" minlength="2" required="">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select name="jk" id="jk" class="form-control">
                                        <option value="{{ $agt->jk }}" hidden>{{ $agt->jk }}</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
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
        <div class="modal fade" id="hapus{{ $agt->id }}" tabindex="-1" aria-hidden="true" id="staticBackdrop"
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
                        <p>Apakah anda yakin akan menghapus data {{ $agt->nama }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a href="{{ route('hapusanggota', $agt->id) }}" type="button" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
