@php
    use App\Models\Pengurus;

    if (Pengurus::count() < 1) {
        $periodepilihan = 'kosong';
    } else {
        $periodeterbaru = Pengurus::select('periode')
            ->groupBy('periode')
            ->latest()
            ->first();
        $periodepilihan = $periodeterbaru->periode;
    }
    $sidepengurus = Pengurus::join('anggota', 'pengurus.nim', 'anggota.nim')
        ->join('jabatan', 'pengurus.id_jabatan', 'jabatan.id')
        ->select('anggota.nama', 'pengurus.foto', 'pengurus.periode', 'jabatan.jabatan')
        ->where('pengurus.periode', $periodepilihan)
        ->get();
@endphp
<div class="card border-0">
    <div class="card-header bg-primary text-light fw-bold text-center py-3">Pengurus Organisasi</div>
    <div class="card-body p-0">
        <div class="owl-carousel" id="slider-pengurus">
            @foreach ($sidepengurus as $spgr)
                <div> <img class="img-fluid item" src="{{ asset('assets/img/pengrurs/' . $spgr->foto) }}"
                        alt="{{ $spgr->nama }}"> </div>
            @endforeach
        </div>
    </div>
</div>

<script></script>
