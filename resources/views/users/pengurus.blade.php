@extends('layouts.users')

@section('konten')
    @php
        use App\Models\Pengurus;
        use App\Models\Bidang;
        use App\Models\Jabatan;
        use App\Models\Anggota;
    @endphp
    @foreach ($bidang as $bdg)
        <h1 class="fs-3 fw-bold text-center mb-3 mt-3">{{ $bdg->bidang }}</h1>
        @php
            $anggota = Pengurus::join('anggota', 'pengurus.nim', 'anggota.nim')
                ->join('jabatan', 'pengurus.id_jabatan', 'jabatan.id')
                ->select('anggota.nama', 'anggota.foto', 'jabatan.jabatan')
                ->where('pengurus.id_bidang', $bdg->id)
                ->get();
        @endphp
        <div class="row py-3 container-fluid">
            @foreach ($anggota as $agt)
                <div class="col-6 col-md-4 col-lg-3 px-0 my-1">
                    <div class="card mx-2 shadow">
                        <img src="{{ asset('assets/img/anggota/' . $agt->foto) }}" class="card-img-top img-fluid"
                            alt="{{ $agt->foto }}">
                        <div class="card-body pt-2">
                            <h1 class="card-title fs-5 text-center fw-bold">{{ $agt->jabatan }}</h1>
                            <h1 class="card-text fs-6 text-center text-secondary">{{ $agt->nama }}</h1>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
