@extends('layouts.users')

@section('konten')
    <!-- Blog entries-->
    <div class="col-md-9">
        <article class="">
            <!-- Post header-->
            <header class="mb-4">
                <!-- Post title-->
                <h1 class="fw-bolder fs-1 mb-1 ">{{ $berita->judul }}</h1>
                <!-- Post meta content-->

                <span class="text-muted fs-6 mb-2">Diposting pada {{ date('d F Y', strtotime($berita->created_at)) }}
                    oleh
                    {{ $berita->penulis }}
                </span>
            </header>
            <!-- Preview image figure-->
            <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset('assets/img/berita/' . $berita->gambar) }}"
                    alt="..." /></figure>
            <!-- Post content-->
            <section class="mb-3 pe-md-5">
                <p class="fs-5 mb-4 ">
                    {!! $berita->deskripsi !!}
                </p>
            </section>
            <div class="d-flex justify-content-start">
                <a href="" class="btn btn-primary rounded mb-3 me-1"><i class="fab fa-facebook-f"> </i> Bagikan ke
                    Facebook</a>
                <a href="" class="btn rounded mb-3 text-white" style="background-color: rgb(208, 67, 51)"><i
                        class="fab fa-instagram"></i>
                    Bagikan
                    ke
                    Instagram</a>
            </div>

        </article>


        <!-- Comments section-->
        <section class="mb-5">
            <div class="card bg-light">
                <div class="card-body">
                    <h1 class="h5">Tambahkan Komentar</h1>
                    <!-- Comment form-->
                    <form class="mb-4" method="POST" action="{{ route('kirim-komentar') }}">
                        @csrf
                        <input type="hidden" name="id_berita" id="id_berita" value="{{ $berita->id }}">
                        <input type="text" name="nama" placeholder="Nama" class="form-control mb-2">
                        <textarea class="form-control" name="komentar" rows="3" placeholder="Komentar"></textarea>
                        <button type="submit" class="btn btn-sm btn-primary  my-2">Kirim</button>
                    </form>
                    <!-- Single comment-->
                    @php
                        use App\Models\Komentar;
                        use App\Models\Komentar2;
                        $komen1 = Komentar::where('id_berita', $berita->id)->get();
                    @endphp
                    <div class="d-flex">
                        <div class="row">
                            @foreach ($komen1 as $k1)
                                <div class="col-sm-12">
                                    <div class="ms-3">
                                        <div class="fw-bold">{{ $k1->nama }}</div>
                                        {{ $k1->komentar }}
                                        <div>
                                            <small
                                                class="text-muted">{{ date('d F Y', strtotime($k1->created_at)) }}</small>
                                            <small type="button" class="text-muted ms-2 text-decoration-underline"
                                                data-bs-toggle="collapse" data-bs-target="#balask1{{ $k1->id }}"
                                                aria-expanded="false" aria-controls="balas">Balas</small>
                                            <div class="collapse" id="balask1{{ $k1->id }}">
                                                <div class="card-body">
                                                    <form class="mb-0" method="POST"
                                                        action="{{ route('balas-komentar') }}">
                                                        @csrf
                                                        <input type="hidden" name="id_komentar" id="id_komentar"
                                                            value="{{ $k1->id }}">
                                                        <input type="text" name="nama" placeholder="Nama"
                                                            class="form-control mb-2">
                                                        <textarea class="form-control" name="komentar" rows="3" placeholder="Balasan Komentar"></textarea>
                                                        <button type="submit"
                                                            class="btn btn-sm btn-primary  mt-2">Balas</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Child comment 1-->
                                        <div class="d-flex mt-3">
                                            @php
                                                $komen2 = Komentar2::where('id_komentar', $k1->id)->get();
                                            @endphp
                                            <div class="row">
                                                @foreach ($komen2 as $k2)
                                                    <div class="col-sm-12 mb-2">
                                                        <div class="ms-3">
                                                            <div class="fw-bold">{{ $k2->nama }}</div>
                                                            {{ $k2->komentar }}
                                                            <div>
                                                                <small
                                                                    class="text-muted">{{ date('d F Y', strtotime($k2->created_at)) }}</small>
                                                                <small type="button"
                                                                    class="text-muted ms-2 text-decoration-underline"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#balask2{{ $k2->id }}"
                                                                    aria-expanded="false"
                                                                    aria-controls="balas">Balas</small>
                                                                <div class="collapse" id="balask2{{ $k2->id }}">
                                                                    <div class="card-body">
                                                                        <form class="mb-0" method="POST"
                                                                            action="{{ route('balas-komentar') }}">
                                                                            @csrf
                                                                            <input type="hidden" name="id_komentar"
                                                                                id="id_komentar"
                                                                                value="{{ $k2->id }}">
                                                                            <input type="hidden" name="id_berita"
                                                                                id="id_berita" value="{{ $berita->id }}">
                                                                            <input type="text" name="nama"
                                                                                placeholder="Nama"
                                                                                class="form-control mb-2">
                                                                            <textarea class="form-control" name="komentar" rows="3" placeholder="Balasan Komentar"></textarea>
                                                                            <button type="submit"
                                                                                class="btn btn-sm btn-primary  mt-2">Balas</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Side widgets-->
    <div class="col-md-3">
        @include('layouts.users.sidebar')
    </div>
@endsection
