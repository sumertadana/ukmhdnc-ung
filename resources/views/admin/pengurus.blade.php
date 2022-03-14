@extends('layouts.admin')

@section('konten')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengurus</h1>
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
                            <th>NIM</th>
                            <th>Bidang</th>
                            <th>Jabatan</th>
                            <th>Periode</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengurus as $pgr)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pgr->nama }}</td>
                                <td>{{ $pgr->nim }}</td>
                                <td>{{ $pgr->bidang }}</td>
                                <td>{{ $pgr->jabatan }}</td>
                                <td>{{ $pgr->periode }}</td>
                                <td><img src="{{ asset('assets/img/pengurus/' . $pgr->foto) }}" alt="" width="50"></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary shadow" data-toggle="modal"
                                        data-target="#edit{{ $pgr->id }}"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-sm btn-danger shadow" data-toggle="modal"
                                        data-target="#hapus{{ $pgr->id }}"><i class="fa fa-trash-alt"></i></button>
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
                        action="{{ route('kirimpengurus') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control required" id="namaT" name="nama"
                                    placeholder="Masukan Nama" value="" required="">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control required" id="nimT" name="nim"
                                    placeholder="Masukan NIM" value="" minlength="9" required="">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="bidang">Bidang</label>
                                <select name="bidang" id="bidangT" class="form-control required">
                                    <option selected>--- Pilih Bidang ---</option>
                                    @foreach ($bidang as $bd)
                                        <option value="{{ $bd->bidang }}">{{ $bd->bidang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="jabatan">Jabatan</label>
                                <select name="jabatan" id="jabatanT" class="form-control required">
                                    <option selected>--- Pilih Jabatan ---</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="periode">Periode</label>
                                <input type="text" class="form-control required" id="periode" name="periode"
                                    placeholder="Masukan periode" value="" minlength="2" required="">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control required" id="foto" name="foto" value="" required>
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

    <!-- Modal Ubah data-->
    @foreach ($pengurus as $pgr)
        <div class="modal fade" id="edit{{ $pgr->id }}" tabindex="-1" aria-hidden="true" id="staticBackdrop"
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
                            action="{{ route('updatepengurus', $pgr->id) }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="nama">Nama</label>
                                    <input type="text" class=" nama form-control required" id="namaU" name="nama"
                                        value="{{ $pgr->nama }}" required="">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="nim">NIM</label>
                                    <input type="text" class="form-control required" id="nimU" name="nim"
                                        value="{{ $pgr->nim }}" minlength="9" required="">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="bidang">Bidang</label>
                                    <select name="bidang" id="bidangU" class="form-control required">
                                        <option selected value="{{ $pgr->bidang }}" hidden>{{ $pgr->bidang }}</option>
                                        @foreach ($bidang as $bd)
                                            <option value="{{ $bd->bidang }}">{{ $bd->bidang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="jabatan">Jabatan</label>
                                    <select name="jabatan" id="jabatanU" class="form-control required">
                                        <option selected value="{{ $pgr->jabatan }}" hidden>{{ $pgr->jabatan }}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="periode">Periode</label>
                                    <input type="text" class="form-control required" id="periode" name="periode"
                                        value="{{ $pgr->periode }}" minlength="4" required="">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto" value="">
                                    <small id="note" class="form-text text-muted">Kosongkan Jika Tidak Ingin Mengubah
                                        Foto</small>
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
        <div class="modal fade" id="hapus{{ $pgr->id }}" tabindex="-1" aria-hidden="true" id="staticBackdrop"
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
                        <p>Apakah anda yakin akan menghapus data {{ $pgr->nama }} dari pengurus</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a href="{{ route('hapuspengurus', $pgr->id) }}" type="button" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('script')
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
        integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // TAMBAH
            $(function() {
                $('#bidangT').on('change', function() {
                    let kode = $('#bidangT').val();

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('carijabatan') }}',
                        data: {
                            kode: kode
                        },
                        cache: false,

                        success: function(msg) {
                            $('#jabatanT').html(msg);
                        },

                    })
                })
            });
            // UBAH
            $(function() {
                $('#bidangU').on('change', function() {
                    let kode = $('#bidangU').val();

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('carijabatan') }}',
                        data: {
                            kode: kode
                        },
                        cache: false,

                        success: function(msg) {
                            $('#jabatanU').html(msg);
                        },

                    })
                })
            });
            // TAMBAH
            $(function() {
                $('#namaT').on('change', function() {
                    let nama = $('#namaT').val();

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('carianggota') }}',
                        data: {
                            nama: nama
                        },
                        cache: false,

                        success: function(response) {
                            if (response == "nothing") {
                                alert("DATA ANGGOTA TIDAK DITEMUKAN");
                            } else {
                                document.getElementById("nimT").value = response[0].nim;
                                document.getElementById("namaT").value = response[0]
                                    .nama;
                            }
                        },

                    })
                })
            });
            // UPDATE
            $(function() {
                $('#namaU').on('change', function() {
                    let nama = $('#namaU').val();

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('carianggota') }}',
                        data: {
                            nama: nama
                        },
                        cache: false,

                        success: function(response) {
                            if (response == "nothing") {
                                alert("DATA ANGGOTA TIDAK DITEMUKAN");
                            } else {
                                document.getElementById("nimU").value = response[0].nim;
                                document.getElementById("namaU").value = response[0]
                                    .nama;
                            }
                        },

                    })
                })
            });
        })
    </script>
@endsection
