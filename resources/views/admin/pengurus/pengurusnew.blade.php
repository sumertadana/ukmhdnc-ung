@extends('layouts.admin')
@php
use App\Models\Pengurus;

$periode = Pengurus::SELECT('periode')
    ->groupBy('periode')
    ->get();

@endphp


@section('konten')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">New Pengurus</h1>
        <div class="dropdown">
            <a class="btn btn-sm btn-primary shadow-sm dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-expanded="false">
                Periode
            </a>

            <div class="dropdown-menu">
                @foreach ($periode as $period)
                    <a class="dropdown-item" href="#">{{ $period->periode }}</a>
                @endforeach
            </div>
        </div>
    </div>
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
            <button type="button" class="btn btn-md btn-primary shadow" data-toggle="modal" data-target="#tambah">Tambah <i
                    class="fas fa-plus-square"></i></button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table dataTable table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Bidang</th>
                            <th>Jabatan</th>
                            <th>Periode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengurus as $pgr)
                            <tr>
                                <td class="pt-1"><img src="{{ asset('assets/img/anggota/' . $pgr->foto) }}"
                                        alt="" width="75px"></td>
                                <td>{{ $pgr->nim }}</td>
                                <td>{{ $pgr->nama }}</td>
                                <td>{{ $pgr->bidang }}</td>
                                <td>{{ $pgr->jabatan }}</td>
                                <td>{{ $pgr->periode }}</td>

                                <td>
                                    <a href="{{ route('edit-pengurus', $pgr->id) }}"
                                        class="btn btn-sm btn-primary shadow"><i class="fa fa-edit"></i></a>
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
                        action="{{ route('kirim-pengurus') }}">
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
                                <label for="bidang">Bidang</label>
                                <select name="bidang" id="bidang"
                                    class="form-control @error('bidang') is-invalid @enderror">
                                    <option value="">--- Pilih Bidang ---</option>
                                    @foreach ($bidang as $bd)
                                        <option value="{{ $bd->id }}">{{ $bd->bidang }}</option>
                                    @endforeach
                                </select>
                                @error('bidang')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="jabatan">Jabatan</label>
                                <select name="jabatan" id="jabatan"
                                    class="form-control  @error('jabatan') is-invalid @enderror">
                                    <option value="">--- Pilih Jabatan ---</option>
                                </select>
                                @error('jabatan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="periode">Periode</label>
                                <div class="d-flex justify-content-between" id="periode">
                                    <input type="text"
                                        class="col-5 form-control @error('periode') is-invalid @enderror" name="periode"
                                        placeholder="periode" value="{{ old('periode') }}">
                                    @error('periode')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-1">-</div>
                                    <input type="text"
                                        class="col-5 form-control @error('periode') is-invalid @enderror" name="periode"
                                        placeholder="periode" value="{{ old('periode') }}">
                                    @error('periode')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            {{-- <div class="form-group col-sm-6">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto"
                                    name="foto" value="">
                                @error('foto')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> --}}
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

    @foreach ($pengurus as $pgr)
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
                        <p>Apakah anda yakin akan menghapus {{ $pgr->nama }} dari pengurus tahun {{ $pgr->periode }}
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <a href="{{ route('hapus-pengurus', $pgr->id) }}" type="button"
                            class="btn btn-danger">Hapus</a>
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
            // cari jabatan
            $(function() {
                $('#bidang').on('change', function() {
                    let kode = $('#bidang').val();

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('carijabatan') }}',
                        data: {
                            kode: kode
                        },
                        cache: false,

                        success: function(msg) {
                            $('#jabatan').html(msg);
                        },

                    })
                })
            });
            // cari anggota
            $(function() {
                $('#nama').on('change', function() {
                    let nama = $('#nama').val();

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
                                document.getElementById("nim").value = response[0].nim;
                                document.getElementById("nama").value = response[0]
                                    .nama;
                            }
                        },

                    })
                })
            });
        })
    </script>
@endsection
