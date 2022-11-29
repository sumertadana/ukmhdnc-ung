@extends('layouts.admin')

@section('konten')
    <h1 class="h3 mb-2 text-gray-800">Edit Berita</h1>
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
            <form class="form-horizontal" enctype="multipart/form-data" method="POST"
                action="{{ route('update-berita', $edit->id) }}">
                @csrf
                {{-- <input type="hidden" name="penulis" id="penulis" value="{{ $edit->penulis }}"> --}}
                <div class="row">
                    <div class="form-group col-md-6 mb-md-0"">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control required @error('penulis') is-invalid @enderror"
                            id="judul" name="judul" placeholder="Masukan Judul" value="{{ $edit->judul }}"
                            minlength="2" required="">
                        @error('judul')
                            <div class="alert alert-danger">{{ $message }}
                                <button type="button" class="close" data-dismiss="alert">×</button>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-md-0">
                        <label for="judul">Penulis</label>
                        <input type="text" class="form-control required @error('penulis') is-invalid @enderror"
                            id="penulis" name="penulis" placeholder="Masukan Nama Penulis" value="{{ $edit->penulis }}"
                            minlength="2" required="">
                        @error('penulis')
                            <div class="alert alert-danger">{{ $message }}
                                <button type="button" class="close" data-dismiss="alert">×</button>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mb-md-0">
                        <label for="id_bidang">Bidang</label>
                        <select name="id_bidang" id="id_bidang"
                            class="form-control required  @error('id_bidang') is-invalid @enderror">
                            <option selected value="{{ $edit->id_bidang }}" hidden>{{ $edit->bidang }}</option>
                            @foreach ($bidang as $bd)
                                <option value="{{ $bd->id_bidang }}">{{ $bd->bidang }}</option>
                            @endforeach
                        </select>
                        @error('id_bidang')
                            <div class="alert alert-danger">{{ $message }}
                                <button type="button" class="close" data-dismiss="alert">×</button>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control  @error('gambar') is-invalid @enderror" id="gambar"
                            name="gambar" value="">
                        <small class="text-muted mb-0 pb-0">kosongkan jika tidak ingin mengubah gambar</small>
                        @error('gambar')
                            <div class="alert alert-danger">{{ $message }}
                                <button type="button" class="close" data-dismiss="alert">×</button>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control  @error('deskripsi') is-invalid @enderror">{{ $edit->deskripsi }}</textarea>
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
