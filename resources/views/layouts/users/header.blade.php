<header class=" mb-0 ">
    @php
        use App\Models\Slider;
        $slider = Slider::all();
    @endphp
    <div class="owl-carousel mt-2 container-fluid" id="slider-carousel">
        @foreach ($slider as $sld)
            <div> <img class="item shadow" src="{{ asset('assets/img/slider/' . $sld->gambar) }}"
                    alt="{{ $sld->judul }}"> </div>
        @endforeach
    </div>
</header>
