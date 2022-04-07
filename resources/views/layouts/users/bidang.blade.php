@php
use App\Models\Bidang;
$bidang = Bidang::where('bidang', '!=', 'Pengurus Inti')->get();
@endphp
<div class="card mb-4">
    <div class="card-header  bg-primary text-light fw-bold text-center py-3">Kategori Bidang</div>
    <div class="card-body">
        <ul class="list-unstyled mb-0 row">
            @foreach ($bidang as $bdg)
                <li class="col-md-12 col-sm-6"><a href="{{ route('caribidang', $bdg->bidang) }}"
                        class="text-decoration-none">{{ $bdg->bidang }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
