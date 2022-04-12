@extends('layouts.admin')

@section('konten')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pengguna</h1>
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
            {{-- <a href="{{ route('tambah-pengguna') }}" type="button" class="btn btn-primary shadow">Tambah <i
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
                            <th>Nama</th>
                            <th>Username</th>
                            {{-- <th>E-mail</th> --}}
                            @if (Auth::user()->role = 'superadmin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $usr)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $usr->name }}</td>
                                <td>{{ $usr->username }}</td>
                                {{-- <td>{{ $usr->email }}</td> --}}
                                @if (Auth::user()->role = 'superadmin')
                                    <td>
                                        <button type="button" class="btn btn-primary shadow mb-1" data-toggle="modal"
                                            data-target="#edit{{ $usr->id }}"><i class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger shadow" data-toggle="modal"
                                            data-target="#hapus{{ $usr->id }}"><i class="fa fa-trash-alt"></i></button>
                                    </td>
                                @endif

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

<!-- Modal tambah data-->
<div class="modal fade" id="tambah" tabindex="-1" aria-hidden="true" id="staticBackdrop" data-backdrop="static"
    data-keyboard="false">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelHeading">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" enctype="multipart/form-data" method="POST"
                    action="{{ route('kirim-pengguna') }}">
                    @csrf
                    <input type="hidden" name="role" value="admin">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Masukan Nama" value="{{ old('name') }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                id="username" name="username" placeholder="Masukan username"
                                value="{{ old('username') }}">
                            @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="form-group col-sm-12">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="Masukan email" value="{{ old('email') }}">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div class="form-group col-sm-12">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Masukan password" required
                                autocomplete="new-password">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="form-group col-sm-12">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation"
                                placeholder="Konfirmasi Password" required autocomplete="new-password">
                            @error('password_confirmation')
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

@foreach ($user as $usr)
    <!-- modal hapus -->
    <div class="modal fade" id="hapus{{ $usr->id }}" tabindex="-1" aria-hidden="true" id="staticBackdrop"
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
                    <p>Apakah anda yakin akan menghapus data {{ $usr->name }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="{{ route('hapus-pengguna', $usr->id) }}" type="button" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
@endforeach

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
        })
    </script>
@endsection
