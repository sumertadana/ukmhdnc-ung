<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Home - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/css/home-styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/mystyle.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>


    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-md navbar-dark bg-primary sticky-top shadow-lg pb-0 my-0">
        <div class="container">
            <a class="navbar-brand my-md-1 py-0 my-0" href="#!">
                <img src="{{ asset('assets/img/logo/logo-depan.png') }}" class="mb-1 mt-sm-0 img-fluid" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 fw-bold">
                    <li class="nav-item"><a class="nav-link text-white" href="{{ url('/') }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link text-white"
                            href="{{ route('tampil-Pengurus') }}">Struktur</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#!">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page header with logo and tagline-->
    @include('layouts.users.header')
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Blog entries-->
            <div class="col-md-9">
                @yield('konten')
            </div>
            <!-- Side widgets-->
            <div class="col-md-3">
                <!-- Search widget-->
                @include('layouts.users.pencarian')
                <!-- pengurus widget-->
                @include('layouts.users.pengurus')
                <!-- Categories Bidang widget-->
                @include('layouts.users.bidang')
                <!-- Galeri widget-->
                @include('layouts.users.galeri')
            </div>
        </div>
    </div>

    <!-- Footer-->
    <footer class="py-4 bg-primary">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; UKM-HDNC UNG 2022</p>
        </div>
    </footer>
    <!-- Core theme JS-->
    <script src="{{ asset('assets/js/home-scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/slider.js') }}"></script>

</body>

</html>
