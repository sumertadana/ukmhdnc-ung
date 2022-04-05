@extends('layouts.users.user')

@section('konten')
    @php
    use App\Models\Berita;
    use App\Models\Bidang;
    $berita = Berita::join('bidang', 'berita.id_bidang', '=', 'bidang.id')
        ->select('berita.*', 'bidang.bidang')
        ->orderByDesc('berita.created_at')
        ->paginate(4);
    @endphp

    <!-- Blog entries-->
    <div class="col-md-9">
        <h2 class="text-start fw-bold h5 mb-4">Program Kerja Terlaksana <i class="fab fa-chromecast"></i></h2>
        <div class="card mb-3 border-0 bg-light">
            @foreach ($berita as $brt)
                <div class="row g-0 mb-4">
                    <div class="col-md-4">
                        <img src="{{ asset('assets/img/berita/' . $brt->gambar) }}"
                            class="img-fluid rounded-start mt-0 border-1" alt="{{ $brt->judul }}">
                    </div>
                    <div class="col-md-8 ">
                        <div class="card-body pt-md-0 ps-md-3 px-0">
                            <a class="card-title fw-bold h4 mb-1 text-dark text-decoration-none text-uppercase" strong
                                href="{{ route('tampil-berita', $brt->judul) }}">{{ $brt->judul }}</a>
                            <p class="card-text text-justify mb-1 text-secondary">
                                @php
                                    echo substr($brt->deskripsi, 0, 250) . '...';
                                @endphp
                                <a class="mb-0"
                                    href="{{ route('tampil-berita', $brt->judul) }}">selengkapnya</a>
                            </p>
                            <p class="card-text mt-0">
                                <a class="badge bg-warning text-decoration-none link-light me-2"
                                    href="#!">{{ $brt->bidang }}</a>
                                <small class="text-muted me-2"><i class="fa fa-calendar-alt"></i>
                                    {{ date('d F Y', strtotime($brt->created_at)) }}
                                </small>
                                <small class="text-muted me-2"><i class="fas fa-user"></i> {{ $brt->penulis }}</small>
                                <small class="text-muted"><i class="fa fa-eye mr-1"></i> {{ $brt->view }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Side widgets-->
    <div class="col-md-3">
        <!-- Search widget-->
        {{-- @include('layouts.users.pencarian') --}}
        <!-- pengurus widget-->
        @include('layouts.users.pengurus')
        <!-- Categories Bidang widget-->
        @include('layouts.users.bidang')
        <!-- Galeri widget-->
        @include('layouts.users.galeri')
    </div>
@endsection
