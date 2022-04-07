@extends('layouts.users.user')

@section('konten')
    <!-- Blog entries-->
    <div class="col-md-9">
        <article class="">
            <!-- Post header-->
            <header class="mb-4">
                <!-- Post title-->
                <h1 class="fw-bolder mb-1 ">{{ $berita->judul }}</h1>
                <!-- Post meta content-->
                <a class="badge bg-warning text-decoration-none link-light me-2"
                    href="{{ route('caribidang', $berita->bidang) }}">{{ $berita->bidang }}</a>
                <span class="text-muted fst-italic mb-2">Diposting pada {{ date('d F Y', strtotime($berita->created_at)) }}
                    oleh
                    {{ $berita->penulis }}
                </span>
                <!-- Post categories-->

                {{-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Kesenian</a> --}}
            </header>
            <!-- Preview image figure-->
            <figure class="mb-4"><img class="img-fluid rounded"
                    src="{{ asset('assets/img/berita/' . $berita->gambar) }}" alt="..." /></figure>
            <!-- Post content-->
            <section class="mb-3 pe-md-5">
                <p class="fs-5 mb-4 ">
                    {!! $berita->deskripsi !!}
                </p>
            </section>
            <a href="" class="btn btn-primary rounded mb-3"><i class="fab fa-facebook-f"> </i> Bagikan ke Facebook</a>
            <a href="" class="btn rounded mb-3 text-white" style="background-color: rgb(208, 67, 51)"><i
                    class="fab fa-instagram"></i>
                Bagikan
                ke
                Instagram</a>
        </article>
        <!-- Comments section-->
        <section class="mb-5">
            <div class="card bg-light">
                <div class="card-body">
                    <!-- Comment form-->
                    <form class="mb-4">
                        <input type="text" placeholder="Nama" class="form-control mb-2">
                        <textarea class="form-control" rows="3" placeholder=" Komentar"></textarea>
                    </form>
                    <!-- Comment with nested comments-->
                    <div class="d-flex mb-4">
                        <!-- Parent comment-->
                        <div class="flex-shrink-0"><img class="rounded-circle"
                                src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                        <div class="ms-3">
                            <div class="fw-bold">Commenter Name</div>
                            If you're going to lead a space frontier, it has to be government; it'll never be private
                            enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified
                            risks.
                            <!-- Child comment 1-->
                            <div class="d-flex mt-4">
                                <div class="flex-shrink-0"><img class="rounded-circle"
                                        src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">Commenter Name</div>
                                    And under those conditions, you cannot establish a capital-market evaluation of that
                                    enterprise. You can't get investors.
                                </div>
                            </div>
                            <!-- Child comment 2-->
                            <div class="d-flex mt-4">
                                <div class="flex-shrink-0"><img class="rounded-circle"
                                        src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">Commenter Name</div>
                                    When you put money directly to a problem, it makes a good headline.
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single comment-->
                    <div class="d-flex">
                        <div class="flex-shrink-0"><img class="rounded-circle"
                                src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                        <div class="ms-3">
                            <div class="fw-bold">Commenter Name</div>
                            When I look at the universe and all the ways the universe wants to kill us, I find it hard to
                            reconcile that with statements of beneficence.
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
