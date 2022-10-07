@extends('layouts.users.user')

@section('konten')
    <h1 class="fs-3 fw-bold text-center mb-4 mt-2">Galeri Kegiatan</h1>
    <div class="row mb-3">
        @foreach ($galeri as $glr)
            <div class="col-md-3 col-4 col-lg-3 px-2 mb-3">
                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
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
                        <div class="ratio ratio-4x3">
                            <iframe src="{{ asset('assets/img/galeri/' . $glr->foto) }}" title="Galeri Kegiatan"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
