@extends('layouts.admin')

@section('konten')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Komentar Berita</h1>
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
            <a class="btn btn-success shadow" href="{{ route('berita') }}"> Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table dataTable table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Komentar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($komentar1 as $k1)
                            <tr class="view">
                                <td>{{ $k1->nama }}</td>
                                <td>{{ $k1->komentar }}</td>
                                <td class="">
                                    <a href="{{ route('hapus-komentar', $k1->id) }}" class="btn btn-sm btn-danger shadow"><i
                                            class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tbody>
                        @foreach ($komentar2 as $k2)
                            <tr class="view">
                                <td>{{ $k2->nama }}</td>
                                <td>{{ $k2->komentar }}</td>
                                <td class="">
                                    <a href="{{ route('hapus-komentar', $k2->id) }}" class="btn btn-sm btn-danger shadow"><i
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
