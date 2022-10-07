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
            {{-- <a href="{{ route('tambah-anggota') }}" class="btn btn-primary shadow">Tambah <i
                    class="far fa-plus-square"></i></a> --}}
            <button type="button" class="btn btn-primary shadow" data-toggle="modal" data-target="#tambah">Tambah <i
                    class="far fa-plus-square"></i>
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table dataTable table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>JK</th>
                            <th class="d-none">HP</th>
                            <th class="d-none">Fakultas</th>
                            <th>Jurusan</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Angkatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggota as $agt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $agt->nim }}</td>
                                <td>{{ $agt->nama }}</td>
                                <td>{{ $agt->jk }}</td>
                                <td class="d-none">{{ $agt->hp }}</td>
                                <td class="d-none">{{ $agt->fakultas }}</td>
                                <td>{{ $agt->jurusan }}</td>
                                <td>{{ $agt->alamat }}</td>
                                <td>
                                    @switch($agt->status)
                                        @case(0)
                                            Anggota Biasa
                                        @break

                                        @default
                                            Anggota Luar Biasa
                                    @endswitch
                                </td>
                                <td>{{ $agt->angkatan }}</td>
                                <td>
                                    <a href="{{ route('edit-anggota', $agt->id) }}"
                                        class="btn btn-sm btn-primary shadow mb-1"><i class="fa fa-edit"></i></a>
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
                        action="{{ route('kirim-anggota') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" placeholder="Masukan Nama" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim"
                                    name="nim" placeholder="Masukan NIM" value="{{ old('nim') }}">
                                @error('nim')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="fakultas">Fakultas</label>
                                <select name="fakultas" id="fakultas"
                                    class="form-control @error('fakultas') is-invalid @enderror">
                                    <option value="">--- Pilih Fakultas ---</option>
                                    @foreach ($fakultas as $fk)
                                        <option value="{{ $fk->id }}">{{ $fk->fakultas }}</option>
                                    @endforeach
                                </select>
                                @error('fakultas')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="jurusan">Jurusan</label>
                                <select name="jurusan" id="jurusan"
                                    class="form-control  @error('jurusan') is-invalid @enderror">
                                    <option value="">--- Pilih jurusan ---</option>
                                </select>
                                @error('jurusan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="angkatan">Angkatan</label>
                                <input type="text" class="form-control @error('angkatan') is-invalid @enderror"
                                    id="angkatan" name="angkatan" placeholder="Masukan Angkatan"
                                    value="{{ old('angkatan') }}">
                                @error('angkatan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="hp">No Hp</label>
                                <input type="text" class="form-control @error('hp') is-invalid @enderror"
                                    id="hp" name="hp" placeholder="Masukan No Hp"
                                    value="{{ old('hp') }}">
                                @error('hp')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="jk">Jenis Kelamin</label>
                                <select name="jk" id="jk"
                                    class="form-control @error('jk') is-invalid @enderror">
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                @error('jk')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    id="alamat" name="alamat" placeholder="Masukan Alamat"
                                    value="{{ old('alamat') }}">
                                @error('alamat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="status">Status Anggota</label>
                                <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror">
                                    <option value="0">Anggota Biasa</option>
                                    <option value="1">Anggota Luar Biasa</option>
                                </select>
                                {{-- <small>Anggota luar biasa adalah anggota yang sudah mengikuti proses penerimaan di
                                    UKM-HDNC</small> --}}
                                @error('status')
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

    @foreach ($anggota as $agt)
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
                        <a href="{{ route('hapus-anggota', $agt->id) }}" type="button" class="btn btn-danger">Hapus</a>
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
            // cari jurusan
            $(function() {
                $('#fakultas').on('change', function() {
                    let kode = $('#fakultas').val();

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('carijurusan') }}',
                        data: {
                            kode: kode
                        },
                        cache: false,

                        success: function(msg) {
                            $('#jurusan').html(msg);
                        },

                    })
                })
            });
        })
    </script>
@endsection
