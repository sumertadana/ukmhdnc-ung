@extends('layouts.admin')

@section('konten')
    <h1 class="h3 mb-2 text-gray-800">Tambah Berita</h1>
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
        <div class="card-body">
            <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('kirim-berita') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 mb-md-0">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control required @error('judul') is-invalid @enderror"
                            id="judul" name="judul" placeholder="Masukan Judul" value="{{ old('judul') }}"
                            maxlength="100" required>
                        @error('judul')
                            <div class="alert alert-danger">{{ $message }}
                                <button type="button" class="close" data-dismiss="alert">×</button>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-md-0">
                        <label for="judul">Penulis</label>
                        <input type="text" class="form-control required @error('penulis') is-invalid @enderror"
                            id="penulis" name="penulis" placeholder="Masukan Nama Penulis" value="{{ old('penulis') }}"
                            maxlength="50" required>
                        @error('penulis')
                            <div class="alert alert-danger">{{ $message }}
                                <button type="button" class="close" data-dismiss="alert">×</button>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-md-0">
                        <label for="id_bidang">Bidang</label>
                        <select name="id_bidang" id="id_bidang"
                            class="form-control required @error('id_bidang') is-invalid @enderror"
                            value="{{ old('id_bidang') }}">
                            @foreach ($bidang as $bd)
                                <option value="{{ $bd->id }}">{{ $bd->bidang }}</option>
                            @endforeach
                        </select>
                        @error('id_bidang')
                            <div class="alert alert-danger">{{ $message }}
                                <button type="button" class="close" data-dismiss="alert">×</button>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-md-0">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control required @error('gambar') is-invalid @enderror"
                            id="gambar" name="gambar" placeholder="Masukan gambar" value="{{ old('gambar') }}"
                            required="">
                        <small class="text-muted">jpg | 2048</small>
                        @error('gambar')
                            <div class="alert alert-danger">{{ $message }}
                                <button type="button" class="close" data-dismiss="alert">×</button>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-12 ">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control  @error('deskripsi') is-invalid @enderror" required></textarea>
                        @error('deskripsi')
                            <div class="alert alert-danger">{{ $message }}
                                <button type="button" class="close" data-dismiss="alert">×</button>
                            </div>
                        @enderror
                    </div>

                </div>
                <div class="float-right">
                    <a href="{{ route('berita') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    {{-- <script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script> --}}
    <script src="//cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
    <script>
        var deskripsi = document.getElementById("deskripsi");

        CKEDITOR.replace(deskripsi, {

            language: 'en-gb'

        });

        CKEDITOR.config.allowedContent = true;
    </script>
@endsection
