@extends('layouts.user')

@section('konten')
    <!-- Page content-->
    <div class="container">
        <div class="row mt-sm-5">
            <!-- Blog entries-->
            <div class="col-lg-9">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg"
                            alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">January 1, 2021</div>
                        <h2 class="card-title">Featured Post Title</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis
                            aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi
                            vero voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a class="btn btn-primary" href="#!">Read more →</a>
                    </div>
                </div>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-3">
                <!-- pencarian-->
                <div class="card mb-4">
                    <div class="card-header fw-bold bg-primary text-white">Cari Artikel</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Masukan Judul Artikel..."
                                aria-label="Masukan Judul Artikel..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Cari</button>
                        </div>
                    </div>
                </div>
                <!-- pengurus-->
                @php
                    use App\Models\Pengurus;
                    $pengurus = Pengurus::all();
                @endphp

                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Galeri Kegiatan</div>
                    <div class="card-body">
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/img/pengurus/I Made Sumertadana.jpg') }}"
                                        class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/img/pengurus/I Putu Adi.jpg') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('assets/img/pengurus/team-1.jpg') }}" class="d-block w-100"
                                        alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
