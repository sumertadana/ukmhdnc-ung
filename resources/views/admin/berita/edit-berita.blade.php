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
        <div class="alert alert-error">
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
                <input type="hidden" name="penulis" id="penulis" value="{{ $edit->penulis }}">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control required" id="judul" name="judul" placeholder="Masukan Judul"
                            value="{{ $edit->judul }}" minlength="2" required="">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" value="">
                        <small class="text-muted mb-0 pb-0">kosongkan jika tidak ingin mengubah gambar</small>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control">{{ $edit->deskripsi }}</textarea>
                    </div>

                    {{-- <div class="col-sm-6">
                        <img src="{{ asset('assets/img/berita/' . $edit->gambar) }}" alt="" height="100">
                    </div> --}}
                </div>
                <div class="float-right">
                    <a href="" class="btn btn-secondary">Kembali</a>
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
