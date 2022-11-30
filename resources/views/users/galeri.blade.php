@extends('layouts.users')

@section('konten')
    <h1 class="fs-3 fw-bold text-center mb-4 mt-2">Galeri Kegiatan</h1>

    <div class="row mb-3">
        @foreach ($galeri as $glr)
            <div class="col-md-3 col-3 col-lg-2 col-xl-2 px-2 mb-3">
                <img src="{{ asset('assets/img/galeri/' . $glr->foto) }}" class="img-fluid rounded" data-bs-toggle="modal"
                    data-bs-target="#tampil{{ $glr->id }}">
            </div>
        @endforeach
    </div>

    @foreach ($galeri as $glr)
        <!-- Modal -->
        <div class="modal fade" id="tampil{{ $glr->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="{{ asset('assets/img/galeri/' . $glr->foto) }}" class="img-fluid" alt=""
                            srcset="">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
