@php
use App\Models\Pengurus;
$sidepengurus = Pengurus::all();
@endphp
<div class="card border-0">
    <div class="card-header bg-primary text-light fw-bold text-center py-3">Struktur Organisasi</div>
    <div class="card-body p-0">
        <div class="owl-carousel" id="slider-pengurus">
            @foreach ($sidepengurus as $spgr)
                <div> <img class="img-fluid item" src="{{ asset('assets/img/pengurus/' . $spgr->foto) }}"
                        alt="{{ $spgr->nama }}"> </div>
            @endforeach
        </div>
    </div>
</div>

<script>

</script>
