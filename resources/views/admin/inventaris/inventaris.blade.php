@extends('layouts.admin')

@section('konten')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Inventaris</h1>
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
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kode</th>
                            <th>Jumlah</th>
                            <th>Kondisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventaris as $inv)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $inv->nama }}</td>
                                <td>{{ $inv->kode }}</td>
                                <td>{{ $inv->jumlah }}</td>
                                <td>{{ $inv->kondisi }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary shadow" data-toggle="modal"
                                        data-target="#edit{{ $inv->id }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-sm btn-danger shadow" data-toggle="modal"
                                        data-target="#hapus{{ $inv->id }}"><i class="fa fa-trash-alt"></i></button>
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
                        action="{{ route('kiriminventaris') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control required" id="nama" name="nama"
                                    placeholder="Masukan Nama" value="" minlength="2" required="">
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control required" id="kode" name="kode"
                                    placeholder="Masukan Kode" value="" minlength="2" required="">
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" class="form-control required" id="jumlah" name="jumlah"
                                    placeholder="Masukan Jumlah" value="" minlength="2" required="">
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="kondisi">Kondisi</label>
                                <select name="kondisi" id="kondisi" class="form-control">
                                    <option value="Baik">Baik</option>
                                    <option value="Cukup">Cukup</option>
                                    <option value="Rusak">Rusak</option>
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

    @foreach ($inventaris as $inv)
        <!-- Modal ubah data-->
        <div class="modal fade" id="edit{{ $inv->id }}" tabindex="-1" aria-hidden="true" id="staticBackdrop"
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
                            action="{{ route('updateinventaris', $inv->id) }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control required" id="nama" name="nama"
                                        value="{{ $inv->nama }}" minlength="2" required="">
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="kode">Kode</label>
                                    <input type="text" class="form-control required" id="kode" name="kode"
                                        value="{{ $inv->kode }}" minlength="2" required="">
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="text" class="form-control required" id="jumlah" name="jumlah"
                                        value="{{ $inv->jumlah }}" minlength="2" required="">
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="kondisi">Kondisi</label>
                                    <select name="kondisi" id="kondisi" class="form-control">
                                        <option value="{{ $inv->kondisi }}" hidden>{{ $inv->kondisi }}</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Cukup">Cukup</option>
                                        <option value="Rusak">Rusak</option>
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
        <div class="modal fade" id="hapus{{ $inv->id }}" tabindex="-1" aria-hidden="true" id="staticBackdrop"
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
                        <p>Apakah anda yakin akan menghapus data {{ $inv->nama }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a href="{{ route('hapusinventaris', $inv->id) }}" type="button" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
