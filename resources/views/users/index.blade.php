@extends('layouts.users')

@section('konten')
    <!-- Blog entries-->
    <div class="col-md-9">
        @switch($x)
            @case(1)
                <h2 class="text-start fw-bold h2 mb-4">Menampilkan hasil artikel tentang "{{ $cari }}"
                </h2>
                @include('layouts.users.berita')
            @break

            @case(2)
                <h2 class="text-start fw-bold h2 mb-4">Tidak dapat menemukan artikel tentang "{{ $cari }}"
                </h2>
            @break

            @case(3)
                <h2 class="text-start fw-bold h2 mb-4">Menampilkan hasil artikel tentang bidang "{{ $bidang->bidang }}"
                </h2>
                @include('layouts.users.berita')
            @break

            @case(4)
                <h2 class="text-start fw-bold h2 mb-4">Tidak dapat menemukan artikel bidang "{{ $bidang->bidang }}"
                </h2>
            @break

            @default
                <h2 class="text-start fw-bold h2 mb-4">Program Kerja Terlaksana <i class="fab fa-chromecast"></i>
                </h2>
                @include('layouts.users.berita')
        @endswitch

    </div>
    <!-- Side widgets-->
    <div class="col-md-3">
        @include('layouts.users.sidebar')
    </div>
@endsection
