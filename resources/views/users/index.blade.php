@extends('layouts.users.user')

@section('konten')
    @php
    use App\Models\Berita;
    $berita = Berita::all();
    @endphp
    @foreach ($berita as $brt)
        <div class="card mb-4">
            <a href="{{ route('tampil-berita', $brt->judul) }}"><img class="card-img-top img-fluid"
                    src="{{ asset('assets/img/berita/' . $brt->gambar) }}" alt="{{ $brt->gambar }}" /></a>
            <div class="card-header bg-white">
                <a href="{{ route('tampil-berita', $brt->judul) }}"
                    class="card-title fw-bold mb-1 fs-2 text-decoration-none text-dark ">{{ $brt->judul }}</a>
                <ul class="d-flex justify-content-start list-unstyled mb-0">
                    <li class="text-muted"><i class="fa fa-user mr-1"></i> {{ $brt->penulis }}</a></li>
                    <li class="mx-2 text-muted">|</li>
                    <li class="text-muted"><i class="fa fa-calendar-alt"></i>
                        {{ date('d F Y', strtotime($brt->created_at)) }}</a></li>
                </ul>
            </div>

            <div class="card-body">
                <p class="card-text text-justify">
                    @php
                        echo substr($brt->deskripsi, 0, 500) . '.....';
                    @endphp
                    <a href="{{ route('tampil-berita', $brt->judul) }}">selengkapnya</a>

                </p>
                {{-- <a class="btn btn-primary" href="#!">Read more →</a> --}}
            </div>
            <div class="card-footer bg-white">
                <ul class="d-flex justify-content-start list-unstyled text-muted my-2">
                    <li class=""><i class="fa fa-eye mr-1"></i> 12 Dilihat</a></li>
                    <li class="mx-2">|</li>
                    <li class=""><i class="fa fa-comments"></i> 15 Komentar</a></li>
                </ul>
            </div>
        </div>
    @endforeach
@endsection
