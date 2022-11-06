@extends('layouts.users.user')

@section('konten')
    <h1 class="fs-3 fw-bold text-center mb-4 mt-2">Galeri Kegiatan</h1>
    <div class="row mb-3">
        @foreach ($galeri as $glr)
            <div class="col-md-3 col-4 col-lg-3 px-2 mb-3">
                <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal"
                    data-bs-target="#tampil{{ $glr->id }}">
                    <img src="{{ asset('assets/img/galeri/' . $glr->foto) }}" class="img-fluid" alt="">
                </button>
            </div>
        @endforeach
    </div>

    @foreach ($galeri as $glr)
        <div class="modal fade" id="tampil{{ $glr->id }}" tabindex="-1" aria-hidden="false" id="staticBackdrop"
            data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        {{-- <div class="ratio ratio-4x3">
                            <iframe src="{{ asset('assets/img/galeri/' . $glr->foto) }}" title="Galeri Kegiatan"
                                allowfullscreen></iframe>
                        </div> --}}
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('assets/img/galeri/' . $glr->foto) }}" class="d-block w-100"
                                        alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
