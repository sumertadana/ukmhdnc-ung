@extends('layouts.users.user')

@section('konten')
    @php
    use App\Models\Pengurus;
    @endphp
    @foreach ($bidang as $bdg)
        <h1 class="fs-3 fw-bold text-center mb-3 mt-3">{{ $bdg->bidang }}</h1>
        @php
            $anggota = Pengurus::where('bidang', $bdg->bidang)->get();
        @endphp
        @foreach ($anggota as $agt)
            <div class="row">
                <div class="card col-md-3 px-0 shadow">
                    <img src="{{ asset('assets/img/pengurus/' . $agt->foto) }}" class="card-img-top img-fluid"
                        alt="{{ $agt->foto }}">
                    <div class="card-body pt-2">
                        <h1 class="card-title h5 text-center fw-bold">{{ $agt->nama }}</h1>
                        <h1 class="card-text h6 text-center fw-normal">{{ $agt->jabatan }}</h1>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
@endsection
