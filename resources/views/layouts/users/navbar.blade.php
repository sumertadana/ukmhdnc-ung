<nav class="navbar navbar-expand-md navbar-dark bg-primary sticky-top shadow-lg pb-0 my-0">
    <div class="container">
        <a class="navbar-brand my-md-1 py-0 my-0" href="#!">
            <img src="{{ asset('assets/img/logo/logo-depan.png') }}" class="mb-1 mt-sm-0 img-fluid" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse ps-2" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-lg-0 ">
                <li class="nav-item"><a class="nav-link text-white" href="{{ url('/') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('tampil-Pengurus') }}">Struktur</a>
                </li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('tampil-galeri') }}">Galeri</a>
                </li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                </li>
            </ul>
            <form class="d-flex mb-2 mb-md-0" action="{{ route('cari-artikel') }}">
                <input class="form-control me-2" type="search" name="cari" placeholder="Cari Artikel"
                    aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Cari</button>
            </form>
        </div>
    </div>
</nav>
