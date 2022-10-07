{{-- halaman ini tidak terppakai karen proses penambahan anggota baru sudah dilakukan dengan menggunakan modal --}}
{{-- jika ingin menggunakan halaman ini, silahkan hapus modal pada view/admin/anggota/anggota --}}
{{-- kemudian uncomment script dibawah ini, terima kasih. --}}

{{-- @extends('layouts.admin')

@section('konten')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Anggota</h1>
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
                action="{{ route('kirim-anggota') }}">
                @csrf
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" placeholder="Masukan Nama" value="{{ old('nama') }}">
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
                        <select name="fakultas" id="fakultas" class="form-control @error('fakultas') is-invalid @enderror">
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
                        <select name="jurusan" id="jurusan" class="form-control  @error('jurusan') is-invalid @enderror">
                            <option value="">--- Pilih jurusan ---</option>
                        </select>
                        @error('jurusan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="angkatan">Angkatan</label>
                        <input type="text" class="form-control @error('angkatan') is-invalid @enderror" id="angkatan"
                            name="angkatan" placeholder="Masukan Angkatan" value="{{ old('angkatan') }}">
                        @error('angkatan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="hp">No Hp</label>
                        <input type="text" class="form-control @error('hp') is-invalid @enderror" id="hp"
                            name="hp" placeholder="Masukan No Hp" value="{{ old('hp') }}">
                        @error('hp')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control @error('jk') is-invalid @enderror">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        @error('jk')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                            name="alamat" placeholder="Masukan Alamat" value="{{ old('alamat') }}">
                        @error('alamat')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto"
                            value="">
                        <div id="filehelp" class="small">Format: jpg | Maks: 2MB | Kosongkan jika tidak ingin
                            menambah foto
                        </div>
                        @error('foto')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="status">Status Anggota</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="0">Anggota Biasa</option>
                            <option value="1">Anggota Luar Biasa</option>
                        </select>
                        <small>Anggota luar biasa adalah anggota yang sudah mengikuti proses penerimaan di UKM-HDNC</small>
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
@endsection --}}
