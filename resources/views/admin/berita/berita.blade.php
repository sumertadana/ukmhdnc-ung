@extends('layouts.admin')

@section('konten')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Berita</h1>
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
        <div class="card-header py-3">
            <a class="btn btn-primary shadow" href="{{ route('tambah-berita') }}">Tambah <i class="fa fa-plus"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table dataTable table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="pl-2 pr-4">No</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Bidang</th>
                            <th>View</th>
                            <th>Komentar</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berita as $brt)
                            <tr class="view">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $brt->judul }}</td>
                                <td>{{ $brt->penulis }}</td>
                                <td>{{ $brt->bidang }}</td>
                                <td>{{ $brt->view }}</td>
                                <td>{{ $brt->komentar }}</td>
                                <td><img src="{{ asset('assets/img/berita/' . $brt->gambar) }}" alt=""
                                        height="75"></td>
                                <td class="px-1">
                                    <a href="{{ route('edit-berita', $brt->id) }}" class="btn btn-sm btn-primary shadow"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="{{ route('hapus-berita', $brt->id) }}" class="btn btn-sm btn-danger shadow"><i
                                            class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
        integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
@endsection
