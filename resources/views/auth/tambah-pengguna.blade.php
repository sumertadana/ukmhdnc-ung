@extends('layouts.admin')

@section('konten')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Pengguna</h1>
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
                action="{{ route('kirim-pengguna') }}">
                @csrf
                <input type="hidden" name="role" value="admin">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            placeholder="Masukan Nama" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="username">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                            name="username" placeholder="Masukan username" value="{{ old('username') }}">
                        @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="form-group col-sm-6">
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Masukan email" value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    <div class="form-group col-sm-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" placeholder="Masukan password" required autocomplete="new-password">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password"
                            required autocomplete="new-password">
                        @error('password_confirmation')
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
                        // cari anggota
                        $(function() {
                            $('#name').on('change', function() {
                                let name = $('#name').val();

                                $.ajax({
                                    type: 'POST',
                                    url: '{{ route('carianggota') }}',
                                    data: {
                                        name: name
                                    },
                                    cache: false,

                                    success: function(response) {
                                        if (response == "nothing") {
                                            alert("DATA ANGGOTA TIDAK DITEMUKAN");
                                        } else {
                                            document.getElementById("password").value =
                                                response[
                                                    0].password;
                                            document.getElementById("name").value =
                                                response[0]
                                                .name;
                                        }
                                    },

                                })
                            })
                        });
                    })
    </script>
@endsection
