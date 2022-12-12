@php
    use App\Models\Pengurus;
    // $sidepengurus = Pengurus::all();
    $sidepengurus = Pengurus::join('anggota', 'pengurus.nim', 'anggota.nim')
        ->join('jabatan', 'pengurus.id_jabatan', 'jabatan.id')
        ->select('anggota.nama', 'pengurus.foto', 'jabatan.jabatan')
        // ->where('pengurus.id_bidang', $bdg->id)
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
