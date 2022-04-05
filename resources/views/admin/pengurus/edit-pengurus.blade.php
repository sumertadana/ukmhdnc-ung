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
        <div class="card-body">
            <form class="form-horizontal" enctype="multipart/form-data" method="POST"
                action="{{ route('update-pengurus', $pengurus->id) }}">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                            value="{{ $pengurus->nama }}" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim"
                            value="{{ $pengurus->nim }}" value="{{ old('nim') }}">
                        @error('nim')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="bidang">Bidang</label>
                        <select name="bidang" id="bidang" class="form-control @error('bidang') is-invalid @enderror">
                            <option value="{{ $pengurus->id_bidang }}" hidden>{{ $pengurus->bidang }}</option>
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
                        <select name="jabatan" id="jabatan" class="form-control  @error('jabatan') is-invalid @enderror">
                            <option value="{{ $pengurus->id_jabatan }}" hidden>{{ $pengurus->jabatan }}</option>
                        </select>
                        @error('jabatan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="periode">Periode</label>
                        <input type="text" class="form-control @error('periode') is-invalid @enderror" id="periode"
                            name="periode" value="{{ $pengurus->periode }}" value="{{ old('periode') }}">
                        @error('periode')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="form-group col-sm-6">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto"
                            value="">
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
