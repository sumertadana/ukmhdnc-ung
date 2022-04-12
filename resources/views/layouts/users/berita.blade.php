@php
use App\Models\Komentar;
use App\Models\Komentar2;
@endphp
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
                        <a class="mb-0" href="{{ route('tampil-berita', $brt->judul) }}">selengkapnya</a>
                    </p>
                    <p class="card-text mt-0">
                        <a class="badge bg-warning text-decoration-none link-light me-2"
                            href="{{ route('caribidang', $brt->bidang) }}">{{ $brt->bidang }}</a>
                        <small class="text-muted me-2"><i class="fa fa-calendar-alt"></i>
                            {{ date('d F Y', strtotime($brt->created_at)) }}
                        </small>
                        @php
                            $jumlahkomen1 = Komentar::where('id_berita', $brt->id)->get();
                            $jumlahkomen2 = Komentar2::where('id_berita', $brt->id)->get();
                            $jumlah = count($jumlahkomen1) + count($jumlahkomen2);
                        @endphp
                        <small class="text-muted me-2"><i class="fas fa-comments"></i> {{ $jumlah }}</small>
                        <small class="text-muted"><i class="fa fa-eye mr-1"></i> {{ $brt->view }}</small>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
