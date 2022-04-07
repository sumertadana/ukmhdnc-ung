@php
use App\Models\Galeri;
$sidegaleri = Galeri::all();
@endphp
<div class="card border-0 mb-4">
    <div class="card-header bg-primary text-light fw-bold text-center py-3">Galeri Kegiatan</div>
    <div class="card-body p-0">
        <div class="owl-carousel" id="slider-galeri">
            @foreach ($sidegaleri as $sglr)
                <div>
                    <img class="img-fluid item" src="{{ asset('assets/img/galeri/' . $sglr->foto) }}"
                        alt="{{ $sglr->judul }}">
                </div>
            @endforeach
        </div>
    </div>
</div>
